<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliUserGroup
 */
class UserGroup extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'users_group';

    public $timestamps = true;

    protected $fillable = [
        'category_name',
        'parent_id',
        'sort_order',
        'slug',
        'description',
        'root_id',
        'count',
        'left_id',
        'right_id',
        'image_id',
        'image'
    ];

    protected $guarded = [];
}