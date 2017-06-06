<?php

namespace App\Http\Controllers\Frontend\Demo;

use App\Collect\UserCollection;
use zgldh\QiniuStorage\QiniuStorage;
use App\Models\Banner;
use App\Models\BannerSort;
use App\Models\DiseaseCategory;
use App\Models\ShopInformat;
use App\Http\Controllers\FrontendController;
use App\Models\Collection;
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

        //上传
//        $disk = QiniuStorage::disk('qiniu');
//        $filename = "assets/frontend/index/web/shopimage/shopline/592c15a184b48d1df284176c3.png";
//        $fp2=@fopen($filename, "r");
//        $res = $disk->put('qiche2.png',$fp2);
//        dd($res);

//        获取URL
        $disk = QiniuStorage::disk('qiniu');
        $file = $disk->imagePreviewUrl('qiche2.png','imageView2/0/w/700/h/400');
        dd($file);


    }

    public function change(&$a)
    {
        $a = '进来了';
    }
}