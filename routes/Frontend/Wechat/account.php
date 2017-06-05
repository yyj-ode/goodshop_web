<?php
Route::group(['namespace' => 'Frontend\Wechat', 'middleware' => ['web', 'wechat.oauth'], 'prefix' => 'wechat'], function () {
    Route::any('account/login', 'AccountController@login');
    Route::any('account/index', 'AccountController@index');
    Route::any('account/register', 'AccountController@register');
});