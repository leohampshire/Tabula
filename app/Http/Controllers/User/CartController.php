<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use Auth;
use Session;

class CartController extends Controller
{
	public function cart()
	{
        $auth = Auth::guard('user')->user();
		return view('user.pages.cart')->with('auth', $auth);
	}

    public function insertCourseIntoFinish($id)
    {
        $auth = Auth::guard('user')->user();

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
}
