<?php

namespace App\Http\Controllers\Frontend\Index;

use App\Models\Area;
use App\Models\Format;
use App\Models\Banner;
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
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use Response;
use Cookie;
use Uuid;
use App\Models\Sms;
use Validator;
use App\Library\CreateQueueAndSendMessage;
use App\Store\SurroundNumStore;
use Illuminate\Support\Facades\Input;


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

            /*$shop_type = Session::get('shop_type');
            if($shop_type){
                $shop_data = ShopLine::skip(0)->take(10)->get();
            }else{
                $shop_data = '';
            }

            return view('Frontend.Index.CN.Wap.Index.index',compact('shop_type','shop_data'));*/
            return view('Frontend.Index.CN.Wap.Index.index');

        } else {
            $subscribe = $this->subscribe(); //订阅和登录
            $user_login=$this->check_user();
            $price = $this->getPriceData();
            $totalarea = $this->getTotalareaData();
            $format= $this->getCategoryData();
            $area_level = $this->getDistrictData();
            //搜索条件
            if($this->com_map()){
                $map[]=$this->com_map();
                $data = ShopLine::where($map)->orderBy('id', 'desc')->skip(0)->take(12)->get()->toArray();
            }else{
                $data = ShopLine::orderBy('id', 'desc')->skip(0)->take(12)->get()->toArray();
            }
            foreach ($data as $k=>$v){
                $data[$k]['location'] = msubstr($v['location'],0,17);

                $format_type  = Format::where('id',$v['business_type'])->first();
                $data[$k]['business_type'] = $format_type['name'];
                $kilometer = 1;//距离该店铺周边多少千米范围内
                $longitude = floatval($v['longitude']);//为确保不报错，经纬度强转为浮点数
                $latitude = floatval($v['latitude']);//为确保不报错，经纬度强转为浮点数
                $data[$k]['officebuilding_num'] = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
                $data[$k]['village_num'] = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
                $data[$k]['shoppingcenter_num'] = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
                $data[$k]['shopsurrounding_num'] = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);
//                dd($data[$k]['our_image']);
                $data[$k]['our_image'] = strExplode($v['our_image']);
            }
