<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\CourseUser;
use App\Course;
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
            }
        }

        return view('user.pages.cart')->with('auth', $auth);
	}

    public function insertCourseIntoFinish($id)
    {
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            return redirect(url('user/login'));
        }

        $items = Cart::where('user_id', $auth->id)->get();
        // boolean de duplicata no carrinho 
        $double = false;

        // verifica se o $id do produto à adicionar é igual a algum $item->course_id
        foreach($items as $item)
            if($id == $item->course_id)
                $double = true;

        //se produto não  estiver no carrinho, então salva no banco
            if(!$double)
            {
                $cart = new Cart;
                $cart->user_id = $auth->id;
                $cart->course_id = $id;
                $cart->save();

                Session::flash('success', 'Curso adicionado ao carrinho!');
            }
            else
                Session::flash('success', 'Curso já existente no carrinho');

            return redirect()->back();
    }

    public function insertCourseIntoCart($id, Request $request)
    {   
        $cart = $request->session()->get('cart');
        $auth = Auth::guard('user')->user();
        if (!$auth) {
            if ($cart) {
                if (in_array($id, $cart)) {
                    return redirect()->back()->with('warning', 'Curso já adicionado');
                }                
            }

            $request->session()->push('cart', $id);
            return redirect()->back()->with('success', 'Curso Adicionado ao Carrinho');
        }

        $items = Cart::where('user_id', $auth->id)->get();
        // boolean de duplicata no carrinho 
        $double = false;

        // verifica se o $id do produto à adicionar é igual a algum $item->course_id
        foreach($items as $item)
            if($id == $item->course_id)
                $double = true;

        //se produto não  estiver no carrinho, então salva no banco
            if(!$double)
            {
                $cart = new Cart;
                $cart->user_id = $auth->id;
                $cart->course_id = $id;
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
                $request->session()->pull('cart', $key);
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
                        $crt = new Cart;
                        $crt->user_id = $auth->id;
                        $crt->course_id = $cart;
                        $crt->save();
                    }
                }
                $value = $request->session()->forget('cart');
                return redirect()->route('cart.checkout');
            }
        return redirect(url('/'));        
        }
    }

    public function checkout()
    {
        $auth = Auth::guard('user')->user();

        return view('user.pages.checkout')
        ->with('auth', $auth);
    }
}
