<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliCategory
 */
class Category extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'category';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'parent_id',
        'sort_order',
        'slug',
        'keywords',
        'description',
        'root_id',
        'count',
        'left_id',
        'right_id',
        'image_id',
        'show',
        'status',
        'type',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    public static function getDataById($id)
    {
        return self::with('category')->where('id', $id)->first();
    }

    public static function getByParentId($parent_id)
    {
        return self::where('parent_id', $parent_id)->get();
    }

    public static function countNumber($parent_id)
    {
        return self::where('parent_id', $parent_id)->count();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "parent_id", "id");
    }

    public static function allListData($start, $length, $columns, $order, $parent_id)
    {
        return self::select("*")->where(['parent_id' => $parent_id, 'show' => 1])->offset($start)->limit($length)->orderBy($columns, $order)->get();
    }

    public static function getAll($type = "CN", $parent_id = 0)
    {
        return self::select("*")->where(['show' => 1, 'type' => $type, 'parent_id' => $parent_id])->orderBy('id', 'asc')->get();
    }
}