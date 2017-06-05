<?php
namespace App\Collect;

use Carbon\Carbon;
use App\Utils\Common;
use Log;

class WinShang extends BaseStore
{
    protected $connection = 'collect';
    protected $table = 'winshang_shop';

}