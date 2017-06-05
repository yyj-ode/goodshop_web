<?php

namespace App\Http\Controllers\Frontend\Demo;

use App\Collect\UserCollection;
use App\Models\Banner;
use App\Models\BannerSort;
use App\Models\DiseaseCategory;
use App\Models\ShopInformat;
use App\Http\Controllers\FrontendController;
use Response;
use Cookie;
use Uuid;
use Validator;
use App\Library\CreateQueueAndSendMessage;
use APP\Store\ShopLine;

/**
 * 随便测试什么代码用
 * Class IndexController
 * @package App\Http\Controllers\Frontend\Demo
 */
class IndexController extends FrontendController
{
    public function index()
    {
        $shoplineModel = new ShopLine();
        dd($shoplineModel);
    }

    public function change(&$a)
    {
        $a = '进来了';
    }
}