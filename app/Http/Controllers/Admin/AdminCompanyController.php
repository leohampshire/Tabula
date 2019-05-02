<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\Country;
use App\State;

class AdminCompanyController extends Controller
{
	public function index(Request $request)
	{
		$companies = Company::all();
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
            'login'         => 'required',
            'name'          => 'required',
            'email' 		=> 'required',
            'country_id'	=> 'required',
            'password'      => 'required|'
        ]);

        $company = new Company;

        $company->name 			= $request->name;
        $company->login 		= $request->login;
        $company->email 		= $request->email;
        $company->country_id	= $request->country_id;
        $company->state_id 		= $request->state_id;
        $company->password 		= bcrypt($request->password);

        $company->save();

        return redirect(route('admin.company.index'))->with('success', 'Empresa criada com sucesso');
	}

	public function edit($id)
	{

	}

	public function update(Request $request)
	{

	}

	public function delete($id)
	{

	}

}
