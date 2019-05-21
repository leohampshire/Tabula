<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class CompanyController extends Controller
{
    public function include(Request $request)
    {

        $user = User::where('email', $request->email)->where('company_id', NULL)->first();
        if ($user != '') {
            if($user->company_id == ''){
    	        $user->company_id = $request->company_id;
    	        $user->save();
    	        return redirect()->back()->with('success', 'Usuário vinculado');
            }
        }
    	return redirect()->back()->with('warning', 'Usuário não é um professor ou já está vinculado a outra empresa'); 
    }
    public function deleteTeacher($id)
    {
    	$user = User::find($id);
    	$user->company_id = NULL;
    	$user->save();
    	return redirect()->back()->with('success', 'Usuário removido'); 
    }
}
