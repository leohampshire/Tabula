<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Country;
use App\Http\Controllers\Controller;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = new Company;
        $companies = $companies->orderBy('user_id', 'asc')->paginate(20);

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
            'name' => 'required',
            'email' => 'required',
            'country_id' => 'required',
            'password' => 'required|',
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user){
            $company = new User;
        }else{
            $company = $user;
        }
        

        $company->name = $request->name;
        $company->email = $request->email;
        $company->country_id = $request->country_id;
        $company->state_id = $request->state_id;
        $company->bio = $request->bio;
        $company->website = $request->website;
        $company->google_plus = $request->google_plus;
        $company->user_type_id = 5;
        $company->twitter = $request->twitter;
        $company->facebook = $request->facebook;
        $company->youtube = $request->youtube;
        $company->password = bcrypt($request->password);

        $company->save();
        if(!$company->company){
            Company::create([
            'user_id' => $company->id,
            ]);
        }
                
        return redirect(route('admin.company.index'))->with('success', 'Empresa criada com sucesso');
    }

    public function edit(Company $company)
    {
        $company = User::find($company->user_id);
        return view('admin.pages.company.edit')
            ->with('countries', Country::all())
            ->with('states', State::all())
            ->with('company', $company);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($request->id),
            ],
            'country_id' => 'required',
        ]);
        $company = User::find($request->id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->country_id = $request->country_id;
        $company->state_id = $request->state_id;
        $company->bio = $request->bio;
        $company->website = $request->website;
        $company->google_plus = $request->google_plus;
        $company->twitter = $request->twitter;
        $company->facebook = $request->facebook;
        $company->youtube = $request->youtube;
        $company->password = bcrypt($request->password);

        $company->save();

        return redirect(route('admin.company.index'))->with('success', 'Empresa editada com sucesso');
    }

    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->back()->with('success', 'Curso removido com sucesso');
    }

    function include(Request $request)
    {
        $user = User::where('email', $request->email)->whereNull('company_id');

        if ($user->count() == 0) {
            return redirect()->back()->with('info', 'Usuário inexistente ou ja vinculado a outra empresa');
        }
        $user = $user->first();
        $company = Company::find($request->id);
        $user->company_id = $company->id;
        $user->save();
        return redirect()->back()->with('success', 'Usuário vinculado');
    }
}
