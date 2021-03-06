<?php

namespace App\Http\Controllers\UserAuth;

use Validator;
use App\User;
use App\State;
use App\Country;
use App\Schooling;
use App\Category;
use App\Notification;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/comprar/inserir/sessao';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if(!array_key_exists("user_type", $data)){
            return Validator::make($data, [
                'name'          => 'required|max:255',
                'email'         => 'required|email|max:255|unique:users',
                'password'      => 'required|min:6|confirmed',
                'sex'        => 'required'
            ]);
        }
        return Validator::make($data, [
            'name'          => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user_type = 3;
        if(array_key_exists("user_type", $data)){
            $user_type = 5;
            $user = User::create([
                'name'          => $data['name'],
                'email'         => $data['email'],
                'password'      => bcrypt($data['password']),
                'user_type_id'  => $user_type,
            ]);
            Company::create([
                'user_id'   => $user->id,
            ]);
            $notification = "O usu??rio {$user->name}, se registrou na plataforma com o e-mail {$user->email}</br>".
                            "Tipo usu??rio: {$user->userTypes->name}.";
            Notification::create([
                'type_notification' => 'Cadastro Usu??rio',
                'desc_notification' => $notification,
                'status'            => '1'
            ]);
        }else{
            
            $user = User::create([
                'name'          => $data['name'],
                'email'         => $data['email'],
                'password'      => bcrypt($data['password']),
                'sex'           => $data['sex'],
                'user_type_id'  => $user_type,
            ]);
            $notification = "O usu??rio {$user->name}, se registrou na plataforma com o e-mail {$user->email}.".
                            " Tipo usu??rio: {$user->userTypes->name}.";
            Notification::create([
                'type_notification' => 'Cadastro Usu??rio',
                'desc_notification' => $notification,
                'status'            => '1'
            ]);
        }
        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('user.auth.register')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('categories', Category::all())
        ->with('schoolings', Schooling::all());
    }
    public function showRegistrationCompany()
    {
        return view('user.auth.register-company')
        ->with('states', State::all())
        ->with('countries', Country::all())
        ->with('categories', Category::all())
        ->with('schoolings', Schooling::all());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
