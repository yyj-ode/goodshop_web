<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class ShopLine extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_shopline';

    protected $fillable = [
        'user_id', //用户ID
        'owner_name', //房主姓名 文本
        'owner_tel', //房主电话 文本
        'province', //省份
        'city', //市
        'county', //县
        'location', //商铺位置 文本
        'business_type', //房屋区域  选项
        'total_area', //建筑面积（m2） 数字
        'useage_area', // 使用面积（m2) 数字
        'floor_level', //所在楼层  文本
        'width', //门头宽度（米） 数字
        'depth', //进深（米） 数字
        'floor_height', //层高（米） 数字
        'leasing_type', //租赁类型  文本
        'status', //租赁状态 文本
        'rent', //月租金（元／月） 文本
        'progressive_rate', //租金递增 文本
        'payment_type', //支付方式 文本
        'deposit', //押金（月房租）  文本
        'remian_duration', //剩余租约（月）  文本
        'max_duration', //最长可租约（个月） 文本
        'contact_status', //续约情况 文本
        'photo', //房屋图片  照片
        'longitude', //经度  数字
        'latitude', //纬度  数字
        'format_restaurant', //酒楼餐饮  选项
        'format_cloth', //服饰鞋包  选项
        'format_leisure', //休闲娱乐  选项
        'format_beauty_and_hair_salon', //美容美发  选项
        'format_life_service', //生活服务 选项
        'format_market', //百货超市 选项
        'format_furniture_decoration', //家具建材 选项
        'format_telecom', //电器通讯 选项
        'format_vehicle_service', //房屋图片 选项
        'format_medical', //汽修美容 选项
        'format_education', //教育培训 选项
        'format_hotels', //旅馆宾馆 选项
        'format_other_business_type', //其它业态 选项
        'engineering_water_supply', //上水 选项
        'engineering_draignage', //下水 选项
        'engineering_380_volt', //380伏 选项
        'engineering_gas_tube', //煤气罐 选项
        'engineering_smoke_tube', //烟管道 选项
        'engineering_sewage', //排污管道 选项
        'engineering_parking_lot', //停车位 选项
        'engineering_nature_gas', //天然气 选项
        'engineering_outside_area', //外摆区 选项
        'engineering_falme', //可明火 选项
        'engineering_license_approval', //可办照  选项
        'pct', //客单价（元）  数字
        'eat_here', //可明火 数字
        'falme', //堂食量（人） 数字
        'takeout', //外卖量（份） 数字
        'revenue', //营业额（元） 数字
        'customer_type', //消费人群 文本
        'busy_time', //最旺时段 文本
        'advantage', //本店优势 文本
        'left_first_store', //左一临铺 文本
        'left_first_categories', //所属业态 文本
        'left_second_store', //左二临铺 文本
        'left_second_categories', //所属业态 文本
        'first_right_store', //右一临铺 文本
        'first_right_categories', //所属业态 文本
        'second_right_store', //右二临铺 文本
        'second_right_categories', //所属业态 文本
    ];

    public static function allListData($start, $length, $columns, $order, $key)
    {
        if($key){
            return self::select("*")->where('owner_name', 'like', '%' . $key . '%')->skip(intval($start))->take(intval($length))->orderBy($columns, $order)->get();
        }else{
            return self::select("*")->skip(intval($start))->take(intval($length))->orderBy($columns, $order)->get();
        }
    }
    public static function countNumber()
    {
        return self::count();
    }

}