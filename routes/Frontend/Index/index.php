<?php
use Illuminate\Http\Request;
Route::get('/', 'Frontend\Index\IndexController@index',function (Request $request){
    $cookie = cookie('name', 'value', time()+10000000);
    return Request('Hello World')->cookie($cookie);
});
Route::group(['namespace' => 'Frontend\Index',  'prefix' => 'index'], function () {
    Route::post('shop_search', 'IndexController@shop_search');
    Route::post('management_search', 'IndexController@management_search');
    Route::post('send_tel', 'IndexController@send_tel');
    Route::get('error', 'IndexController@error');

    Route::get('demo', 'IndexController@demo');
    Route::get('demo_lepu', 'IndexController@demo_lepu');
    Route::get('demo_haozu', 'IndexController@demo_haozu');
    Route::get('demo_dazhongdianping', 'IndexController@demo_dazhongdianping');
    Route::get('demo_winshang', 'IndexController@demo_winshang');
    Route::get('demo_lianjia', 'IndexController@demo_lianjia');
    Route::get('demo_shopline_officebuilding', 'IndexController@demo_shopline_officebuilding');
    Route::post('searchkey', 'IndexController@searchKey');
    Route::get('searchcondition', 'IndexController@searchCondition');
    Route::get('read', 'IndexController@read');
    Route::get('protocal', 'IndexController@protocal');
    Route::get('live', 'IndexController@live');
    Route::get('report', 'IndexController@report');
    Route::get('success', 'IndexController@success');
    Route::post('moredata', 'IndexController@moredata');

    Route::post('shop', 'IndexController@shop');

});