<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliFriendshipSort
 */
class FriendshipSort extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'friendship_sort';

    public $timestamps = false;

    protected $fillable = [
        'sort_name',
        'description',
        'parent_id',
        'sort_order',
    ];

    protected $guarded = [];

    public static function getDataById($id)
    {
        return self::with('category')->where('id', $id)->first();
    }

    public function category()
    {
        return $this->belongsTo(self::class, "parent_id", "id");
    }
}