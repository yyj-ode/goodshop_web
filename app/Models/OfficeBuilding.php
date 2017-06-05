<?php

namespace App\Models;

use App\Store\OfficeBuildingStore;
use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliCategory
 */
class OfficeBuilding extends OfficeBuildingStore
{
    public $timestamps = true;

    protected $guarded = [];

    public static function getDataById($id)
    {
        return self::find($id);
    }

    public static function getByParentId()
    {
        return self::get();
    }

    public static function countNumber()
    {
        return self::count();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "parent_id", "id");
    }

    public static function allListData($start, $length, $columns, $order)
    {
        return self::skip(intval($start))->limit(intval($length))->orderBy($columns, $order)->get();
    }

    public static function getAll($type = "CN", $parent_id = 0)
    {
        return self::select("*")->where(['show' => 1, 'type' => $type, 'parent_id' => $parent_id])->orderBy('id', 'asc')->get();
    }
}