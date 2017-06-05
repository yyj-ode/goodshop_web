<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class ShopOnline extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_shoponline';

    protected $fillable = [
        'user_id', //用户ID
        'store_name', //店铺名称 文本
        'address', //店铺地址 文本
        'sales_volume', //销售份数（份） 数字
        'online_sales', //线上销售额（元） 数字
    ];
    public static function allListData($start, $length, $columns, $order, $key)
    {
        if($key){
            return self::select("*")->where('store_name', 'like', '%' . $key . '%')->skip(intval($start))->take(intval($length))->orderBy($columns, $order)->get();
        }else{
            return self::select("*")->skip(intval($start))->take(intval($length))->orderBy($columns, $order)->get();
        }
    }
    public static function countNumber($key)
    {
        if($key){
            return self::where('store_name', 'like', '%' . $key . '%')->count();
        }else{
            return self::count();
        }

    }

}