<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliFile
 */
class File extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'files';

    public $timestamps = true;

    protected $fillable = [
        'file_name',
        'real_name',
        'position',
        'path',
        'url',
        'user_id',
        'size',
        'status'
    ];

    protected $guarded = [];

        
}