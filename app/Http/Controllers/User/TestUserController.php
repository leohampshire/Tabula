<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\CourseItem;
use App\Test;
use App\TestUser;
use App\User;

class TestUserController extends Controller
{
    public function index(Course $course)
    {
        $chaptersId = $course->course_item_chapters()->pluck('id')->toArray();
        $tests = CourseItem::whereIn('course_item_chapter_id', $chaptersId)->where('course_item_types_id', 6)->get();
        
        return view('user.pages.userPanel.usertest.index')
            ->with('tests', $tests);
    }

    public function answer(CourseItem $test)
    {
        $answers = $test->testUser;
        return view('user.pages.userPanel.usertest.answer')
            ->with('answers', $answers);
    }

    public function show(Test $test)
    {
        $item = $test->item;
        // return dd($test->tests->first());
        return view('user.pages.userPanel.usertest.show')
            ->with('item', $item)
            ->with('test', $test);
    }
}
