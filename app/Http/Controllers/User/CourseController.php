<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Course, Rating, Forum, CourseItem, CourseItemChapter, CourseItemUser};
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

    public function class($id)
    {
        $auth = Auth::guard('user')->user();
        $course = Course::find($id);        

        return view('user.pages.course.class')
        ->with('auth', $auth)
        ->with('course', $course);
    }

    public function forum($id)
    {
        $course = Course::find($id);
        $auth = Auth::guard('user')->user();
        return view('user.pages.course.forum')
        ->with('course', $course)
        ->with('auth', $auth);
    }

    public function question(Request $request)
    {
        if(!isset($request->answer)){
            $this->validate($request, [
                'title'         => 'required',
            ]);
        }
        $this->validate($request, [
            'question'         => 'required',
        ]);
        $auth = Auth::guard('user')->user();
        $request['user_id'] = $auth->id;
        Forum::create($request->all());
        return redirect()->back()->with('success', 'Registrado.');
    }

    public function classChecked(Request $request)
    {
        $auth = Auth::guard('user')->user();
        $class = NULL;
        if (strpos($request->class_id, '-')) {
            $class = explode('-', $request->class_id);

            $item = CourseItemUser::where('user_id', $request->user_id)
            ->where('course_item_id', $class[1])
            ->where('course_chapter_id', $class[0])->first();
        }else{
            $item = CourseItemUser::where('user_id', $request->user_id)
                    ->where('course_chapter_id', $request->class_id)
                    ->where('course_item_id', NULL)->first();
        }
        if (!$item) {
            $item = new CourseItemUser();
        }
        $item->user_id = $request->user_id;
        $item->course_chapter_id = $request->class_id;
        if ($item->course_item_status_id == 0) {
            $item->course_item_status_id = 1;
        }else{
            $item->course_item_status_id = 0;
        }

        if ($class) {
            $item->course_chapter_id = $class[0];
            $item->course_item_id = $class[1];
        }else{

        $chapter = CourseItemChapter::find($request->class_id);
            foreach ($chapter->course_item as $itens) {
                $items = CourseItemUser::where('user_id', $request->user_id)
                        ->where('course_item_id', $itens->id)
                        ->where('course_chapter_id', $chapter->id)->first();
                if (!$items) {
                    $items = new CourseItemUser();
                }
                $items->user_id = $request->user_id;
                $items->course_chapter_id = $chapter->id;
                $items->course_item_id = $itens->id;
                if ($item->course_item_status_id == 0) {
                    $items->course_item_status_id = 0;
                }else{
                    $items->course_item_status_id = 1;
                }
                $items->save();
            }
        }
        $item->save();
        //Acessa as aulas feitas
        $progress = $auth->itemUser()->where('course_item_status_id', 1)->count();
        //Percorre todos os cursos
        $course = $auth->myCourses()->where('course_id', $request->course_id)->first();
        foreach ($auth->myCourses as $value) {
            if($value->id == $request->course_id)
            {
                $value->pivot->progress = $progress;
                $value->pivot->save();
            }
        };

        return json_encode($item);

    }

    public function getClass(Request $request)
    {   
        $item = CourseItem::find($request->item);

        if ($item->course_item_types_id == 1) {
            return view('user.pages.course.video')->with('item', $item);
        }
        if ($item->course_item_types_id == 2) {
            return view('user.pages.course.image')->with('item', $item);

        }
        if ($item->course_item_types_id == 3) {
            return view('user.pages.course.text')->with('item', $item);
        }if($item->course_item_types_id == 6){
            $items = CourseItem::where('course_items_parent', $item->id)->get();
            return view('user.pages.course.test')
            ->with('items', $items)
            ->with('item', $item);
        }
        return view('user.pages.course.audio')->with('item', $item);
    }

    public function testValidate(Request $request)
    {
        return dd($request);
    }

    public function avaliable($id)
    {
        $course = Course::find($id);
        $course->avaliable = 3;
        $course->save();
        return redirect()->back()->with('success', 'Enviado para análise');
    }
    
}
