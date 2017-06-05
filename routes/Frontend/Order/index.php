<?php
Route::group(['namespace' => 'Frontend\Order',  'prefix' => 'order'], function () {
    Route::post('notify', 'PayController@notify');
    Route::post('pay', 'PayController@pay');
    Route::any('createQrcode', 'PayController@createQrcode');
    Route::get('success', 'PayController@success');
    Route::post('check_pay', 'PayController@check_pay');
    Route::get('index', 'IndexController@index');
});