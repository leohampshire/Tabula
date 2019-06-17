<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\CourseItemChapter;
use App\{CourseItemType,Category,Country,Course,Certificate,Company,State,Coupon,User,Order};
use Auth;


class UserController extends Controller
{
    public function userPanel()
    {
    	$auth = Auth::guard('user')->user();
        if ($auth) {
            return view('user.pages.panel_dados_pessoais')
            ->with('countries', Country::all())
            ->with('item_types', CourseItemType::all())
            ->with('categories', Category::all())
            ->with('states', State::all())
            ->with('auth', $auth);
        }
        $auth = Auth::guard('company')->user();

    	return view('company.pages.panel_dados_pessoais')
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
        if ($auth->interest) {
            $auth->interest = unserialize($auth->interest);
        }else{   
            $auth->interest = array();
        }
        return view('user.pages.userPanel.dados-pessoais')
        ->with('countries', Country::all())
        ->with('states', State::all())
        ->with('interests', Category::all())
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
        $course->price = number_format($course->price, 2, ',', '.');
        return view('user.pages.userPanel.editar-curso')
        ->with('categories', Category::all())
        ->with('chapters', $chapters)
        ->with('course', $course);
    }

    public function contentMyCourses()
    {
        $auth = Auth::guard('user')->user();
        $courses = $auth->myCourses;
        return view('user.pages.userPanel.meus-cursos')
        ->with('courses', $courses);
    }   

    public function contentCourseItem($id)
    {
        $chapter = CourseItemChapter::find($id);


        return view('user.pages.userPanel.item-curso')
        ->with('item_types', CourseItemType::all())
        ->with('chapter', $chapter);

    }

    public function contentOrders()
    {
        $auth = Auth::guard('user')->user();
        $orders = Order::where('user_id', $auth->id)->get();
        return view('user.pages.userPanel.pedidos')
        ->with('orders', $orders);
    }

    public function contentCertificate()
    {
        $auth = Auth::guard('user')->user();
        $certificates = Certificate::where('user_id', $auth->id)->get();
        return view('user.pages.userPanel.certificados')
        ->with('certificates', $certificates);
    }
    public function contentThisOrder($id)
    {
        $order = Order::find($id);
        return view('user.pages.userPanel.mostrar-pedido')->with('order', $order);

    }

    public function contentTeacher()
    {
        $auth = Auth::guard('user')->user();
        $teachers = User::where('company_id', $auth->company->id)->get();
        return view('user.pages.userPanel.professor-empresa')
        ->with('auth', $auth)
        ->with('teachers', $teachers);
    }
    public function contentCoupons()
    {
        $auth = Auth::guard('user')->user();
        $coupons = Coupon::where('user_id', $auth->id)->get();
        return view('user.pages.userPanel.cupom')
        ->with('auth', $auth)
        ->with('coupons', $coupons);
    }

    public function contentStudent($id)
    {
        $course = Course::find($id);
        return view('user.pages.userPanel.alunos')
        ->with('course', $course);
    }
    
     
    public function update(Request $request)
    {
    	$this->validate($request, [
            'name' 	        => 'required',
            'email'  		=> [
                'required',
                Rule::unique('users')->ignore($request->id)
            ],
            'bio'           => 'max:10000',
	        'img_avatar' 	=> 'mimes:jpeg,bmp,png'
        ]);
        if($request->country_id == 1){
            $this->validate($request, [
                'state_id' 	        => 'required',
            ]);
        }else{
            $request['state_id'] = NULL;
        }

        $user = User::find($request->id);
        if ($request->img_avatar != '') {
        	$request['avatar'] = $this->thumbValidate($request);
        }
        $interest = NULL;
        if (isset($request->interest)) {
            $request['interest'] = serialize($request->interest);
        }
        if ($user->user_type_id == 5) {
            Company::where('user_id', $user->id)->update([
                'about' => $request->bio,
                'cover' => $this->coverValidate($request),
            ]);
        }
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
    
    public function coverValidate(Request $thumb)
    {
        if($thumb->cover != '')
        {
            $arq_img = $thumb->file('cover');
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
                    $count  = Company::where('cover', "{$str}.{$type}")->count();
                }
            }
            $arq_img_name ="{$str}.{$type}";
            $arq_img->move('images/cover', $arq_img_name); 

        }
        else{
            $arq_img_name      = 'default.png';
        }
        return $arq_img_name;  
 
    }


}
