<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliCheckcode
 */
class Checkcode extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'checkcode';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'code',
        'status'
    ];

    protected $guarded = [];

        
}