<?php

$router->group(['namespace' => 'Frontend\Index', 'prefix' => 'home'], function () {
    Route::get('index', ['as' => 'home.index.index', 'uses' => 'IndexController@index', 'middleware' => 'throttle:100']);
    Route::get('index/indexdata', ['as' => 'home.index.indexdata', 'uses' => 'IndexController@indexdata', 'middleware' => 'throttle:100']);
    Route::post('index/moredata', ['as' => 'home.index.moredata', 'uses' => 'IndexController@moredata', 'middleware' => 'throttle:100']);
    Route::get('index/moredata', ['as' => 'home.index.moredata', 'uses' => 'IndexController@moredata', 'middleware' => 'throttle:100']);
});