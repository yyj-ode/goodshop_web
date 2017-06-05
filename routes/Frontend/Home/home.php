<?php

$router->group(['namespace' => 'Frontend\Home', 'prefix' => 'home'], function () {
    Route::get('index', ['as' => 'home.home.index', 'uses' => 'HomeController@index', 'middleware' => 'throttle:100']);
});