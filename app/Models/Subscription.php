<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;
use App\Models\Format as Format1;


/**
 * Class BinliCategory
 */
class Subscription extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'subscribe';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'province',
        'city',
        'count',
        'format_id',
        'totalarea_id',
        'price_id',
        'type_restaurant_catering',
        'type_shoes_bag',
        'type_beauty_salon',
        'type_recreation',
        'type_life_service',
        'type_store',
        'type_materials',
        'type_communication',
        'type_auto',
        'type_medical_care',
        'type_training',
        'type_am_turm',
        'type_formats',
    ];

    protected $guarded = [];

    public static function getDataById($id)
    {
        return self::where('id', $id)->first();
    }

    /**
     * 获取'开店区域'下拉框数据
     */
    public static function getDistrictData(){
        $area_level2 = Area::where('parent_id','=','11')->where('show',1)->get()->toArray();
        $area_level3 = [];
        foreach($area_level2 as $k => $v){
            $area_level3_data = Area::where('parent_id','=',$v['id'])->where('show',1)->get()->toArray();
            $area_level3[$k] = $area_level3_data;
        }
        $area_level = ['area_level2'=>$area_level2, 'area_level3'=>$area_level3];
        return $area_level;
    }

    /**
     * 获取'商铺类型'下拉框数据
     */
    public static function getCategoryData(){
        $format= Format1::get()->toArray();
        return $format;
    }

    /**
     * 获取'经营面积'下拉框数据
     */
    public static function getTotalareaData(){
        $totalarea_data = Totalarea::get()->toArray();
        $totalarea = [];
        foreach($totalarea_data as $k => $v){
            $totalarea[$k]['id'] = $v['id'];
            $totalarea[$k]['min_area'] = $v['min_area'];
            $totalarea[$k]['max_area'] = $v['max_area'];
            if($v['max_area'] != '999999'){
                $totalarea[$k]['string'] = $v['min_area'].'~'.$v['max_area'];
            }else{
                $totalarea[$k]['string'] = '大于'.$v['min_area'];
            }
        }
        return $totalarea;
    }

    /**
     * 获取'开店预算'下拉框数据
     */
    public static function getPriceData(){
        $price_data = Price::get()->toArray();
        $price = [];
        foreach($price_data as $k => $v){
            $price[$k]['id'] = $v['id'];
            $price[$k]['min_price'] = $v['min_price'];
            $price[$k]['max_price'] = $v['max_price'];
            if($v['max_price'] != '999999'){
                $price[$k]['string'] = $v['min_price'].'~'.$v['max_price'].'万元';
            }else{
                $price[$k]['string'] = '大于'.$v['min_price'].'万元';
            }
        }
        return $price;
    }

}