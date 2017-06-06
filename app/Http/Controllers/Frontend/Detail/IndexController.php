<?php

namespace App\Http\Controllers\Frontend\Detail;

use App\Models\Area;
use App\Models\Banner;
use App\Models\Collection;
use App\Models\Subscription;
use App\Models\BannerSort;
use App\Models\DiseaseCategory;
use App\Models\Price;
use App\Models\Format as Format1;
use App\Models\ShoppingCenter;
use App\Models\Totalarea;
use App\Models\Village;
use App\Models\ShopSurrounding;
//use App\Store\ShopLine;
use App\Models\ShopLine;
use App\Store\VillageStore;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use Response;
use Cookie;
use Session;
use Uuid;
use Validator;
use App\Library\CreateQueueAndSendMessage;
use App\Store\SurroundNumStore;

/***测试采集****/
use App\Collect\Dazhongdianping;
use App\Collect\LePu;
use App\Collect\HaoZu;
use App\Collect\LianJia;
use App\Collect\WinShang;
use App\Models\OfficeBuilding;

/**
 * Class IndexController
 * @package App\Http\Controllers\Frontend\Index
 */
class IndexController extends FrontendController
{
    /**
     * 给首页提供默认数据
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->is_mobile() == true) {
            return view('Frontend.Index.CN.Wap.Detail.index');
        } else {
            $subscribe = $this->subscribe(); //订阅
            $id = $request->get('id',1);
            Session::put('session_detail_id',$id);
            $subscriptionModel = new Subscription();
            $data = $this->getDetailData($id);
            $data['our_image'] = explode(",",$data['our_image']);

            //提供订阅选框信息
            $user_login = $this->check_user();
            $price = $subscriptionModel::getPriceData();
            $totalarea = $subscriptionModel::getTotalareaData();
            $format = $subscriptionModel::getCategoryData();
            $area_level = $subscriptionModel::getDistrictData();

            //计算周边建筑
            $kilometer = 1;//距离该店铺周边多少千米范围内
            $longitude = floatval($data['longitude']);//为确保不报错，经纬度强转为浮点数
            $latitude = floatval($data['latitude']);//为确保不报错，经纬度强转为浮点数
            $officebuilding_num = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
            $village_num = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
            $shoppingcenter_num = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
            $shopsurrounding_num = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);

            //查询该页面是否已收藏
//            dd(session('USER_DATA'));
            $user_info = session('USER_DATA');
            $if_collection = Collection::where('users_id','=',$user_info['id'])->where('shopline_id','=',$id)->first();
            if($if_collection == null){
                $collection_status = 0;
            }else{
                $collection_status = 1;
            }
            return view('Frontend.Index.CN.Web.Detail.index',compact('data','user_login','price','totalarea','format','area_level','officebuilding_num','village_num','collection_status','subscribe','shoppingcenter_num','shopsurrounding_num'));
        }
    }
    
    public function getDetailData($id = 1){
        $shoplineModel = Shopline::select('shopline.*','area.name','format.name as format_name')
            ->leftJoin('area','shopline.city','=','area.id')
            ->leftJoin('format','shopline.business_type','=','format.id')
            ->where('shopline.id','=',$id)->first()->toArray();

        return $shoplineModel;
    }

    public function surround_information(Request $request){
        $condition = 'ShopSurrounding';
        $kilometer = 1;//距离该店铺周边多少千米范围内
        $longitude = floatval($request->get('longitude',116));//为确保不报错，经纬度强转为浮点数
        $latitude = floatval($request->get('latitude',40));//为确保不报错，经纬度强转为浮点数
    }

}