<?php

namespace App\Http\Controllers\UserAuth;

use App\User;
use App\State;
use App\Country;
use App\Schooling;
use App\Category;
use Validator;
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
    protected $redirectTo = '/';

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
        return Validator::make($data, [
            'name'          => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'sex'           => 'required',
            'country_id'    => 'required',
            'schooling_id'  => 'required',
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
        $interest = NULL;
        if (isset($data['interest'])) {
            $interest = serialize($data['interest']);
        }
        return User::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password']),
            'sex'           => $data['sex'],
            'country_id'    => $data['country_id'],
            'state_id'      => $data['state_id'],
            'schooling_id'  => $data['schooling_id'],
            'interest'      => $interest,
            'user_type_id'  => 3,
        ])->with('success', "Seja bem-vindo {$data['name']}");
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
