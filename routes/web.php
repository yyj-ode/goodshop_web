<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', 'Frontend\Index\IndexController@index');*/

//永健的临时路由,协议界面
/*Route::get('/index/protocal', 'Frontend\Index\IndexController@protocal');
Route::get('/index/live', 'Frontend\Index\IndexController@live');
Route::get('/index/report', 'Frontend\Index\IndexController@report');
Route::get('/index/success', 'Frontend\Index\IndexController@success');
Route::post('/index/moredata', 'Frontend\Index\IndexController@moredata');*/
/*Route::get('/collection/index', 'Frontend\Collection\IndexController@index');
Route::get('/collection/delete', 'Frontend\Collection\IndexController@delete');
Route::get('/collection/create', 'Frontend\Collection\IndexController@create');*/

Route::get('/demo/index', 'Frontend\Demo\IndexController@index');
/*Route::get('/subscribe/index', 'Frontend\Subscribe\IndexController@index');
Route::get('/subscribe/create', 'Frontend\Subscribe\IndexController@create');*/


/*Route::get('/index/demo', 'Frontend\Index\IndexController@demo');
Route::get('/index/demo_lepu', 'Frontend\Index\IndexController@demo_lepu');
Route::get('/index/demo_haozu', 'Frontend\Index\IndexController@demo_haozu');
Route::get('/index/demo_dazhongdianping', 'Frontend\Index\IndexController@demo_dazhongdianping');
Route::get('/index/demo_winshang', 'Frontend\Index\IndexController@demo_winshang');
Route::get('/index/demo_lianjia', 'Frontend\Index\IndexController@demo_lianjia');
Route::get('/index/demo_shopline_officebuilding', 'Frontend\Index\IndexController@demo_shopline_officebuilding');
Route::post('/index/searchkey', 'Frontend\Index\IndexController@searchKey');
Route::get('/index/searchcondition', 'Frontend\Index\IndexController@searchCondition');*/


//Route::get('/detail/index', 'Frontend\Detail\IndexController@index');

Route::get('/myshop/demo_lepu', 'Frontend\Index\MyshopController@demo_lepu');
Route::get('/myshop/demo_lepu_photo', 'Frontend\Index\MyshopController@demo_lepu_photo');
Route::get('/myshop/demo_lepu_photo2', 'Frontend\Index\MyshopController@demo_lepu_photo2');
Route::get('/myshop/demo_lepu_photo_assign_shopline_id', 'Frontend\Index\MyshopController@demo_lepu_photo_assign_shopline_id');
Route::get('/myshop/lepu_image', 'Frontend\Index\MyshopController@Lepu_image');
Route::get('/myshop/lepu_image_1', 'Frontend\Index\MyshopController@Lepu_image_1');
Route::get('/myshop/lepu_image_2', 'Frontend\Index\MyshopController@Lepu_image_2');
Route::get('/myshop/lepu_image_3', 'Frontend\Index\MyshopController@Lepu_image_3');
Route::get('/myshop/lepu_image_4', 'Frontend\Index\MyshopController@Lepu_image_4');
Route::get('/myshop/lepu_image_5', 'Frontend\Index\MyshopController@Lepu_image_5');
Route::get('/myshop/lepu_image_6', 'Frontend\Index\MyshopController@Lepu_image_6');
Route::get('/myshop/lepu_image_7', 'Frontend\Index\MyshopController@Lepu_image_7');
Route::get('/myshop/lepu_image_8', 'Frontend\Index\MyshopController@Lepu_image_8');
Route::get('/myshop/lepu_image_9', 'Frontend\Index\MyshopController@Lepu_image_9');
Route::get('/myshop/lepu_image_10', 'Frontend\Index\MyshopController@Lepu_image_10');
Route::get('/myshop/lepu_image_11', 'Frontend\Index\MyshopController@Lepu_image_11');
Route::get('/myshop/lepu_image_12', 'Frontend\Index\MyshopController@Lepu_image_12');
Route::get('/myshop/lepu_image_13', 'Frontend\Index\MyshopController@Lepu_image_13');
Route::get('/myshop/lepu_image_14', 'Frontend\Index\MyshopController@Lepu_image_14');
Route::get('/myshop/lepu_image_15', 'Frontend\Index\MyshopController@Lepu_image_15');
Route::get('/myshop/lepu_image_16', 'Frontend\Index\MyshopController@Lepu_image_16');
Route::get('/myshop/lepu_image_17', 'Frontend\Index\MyshopController@Lepu_image_17');
Route::get('/myshop/lepu_image_18', 'Frontend\Index\MyshopController@Lepu_image_18');
Route::get('/myshop/lepu_image_19', 'Frontend\Index\MyshopController@Lepu_image_19');
Route::get('/myshop/lepu_image_20', 'Frontend\Index\MyshopController@Lepu_image_20');

//李
//Route::post('/index/shop_search', 'Frontend\Index\IndexController@shop_search');
//Route::post('/index/management_search', 'Frontend\Index\IndexController@management_search');
//Route::post('/index/send_tel', 'Frontend\Index\IndexController@send_tel');
//Route::get('/index/error', 'Frontend\index\IndexController@error');
/*Route::post('/order/pay', 'Frontend\Order\PayController@pay');
Route::any('/order/createQrcode', 'Frontend\Order\PayController@createQrcode');
Route::get('/order/success', 'Frontend\Order\PayController@success');
Route::post('/order/check_pay', 'Frontend\Order\PayController@check_pay');
Route::get('/order/index', 'Frontend\Order\IndexController@index');*/
/**
 * Frontend
 */
require __DIR__ . '/Frontend/UserAuth/user.php';
require __DIR__ . '/Frontend/Wechat/wechat.php';
require __DIR__ . '/Frontend/Wechat/account.php';

require __DIR__ . '/Frontend/Index/index.php';
require __DIR__ . '/Frontend/Collection/index.php';
require __DIR__ . '/Frontend/Home/home.php';
require __DIR__ . '/Frontend/Home/index.php';
require __DIR__ . '/Frontend/Order/index.php';
require __DIR__ . '/Frontend/Subscribe/index.php';  //订阅
require __DIR__ . '/Frontend/Detail/index.php';  //详情
