<?php

namespace App\Models;

use App\Jobs\CityName;
use App\Store\ShopLine as ShoploneStore;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliUser
 */
class Order extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'order';

    public $timestamps = true;

    protected $guarded = [];

    public static function getDataById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function allListData($start, $length, $columns, $order)
    {
        return self::select("*")->offset($start)->limit($length)->orderBy($columns, $order)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public static function getData($start, $length, $columns, $order,$key)
    {
       if($key){
           return self::with('user')->where('order_number','like','%'.$key.'%')->offset($start)->limit($length)->orderBy($columns, $order)->get();
       }else{
           return self::with('user')->offset($start)->limit($length)->orderBy($columns, $order)->get();
       }

    }

    public static function countNumber()
    {
        return self::count();
    }
    public static function getUsersData($user_id){
        return self::with('user')->where('user_id',$user_id)->get();
    }

    public static function userOrder($user_id)
    {
        return self::with('shopline')->where('user_id',$user_id)->orderBy('id','desc')->paginate(10);
    }
    public function shopline(){
        return $this->belongsTo(ShopLine::class, "shop_id", "id");
    }

    public static function getAllOrderDataById($id,$offset)
    {
        $result = self::with('shopline')->where('user_id','=',"$id")->where('status','<','5')->offset($offset)->take(6)->orderBy('id','desc')->get()->toArray();
        $count = self::with('shopline')->where('user_id','=',"$id")->where('status','<','5')->count();
        $order = ['result'=>$result,'count'=>$count];
        return $order;
    }

}