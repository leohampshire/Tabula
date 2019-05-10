<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Company;
use App\Country;
use App\State;
use App\User;

class AdminCompanyController extends Controller
{
	public function index(Request $request)
	{
        $companies = new Company;

        if($request->has('name')){
            if(request('name') != ''){
                $companies = $companies->where('name', 'like', request('name') . '%');
            }
        }
        if($request->has('email')){
            if(request('email') != ''){
                $companies = $companies->where('email', 'like', request('email') . '%');
            }
        }

        $companies = $companies->orderBy('name', 'asc')->paginate(20);
        
		return view('admin.pages.company.index')->with('companies', $companies);
	}

	public function create()
	{
		return view('admin.pages.company.create')
		->with('countries', Country::all())
		->with('states', State::all());
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'name'          => 'required',
            'email' 		=> 'required|unique:companies',
            'country_id'	=> 'required',
            'password'      => 'required|'
        ]);
        $company = new Company;

        $company->name 			= $request->name;
        $company->email 		= $request->email;
        $company->country_id	= $request->country_id;
        $company->state_id 		= $request->state_id;
        $company->occupation 	= $request->occupation;
        $company->bio 			= $request->bio;
        $company->website 		= $request->website;
        $company->google_plus 	= $request->google_plus;
        $company->twitter 		= $request->twitter;
        $company->facebook 		= $request->facebook;
        $company->youtube 		= $request->youtube;
        $company->password 		= bcrypt($request->password);

        $company->save();

        return redirect(route('admin.company.index'))->with('success', 'Empresa criada com sucesso');
	}

	public function edit($id)
	{
		$company = Company::find($id);
		return view('admin.pages.company.edit')
		->with('countries', Country::all())
		->with('states', State::all())
		->with('company', $company);
	}

	public function update(Request $request)
	{
		$this->validate($request, [
            'name'          => 'required',
            'email'  => [
                'required',
                Rule::unique('categories')->ignore($request->id)
            ],
            'country_id'	=> 'required',
        ]);
        $company = Company::find($request->id);

        $company->name 			= $request->name;
        $company->email 		= $request->email;
        $company->country_id	= $request->country_id;
        $company->state_id 		= $request->state_id;
        $company->occupation 	= $request->occupation;
        $company->bio 			= $request->bio;
        $company->website 		= $request->website;
        $company->google_plus 	= $request->google_plus;
        $company->twitter 		= $request->twitter;
        $company->facebook 		= $request->facebook;
        $company->youtube 		= $request->youtube;
        $company->password 		= bcrypt($request->password);

        $company->save();

        return redirect(route('admin.company.index'))->with('success', 'Empresa editada com sucesso');
	}

	public function delete($id)
	{
		$company = Company::find($id);
		$company->delete();
		return redirect()->back()->with('success', 'Curso removido com sucesso');
	}

    public function include(Request $request)
    {
        $user = User::where('email', $request->email)->whereNull('empresa_id');

        if ($user->count() == 0) {
            return redirect()->back()->with('info', 'Usuário inexistente ou ja vinculado a outra empresa');
        }
        $user = $user->first();
        $company = Company::find($request->id);
        $user->empresa_id = $company->id;
        $user->save(); 
        return redirect()->back()->with('success', 'Usuário vinculado');
    }
}
