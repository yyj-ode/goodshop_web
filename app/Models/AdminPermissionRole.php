<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliAdminPermissionRole
 */
class AdminPermissionRole extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'admin_permission_role';

    public $timestamps = false;

    protected $fillable = [
        'admin_permission_id',
        'admin_role_id'
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

    public static function countNumber()
    {
        return self::count();
    }

    public static function getId($id)
    {
        return self::where('id', $id)->first();
    }

    public static function getByRoleId($role_id)
    {
        return self::where('admin_role_id', $role_id)->get()->toArray();
    }
}