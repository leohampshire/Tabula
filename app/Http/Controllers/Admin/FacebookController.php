<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use App\User;


class FacebookController extends Controller
{


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookCallback()
    {
        return dd('2');
        $user = Socialite::driver('facebook')->user();

        // $user->token;
    }
}