//            dd($data);
            return view('Frontend.Index.CN.Web.Index.index', compact('data','user_login','price','totalarea','format','area_level','subscribe'));
        }
    }
    public function com_map(){
        $session_map = Session::get('MAP');
        if($session_map){
            $map = [$session_map,1];
        }else{
            $map = false;
        }
        return $map;
    }

    /**
     * 可经营业态查询
     */
    public function management_search(Request $request){
        $management = $request->get('management');

        Session::put('MAP', $management);

        $data = ShopLine::where($management,1)->skip(0)->take(12)->orderBy('id','desc')->get()->toArray();
        foreach ($data as $k=>$v){
            $data[$k]['location'] = msubstr($v['location'],0,17);
            $data[$k]['updated_at'] = timeShow($v['updated_at']);
            $format_type  = Format::where('id',$v['business_type'])->first();
            $data[$k]['business_type'] = $format_type['name'];
            $kilometer = 1;//距离该店铺周边多少千米范围内
            $longitude = floatval($v['longitude']);//为确保不报错，经纬度强转为浮点数
            $latitude = floatval($v['latitude']);//为确保不报错，经纬度强转为浮点数
            $data[$k]['officebuilding_num'] = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
            $data[$k]['village_num'] = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
            $data[$k]['shoppingcenter_num'] = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
            $data[$k]['shopsurrounding_num'] = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);
            $data[$k]['our_image'] = strExplode($v['our_image']);
        }
        $map_count = ShopLine::where($management,1)->skip(0)->take(12)->orderBy('id','desc')->count();
        if($data){
            $res['static'] = 200;
            $res['content'] = $data;
        }else{
            $res['static'] = 500;
            $res['error'] = '没有查询到符合条件的数据...';
        }
        $res['map_count'] = $map_count;
        $res['count'] = $this->count();
        return response()->json($res);
    }
    public function count(){
        return ShopLine::count();
    }

    /**
     * 公共条件
     */
    /*public function com_map(){

    }*/
    /**
     * 输入关键字搜索,暂时先做一个搜索地址
     */
    public function searchKey(Request $request){
        $key = $request->get('key');
        //搜索条件
        if($this->com_map()){
            $map[]=$this->com_map();
        }
        $map[]=['location','like','%'.$key.'%'];
        $data[1] = ShopLine::where($map)->skip(0)->take(12)->orderBy('id','desc')->get()->toArray();
        $data[2] = $key;
        $data['count'] = $this->count();
        $data['map_count'] = ShopLine::where($map)->skip(0)->take(12)->orderBy('id','desc')->count();
        foreach ($data[1] as $k=>$v){
            $data[1][$k]['location'] = msubstr($v['location'],0,17);
            $data[1][$k]['updated_at'] = timeShow($v['updated_at']);
            $format_type  = Format::where('id',$v['business_type'])->first();
            $data[1][$k]['business_type'] = $format_type['name'];
            $kilometer = 1;//距离该店铺周边多少千米范围内
            $longitude = floatval($v['longitude']);//为确保不报错，经纬度强转为浮点数
            $latitude = floatval($v['latitude']);//为确保不报错，经纬度强转为浮点数
            $data[1][$k]['officebuilding_num'] = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
            $data[1][$k]['village_num'] = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
            $data[1][$k]['shoppingcenter_num'] = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
            $data[1][$k]['shopsurrounding_num'] = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);
            $data[1][$k]['our_image'] = strExplode($v['our_image']);
        }

        if($data[1]){
            $res['content'] = $data;
            $res['static'] = 200;
        }else{
            $res['static'] = 400;
            $res['error'] = '没有查询到符合条件的数据...';
        }

        return response()->json($res);
    }
    /**
     * 输入条件查询
     */
    public function shop_search(Request $request){
        //搜索条件
        $province = 11; //省
        $county  = $request->get('shop_area',''); //
        $business_type = $request->get('business_type'); //类型
        $min_area = $request->get('min_area',0); //面积
        $max_area = $request->get('max_area',99999999); //面积
        $min_rent = $request->get('min_rent',0)*10000;
        $max_rent = $request->get('max_rent',99999999)*100000;
        //可经营业态
        if($this->com_map()){
            $map[]=$this->com_map();
        }
        $map[]=['province',$province];
        if($business_type && $business_type>1){
            $map[]=['business_type',$business_type];
        }
        if($county){
            $map[]=['county',$county];
        }
        $map[]=['total_area','>',$min_area];
        $map[]=['total_area','<',$max_area];
        $map[]=['rent','>',$min_rent];
        $map[]=['rent','<',$max_rent];

        $data = ShopLine::where($map)->orderBy('updated_at', 'desc')->skip(0)->take(12)->get()->toArray();

//        dd($data);
        if($data){
            $res['status'] = 200;
        }else{
            $res['status'] = 500;
            $res['error'] = '没有查询到符合条件的数据...';
        }
        foreach ($data as $k=>$v){
            $data[$k]['location'] = msubstr($v['location'],0,17);
            $data[$k]['updated_at'] = timeShow($v['updated_at']);
            $format_type  = Format::where('id',$v['business_type'])->first();
            $data[$k]['business_type'] = $format_type['name'];
            $kilometer = 1;//距离该店铺周边多少千米范围内
            $longitude = floatval($v['longitude']);//为确保不报错，经纬度强转为浮点数
            $latitude = floatval($v['latitude']);//为确保不报错，经纬度强转为浮点数
            //这里存在经纬度抓反的情况，加个判断(否则查找坐标超过我们的库的范围，ajax报错)
            if($longitude < 50 && $latitude > 100){
                $n = $longitude;
                $longitude = $latitude;
                $latitude = $n;
            }
//            dd($data);
            $data[$k]['officebuilding_num'] = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
            $data[$k]['village_num'] = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
            $data[$k]['shoppingcenter_num'] = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
            $data[$k]['shopsurrounding_num'] = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);
            $data[$k]['our_image'] = strExplode($v['our_image']);
        }
