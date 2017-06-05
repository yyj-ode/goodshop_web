<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliCategory
 */
class Goods extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'goods';

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
        return self::select("*")->where(['status' => 5])->offset($start)->limit($length)->orderBy($columns, $order)->get();
    }

    public static function getAll($type = "CN", $parent_id = 0)
    {
        return self::select("*")->where(['show' => 1, 'type' => $type, 'parent_id' => $parent_id])->orderBy('id', 'asc')->get();
    }
}