<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliImage
 */
class Image extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'binli_images';

    public $timestamps = true;

    protected $fillable = [
        'article_id',
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