<?php

namespace App\Http\Controllers\Frontend\UserAuth;

use App\Http\Controllers\FrontendController;

use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;

class OAuthAuthorizationController extends FrontendController
{
    //
    public function redirectToProvider($driver) {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver) {
        $user =  Socialite::driver($driver)->user();
        // dd($user)
    }

}