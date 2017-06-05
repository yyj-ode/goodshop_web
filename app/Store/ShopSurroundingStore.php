<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

/**
 * 周边店铺
 * Class ShopSurroundingStore
 * @package App\Store
 */
class ShopSurroundingStore extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_shop_surrounding';
    protected $fillable = [
        'province', // 选项-省
        'city', // 选项-市
        'county', // 选项-县
        'address', // 文本-地址
        'categories', // 文本-经营品类
        'shop_name', // 店铺名称
        'shop_branch_name', // 店铺分店名称
        'price', // 数字-客单价(元)
        'longitude', // 数字-经度
        'latitude', // 数字-纬度
    ];

}