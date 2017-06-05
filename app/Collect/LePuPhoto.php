<?php
namespace App\Collect;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class LePuPhoto extends BaseStore
{
    protected $connection = 'collect';
    protected $table = 'lepu_photo';
}