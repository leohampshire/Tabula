<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseUser;
use DateTime;

class NotificationController extends Controller
{
    public function index()
    {
    	$courses = CourseUser::all(); 
    	foreach ($courses as $course) {
    		$course->expired = implode("/", array_reverse(explode("-", $course->user->expired($course->course_id))));
    	}
    	return view('admin.pages.notification.index')
    	->with('courses', $courses);
    }

    public function increaseTime(Request $request){

    	$course = CourseUser::find($request->id);

    	$data = new DateTime($course->expired);
	    $data->modify("+{$request->increase} month"); 
	    $course->expired =  $data->format('Y-m-d');
	    $course->save();
	    return redirect()->back()->with('success', 'Curso extendido para o usuário');
    }
}
