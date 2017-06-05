<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class VillageStore extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_village';
    protected $fillable = [
        'longitude', // 数字-经度
        'latitude', // 数字-纬度
        'community_name', // 文本-小区名称
        'community_adress', // 文本-小区地址
        'building_age', // 文本-建筑年代
        'building_category', // 选项-建筑类型
        'property_management_fee', // 文本-物业费
        'property_management_company', // 文本-物业公司
        'developer', // 文本-开发商
        'total_building_number', // 数字-楼栋总数(栋)
        'total_apartment_number', // 数字-房屋总数(户)
        'price', // 数字-小区售房价(元/㎡)
    ];

}