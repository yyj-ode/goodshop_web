<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Jenssegers\Agent\Agent;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        /**
         * 添加模板后缀;
         */
        View::addExtension('html', 'php');
    }

    public function is_mobile()
    {
        $agent = new Agent();
        if ($agent->isMobile()) {
            return true;
        }
        return false;
    }
}
