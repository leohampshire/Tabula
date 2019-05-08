<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseUser;
use Auth;

class TransactionController extends Controller
{
    public function statusTransaction(Request $request)
	{  
		$auth = Auth::guard('user')->user();

		foreach ($auth->cart()->get() as $cart) {
			CourseUser::create([
				'user_id' 	=> $cart->id;,
				'course_id' => $auth->id;,
				'progress'	=> 0,
			]);
			$cart->pivot->delete();

		}
        return redirect()->route('user.panel')->with('success', 'Obrigado por comprar no tabula');

    }
}
