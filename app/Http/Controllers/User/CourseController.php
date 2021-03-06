<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Course, Rating, Forum, Certificate, CourseItem, CourseItemChapter, CourseItemUser, TestItem, TestUser, Test, Notification, User};
use Auth;
use PDF;

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

        $star       = new Rating;
        $star       = $star->totalStar($course->id);
        if ($star == 0) {
            $course->star   = 0;
        }else{
            $course->star   = $star / $course->ratings->count();
        }
        $allCourses     = Course::where('category_id', $course->category_id)->where('id','<>', $course->id)->get();
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
        $progress = $auth->progress()->find($id)->pivot->progress; 

        return view('user.pages.course.class')
        ->with('auth', $auth)
        ->with('progress', $progress)
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
            if($value->id == $request->course_id){
                $value->pivot->progress = $progress;
                $value->pivot->save();
                if($value->total_class == $value->pivot->progress){
                    $notification = new Notification;
                    $notification->type_notification = "Curso Finalizado";
                    $notification->desc_notification = "O usu??rio {$auth->name} finalizou o curso {$value->name}.";
                    $notification->status = 1;
                    $notification->user_id = $auth->id;
                    $notification->save();
                    $this->certificate($auth, $course);
                    return json_encode("true");
                }
            }
        };

        return json_encode($item);

    }

    private function certificate(User $student, Course $course)
    {
        $progress = $student->progress()->find($course->id)->pivot->progress; 
        $path = public_path()."/uploads/archives/";
        $certificate_name = "{$student->id}_{$course->id}_{$course->name}.pdf";
        
        Certificate::updateOrCreate(
            ['path'      => $certificate_name],
            ['user_id'   => $student->id,
            'course_id' => $course->id]
        );

        $teacher = User::find($course->user_id_owner);
        $now = date("Y-m-d H:i:s");
        $data = [
            'date'      => $now,
            'student'   => $student,
            'course'    => $course,
            'teacher'   => $teacher,
            'company'   => $teacher->company,
            'hour'      => $course->timeH,
            'minute'    => $course->timeM,
            ];
        $pdf = PDF::loadView('admin.pages.course.student.certificate', $data);
        $pdf->save("{$path}{$certificate_name}");

        return redirect()->back();
    }

    public function getClass(Request $request)
    {   
        $item = CourseItem::find($request->item);
        $chapter = CourseItemChapter::find($item->course_item_chapter_id);
        $course_id = $chapter->course_id;
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
            ->with('course_id', $course_id)
            ->with('item', $item);
        }
        return view('user.pages.course.audio')->with('item', $item);
    }

    public function testValidate(Request $request)
    {
        $auth = Auth::guard('user')->user();
        $itm = CourseItem::find($request->item_id);
        $test                   = new Test;
        $test->user_id          = $auth->id;
        $test->course_item_id   = $request->item_id;
        $test->course_id       = $request->course_id;
        $test->answers          = $itm->course_item_parent()->count();
        $test->save();

        if (isset($request->true_false)) {
            foreach ($request->true_false as $key => $answer) {
                $item = CourseItem::where('id', $key)->first();
                if ($key = $item->id) {
                    $this->userTest($auth->id, $key, $answer, $test->id);
                }
            }
        }
        if(isset($request->alternative)){
            foreach ($request->alternative as $key => $answer) {
                $item = CourseItem::where('id', $key)->first();
                if ($key = $item->id) {
                    $this->userTest($auth->id, $key, $answer, $test->id);
                }
            }
        }

        if(isset($request->alt_mult)){
            foreach ($request->alt_mult as $key => $answer) {
                $item = CourseItem::where('id', $key)->first();
                if ($key = $item->id) {
                    foreach ($answer as $answers) {
                        $this->userTest($auth->id, $key, $answers, $test->id);
                    }
                }
            }
        }
        if(isset($request->dissertative)){
            foreach ($request->dissertative as $key => $answer) {
                $item = CourseItem::where('id', $key)->first();
                if ($key = $item->id) {
                    $testUser                   = new TestUser;
                    $testUser->user_id          = $auth->id;
                    $testUser->course_item_id   = $key;
                    $testUser->answer           = 2;
                    $testUser->desc             = $answer;
                    $testUser->test_id          = $test->id;
                    $testUser->save();
                }
            }
        }
        $test->correct          = $this->correctAnswer($itm);
        $test->save();
        

        return redirect()->back()->with('send', 'Prova enviada com sucesso.');
    }

    public function avaliable($id)
    {
        $course = Course::find($id);
        $course->avaliable = 3;
        $course->save();
        $notification = new Notification;
        $notification->type_notification = "An??lise de Curso";
        $notification->desc_notification = "O professor/empresa {$course->author->name} enviou o curso {$course->name} para an??lise.";
        $notification->status = 1;
        $notification->save();
        return redirect(route('user.panel')."#teach")->with('success', 'Enviado para an??lise');
    }

    private function userTest($id, $key, $answer, $test_id)
    {
        $testUser                   = new TestUser;
        $testUser->user_id          = $id;
        $testUser->test_id          = $test_id;
        $testUser->course_item_id   = $key;
        $testUser->answer           = $answer;
        $testUser->save();
    }

    private function correctAnswer($item)
    {
        $auth = Auth::guard('user')->user();
        $count = 0;
        foreach ($item->course_item_parent as $key => $items) {
            if($items->course_item_types_id ==  8){
                $userItem = TestUser::where('course_item_id', $items->id)->where('user_id', $auth->id)->first();
                if($items->test()->first()->answer == $userItem->answer){
                    $count++;
                }
            }

            if($items->course_item_types_id ==  9){
                $userItem = TestUser::where('course_item_id', $items->id)->where('user_id', $auth->id)->first();
                if($items->test()->first()->answer == $userItem->answer){
                    $count++;
                }
            }

            if($items->course_item_types_id ==  7){
                $userItem = TestUser::where('course_item_id', $items->id)
                ->where('user_id', $auth->id)->where('answer', 1)->count();
                $answers = $items->test()->where('answer', 1)->count();
                if ($userItem == $answers) {
                    $count++;
                }
            }

        }
        return $count;
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('user.pages.course.show.class')->with('course', $course);   
    }
    
}
