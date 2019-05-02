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

class AdminUserController extends Controller
{
	public function index(Request $request)
	{
		return view('admin.pages.user.index')->with('users', User::all());
	}
	public function create()
	{
		return view('admin.pages.user.create')
		->with('states', State::all())
        ->with('countries', Country::all())
        ->with('userTypes', UserType::all())
        ->with('schoolings', Schooling::all());
	}
	public function store(Request $request)
	{

        $this->validate($request, [
            'login'         => 'required',
            'name'          => 'required',
            'country_id'	=> 'required',
            'password'      => 'required|min:6',
            'usersType'     => 'required'
        ]);
        if ($request->usersType <= 2) {
        	$this->validate($request, [
            	'email'     => 'required|unique:admins',
        	]);
			$user = new Admin;

        }else{
			$this->validate($request, [
            	'email'     => 'required|unique:users',
        	]);
			$user = new User;
        }
        $user->login        = $request->login;
        $user->name         = $request->name;
        $user->password     = bcrypt($request->password);
        $user->birthdate    = implode("-", array_reverse(explode("/", $request->birthdate)));
        $user->sex          = $request->sex;
        $user->occupation   = $request->occupation;
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

        if ($request->usersType == "5") {
            Company::create([
                'user_id'   => $user->id
            ]);
        }

        return redirect(route('admin.user.index'))->with('success', 'Usuário Criado com sucesso');
	}
	public function edit($id, $type_id)
	{
		if ($type_id <= 2) {
			$user = Admin::find($id);
		}else{
			$user = User::find($id);
		}
		$user->birthdate = implode("/", array_reverse(explode("-", $user->birthdate)));
		return view('admin.pages.user.edit')
		->with('states', State::all())
        ->with('countries', Country::all())
        ->with('userTypes', UserType::all())
        ->with('schoolings', Schooling::all())
        ->with('user', $user);
	}
	public function update(Request $request)
	{
		$this->validate($request, [
            'login'         => 'required',
            'name'          => 'required',
            'country_id'	=> 'required',
            'usersType'     => 'required'
        ]);
        if ($request->usersType <= 2) {
        	$this->validate($request, [
        		'email'  => [
                	'required',
                	Rule::unique('admins')->ignore($request->id)
            	],
        	]);
			$user = Admin::find($request->id);

        }else{
			$this->validate($request, [
            	'email'  => [
                	'required',
                	Rule::unique('users')->ignore($request->id)
            	],
        	]);
			$user = User::find($request->id);

        }
        $user->login        = $request->login;
        $user->name         = $request->name;
        $user->birthdate    = implode("-", array_reverse(explode("/", $request->birthdate)));
        $user->sex          = $request->sex;
        $user->occupation   = $request->occupation;
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

        return redirect(route('admin.user.index'))->with('success', 'Usuário editado com sucesso');
	}
	public function delete($id)
	{
		
	}
}
