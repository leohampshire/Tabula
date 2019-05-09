<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use Auth;

class CourseController extends Controller
{
    public function course($urn)
    {
        $auth = Auth::guard('user')->user();
       	$hasCourse      	= false;

    	$course = Course::where('urn', $urn)->first();
    	if ($auth && $auth->myCourses->find($course->id)) {
            $hasCourse      = true;
    	}

    	return view('user.pages.course.course')->with('course', $course)->with('hasCourse', $hasCourse);
    }
}