//        dd($data);
        $res['content'] = $data;
        $res['count'] = $this->count();
        $res['map_count'] = ShopLine::where($map)->orderBy('updated_at', 'desc')->skip(0)->take(12)->count();
        return response()->json($res);
    }
    /**
     * 点击更多加载
     */
    public function moredata(Request $request)
    {
        if ($this->is_mobile() == true) {

        } else {
            $start = intval($request->start);
            $length = intval($request->length);

            //搜索条件
            $key = $request->get('key',''); //关键词
            $province = 11; //省
            $county  = $request->get('shop_area',''); //
            $business_type = $request->get('business_type'); //类型
            $min_area = $request->get('min_area',0); //面积
            $max_area = $request->get('max_area',99999999); //面积
            $min_rent = $request->get('min_rent',0)*10000;
            $max_rent = $request->get('max_rent',99999999)*10000;

            //可经营业态
            if($this->com_map()){
                $map[]=$this->com_map();
            }
            $map[]=['location','like','%'.$key.'%'];
            $map[]=['province',$province];
            if($business_type && $business_type>1){
                $map[]=['business_type',$business_type];
            }
            if($county){
                $map[]=['county',$county];
            }
            $map[]=['total_area','>',$min_area];
            $map[]=['total_area','<',$max_area];
            $map[]=['rent','>',$min_rent];
            $map[]=['rent','<',$max_rent];

            $data = ShopLine::where($map)->orderBy('updated_at', 'desc')->skip($start)->take($length)->get()->toArray();

            if($data){
                $res['status'] = 200;
            }else{
                $res['status'] = 500;
                $res['error'] = '没有更多的数据了...';
            }

            foreach ($data as $k=>$v){
                $data[$k]['location'] = msubstr($v['location'],0,17);
                $data[$k]['updated_at'] = timeShow($v['updated_at']);
                $format_type  = Format::where('id',$v['business_type'])->first();
                $data[$k]['business_type'] = $format_type['name'];
                $kilometer = 1;//距离该店铺周边多少千米范围内
                $longitude = floatval($v['longitude']);//为确保不报错，经纬度强转为浮点数
                $latitude = floatval($v['latitude']);//为确保不报错，经纬度强转为浮点数
                $data[$k]['officebuilding_num'] = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
                $data[$k]['village_num'] = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
                $data[$k]['shoppingcenter_num'] = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
                $data[$k]['shopsurrounding_num'] = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);
                $data[$k]['our_image'] = strExplode($v['our_image']);
            }
            $res['content'] = $data;
            return response()->json($res);
        }
    }
    //房源信息手机站
    public function shop(Request $request){
        /*$shop_type = $request->cookie('shop_type');
        if(!$shop_type){
            $this->cookie_make('shop_type',1);
        }*/
        $shop_type = Session::get('shop_type');
        if(!$shop_type){
            Session::put('shop_type',1);
            $shop_type = Session::get('shop_type');
        }
        $start = $request->start;
        $length = $request->length;
        $shop = ShopLine::skip(intval($start))->take(intval($length))->get();
        foreach ($shop as $k=>$v){
            $shop[$k]['photo'] = $v->photo;
        }
        return response()->json($shop);
    }
    //手机站订阅
    public function read(){
        if ($this->is_mobile() == true) {
            return view('Frontend.Index.CN.Wap.Index.read');
        } else {

        }
    }


    public function demo_haozu(){
        $mode = new HaoZu();
        $data_original = $mode::limit(2000)->get()->toArray();
        $result = ['status' => 'error', 'message' => '数据请求失败！', 'status_code' => '404'];
        foreach ($data_original as $v){
            $OfficeBuilding = new OfficeBuilding();
            $data['_id'] = $v['_id'];
//            $data['longitude'] = $v['longitude'];
//            $data['latitude'] = $v['latitude'];
            $longitude = doubleval($v['longitude']);
            $latitude = doubleval($v['latitude']);
            $data['loc'] = ['longitude'=>$longitude,'latitude'=>$latitude];
            $data['office_name'] = $v['officeName'];
            $data['office_address'] = $v['address'];
            $data['company_categories'] = $v['companyCategories'];
            $data['rent_rate'] = $v['rentRate'];
            $OfficeBuilding->addData($OfficeBuilding,$data);
        }

        return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200', 'result' => $result];
    }

    public function demo_dazhongdianping(){
        $mode = new Dazhongdianping();
        $data_original = $mode::offset(16000)->limit(4000)->get()->toArray();
        $result = ['status' => 'error', 'message' => '数据请求失败！', 'status_code' => '404'];
        foreach ($data_original as $v){
            $Dazhongdianping = new ShopSurrounding();
            $data['_id'] = $v['_id'];
            $data['business_district'] = $v['businessDistrict'];
            $data['address'] = $v['address'];
            $data['shop_type'] = $v['shopTypeName'];
            $data['categories'] = $v['mainCategoryName'];
            $data['price'] = $v['price'];
            $longitude = floatval($v['longitude']);
            $latitude = floatval($v['latitude']);
            $data['loc'] = ['longitude'=>$longitude,'latitude'=>$latitude];
            $Dazhongdianping->addData($Dazhongdianping,$data);
        }

        return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200', 'result' => $result];
    }

    public function demo_winshang(){
        $mode = new WinShang();
        $data_original = $mode::limit(690)->get()->toArray();
        $result = ['status' => 'error', 'message' => '数据请求失败！', 'status_code' => '404'];
        foreach ($data_original as $v){
            $WinShang = new ShoppingCenter();
            $data['_id'] = $v['_id'];
            $data['project_name'] = $v['projectName'];
            $data['opening_date'] = $v['openTime'];
            $data['condition'] = $v['condition'];
            $data['commercial_area'] = $v['commercialArea'];
            $data['commercial_floors'] = $v['commercialFloors'];
            $data['project_adress'] = $v['address'];
            $data['project_photo'] = $v['photoUrl'];
            $data['project_mapping'] = $v['projectMapping'];
            $data['contact_brand'] = $v['contactBrand'];
            $data['demand'] = $v['demand'];
            $data['inner_map'] = $v['innerMap'];
            $longitude = floatval($v['longitude']);
            $latitude = floatval($v['latitude']);
            $data['loc'] = ['longitude'=>$longitude,'latitude'=>$latitude];

            $WinShang->addData($WinShang,$data);
        }

        return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200', 'result' => $result];
    }

    public function demo_lianjia(){
        $mode = new Lianjia();
        $data_original = $mode::offset(8000)->limit(3000)->get()->toArray();
        $result = ['status' => 'error', 'message' => '数据请求失败！', 'status_code' => '404'];
        foreach ($data_original as $v){
            $villageModel = new Village();
            $data['_id'] = $v['_id'];
            $longitude = floatval($v['longitude']);
            $latitude = floatval($v['latitude']);
            $data['loc'] = ['longitude'=>$longitude,'latitude'=>$latitude];
            $data['community_name'] = $v['communityName'];
            $data['community_adress'] = $v['communityAddress'];
            $data['building_age'] = null;
            $data['building_category'] = $v['buildingCategory'];
            $data['property_management_fee'] = $v['managementFee'];
            $data['property_management_company'] = $v['managementCompany'];
            $data['developer'] = $v['developer'];
            $data['total_building_number'] = $v['buildingNum'];
            $data['total_apartment_number'] = $v['apartmentNum'];
            $data['price'] = $v['price'];
            $villageModel->addData($villageModel,$data);
        }

        return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200', 'result' => $result];
    }

    public function area($value){
        $county = Area::where('name','like','%'.$value.'%')->first();
        if(!$county){
            return false;
        }
        $city = Area::where('id',$county->parent_id)->first();
        $province = Area::where('id',$city->parent_id)->first();
        $data['county'] = $county->id;
        $data['city'] = $city->id;
        $data['province'] = $province->id;
        return $data;

    }
    /**
     * 给首页提供默认数据
     *
     * @return \Illuminate\Http\Response
     */
    public function live(Request $request){
        if ($this->is_mobile() == true) {
            return view('Frontend.Index.CN.Wap.Index.live');
        } else {
            $id = $request->get('id',1);
            $subscribe = $this->subscribe(); //订阅
            $user_login=$this->check_user();
            return view('Frontend.Index.CN.Web.Index.live',compact('subscribe','user_login','id'));
        }
    }
    public function protocal(Request $request){
        if ($this->is_mobile() == true) {
            return view('Frontend.Index.CN.Wap.Index.protocal');
        } else {
            $id = $request->get('id',1);
            $subscribe = $this->subscribe(); //订阅
            $user_login=$this->check_user();
            return view('Frontend.Index.CN.Web.Index.protocal',compact('subscribe','user_login','id'));
        }
    }

    public function report(Request $request){
        if ($this->is_mobile() == true) {
            return view('Frontend.Index.CN.Wap.Index.report');
        } else {
            $session_detail_id = Session::get('session_detail_id');
            $id = $request->get('id',1);
            $subscribe = $this->subscribe(); //订阅
            $user_login=$this->check_user();
            return view('Frontend.Index.CN.Web.Index.report',compact('subscribe','user_login','session_detail_id','id'));
        }
    }
    /**
     * 获取'开店区域'下拉框数据
     */
    public function getDistrictData(){
        $area_level2 = Area::where('parent_id','=','11')->where('show',1)->get()->toArray();
        $area_level3 = [];
        foreach($area_level2 as $k => $v){
            $area_level3_data = Area::where('parent_id','=',$v['id'])->where('show',1)->get()->toArray();
            $area_level3[$k] = $area_level3_data;
        }
        $area_level = ['area_level2'=>$area_level2, 'area_level3'=>$area_level3];
        return $area_level;
    }

    /**
     * 获取'商铺类型'下拉框数据
     */
    public function getCategoryData(){
        $format= Format1::get()->toArray();
        return $format;
    }

    /**
     * 获取'经营面积'下拉框数据
     */
    public function getTotalareaData(){
        $totalarea_data = Totalarea::get()->toArray();
//            dd($totalarea_data);
        foreach($totalarea_data as $k => $v){
            if($v['max_area'] != '999999'){
                $totalarea[$k]['value'] = $v['min_area'].'~'.$v['max_area'];
                $totalarea[$k]['id'] = $v['id'];
                $totalarea[$k]['min_area'] = $v['min_area'];
                $totalarea[$k]['max_area'] = $v['max_area'];
            }else{
                $totalarea[$k]['value'] = '大于'.$v['min_area'];
                $totalarea[$k]['id'] = $v['id'];
                $totalarea[$k]['min_area'] = $v['min_area'];
                $totalarea[$k]['max_area'] = $v['max_area'];
            }
        }
        return $totalarea;
    }

    /**
     * 获取'开店预算'下拉框数据
     */
    public function getPriceData(){
        $price_data = Price::get()->toArray();

       $price = [];
        foreach($price_data as $k => $v){
            if($v['max_price'] != '999999'){
                $price[$k]['value'] = $v['min_price'].'~'.$v['max_price'].'万元';
            }else{
                $price[$k]['value'] = '大于'.$v['min_price'].'万元';
            }
            $price[$k]['price_min'] = $v['min_price'];
            $price[$k]['price_max'] = $v['max_price'];

        }
        return $price;
    }

    /**
     * 输入条件找铺
     */
    public function searchCondition(){
        if ($this->is_mobile() == true) {

        } else {
            $data = ShopLine::where('total_area','>',30)
                            ->where('total_area','<',60)
                            ->where('rent','>',5000)
                            ->where('rent','<',60000)
                            ->where('county','=',820964)
                            ->orderBy('_id', 'desc')->skip(0)->take(11)->get();
//            dd($data);
            return response()->json($data);
        }
    }
    /**
     * 验证码
     */
    public function send_tel(Request $request)
    {
        $time = date('Y-m-d H:i:s',time());
        $mobile = $request->get('mobile');
        if (isMobile($mobile)) {
            $code = makeCaptchaCode();
            $json_data = json_encode(['name' => $code]);
            $template = 'SMS_62295039';
            $sms = new Sms();
            $checkData = $sms::checkMinute($mobile);
            if($checkData == false) {
                $data = sendSms($mobile, $template, $json_data);
                $result = json_decode($data, true);
                if ($result['status'] == 200) {
                    $sms->mobile = $mobile;
                    $sms->code = $code;
                    $sms->status = 1;
                    $sms->created_at = $time;
                    $sms->save();
                    $result = ['status' => 1, 'message' => "验证码发送成功！", $data];
                } else {
                    $result = ['status' => 0, 'message' => "请求太过频繁", $data];
                }
            }else{
                $result = ['status' => 0, 'message' => "刚发的验证码还未失效，还能使用！"];
            }

        } else {
            $result = ['status' => 0, 'message' => '亲，手机号格式错误哦！'];
        }
        return response()->json($result);
    }

}