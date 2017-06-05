<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;

class ApiController extends Controller
{
    use Helpers;

    public function __construct()
    {
        if (env('APP_ENV') !== 'production') {
            header("Access-Control-Allow-Origin:*"); //*号表示所有域名都可以访问
            header("Access-Control-Allow-Method:POST,GET");
        }
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
