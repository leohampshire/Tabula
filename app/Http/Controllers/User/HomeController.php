<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\UserType;
use App\Course;
use App\Promotion;
use App\Page;
use App\User;
use Route;
use Auth;

class HomeController extends Controller
{
	public function index()
	{
		$session = session()->pull('course_id');

		if ($session != null) {
			return redirect()->route('cart.insert', ['id' => $session]);   
		}
		
		$featured_category1  = Category::find(1);              
		$featured_category2  = Category::find(2);
		$auth                = Auth::guard('user')->user();
		$userType            = Usertype::all();
		$courses             = NULL;
		if ($auth != NULL && $auth->interest != NULL) {
			$interests  = unserialize($auth->interest); 
			$courses    = Course::wherein('category_id', $interests)->inRandomOrder()->take(8)->get();
		}
		$route = Route::getFacadeRoot()->current()->uri();

		$featured_courses1 = $featured_category1->courses()->where('featured', 1)->inRandomOrder()->take(8)->get();
		$featured_courses2 = $featured_category2->courses()->where('featured', 1)->inRandomOrder()->take(8)->get();
		$featured_posts = Course::inRandomOrder()->take(8)->get();     
		return view('home')
		->with('categories', Category::whereNull('category_id')->whereNotNull('desktop_index')->orderBy('desktop_index', 'ASC')->get())
		->with('row_limit', 5)
		->with('category_count', 0)
		->with('mobile_categories', Category::whereNull('category_id')
			->whereNotNull('mobile_index')
			->orderBy('mobile_index', 'ASC')->get())
		->with('mobile_col_limit', 5)
		->with('mobile_category_count', 0)
		->with('auth', $auth)
		->with('courses', $courses)
		->with('route', $route)
		->with('userType', $userType)
		->with('featured_category1', $featured_category1->name)
		->with('featured_category2', $featured_category2->name)
		->with('featured_courses1', $featured_courses1)
		->with('featured_courses2', $featured_courses2)
		->with('promotions', Promotion::all())
		->with('featured_posts', $featured_posts);
	}

	public function pages($urn)
	{
		$page = Page::where('urn', $urn)->first();
		return view('user.pages.pages')
		->with('page', $page);
	}

	public function allTeachers()
	{
		$teachers = User::where('user_type_id', 4)->get();
		return view('user.pages.all-teachers')
		->with('teachers', $teachers);
	}

	public function teacher($id)
	{
		$teacher = User::find($id);
		return view('user.pages.teacher')
		->with('teacher', $teacher);
	}

	public function allCompanies()
	{
		$companies = User::where('user_type_id', 5)->get();
		return view('user.pages.all-companies')
		->with('companies', $companies);
	}

	public function company($id)
	{
		$company = User::find($id);
		return view('user.pages.company')
		->with('company', $company);
	}

}
