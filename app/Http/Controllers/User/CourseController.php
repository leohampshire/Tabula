<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class CourseController extends Controller
{
    public function course($urn)
    {
    	$course = Course::where('urn', $urn)->first();

    	return view('user.pages.course.course')->with('course', $course);
    }
}
