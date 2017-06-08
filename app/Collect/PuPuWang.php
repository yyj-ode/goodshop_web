<?php
namespace App\Collect;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class PuPuWang extends BaseStore
{
    protected $connection = 'collect';
    protected $table = 'pupuwang_result';
}