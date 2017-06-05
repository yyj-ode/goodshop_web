<?php

namespace App\Models;

use App\Jobs\CityName;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliCategory
 */
class Format extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'format';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'show',
        'sort',
        'status',
    ];
}