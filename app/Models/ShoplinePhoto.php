<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class BinliCategory
 */
class ShoplinePhoto extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'shop_photo';

    public $timestamps = true;

    protected $fillable = [
        '_id',//mongodb表中的ID
        'filepath',//服务器中保存的图片的位置
        'photo_url', //图片来源
        'shop_id',  //原网站房源的ID
        'file_name',  //服务器中保存的图片的名称
        'type',  //
        'shopline_id', //shopline表的ID

    ];

    protected $guarded = [];

}