<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class BinliCategory
 */
class Shop extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'shop';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'price',
        'content',
        'status',
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