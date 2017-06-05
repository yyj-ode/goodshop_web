<?php

Route::group(['namespace' => 'Frontend\Wechat', 'prefix' => 'wechat'], function () {
    Route::any('serve', 'WechatController@serve');
});