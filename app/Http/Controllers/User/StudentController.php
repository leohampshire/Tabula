<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{User,Course,CourseItem};

class StudentController extends Controller
{
    public function test(User $student, $course_id)
    {
        // $tests = $student->tests()->where('course_item_id', $course_id)->get();

        $course = Course::find($course_id);
        $test = $student->tests()->first();
        $item = CourseItem::find($test->course_item_id);
        
        $items = CourseItem::where('course_items_parent', $item->id)->get();
        $answers = $test->tests;   
        return view('user.pages.userPanel.tests')
        ->with('items', $items)
        ->with('item', $item)
        ->with('answers', $answers)
        ->with('tests', $student->tests)
        ->with('student', $student);
    }
}
