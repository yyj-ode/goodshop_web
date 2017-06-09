<?php

namespace App\Http\Controllers\Frontend\Subscribe;

use App\Collect\UserCollection;
use App\Models\Area;
use App\Models\Collection;
use App\Models\Banner;
use App\Models\BannerSort;
use App\Store\SurroundNumStore;
use App\Models\Category;
use App\Models\DiseaseCategory;
use App\Models\Subscription;
use App\Models\ShopInformat;
use App\Store\UserCollectionStore;
use App\Models\Sms;
use App\Models\Inspect;
use App\Store\AreaStore;
use App\Models\ShopLine;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use Response;
use Carbon\Carbon;
use Cookie;
use Uuid;
use DateTime;
use Validator;
use App\Library\CreateQueueAndSendMessage;

/***测试采集****/
use App\Collect\Dazhongdianping;
use App\Collect\LePu;
use App\Collect\HaoZu;
use App\Http\Controllers\ApiController;
use App\Models\OfficeBuilding;

/**
 * Class IndexController
 * @package App\Http\Controllers\Frontend\Index
 */
class IndexController extends FrontendController
{
    public function index(Request $request){
        return '进来了';
    }

    public function create(Request $request){
        $user_info = session('USER_DATA');
        if(!$user_info){
            return response()->json('请您先登录，然后发起订阅');
        }
        $subscribeModel = new Subscription();
        $data = [];
        $data['user_id'] = $user_info['id'];
        $data['format_id'] = $request->get('format_id',null);
        $data['totalarea_id'] = $request->get('totalarea_id',null);
        $data['price_id'] = $request->get('price_id',null);
        $management_type = $request->get('management',null);
        if($management_type != null ){
            $data[$management_type] = 1;
        }
        $region_id = intval($request->get('region_id',null));
        if($region_id<100){
            return response()->json('开店区域为必选项');
        }elseif($region_id>=100 && $region_id<10000){
            $data['city'] = $region_id;
            $data['province'] = Area::where('id','=',$data['city'])->first()->parent_id;
        }elseif($region_id > 10000){
            $data['county'] = $region_id;
            $data['city'] = Area::where('id','=',$data['county'])->first()->parent_id;
            $data['province'] = Area::where('id','=',$data['city'])->first()->parent_id;
        }else{
            return response()->json('未知错误');
        }

        //判断用户是否订阅
        $user_id = $this->get_user_id();
        $res = $subscribeModel->where('user_id',$user_id)->first();

        if($res){
            //修改
            $result =  Subscription::updateData($subscribeModel,$res->id,$data);
        }else{
            //增加
            $result = Subscription::addData($subscribeModel,$data);
        }
        if($result){
            return response()->json('订阅成功');
        }else{
            return response()->json('订阅失败');
        }
    }
}