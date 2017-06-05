<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;


/**
 * Class BinliUser
 */
class Sms extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'sms';

    public $timestamps = true;

    protected $fillable = [
        'mobile',
        'code',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];

    public static function checkMinute($mobile)
    {
        $timeData = date("Y-m-d H:i:s", strtotime("-5 minute"));
        return self::where('created_at', '>', $timeData)->where(['mobile' => $mobile])->first();
    }

    public static function mycheck($mobile)
    {
        return self::orderBy('id','desc')->first();
    }


    public static function check($mobile, $code)
    {
        $timeData = date("Y-m-d H:i:s", strtotime("-5 minute"));
        return self::where('created_at', '>', "$timeData")->where(['mobile' => $mobile, 'code' => $code])->first();
    }
}