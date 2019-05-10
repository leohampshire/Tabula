<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Rating;
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

        $star           = new Rating;
        $star           = $star->totalStar($course->id);
        if ($star == 0) {
            $course->star   = 0;
        }else{
            $course->star   = $star / $course->rating->count();
        }
        $allCourses         = Course::where('category_id', $course->category_id)->where('id','<>', $course->id)->get();
    	
        return view('user.pages.course.course')
        ->with('auth', $auth)
        ->with('course', $course)
        ->with('allCourses', $allCourses)
        ->with('hasCourse', $hasCourse);
    }
}
