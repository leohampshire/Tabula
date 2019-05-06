<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Country;
use App\State;
use App\User;
use Auth;


class UserController extends Controller
{
    public function userPanel()
    {
    	$auth = Auth::guard('user')->user();
    	return view('user.pages.panel_dados_pessoais')
    	->with('countries', Country::all())
    	->with('states', State::all())
    	->with('auth', $auth);
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
