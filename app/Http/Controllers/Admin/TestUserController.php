<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\CourseItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\TestUser;
use App\User;

class TestUserController extends Controller
{
    public function index(Course $course)
    {
        $chaptersId = $course->course_item_chapters()->pluck('id')->toArray();
        $tests = CourseItem::whereIn('course_item_chapter_id', $chaptersId)->where('course_item_types_id', 6)->get();
        
        return view('admin.pages.usertest.index')
            ->with('tests', $tests);
    }

    public function answer(CourseItem $test)
    {
        $answers = $test->testUser;
        return view('admin.pages.usertest.answer')
            ->with('answers', $answers);
    }

    public function show(Test $test)
    {
        $item = $test->item;
        // return dd($test->tests->first());
        return view('admin.pages.usertest.show')
            ->with('item', $item)
            ->with('test', $test);
    }

    public static function generateCourseId()
    {
        $tests= Test::all();
        foreach ($tests as $test) {
            $item = CourseItem::find ($test->course_item_id);
            $chapter =$item->course_item_chapter; 
            $test->course_id = $chapter->course_id;
            $test->save();
        }
    }
}