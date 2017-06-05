<?php

Route::group(['namespace' => 'Frontend\Subscribe',  'prefix' => 'Subscribe'], function () {
    Route::get('index', 'IndexController@index');
    Route::get('create', 'IndexController@create');
});