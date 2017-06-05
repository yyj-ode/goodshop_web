<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class ShoppingCenterStore extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_shopping_center';
    protected $fillable = [
        'project_name', // 文本-项目名称
        'opening_date', // 字符-开业时间
        'condition', // 文本-招商状态
        'commercial_area', // 数字-商业面积(万平米)
        'commercial_floors', // 文本-商业楼层
        'project_adress', // 文本-项目地址
        'project_photo', // 图片-项目图片
        'project_mapping', // 字符串-项目地图
        'contact_brand', // 文本-已签约品牌
        'demand', // 文本-招商需求
        'inner_map', // 图片-室内地图
        'longitude', //经度
        'latitude', //纬度
    ];

}