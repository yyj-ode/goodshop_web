<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Eloquent;

/**
 * Class BinliCategory
 */
class Admin extends Eloquent
{
    use EntrustUserTrait;
    protected $connection = 'mysql';

    protected $table = 'admin_users';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];


    public function roles()
    {
        // 多对多的关系（一个用户有多个角色）
        return $this->belongsToMany(AdminRole::class);
    }

    public static function getByEmail($email)
    {
        return self::where(['email' => $email])->first();
    }

    public static function getDataById($id)
    {
        return self::where('id', $id)->first();
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
        return self::select("*")->where('name', 'like', '%' . $key . '%')->offset($start)->limit($length)->orderBy($columns, $order)->get();
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