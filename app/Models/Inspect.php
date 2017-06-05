<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliUser
 */
class Inspect extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'inspect';

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

    public static function allListData($start, $length, $columns, $order)
    {
        return self::select("*")->offset($start)->limit($length)->orderBy($columns, $order)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public static function getData($start, $length, $columns, $order,$key)
    {
       // return self::with('category')->where(['id'=>$id])->first();
      //  return self::with('category')->get();
       /* return self::with('category')->where('name','like','%'.$key.'%')->offset($start)->limit($length)->orderBy($columns, $order)->get();*/
       if($key){
           return self::with('category')->where('name','like','%'.$key.'%')->offset($start)->limit($length)->orderBy($columns, $order)->get();
       }else{
           return self::with('category')->offset($start)->limit($length)->orderBy($columns, $order)->get();
       }

    }

    public static function countNumber()
    {
        return self::count();
    }

}