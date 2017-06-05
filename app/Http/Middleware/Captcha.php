<?php

namespace App\Http\Middleware;

use Closure;
use Validator;
use Auth;

class Captcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $curttPath = $request->path();

        /**
         * 检查是否为提交登录
         */
        if($curttPath == 'admin/login' && $request->isMethod('post')){

            if($request->get('captcha') && $request->has('captcha')){
                $rules = ['captcha' => 'required|captcha'];
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return redirect('admin/login')->withErrors('验证码错误！');
                }
            }else{
                return redirect('admin/login')->withErrors('验证码不能为空！');
            }
        }

        /**
         * 检查是否登录
         */
        if($curttPath == 'admin/login' && Auth::check()){
            return redirect('admin/home/index');
        }

        return $next($request);
    }
}
