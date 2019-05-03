<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Course;
use App\Category;
use App\CourseItemChapter;
use Auth;
use Session;

class TeacherController extends Controller
{
    
	public function teacherPanel()
	{
		return view('admin.pages.teacher.teacher');
	}
    public function beTeacher()
    {
    	if (Auth::guard('user')->user()) {
    		$auth = Auth::guard('user')->user();
    		$teacher = Teacher::where('user_id', $auth->id);
    		if ($teacher->count() > 0) {
    			$teacher = $teacher->first();
    			if($teacher->answer_first === null){

                	return view('admin.pages.teacher.form.form-1')->with('auth', $auth);
	            }
	            if($teacher->answer_second === null){

	                return view('admin.pages.teacher.form.form-2')->with('auth', $auth);
	            }
	            if($teacher->answer_third === null){

	                return view('admin.pages.teacher.form.form-3')->with('auth', $auth);
	            }
            return redirect()->route('painel');
    		}	
	    	$teacher = new Teacher();
	    	$teacher->user_id   =  $auth->id;
	    	$teacher->save();
			return view('admin.pages.teacher.form.form-1')->with('auth', $auth);
    	}
    	$session = session(['teacher' => 0]);
        return redirect()->route('register');
    }

    public function storeAnswer(Request $request)
    {
    	if (Auth::guard('user')->user()) {
	        $auth = Auth::guard('user')->user();

	        Teacher::where('user_id', $auth->id)->update([
	            $request->row      => $request->answer
	       ]);
	        return redirect()->route('teacher.be');
	    }
    }

    public function deleteAnswer($id)
    {
    	if (Auth::guard('user')->user()) {
    		$auth = Auth::guard('user')->user();

	        Teacher::where('user_id', $auth->id)->update([
	            $id     => null
	       ]);
        	return redirect()->route('teacher.be');
    	}
    }

    public function seeTeacher(Request $request)
	{
		if (Auth::guard('user')->user()) {
			$auth = Auth::guard('user')->user();
	        $auth->user_type_id = 4;
	        $auth->save();
	        // $course = Course::where('user_id_owner', $auth->id)->count();
	        Session::flash('success', 'Parabéns, você é o mais novo professor no Tabula, crie um curso agora mesmo');
	        return redirect()->route('painel');
            // ->with('myCourse', $course);
       }
    }

    public function painel()
    {
        $auth = Auth::guard('user')->user();
        $courses = Course::where('user_id_owner', $auth->id)->where('course_type', 2)->get();
    	return view('admin.pages.teacher.painel')->with('courses', $courses);
    }	

    public function courseCreate()
    {
    	return view('admin.pages.teacher.curso.create')
    	->with('categories', Category::all());
    }

    public function courseEdit($id)
    {
        $course = Course::find($id);
        $chapters = CourseItemChapter::where('course_id', $id)->orderBy('order', 'asc')->get();
        $course->price = number_format($course->price, 2, ',', '.');
        return view('admin.pages.teacher.curso.edit')
        ->with('categories', Category::all())
        ->with('chapters', $chapters)
        ->with('course', $course);
    }

    public function chapterCreate($id)
    {
        $course = Course::find($id);
        return view('admin.pages.teacher.curso.capitulo.index')
        ->with('course', $course);
    }

    public function chapterEdit($id)
    {   
        $chapter = CourseItemChapter::find($id);
        return view('admin.pages.teacher.curso.capitulo.edit')
        ->with('chapter', $chapter);
    }

}
