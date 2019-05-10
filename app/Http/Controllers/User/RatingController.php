<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;
use Auth;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
    	$auth = Auth::guard('user')->user();
    	$hasStar = Rating::where('user_id', $auth->id)->where('course_id', $request->course_id)->count();
    	if ($hasStar) {
			return redirect()->back()->with('danger', 'Você já avaliou este curso');
    	}
		$rating = new Rating;
		$rating->create($request->all());		
		return redirect()->back()->with('success', 'Obrigado por avaliar o nosso curso');
    }
}
