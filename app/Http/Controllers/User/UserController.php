<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Country;
use App\State;
use App\Category;
use App\CourseItemChapter;
use App\User;
use App\Course;
use Auth;


class UserController extends Controller
{
    public function userPanel()
    {
    	$auth = Auth::guard('user')->user();
    	return view('user.pages.panel_dados_pessoais')
    	->with('countries', Country::all())
        ->with('categories', Category::all())
    	->with('states', State::all())
    	->with('auth', $auth);
    }
//Cursos que leciono
    public function contentTeachCourse()
    {
        $auth = Auth::guard('user')->user();
        return view('user.pages.userPanel.cursos-leciono')
        ->with('auth', $auth);
    }
    //Dados Pessoais
    public function contentPersonal()
    {
        $auth = Auth::guard('user')->user();
        return view('user.pages.userPanel.dados-pessoais')
        ->with('countries', Country::all())
        ->with('states', State::all())
        ->with('auth', $auth);
    }   
    //Criar Curso professor
    public function contentCreateCourse()
    {
        return view('user.pages.userPanel.criar-curso')
        ->with('categories', Category::all());
    }
    //Editar Curso Professor
    public function contentCourseEdit($id)
    {
        $course = Course::find($id);
        $chapters = $course->course_item_chapters;
        return view('user.pages.userPanel.editar-curso')
        ->with('categories', Category::all())
        ->with('chapters', CourseItemChapter::all())
        ->with('course', $course);
    }

    public function contentMyCourses()
    {
        return view('user.pages.userPanel.meus-cursos');
        // ->with('courses', $courses);
    }   

    public function contentCreateItem()
    {
        
    }
     
    public function update(Request $request)
    {
    	$this->validate($request, [
            'name' 	        => 'required',
            'email'  		=> [
                'required',
                Rule::unique('users')->ignore($request->id)
            ],
	        'country_id' 	=> 'required',
	        'img_avatar' 	=> 'mimes:jpeg,bmp,png'
        ]);

        $user = User::find($request->id);
    	$request['avatar'] = $this->thumbValidate($request);
        
        $user->update($request->all());
        return redirect()->back()->with('success', 'Cadastro alterado');
    }


//valida foto do perfil
    public function thumbValidate(Request $thumb)
    {
    	 if($thumb->img_avatar != '')
        {
            $arq_img = $thumb->file('img_avatar');
            $name    = basename($arq_img->getClientOriginalName());
            $type    = strtolower(pathinfo($name,PATHINFO_EXTENSION));
            $count = 1;
            //Gera string aleatória
            while($count != 0){
                $str            = "";
                $characters     = array_merge(range('A','Z'), range('a','z'), range('0','9'));
                $max            = count($characters) - 1;

                for ($i = 0; $i < 7; $i++) {
                    $rand   = mt_rand(0, $max);
                    $str   .= $characters[$rand];
                    $count  = User::where('avatar', "{$str}.{$type}")->count();
                }
            }
            $arq_img_name ="{$str}.{$type}";
            $arq_img->move('images/profile', $arq_img_name); 

        }
        else{
            $arq_img_name      = 'default.png';
        }
        return $arq_img_name;  
 
    }
}
