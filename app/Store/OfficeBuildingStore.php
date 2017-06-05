<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class OfficeBuildingStore extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_office_building';
    protected $fillable = [
        'longitude', // 数字-经度
        'latitude', // 数字-纬度
        'office_name', // 文本-写字楼名称
        'office_address', // 文本-写字楼地址
        'company_categories', // 文本-企业类型（已入住企业）
        'rent_rate', // 数字-租金价格(元/平/天)
    ];

}