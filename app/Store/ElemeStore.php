<?php
namespace App\Store;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class ElemeStore extends BaseStore
{
    protected $connection = 'mongodb';
    protected $table = 'binli_sale';

    public static function allListData($start, $length, $columns, $order, $key)
    {
        if($key){
            return self::select("*")->where('owner_name', 'like', '%' . $key . '%')->skip(intval($start))->take(intval($length))->orderBy($columns, $order)->get();
        }else{
            return self::select("*")->skip(intval($start))->take(intval($length))->orderBy($columns, $order)->get();
        }
    }
    public static function countNumber()
    {
        return self::count();
    }

}