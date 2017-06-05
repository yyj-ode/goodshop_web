<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class ShopInformationStore extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_shop_information';
    protected $fillable = [
        'longitude', // 数字-经度
        'latitude', // 数字-纬度
        'province', // 选项-省
        'city', // 选项-市
        'county', // 选项-县
        'adress', // 文本-店铺地址
        'building_category', // 选项-房屋区域
        'floor_level', // 文本-所在楼层
        'area', // 数字-建筑面积(㎡)
        'floor_height', // 数字-层高(米)
        'door_width', // 数字-门头宽度(米)
        'depth', // 数字-进深(米)
        'current_status', // 选项-房屋现状
        'license', // 选项-证照
        'water_supply_and_drainage', // 选项-上下水
        'electricity', // 选项-动力电
        'gas_tube', // 选项-煤气管道
        'smoke_tube', // 选项-烟管道
        'sewage', // 选项-排污管道
        'flame', // 选项-可明火
        'leasing_duration', // 数字-租赁年限(月)
        'payment_type', // 文本-付款方式
        'leasing_payment', // 选项-转让费
        'rent', // 数字-租金单价(万元/月)
        'progressive_rate', // 数字-租金递增幅度
        'photo', // 图片-照片
    ];

}