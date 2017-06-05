<?php

namespace App\Models;

use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Scopes\AgeScope;
use HaoLi\LaravelAmount\Traits\AmountTrait;


/**
 * Class BinliUser
 */
class UserDetails extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use AmountTrait;
    protected $connection = 'mysql';

    protected $table = 'uesrs_details';

    public $timestamps = true;

    protected $fillable = [
        'really_name',
        'code',
        'codepositive_id',
        'codereverse_id',
        'email',
        'images_id',
        'address',
        'age',
        'sex',
        'position',
        'province',
        'city',
        'county',
        'birth_date',
        'description',
        'education_experience',
        'work_experience',
        'expertise',
        'check_key',
    ];

    protected $guarded = [];

        
}