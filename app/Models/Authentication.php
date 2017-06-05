<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliUser
 */
class Authentication extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'authentication';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'first_name',
        'category_id',
        'mobile',
        'unit_price',
        'brand',
        'email',
        'type',
        'service',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    public static function getDataById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function allListData($start, $length, $columns, $order, $key)
    {
       // return self::select("*")->where('name', 'like', '%' . $key . '%')->offset($start)->limit($length)->orderBy($columns, $order)->get();
        return self::with('users')->offset($start)->limit($length)->orderBy($columns, $order)->get();
    }

    public function users()
    {
        return $this->belongsTo(User::class, "users_id", "id");
    }

    public static function getData($start, $length, $columns, $Authentication,$key)
    {
       if($key){
           return self::with('user')->where('Authentication_number','like','%'.$key.'%')->offset($start)->limit($length)->AuthenticationBy($columns, $Authentication)->get();
       }else{
           return self::with('user')->offset($start)->limit($length)->AuthenticationBy($columns, $Authentication)->get();
       }

    }

    public static function countNumber()
    {
        return self::count();
    }
    public static function li()
    {
        return new self();
    }
    public static function getUsersData($user_id){
        return self::with('user')->where('user_id',$user_id)->get();
    }
    public static function getFirstData($id){
        return self::with('users')->where('id',$id)->first();
    }

}