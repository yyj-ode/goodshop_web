<?php
namespace App\Collect;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class Eleme extends BaseStore
{
    protected $connection = 'collect';
    protected $table = 'eleme';
}