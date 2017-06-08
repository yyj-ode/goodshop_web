<?php
Route::group(['namespace' => 'Frontend\Order',  'prefix' => 'order'], function () {
    Route::any('notify_url', 'PayController@notify_url');
    Route::post('pay', 'PayController@pay');
    Route::post('mobile_order', 'PayController@mobile_order'); //移动订单入库
    Route::any('mobile_payment', 'PayController@mobile_payment'); //移动支付
    Route::any('createQrcode', 'PayController@createQrcode');
    Route::get('success', 'PayController@success');
    Route::post('check_pay', 'PayController@check_pay');
    Route::get('index', 'IndexController@index');
    Route::post('moredata', 'IndexController@moredata');
});