<?php

namespace App\Http\Controllers\Frontend\Index;

use App\Collect\LePuPhoto;
use App\Http\Requests\Request;
use App\Models\Area;
use App\Models\Format;
use App\Models\ShoplinePhoto;
use App\Models\WashData;
use App\Models\Banner;
use App\Models\BannerSort;
use App\Models\DiseaseCategory;
use App\Models\ShopLine;
use App\Http\Controllers\FrontendController;
use Response;
use Cookie;
use Uuid;
use Validator;
use App\Library\CreateQueueAndSendMessage;
use App\Models\ImageDown;
//use zgldh\QiniuStorage\QiniuStorage;

/***测试采集****/
use App\Collect\Dazhongdianping;
use App\Collect\LePu;
use App\Collect\HaoZu;
use App\Collect\LianJia;
use App\Collect\WinShang;
use App\Http\Controllers\ApiController;
use App\Models\OfficeBuilding;

/**
 * Class IndexController
 * @package App\Http\Controllers\Frontend\Index
 */
class MyshopController extends FrontendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function demo_lepu(){
        $mode = new LePu();
//        dd($mode);
        $data_original = $mode::offset(0)->limit(10)->get()->toArray();
        dd($data_original);
        $result = ['status' => 'error', 'message' => '数据请求失败！', 'status_code' => '404'];
        foreach ($data_original as $v){
            $ShopLine = new ShopLine();
            $exist = ShopLine::where('url','=',$v['url'])->first();
            if($exist){
                continue;
            }
            if($v['businessDistrict'] == null){
                continue;
            }
            $area = $this->area($v['businessDistrict'],$v['district']);
            if(!$area){
                continue;
            }
            $business_type =Format::where('name','like','%'.$v['buildingCategory'].'%')->first(); //房屋区域
            if(!$business_type){
                $business_type = 8;//8是其他
            }else{
                $business_type =intval($business_type->id);
            }
            $data = [
                '_id' =>$v['_id'],
                'shop_id' =>$v['shopId'],
                'show'=>1, //上架
                'source'=>'乐铺', //来源
                'owner_name' => '联系人',  //房主姓名
                'owner_tel' => '4006312626',  //房主电话
                'district' => $v['district'], // 区县
                'business_district' => $v['businessDistrict'], // 商圈
                'circleLine' =>$v['circleLine'], //环线
                'location' => $v['address'],  //商铺位置
                'business_type' => $business_type ,  //房屋区域  0
                'total_area' => intval($v['totalArea']), //建筑面积（m2）
                'useage_area' => intval($v['useageArea']), //使用面积（m2)
                'floor_level' => $v['floorLevel'], //所在楼层
                'width' => $v['doorWidth'],//门头宽度（米）
                'depth' => $v['depth'], //进深（米）
                'floor_height' => $v['floorHeight'], //层高（米）
                'leasing_type' => $v['leasingType'], //租赁类型
                'leasing_payment' => str_to_money($v['leasingPayment']), //转让费
                'status' => $v['status'], //租赁状态
                'rent' => intval(str_to_money($v['rent'])), //月租金（元／月）
                'progressive_rate' => $v['progressiveRate'], //租金递增
                'payment_type' => $v['paymentType'], //支付方式
                'deposit' => $v['deposit'], //押金（月房租）
                'current_duration' => $v['currentDuration'], //当前租约（年）
                'remian_duration' => $v['remianDuration'], //剩余租约（月）
                'max_duration' => $v['maxDuration'], //最长可租约（个月）
                'contact_status' => $v['contactStatus'], //续约情况
                'photo' => $v['photoUrl'], //房屋图片
                'latitude' => $v['latitude'], //纬度
                'longitude' => $v['longitude'], //经度
                'pct' => null, //客单价（元）
                'eat_here' => null, //堂食量（人）
                'takeout' => null, //外卖量（份）
                'revenue' => null, //营业额（元）
                'customer_type' => null, //消费人群
                'busytime' => null, //最旺时段
                'advantage' => null, //本店优势
                'county' => $area['province'], //省
                'city' => $area['city'], //市
                'province' => $area['county'], //县
                'publish_time' => $v['publishTime'], //房源发布时间
                'license' =>$v['license'], //证照
                'url' =>$v['url'],
                'budget' => str_to_money($v['leasingPayment'])+str_to_money($v['rent'])*12
            ];

            // 判断下列字段是否存在，有则赋值为1，无则赋值为0
            $operateIndustry = $v['operateIndustry'];
            $arr = [];
            $conditions = $v['conditions'];

            //可经营业态
            preg_match('/酒楼餐饮/', $operateIndustry, $arr['type_restaurant_catering']);
            preg_match('/服饰鞋包/', $operateIndustry, $arr['type_shoes_bag']);
            preg_match('/休闲娱乐/', $operateIndustry, $arr['type_recreation']);
            preg_match('/美容美发/', $operateIndustry, $arr['type_beauty_salon']);
            preg_match('/生活服务/', $operateIndustry, $arr['type_life_service']);
            preg_match('/百货超市/', $operateIndustry, $arr['type_store']);
            preg_match('/家居建材/', $operateIndustry, $arr['type_materials']);
            preg_match('/电气通讯/', $operateIndustry, $arr['type_communication']);
            preg_match('/汽修美容/', $operateIndustry, $arr['type_auto']);
            preg_match('/医疗保健/', $operateIndustry, $arr['type_medical_care']);
            preg_match('/教育培训/', $operateIndustry, $arr['type_training']);
            preg_match('/旅游宾馆/', $operateIndustry, $arr['type_am_turm']);
            preg_match('/其它业态/', $operateIndustry, $arr['type_formats']);

            //工程条件
            preg_match('/上水/', $conditions, $arr['engineering_water_supply']);
            preg_match('/下水/', $conditions, $arr['engineering_draignage']);
            preg_match('/380伏/', $conditions, $arr['engineering_380_volt']);
            preg_match('/煤气罐/', $conditions, $arr['engineering_gas_tube']);
            preg_match('/烟管道/', $conditions, $arr['engineering_smoke_tube']);
            preg_match('/排污管道/', $conditions, $arr['engineering_sewage']);
            preg_match('/停车位/', $conditions, $arr['engineering_parking_lot']);
            preg_match('/天然气/', $conditions, $arr['engineering_nature_gas']);
            preg_match('/外摆区/', $conditions, $arr['engineering_outside_area']);
            preg_match('/可明火/', $conditions, $arr['engineering_falme']);
            preg_match('/可办照/', $conditions, $arr['engineering_license_approval']);
            foreach($arr as $k1 => $v1){
                $v1 != null?$data[$k1] = 1 : $data[$k1] = 0;
            }

            if($data['license'] == '不可办照'){
                $data['engineering_license_approval'] = 0;
            }else{
                $data['engineering_license_approval'] = 1;
            }

//            //以下为图片下载的代码：元永健，2017-05-23 11:14:00
//            $data['photo'] = trim($data['photo']);
//            $photos = explode(",",$data['photo']);
//            $photo = '';
//            foreach($photos as $k => $v){
//                $filename = ImageDown::grabImage($v,$data['_id'].$k.'.png');
//                $photo .= 'assets/frontend/index/web/shopimage/shopline/'.$filename.',';
//            }
//            $photo = rtrim($photo,',');
//            $data['our_image'] = $photo;
//            //以上

            $data['deposit'] = WashData::shopline_lepu_deposit($data['deposit'],$data['rent']);
            $data['budget'] = WashData::shopline_lepu_budget($data['deposit'],$data['rent'],$data['payment_type'],$data['leasing_payment']);

            if($data['budget'] != 0){
                $i=$ShopLine->addData($ShopLine,$data);
            }

        }
        return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200', 'result' => $result];
    }


    public function area($value,$dis){
        $province = Area::where('name',$value)->where('show',1)->first();

        if(!$province){
            //如果没有商圈走其他
            $city = Area::where('name','like','%'.$dis.'%')->where('show',1)->first(); //市
            if($city){
                $province = Area::where('name','其他')->where('parent_id',$city->id)->where('show',1)->first();
                if($province){
                    $data['county'] = 11;  //省 北京
                    $data['city'] = $city->id;    //市
                    $data['province'] = $province->id;  //县
                    return $data;
                }else{
                    $province = Area::where('parent_id',$city->id)->where('show',1)->first();
                    if($province){
                        $data['county'] = 11;  //省 北京
                        $data['city'] = $city->id;    //市
                        $data['province'] = $province->id;  //县
                        return $data;
                    }else{
                        return false;
                    }
                }


            }else{
                return false;
            }
        }
        if($province->id == 5011){  //重庆双桥返回false
            return false;
        }
        $city = Area::where('id',$province->parent_id)->where('show',1)->first();
        $data['county'] = 11;  //省
        $data['city'] = $city->id;    //市
        $data['province'] = $province->id;  //县
        return $data;

    }
    /*public function area($value,$dis){
        $county = Area::where('name',$value)->where('show',1)->first();
        if(!$county){
            //如果没有商圈走其他




        }




        if($county->id == 5011){
            return false;
        }
        $city = Area::where('id',$county->parent_id)->where('show',1)->first();
        $province = Area::where('id',$city->parent_id)->where('show',1)->first();
        $data['county'] = $county->id;  //省
        $data['city'] = $city->id;    //市
        $data['province'] = $province->id;  //县
        return $data;

    }*/

    public function demo_lepu_photo(){
        $mode = new LePuPhoto();
        $data_original = $mode::offset(163000)->limit(2000)->get()->toArray();
//        dd($data_original);
        $result = ['status' => 'error', 'message' => '数据请求失败！', 'status_code' => '404'];
        foreach ($data_original as $v){
            $ShoplinePhoto = new ShoplinePhoto();
//            dd($ShoplinePhoto);
            $exist = ShoplinePhoto::where('photo_url','=',$v['photoUrl'])->first();
            if($exist){
                continue;
            }
            $data = [
                '_id' =>$v['_id'],//mongodb的ID
                'filepath' =>$v['filePath'],//图片存储路径
                'photo_url'=>$v['photoUrl'],//图片的原网站url
                'shop_id'=>$v['shopId'],//原网站的房源id
                'file_name' => $v['fileName'],//图片的存储名称
                'type' => $v['type'],//type
            ];
            $data['shopline_id'] =  $this->shopline_id($v['shopId']);
//            $i = $ShoplinePhoto->addData($ShoplinePhoto,$data);
            $i = $ShoplinePhoto::insert($data);
            if($i){
                echo 'success';
            }else{
                echo 'error';
            }

        }
        return ['status' => 'success', 'message' => '操作成功！', 'status_code' => '200', 'result' => $result];
    }

    public function Lepu_image($start){
//        $page = $_GET['page'];
//        if(!$page){
//            return 123;
//        }
        $shoplineModel = new ShopLine();
        $id = '';
        $n_id = '';
        $shop = $shoplineModel::where('ben',0)->offset($start)->limit(50)->get();
        foreach($shop as $data){
            if(!$data->our_image) {
                $data->photo = trim($data->photo);
                $photos = explode(",", $data->photo);
                $photo = '';
                foreach ($photos as $kk => $v) {
                    $filename = ImageDown::grabImage($v, $data->_id . $kk . '.png');
                    $photo .= 'assets/frontend/index/web/shopimage/shopline/' . $filename . ',';
                }
                $photo = rtrim($photo, ',');
                $save['our_image'] = $photo;
                $save['ben'] = 1;
                $shoplineModel::updateData($shoplineModel, $data->id, $save);
                $id .= $data->id.',';
            }else{
                $n_id .= $data->id.',';
            }

        }
        echo '跑了'.$id;
        echo '<br>';
        echo '没跑'.$n_id;
    }

    public function Lepu_image_1(){
        $this->Lepu_image(0);
    }

    public function Lepu_image_2(){
        $this->Lepu_image(30);
    }

    public function Lepu_image_3(){
        $this->Lepu_image(60);
    }

    public function Lepu_image_4(){
        $this->Lepu_image(90);
    }

    public function Lepu_image_5(){
        $this->Lepu_image(120);
    }

    public function Lepu_image_6(){
        $this->Lepu_image(150);
    }

    public function Lepu_image_7(){
        $this->Lepu_image(180);
    }

    public function Lepu_image_8(){
        $this->Lepu_image(210);
    }
    public function Lepu_image_9(){
        $this->Lepu_image(240);
    }

    public function Lepu_image_10(){
        $this->Lepu_image(270);
    }

    public function Lepu_image_11(){
        $this->Lepu_image(300);
    }

    public function Lepu_image_12(){
        $this->Lepu_image(330);
    }

    public function Lepu_image_13(){
        $this->Lepu_image(360);
    }

    public function Lepu_image_14(){
        $this->Lepu_image(390);
    }

    public function Lepu_image_15(){
        $this->Lepu_image(420);
    }

    public function Lepu_image_16(){
        $this->Lepu_image(450);
    }

    public function Lepu_image_17(){
        $this->Lepu_image(480);
    }

    public function Lepu_image_18(){
        $this->Lepu_image(510);
    }
    public function Lepu_image_19(){
        $this->Lepu_image(540);
    }

    public function Lepu_image_20(){
        $this->Lepu_image(570);
    }


}