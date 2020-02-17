<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\CourseUser;
use App\Coupon;
use App\Course;
use App\Services\CouponService;
use App\User;
use Auth;
use Session;

class CartController extends Controller
{
    public function cart(Request $request, CouponService $sv)
    {
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            $cart = $request->session()->get('cart');
            $auth = (object) $auth;
            if ($cart) {
                $course = Course::whereIn('id', $cart)->get();
                $auth->cart = $course;
                $auth->discount = 0;
            }
        } else {
            $auth->discount = $this->discount();
            $itemCart = Cart::where('user_id', $auth->id)->first();

            if ($itemCart) {
                $coupon = Coupon::where('cod_coupon', $itemCart->coupon)->first();
                if ($coupon)
                    $sv->validateCoupon($coupon, true);
            }
        }
        return view('user.pages.cart')->with('auth', $auth);
    }

    public function insertCourseIntoFinish($id, Request $request)
    {
        $course = Course::find($id);
        $cart = $request->session()->get('cart');
        $auth = Auth::guard('user')->user();
        if (!$auth) {

            if ($course->price == null || $course->price == 0) {
                session(['course_free' => $course->id]);
                return redirect('user/login');
            }
            if ($cart) {
                if (in_array($id, $cart)) {
                    return redirect()->back()->with('warning', 'Curso já adicionado');
                }
            }

            $request->session()->push('cart', $id);
            return redirect(route('cart'));
        }
        if ($course->price == null || $course->price == 0) {
            $newFreeCourse = $this->includeStudent($auth->id, $course->id);
            if ($newFreeCourse) {
                Session::flash('success', 'Curso adquirido com sucesso');

                return redirect()->route('user.panel');
            }
        }

        $items = Cart::where('user_id', $auth->id)->get();
        // boolean de duplicata no carrinho 
        $double = false;

        // verifica se o $id do produto à adicionar é igual a algum $item->course_id
        foreach ($items as $item)
            if ($id == $item->course_id)
                $double = true;
        $course = Course::find($id);
        //se produto não  estiver no carrinho, então salva no banco
        if (!$double) {
            $cart = new Cart;
            $cart->user_id = $auth->id;
            $cart->course_id = $id;
            $cart->teacher_id = $course->user_id_owner;
            $cart->type = $course->course_type;
            $cart->save();

            Session::flash('success', 'Curso adicionado ao carrinho!');
        } else
            Session::flash('info', 'Curso já existente no carrinho');

        return redirect(route('cart'));
    }

    public function insertCourseIntoCart($id, Request $request)
    {
        $course = Course::find($id);
        $cart = $request->session()->get('cart');
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            if ($course->price == null || $course->price == 0) {
                session(['course_free' => $course->id]);
                return redirect('user/login');
            }
            if ($cart) {
                if (in_array($id, $cart)) {
                    return redirect()->back()->with('warning', 'Curso já adicionado');
                }
            }

            $request->session()->push('cart', $id);
            return redirect()->back()->with('success', 'Curso Adicionado ao Carrinho');
        }
        if ($course->price == null || $course->price == 0) {
            $newFreeCourse = $this->includeStudent($auth->id, $course->id);
            if ($newFreeCourse) {
                Session::flash('success', 'Curso adquirido com sucesso');

                return redirect()->route('user.panel');
            }
        }

        $items = Cart::where('user_id', $auth->id)->get();
        // boolean de duplicata no carrinho 
        $double = false;

        // verifica se o $id do produto à adicionar é igual a algum $item->course_id
        foreach ($items as $item)
            if ($id == $item->course_id)
                $double = true;
        $course = Course::find($id);
        //se produto não  estiver no carrinho, então salva no banco
        if (!$double) {
            $cart = new Cart;
            $cart->user_id = $auth->id;
            $cart->course_id = $id;
            $cart->teacher_id = $course->user_id_owner;
            $cart->type = $course->course_type;
            $cart->save();

            Session::flash('success', 'Curso adicionado ao carrinho!');
        } else
            Session::flash('info', 'Curso já existente no carrinho');

        return redirect()->back();
    }

    public function removeCourseIntoCart($id, Request $request)
    {
        $cart = $request->session()->get('cart');
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            if (in_array($id, $cart)) {
                $key = array_search($id, $cart);
                unset($cart[$key]);
                session()->forget('cart');
                session()->put('cart', $cart);
            }
        } else {
            
            $item = Cart::where('user_id', $auth->id)->where('course_id', $id)->first();
            $item->delete();
            Session::flash('success', 'Curso removido do carrinho!');
        }

        return redirect()->back();
    }

    public function sessionCourseIntoCart(Request $request)
    {
        $auth = Auth::guard('user')->user();


        if ($auth) {
            $carts = $request->session()->get('cart');
            if ($carts) {
                foreach ($carts as $cart) {
                    $exist = Cart::where('course_id', $cart)->where('user_id', $auth->id)->count();
                    $myCourse = CourseUser::where('user_id', $auth->id)->where('course_id', $cart)->count();
                    if ($exist == 0 && $myCourse == 0) {
                        $course = Course::find($cart);
                        $crt = new Cart;
                        $crt->user_id = $auth->id;
                        $crt->course_id = $course->id;
                        $crt->teacher_id = $course->user_id_owner;
                        $crt->type = $course->course_type;
                        $crt->save();
                    }
                }
                $value = $request->session()->forget('cart');
                if (!$request->session()->exists('course_free')) {
                    return redirect()->route('cart');
                }
            }
            if ($request->session()->has('course_free')) {
                $course_id = $request->session()->get('course_free');
                $course = Course::find($course_id);
                $request->session()->forget('course_free');
                return redirect()->route('course.single', ['urn' => $course->urn]);
            }
            return redirect(url('/'));
        }
    }

    public function checkout()
    {
        $auth = Auth::guard('user')->user();
        if ($auth) {
            return view('user.pages.checkout')
                ->with('auth', $auth);
        }
        return redirect(url('/user/login'));
    }

    public function coupon(Request $request, CouponService $sv)
    {
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            return redirect(url('/user/login'));
        }
        
        $coupon = Coupon::where('cod_coupon', $request->coupon)->first();
        if ($coupon) {
            if ($sv->validateCoupon($coupon)) {
                return redirect()->back()->with('success', 'Cupom Aplicado');
            }
        }
        return redirect()->back()->with('warning', 'Cupom não disponível ou já aplicado');
    }

    public function priceCourseFree(Request $request)
    {
        $user = Auth::guard('user')->user();
        foreach ($user->cart as $courseItem) {
            $this->includeStudent($user->id, $courseItem->id);
            $courseItem->pivot->delete();
        }
        return redirect()->back()->with('success', 'Pedido finalizado');
    }

    private function discount()
    {
        $total = 0;
        $auth = Auth::guard('user')->user();
        foreach ($auth->cart as  $cart) {
            $discount = $cart->pivot->discount;
            $total = $total + $discount;
        }
        return $total;
    }

    private function includeStudent($user_id, $course_id)
    {
        $student = User::find($user_id);
        $date = date('Y-m-d', strtotime('+6 month'));
        if ($student) {
            if (count($student->myCourses->where('id', $course_id)) == 0) {
                CourseUser::create([
                    'user_id'   => $user_id,
                    'course_id' => $course_id,
                    'progress'  => 0,
                    'expired'   => $date
                ]);
                return true;
            }
        }
        return false;
    }

}
