<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Coupon;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('admin.pages.index')
    	->with('courses', Course::all())
    	->with('coupons', Coupon::all());
    }
}
