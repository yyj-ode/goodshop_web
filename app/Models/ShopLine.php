<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class BinliCategory
 */
class ShopLine extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'shopline';

    public $timestamps = true;

    protected $fillable = [
        '_id',
        'shop_id',
        'source', //来源
        'owner_name',  //房主姓名
        'owner_tel',  //房主电话
        'district', // 区县
        'business_district', // 商圈
        'circleLine', //环线
        'location',  //商铺位置
        'business_type',  //房屋区域  0
        'total_area', //建筑面积（m2）
        'useage_area', //使用面积（m2)
        'floor_level', //所在楼层
        'width',//门头宽度（米）
        'depth', //进深（米）
        'floor_height', //层高（米）
        'leasing_type', //租赁类型
        'leasing_payment', //转让费
        'status', //租赁状态
        'rent', //月租金（元／月）
        'progressive_rate', //租金递增
        'payment_type', //支付方式
        'deposit', //押金（月房租）
        'current_duration', //当前租约（年）
        'remian_duration', //剩余租约（月）
        'max_duration', //最长可租约（个月）
        'contact_status', //续约情况
        'photo', //房屋图片
        'latitude', //纬度
        'longitude', //经度
        'pct', //客单价（元）
        'eat_here', //堂食量（人）
        'takeout', //外卖量（份）
        'revenue', //营业额（元）
        'customer_type', //消费人群
        'busytime', //最旺时段
        'advantage', //本店优势
        'county', //省
        'city', //市
        'province', //县
        'publish_time', //房源发布时间
        'license', //证照
        'url',
        'budget',
        'our_image'
    ];

    protected $guarded = [];

    public static function getDataById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function getByParentId()
    {
        return self::get();
    }

    public static function countNumber()
    {
        return self::where(['status' => 5])->count();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "parent_id", "id");
    }

    public static function allListData($start, $length, $columns, $order)
    {
        return self::with('users')->offset($start)->limit($length)->orderBy($columns, $order)->get()->toArray();
    }

    public static function getAll($type = "CN", $parent_id = 0)
    {
        return self::select("*")->where(['show' => 1, 'type' => $type, 'parent_id' => $parent_id])->orderBy('id', 'asc')->get();
    }

    public function users(){
        return $this->belongsTo(User::class, "users_id", "id");
    }

    public static function getShopDataByUserId($id){
        return self::with('users')->where(['shop.status' => 5, 'users_id' => $id])->first()->toArray();

    }
}