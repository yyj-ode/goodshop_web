<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

/**
 * Class BinliCategory
 */
class Roles extends EntrustRole
{
    protected $connection = 'mysql';

    protected $table = 'admin_roles';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'display_name',
        'description',
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


    public function category()
    {
        return $this->belongsTo(Category::class, "parent_id", "id");
    }

    public static function allListData($start, $length, $columns, $order, $key)
    {
        return self::select("*")->where('name','like','%'.$key.'%')->offset($start)->limit($length)->orderBy($columns, $order)->get();
    }

    public static function getAll($type = "CN", $parent_id = 0)
    {
        return self::select("*")->where(['show' => 1, 'type' => $type, 'parent_id' => $parent_id])->orderBy('id', 'asc')->get();
    }
    public static function countNumber()
    {
        return self::count();
    }
    public static function getEmail($email)
    {
        return self::where('email', $email)->first();
    }
    public static function getId($id)
    {
        return self::where('id', $id)->first();
    }
}