<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\User;
use App\State;
use App\Country;
use App\Schooling;
use App\UserType;
use App\Admin;

class AdminUserController extends Controller
{
	public function index(Request $request)
	{

        $users = new User;

        if($request->has('name')){
            if(request('name') != ''){
                $users = $users->where('name', 'like', request('name') . '%');
            }
        }
        if($request->has('email')){
            if(request('email') != ''){
                $users = $users->where('email', 'like', request('email') . '%');
            }
        }
        if($request->has('user_type_id')){
            if(request('user_type_id') != ''){
                $users = $users->where('user_type_id', request('user_type_id'));
            }
        }
        $users = $users->orderBy('name', 'asc')->paginate(20);
        return view('admin.pages.user.index')
        ->with('user_type', UserType::where('id', '>', 2)->get())
        ->with('users', $users);
	}
	public function create()
	{
        $userTypes = UserType::whereIn('id', [3,4])->get();
		return view('admin.pages.user.create')
		->with('states', State::all())
        ->with('countries', Country::all())
        ->with('userTypes', $userTypes)
        ->with('schoolings', Schooling::all());
	}
	public function store(Request $request)
	{
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required|unique:users',
            'password'      => 'required|min:6',
            'user_type_id'  => 'required',
        ]);
        $user = new User;
        
        $user->name         = $request->name;
        $user->user_type_id = $request->user_type_id;
        $user->password     = bcrypt($request->password);
        if($request->avatar != null){
            $user->avatar = $this->thumbValidate($request);
        }
        $user->sex          = $request->sex;
        $user->linkedin     = $request->linkedin;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;
        $user->state_id     = $request->state_id;
        $user->country_id   = $request->country_id;
        $user->schooling_id = $request->schooling_id;
        $user->youtube      = $request->youtube;
        $user->email        = $request->email;
        $user->save();

        return redirect(route('admin.user.index'))->with('success', 'Usuário Criado com sucesso');
	}
	public function edit($id)
	{
	
        $userTypes = UserType::where('id', '>', '2')->get();
        $user = User::find($id);
		return view('admin.pages.user.edit')
		->with('states', State::all())
        ->with('countries', Country::all())
        ->with('userTypes', $userTypes)
        ->with('schoolings', Schooling::all())
        ->with('user', $user);
	}
	public function update(Request $request)
	{
		$this->validate($request, [
            'name'          => 'required',
            'email'         => [
                    'required',
                    Rule::unique('users')->ignore($request->id)
                ],
            'user_type_id'  => 'required'
        ]);
       
		$user = User::find($request->id);

        $user->name         = $request->name;
        $user->user_type_id = $request->user_type_id;
        $user->sex          = $request->sex;
        $user->bio          = $request->bio;
        $user->website      = $request->website;
        $user->google_plus  = $request->google_plus;
        if($request->avatar != null){
            $user->avatar = $this->thumbValidate($request);
        }
        $user->linkedin     = $request->linkedin;
        $user->twitter      = $request->twitter;
        $user->facebook     = $request->facebook;
        $user->youtube      = $request->youtube;
        $user->state_id     = $request->state_id;
        $user->country_id   = $request->country_id;
        $user->schooling_id = $request->schooling_id;
        $user->youtube      = $request->youtube;
        $user->email        = $request->email;
        $user->save();

        return redirect(route('admin.user.index'))->with('success', 'Usuário editado com sucesso');
	}
	public function delete($id)
	{
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Usuário Removido');
    }
    
    public function password(User $user, Request $request)
    {

        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        $user->password = bcrypt($request->password);
        $user->save();
		return redirect()->back()->with('success', "Senha alterada com sucesso do(a) $user->name");
    }
    public function thumbValidate(Request $thumb)
    {
    	if($thumb->avatar != '')
        {
            $arq_img = $thumb->file('avatar');
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
