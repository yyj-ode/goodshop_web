<?php

Route::group(['namespace' => 'Frontend\Collection',  'prefix' => 'collection'], function () {
    Route::get('index', 'IndexController@index');
    Route::get('delete', 'IndexController@delete');
    Route::get('create', 'IndexController@create');
    Route::post('moredata', 'IndexController@moredata');
});