<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class UserCollectionStore extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_user_collection';

    protected $fillable = [
        'users_id', //用户ID
        'shopline_id', //房源ID
    ];
    public static function countNumber()
    {
        return self::count();
    }

    public static function getAllCollectionDataById($id)
    {
        return self::with('shopline')->where('users_id','=',"$id")->offset(0)->take(1)->get()->toArray();
//        return self::with('shopline')->where('users_id','=',"$id")->paginate(10)->toArray();
    }
    public function shopline(){
        return $this->belongsTo(ShopLine::class, "shopline_id", "_id");
    }
}