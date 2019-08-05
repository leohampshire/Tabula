<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;
use App\User;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/comprar/inserir/sessao';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest', ['except' => 'logout']);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function redirectToGoogle($provider, Request $request)
    {
    	$data = json_decode(stripslashes($request->data), true);
        if($provider == 'google'){
           $user = User::where('google_id', $data['userToken'])
           ->orWhere('email', $data['email'])
           ->first();
           if ($user){
                $user->update([
                    'google_id' => $data['userToken'],    
                ]);
            } else{
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'google_id' => $data['userToken'],
                    'user_type_id' => '3',
                    'password' => bcrypt($data['id'])
                ]);
            }
            
            Auth::guard('user')->login($user);
            return 'sucesso';
        }
        return 'erro';
    }
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
        } catch (Exception $e) {
            return redirect('user/login');
        }
        $authUser = $this->findOrCreateUser($user);

        Auth::guard('user')->login($authUser);

        return redirect()->route('cart.session');
    }
    
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->orWhere('email', $facebookUser->email)->first();

        if ($authUser){
            $authUser->update([
                'facebok_id' => $facebookUser->id,    
            ]);
            return $authUser;
        } 

        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'facebook_id' => $facebookUser->id,
            'user_type_id' => '3',
            'password' => bcrypt($facebookUser->token)
        ]);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {  
        return Auth::guard('user');
    }
}
