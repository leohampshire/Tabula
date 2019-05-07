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
    //Direciona para a tela de perguntas
    public function beTeacher()
    {
    	if (Auth::guard('user')->user()) {
    		$auth = Auth::guard('user')->user();
    		$teacher = Teacher::where('user_id', $auth->id);
    		if ($teacher->count() > 0) {
    			$teacher = $teacher->first();
    			if($teacher->answer_first === null){
                	return view('user.pages.serprofessor_1')->with('auth', $auth);
	            }
	            if($teacher->answer_second === null){
	                return view('user.pages.serprofessor_2')->with('auth', $auth);
	            }
	            if($teacher->answer_third === null){
	                return view('user.pages.serprofessor_3')->with('auth', $auth);
	            }
                $this->seeTeacher();
            return redirect()->route('user.panel');
    		}	
	    	$teacher = new Teacher();
	    	$teacher->user_id   =  $auth->id;
	    	$teacher->save();
			return view('user.pages.serprofessor_1')->with('auth', $auth);
    	}
    	$session = session(['teacher' => 0]);
        return redirect()->route('register');
    }
    //Salva a resposta
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
    //remove a resposta
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
    //Mostra o painel com o cadastro finalizado
    public function seeTeacher()
	{
		if (Auth::guard('user')->user()) {
			$auth = Auth::guard('user')->user();
	        $auth->user_type_id = 4;
	        $auth->save();
	        Session::flash('success', 'Parabéns, você é o mais novo professor no Tabula, crie um curso agora mesmo');
	        return redirect()->route('user.panel');
       }
    }	
}
