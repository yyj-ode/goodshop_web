<?php

Route::group(['namespace' => 'Frontend\Detail',  'prefix' => 'detail'], function () {
    Route::get('index', 'IndexController@index');
});