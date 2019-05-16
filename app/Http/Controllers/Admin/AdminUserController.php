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

        $users = $users->orderBy('name', 'asc')->paginate(20);
        return view('admin.pages.user.index')
        ->with('users', $users);
	}
	public function create()
	{
        $userTypes = UserType::where('id', '>', '2')->get();
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
            'country_id'	=> 'required',
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

}
