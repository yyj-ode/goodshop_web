<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BinliArticle
 */
class Company extends BaseModel
{
    protected $connection = 'mysql';

    protected $table = 'company';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'title',
        'keywords',
        'summary',
        'category_id',
        'scale_id',
        'province',
        'city',
        'county',
        'office',
        'address',
        'count',
        'status'
    ];

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function description()
    {
        return $this->hasOne(CompanyDescription::class, 'id', 'id');
    }

    public function details()
    {
        return $this->hasOne(CompanyDetails::class, 'id', 'id');
    }

    public static function getDataById($id)
    {
        return self::with('category','county')->where('id', $id)->first();
    }

    public function county()
    {
        return $this->hasOne(Area::class, 'id', 'county');
    }
}