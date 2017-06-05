<?php

$router->group(['namespace' => 'Frontend\UserAuth'], function () {
    Route::get('user/login.html', ['as' => 'login.html', 'uses' => 'LoginController@showLoginForm']);
    Route::get('user/register.html', ['as' => 'user.register.html', 'uses' => 'RegisterController@showRegistrationForm']);
});

$router->group(['namespace' => 'Frontend\UserAuth', 'prefix' => 'user'], function () {
    /**
     * User Login
     */
    Route::get('login', ['as' => 'user.login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'user.login', 'uses' => 'LoginController@login']);
    Route::get('logout', ['as' => 'user.logout', 'uses' => 'LoginController@logout']);
    Route::get('ajaxLogout', ['as' => 'user.ajax.logout', 'uses' => 'LoginController@ajaxLogout']);

    Route::post('ajaxLogin', ['as' => 'user.ajax.login', 'uses' => 'LoginController@ajaxLogin']);
    Route::post('ajax', ['as' => 'user.ajax', 'uses' => 'LoginController@ajax']);
    Route::post('sendSMS', ['as' => 'user.sendSMS', 'uses' => 'LoginController@sendSMS']);
    Route::get('check', ['as' => 'user.check.login', 'uses' => 'LoginController@checkLogin']);

    /**
     * User Register
     */
    Route::get('register', ['as' => 'user.register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'user.register', 'uses' => 'RegisterController@register']);
    Route::get('register/back', ['as' => 'user.register.back', 'uses' => 'RegisterController@showBack']);
    Route::post('register/back', ['as' => 'user.register.back', 'uses' => 'RegisterController@back']);
    Route::get('register/backNext', ['as' => 'user.register.backNext', 'uses' => 'RegisterController@back_save_show']);
    Route::post('register/backNext', ['as' => 'user.register.backNext', 'uses' => 'RegisterController@back_save']);
    Route::post('register/captcha', ['as' => 'user.register.captcha', 'uses' => 'RegisterController@captcha']);
    /**
     * User Passwords
     */
    Route::post('password/email', ['as' => 'user.password.email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
//    Route::post('password/reset', ['as' => 'user.password.reset', 'uses' => 'ResetPasswordController@reset']);
//    Route::get('password/reset.html', ['as' => 'user.password.reset', 'uses' => 'ResetPasswordController@resetForm']);
//    Route::get('password/reset/{token}', ['as' => 'user.password.reset', 'uses' => 'ResetPasswordController@showResetForm']);
});
