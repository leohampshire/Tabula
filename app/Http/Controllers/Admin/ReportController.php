<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\{AdminsExport,BlogsExport, UsersExport,CompaniesExport, CouponsExport,CoursesExport, CourseUsersExport, OrdersExport};
use App\{Report,Admin,User,Company, BlogPost, Coupon, Course, CourseUser, Order};
use Excel;
use DB;

class ReportController extends Controller
{
    public function index()
    {
    	return view('admin.pages.reports.reports')->with('reports', Report::all());
    }

    public function export(Request $request)
    {
    	$this->validate($request, [
            'type_report' 	=> 'required',
            'initial'       => 'required',
	        'final' 		=> 'required'
        ]);
    	$initial = implode("-", array_reverse(explode("/", $request->initial)));
    	$final = implode("-", array_reverse(explode("/", $request->final)));
    	// return dd($teste);
    	switch ($request->type_report) {
    		case 'Admin':
    			$export = $this->exportAdmins($initial, $final);
		    	return Excel::download(new AdminsExport($export), 'admins.xlsx');
    			break;
    		case 'BlogPost':
    			$export = $this->exportPosts($initial, $final);
    			return Excel::download(new BlogsExport($export), 'posts.xlsx');
    			break;
			case 'Company':
    			$export = $this->exportCompanies($initial, $final);
    			return Excel::download(new CompaniesExport($export), 'companies.xlsx');
    			break;
			case 'Coupon':
    			$export = $this->exportCoupons($initial, $final);
    			return Excel::download(new CouponsExport($export), 'companies.xlsx');
    			break;
			case 'Course':
    			$export = $this->exportCourses($initial, $final);
    			return Excel::download(new CoursesExport($export), 'courses.xlsx');
    			break;
			case 'CourseUser':
    			$export = $this->exportCoursesUsers($initial, $final);
    			return Excel::download(new CourseUsersExport($export), 'courses_users.xlsx');
    			break;
			case 'Order':
    			$export = $this->exportOrders($initial, $final);
    			return Excel::download(new OrdersExport($export), 'orders.xlsx');
    			break;
			case 'Teacher':
    			$export = $this->exportTeachers($initial, $final);
    			return Excel::download(new UsersExport($export), 'teachers.xlsx');
    			break;
			case 'User':
    			$export = $this->exportStudents($initial, $final);
    			return Excel::download(new UsersExport($export), 'students.xlsx');
    			break;
    		default:
    			break;
    	}
    }

    private function exportAdmins($initial, $final)
    {
    	$export = Admin::whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    	foreach ($export as $admin) {
    		$admin->user_type = $admin->userTypes->name;
    	}
    	return $export;
    }

    private function exportPosts($initial, $final)
    {
    	$export = BlogPost::whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    	foreach ($export as $posts) {
    		$posts->this_category = $posts->category->name;
    	}
    	return $export;
    }

    private function exportCompanies($initial, $final)
    {
    	$export = Company::whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    	foreach ($export as $company) {
			$company->name = $company->company->name; 
		    $company->email = $company->company->email;
		    $company->bio = $company->company->bio;
		    $company->website = $company->company->website;
		    $company->youtube = $company->company->youtube;
		    $company->google_plus = $company->company->google_plus;
		    $company->linkedin = $company->company->linkedin;
		    $company->twitter = $company->company->twitter;
		    $company->facebook = $company->company->facebook;
		    $company->countrys = isset($company->company->country) ? $company->company->country->name : '';
    		$company->states = isset($company->company->state) ? $company->company->state->name : '';
    	}
    	return $export;
    }

    private function exportCoupons($initial, $final)
    {
    	$export = Coupon::whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    
    	return $export;
    }

    private function exportCourses($initial, $final)
    {
    	$export = Course::whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    	foreach ($export as $course) {
    		$course->categ = $course->category->name;
    		$course->user = $course->author->name; 

    	}
    	return $export;
    }

    private function exportCoursesUsers($initial, $final)
    {
    	$export = CourseUser::whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    	foreach ($export as $cUser) {
    		$cUser->userName = $cUser->user->name; 
    		$cUser->courseName = $cUser->course->name; 
    	}
    	return $export;
    }

    private function exportOrders($initial, $final)
    {
    	$export = Order::whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    	foreach ($export as $order) {
    		$order->userName = $order->user->name;
    		$order->status = $order->statusOrder($order->id);
    	}
    	return $export;
    }

    private function exportTeachers($initial, $final)
    {
    	$export = User::where('user_type_id', 4)->whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    	foreach ($export as $teacher) {
    		$teacher->birthdate = implode("/", array_reverse(explode("-", $teacher->birthdate)));
    		$teacher->countrys = isset($teacher->country) ? $teacher->country->name : '';
    		$teacher->states = isset($teacher->state) ? $teacher->state->name : '';
    		$teacher->schoolings = isset($teacher->schooling) ? $teacher->schooling->name : '';
    	}
    	return $export;
    }

    private function exportStudents($initial, $final)
    {
    	$export = User::where('user_type_id', 3)->whereDate('created_at', '>=', $initial)
    				   ->whereDate('created_at', '<=', $final)->get();
    	foreach ($export as $user) {
    		$user->birthdate = implode("/", array_reverse(explode("-", $user->birthdate)));
    		$user->countrys = isset($user->country) ? $user->country->name : '';
    		$user->states = isset($user->state) ? $user->state->name : '';
    		$user->schoolings = isset($user->schooling) ? $user->schooling->name : '';
    	}
    	return $export;
    }
}
