<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Course;
use App\UserType;
use App\State;
use App\Country;
use App\Schooling;
use App\Coupon;
use App\Company;
use App\User;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('admin.pages.index')
    	->with('courses', Course::all())
    	->with('users', User::all())
    	->with('companies', Company::all())
    	->with('coupons', Coupon::all());
    }
	public function index(Request $request)
	{
        $users = new Admin;

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
        
		return view('admin.pages.admin.index')
        ->with('users', $users);
	}

	public function create()
	{
		$userTypes = UserType::where('id', '<=', '2')->get();
		return view('admin.pages.admin.create')
        ->with('userTypes', $userTypes);
	}

	public function store(Request $request)
	{
        $this->validate($request, [
            'name'          => 'required',
            'password'      => 'required|min:6',
            'email'     	=> 'required|unique:admins',
            'user_type_id'  => 'required'
        ]);
		$user = new Admin;
        
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->user_type_id = $request->user_type_id;
        $user->password     = bcrypt($request->password);
        $user->save();

        return redirect(route('admin.admin.index'))->with('success', 'Administrador Criado com sucesso');
	}

	public function edit($id)
	{
		$user = Admin::find($id);
		$userTypes = UserType::where('id', '<=', '2')->get();
		return view('admin.pages.admin.edit')
		->with('user', $user)
        ->with('userTypes', $userTypes);
	}

	public function update(Request $request)
	{
		$this->validate($request, [
            'name'          => 'required',
            'email'  		=> [
                	'required',
                	Rule::unique('admins')->ignore($request->id)
            	],
            'user_type_id'  => 'required'
        ]);
		$user = Admin::find($request->id);
        
        $user->name         = $request->name;
        $user->email         = $request->email;
        $user->user_type_id = $request->user_type_id;
        if ($request->password != '' || $request->password != NULL ) {
        	$user->password     = bcrypt($request->password);
        }
        $user->save();
		return redirect()->back()->with('success', 'Alterado com sucesso');
	}
}
