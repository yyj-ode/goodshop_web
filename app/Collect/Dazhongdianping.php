<?php
namespace App\Collect;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class Dazhongdianping extends BaseStore
{
    protected $connection = 'collect';
    protected $table = 'dazhongdianping_shop';
}