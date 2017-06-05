<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'user')
    {
        Session::pull("REDIRECT_BACK", redirect()->back());
        $result = Session::get('USER_DATA');

        if (!Auth::guard($guard)->check() || !empty($result)) {
            if (is_weixin()) {
                return redirect('wechat/account/login');
            } else {
                return redirect('user/login.html');
            }
        }

        return $next($request);
    }
}