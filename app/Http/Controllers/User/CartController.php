<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\CourseUser;
use App\CouponUser;
use App\Coupon;
use App\Course;
use App\User;
use Auth;
use Session;

class CartController extends Controller
{
	public function cart(Request $request)
	{
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            $cart = $request->session()->get('cart');
            $auth = (object)$auth;
            if ($cart) {
                $course = Course::whereIn('id', $cart)->get();
                $auth->cart = $course;
                $auth->discount = 0;
            }
        }else{
            $auth->discount = $this->discount();

        }

        return view('user.pages.cart')->with('auth', $auth);
	}

    public function insertCourseIntoFinish($id, Request $request)
    {
        $course = Course::find($id);
        $cart = $request->session()->get('cart');
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            if($course->price == null || $course->price == 0 ){
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
        if($course->price == null || $course->price == 0 ){
            $newFreeCourse = $this->includeStudent($auth->id, $course->id);
            if($newFreeCourse){
                Session::flash('success', 'Curso adquirido com sucesso');

                return redirect()->route('user.panel');
            }
        }
        
        $items = Cart::where('user_id', $auth->id)->get();
        // boolean de duplicata no carrinho 
        $double = false;

        // verifica se o $id do produto à adicionar é igual a algum $item->course_id
        foreach($items as $item)
            if($id == $item->course_id)
                $double = true;
                $course = Course::find($id);
        //se produto não  estiver no carrinho, então salva no banco
            if(!$double)
            {
                $cart = new Cart;
                $cart->user_id = $auth->id;
                $cart->course_id = $id;
                $cart->teacher_id = $course->user_id_owner;
                $cart->type = $course->course_type;
                $cart->save();

                Session::flash('success', 'Curso adicionado ao carrinho!');
            }
            else
                Session::flash('info', 'Curso já existente no carrinho');

            return redirect(route('cart'));
    }

    public function insertCourseIntoCart($id, Request $request)
    {   
        $course = Course::find($id);
        $cart = $request->session()->get('cart');
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            if($course->price == null || $course->price == 0 ){
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
        if($course->price == null || $course->price == 0 ){
            $newFreeCourse = $this->includeStudent($auth->id, $course->id);
            if($newFreeCourse){
                Session::flash('success', 'Curso adquirido com sucesso');

                return redirect()->route('user.panel');
            }
        }

        $items = Cart::where('user_id', $auth->id)->get();
        // boolean de duplicata no carrinho 
        $double = false;

        // verifica se o $id do produto à adicionar é igual a algum $item->course_id
        foreach($items as $item)
            if($id == $item->course_id)
                $double = true;
                $course = Course::find($id);
        //se produto não  estiver no carrinho, então salva no banco
            if(!$double)
            {
                $cart = new Cart;
                $cart->user_id = $auth->id;
                $cart->course_id = $id;
                $cart->teacher_id = $course->user_id_owner;
                $cart->type = $course->course_type;
                $cart->save();

                Session::flash('success', 'Curso adicionado ao carrinho!');
            }
            else
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
        }else{
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
                return redirect()->route('cart');
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

    public function coupon(Request $request){
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            $request->session()->put('coupon', $request->coupon);
            return redirect(url('/user/login'));
        }
        $coupon = Coupon::where('cod_coupon', $request->coupon)->first();
        if ($coupon) {
            $request->session()->forget('coupon');
            $this->validateCoupon($coupon);
            
            return redirect()->back()->with('success', 'Cupom Aplicado');
        }
        return redirect()->back()->with('warning', 'Cupom não disponível');
    }

    //Valida se o cupom pode ser usado
    private function validateCoupon(Coupon $coupon)
    {
        $auth = Auth::guard('user')->user();
        $couponUser = CouponUser::where('user_id', $auth->id)->where('coupon_id', $coupon->id)->first();
        if(!$couponUser){
            $this->limitValidate($coupon); 
            foreach ($auth->cart as $cart) {
                $cart->pivot->coupon = $coupon->cod_coupon;
                $cart->pivot->save();
            }
            $this->generateDiscount($coupon, $auth->cart);
        }
    }

    private function generateDiscount(Coupon $coupon, $course)
    {
        if ($coupon->type_coupon == 'carrinho') {
            $this->fixedDiscount($coupon, $course);
        }elseif($coupon->type_coupon == 'produto') {
            $this->courseDiscount($coupon, $course);
        }elseif($coupon->type_coupon == 'macrotema'){
            $this->macrotemaDiscount($coupon, $course);
        }elseif($coupon->type_coupon == 'subcategoria'){
            $this->subcategoryDiscount($coupon, $course);
        }
        
    }

    //Verifica o limite do cupom
    private function limitValidate(Coupon $coupon)
    {
        $limit = CouponUser::where('coupon_id', $coupon->id)->count();
        if($limit == $coupon->limit){
            return redirect()->back()->with('warning', 'Este cupom não é mais válido');
        }
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


    private function fixedDiscount(Coupon $coupon, $course)
    {
        $discount = $coupon->value_coupon / $course->count();
        if ($coupon->type_discount == 'dinheiro') {
            foreach ($course as $key => $cart) {
                $cart->pivot->discount = $discount;
                $cart->pivot->save();
            }
        }else{
            foreach ($course as $key => $cart) {
                $cart->pivot->discount = ($cart->price * $discount) / 100;
                
                $cart->pivot->save();
            }
        }
    }

    private function courseDiscount(Coupon $coupon, $course)
    {
        $courses = unserialize($coupon->type_id);
        $discount = $coupon->value_coupon / count($courses);

        if ($coupon->type_discount == 'dinheiro') {
            foreach ($course as $key => $cart) {
                if(in_array($cart->id, $courses)){
                    $cart->pivot->discount = $discount;
                }else{
                    $cart->pivot->discount = 0;
                }
                $cart->pivot->save();
            }
        }else{
            foreach ($course as $key => $cart) {
                if(in_array($cart->id, $courses)){
                    $cart->pivot->discount = $discount;
                }else{
                    $cart->pivot->discount = ($cart->price * $discount) / 100;
                }
                $cart->pivot->save();
            }
        }
    }

    private function macrotemaDiscount(Coupon $coupon, $course)
    {
        $count = 0;
        $categories = unserialize($coupon->type_id);
        foreach ($course as $cart) {
            if(in_array($cart->category_id, $categories)){
                $count++;
            }
        }
        $discount = $coupon->value_coupon / $count;
        if ($coupon->type_discount == 'dinheiro') {
            foreach ($course as $cart) {
                if(in_array($cart->category_id, $categories)){
                    $cart->pivot->discount = $discount;
                }else{
                    $cart->pivot->discount = 0;
                }
                $cart->pivot->save();
            }
        }else{
            foreach ($course as $cart) {
                if(in_array($cart->category_id, $categories)){
                    $cart->pivot->discount = $discount;
                }else{
                    $cart->pivot->discount = ($cart->price * $discount) / 100;
                }
                $cart->pivot->save();
            }
        }
    }

    private function subcategoryDiscount(Coupon $coupon, $course)
    {
        $count = 0;
        $subcategories = unserialize($coupon->type_id);
        foreach ($course as $cart) {
            if(in_array($cart->subcategory_id, $subcategories)){
                $count++;
            }
        }
        $discount = $coupon->value_coupon / $count;
        if ($coupon->type_discount == 'dinheiro') {
            foreach ($course as $cart) {
                if(in_array($cart->subcategory_id, $subcategories)){
                    $cart->pivot->discount = $discount;
                }else{
                    $cart->pivot->discount = 0;
                }
                $cart->pivot->save();
            }
        }else{
            foreach ($course as $cart) {
                if(in_array($cart->subcategory_id, $subcategories)){
                    $cart->pivot->discount = $discount;
                }else{
                    $cart->pivot->discount = ($cart->price * $discount) / 100;
                }
                $cart->pivot->save();
            }
        }
    }

    private function includeStudent($user_id, $course_id)
    {
        $student = User::find($user_id);
        $date = date('Y-m-d', strtotime('+6 month'));
        if($student){
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
