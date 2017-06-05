<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliAdminPermission  权限表
 */
class AdminPermission extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'admin_permissions';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'parent_id',
        'url',
        'description',
        'label',
        'cid',
        'icon',
        'show',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

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
}