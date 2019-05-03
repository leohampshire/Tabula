<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Coupon;
use App\Company;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('admin.pages.index')
    	->with('courses', Course::all())
    	->with('users', User::all())
    	->with('companies', Company::all())
    	->with('coupons', Coupon::all());
    }
	public function index()
	{	
		$auth = Auth::guard('admin')->user();
		return view('admin.pages.configuration')
		->with('auth', $auth);
	}

	public function update(Request $request)
	{
		$auth = Auth::guard('admin')->user();
		$auth->name 	= $request->name;
		$auth->email 	= $request->email;

		$auth->save();
		return redirect()->back()->with('success', 'Alterado com sucesso');
	}



}
