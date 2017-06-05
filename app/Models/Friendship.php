<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliFriendship
 */
class Friendship extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'friendship';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'url',
        'description',
        'sort_id',
        'image_id',
        'sort_order',
        'end_time',
        'status',
        'create_time',
        'update_time'
    ];

    protected $guarded = [];

    public static function getDataById($id)
    {
        return self::with('category')->where('id', $id)->first();
    }

    public function category()
    {
        return $this->belongsTo(FriendshipSort::class, "sort_id", "id");
    }
        
}