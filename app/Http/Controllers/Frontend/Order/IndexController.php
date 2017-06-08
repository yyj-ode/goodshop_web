<?php

namespace App\Http\Controllers\Frontend\Order;


use App\Models\Banner;
use App\Models\Format;
use App\Store\SurroundNumStore;
use App\Models\Area;
use App\Models\BannerSort;
use App\Models\Order;
use App\Models\DiseaseCategory;
use App\Store\ShopLine;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use Response;
use Cookie;
use Session;
use Uuid;
use Validator;
use App\Library\CreateQueueAndSendMessage;

/**
 * Class IndexController
 * @package App\Http\Controllers\Frontend\Index
 */
class IndexController extends FrontendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //判断是否登录，没登录则跳转到首页
        $user_login=$this->check_user();
        if(!$user_login){
            return redirect('/');
        }

        //配置页码信息
        $current_page = intval($request->get('page',1));
        if($current_page<1){
            $current_page = 1;
        }
        $offset = ($current_page - 1) * 6;

        //获取用户id
        $user_info = session('USER_DATA');
        $user_id = $user_info['id'];

        //获取勘察状态
        $status = $this->status();

        //查询订阅数据（带分页）
//            $user_order = Order::userOrder($user_id);
        $user_order_2 = Order::getAllOrderDataById($user_id,$offset);

        //把结果集中的店铺信息列表部分，分装为$data数组
        $data = [];
        foreach($user_order_2['result'] as $k => $v){
            $data[$k] = $v['shopline'];
            $data[$k]['order_status'] = $v['status'];
        }

        //计算总页数
        $pages = intval(ceil($user_order_2['count']/6));

        //为店铺列表信息部分添加程序和商圈信息
        foreach($data as $k => $v){
            $city = Area::where('id',$data[$k]['city'])->first();
            $data[$k]['city'] = $city['name'];
            $county = Area::where('id',$data[$k]['county'])->first();
            $data[$k]['county'] = $county['name'];
        }

        //添加头部订阅信息
        $subscribe = $this->subscribe(); //订阅

        //把页码信息封装为数组$pages_show
        $pages_show = $this->showpage($current_page,$pages);

        //配置下一页和上一页的信息
        $next_page = $current_page + 1;
        if($next_page > $pages){
            $next_page = $pages;
        }
        $last_page = $current_page - 1;
        if($last_page < 1){
            $last_page = 1;
        }

        //查询周边建筑
        foreach($data as $k => $v){
            $kilometer = 1;//距离该店铺周边多少千米范围内
            $longitude = floatval($v['longitude']);//为确保不报错，经纬度强转为浮点数
            $latitude = floatval($v['latitude']);//为确保不报错，经纬度强转为浮点数
            $data[$k]['officebuilding_num'] = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
            $data[$k]['village_num'] = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
            $data[$k]['shoppingcenter_num'] = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
            $data[$k]['shopsurrounding_num'] = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);
        }

        foreach ($data as $k=>$v){
            $data[$k]['order_status'] = $status[$v['order_status']];
        }

//        dd($data);
        if ($this->is_mobile() == true) {
//            //判断是否登录，没登录则跳转到首页
//            $user_login=$this->check_user();
//            if(!$user_login){
//                return redirect('/');
//            }
//            //获取用户id
//            $user_info = session('USER_DATA');
//            $user_id = $user_info['id'];
//
//            //获取勘察状态
//            $status = $this->status();
//            $data = ShopLine::orderBy('id', 'desc')->skip(0)->take(12)->get()->toArray();
//            foreach ($data as $k=>$v){
//                $data[$k]['location'] = msubstr($v['location'],0,17);
//
//                $format_type  = Format::where('id',$v['business_type'])->first();
//                $data[$k]['business_type'] = $format_type['name'];
//                $kilometer = 1;//距离该店铺周边多少千米范围内
//                $longitude = floatval($v['longitude']);//为确保不报错，经纬度强转为浮点数
//                $latitude = floatval($v['latitude']);//为确保不报错，经纬度强转为浮点数
//                $data[$k]['officebuilding_num'] = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
//                $data[$k]['village_num'] = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
//                $data[$k]['shoppingcenter_num'] = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
//                $data[$k]['shopsurrounding_num'] = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);
//                $data[$k]['city_county'] = $this->city_county($v['city'],$v['county']);
//            }


            return view('Frontend.Index.CN.Wap.Order.index',compact('user_order','status','user_login','subscribe','data','pages_show','next_page','last_page','current_page'));

//            return view('Frontend.Index.CN.Wap.Order.index',compact('data'));
        } else {


            return view('Frontend.Index.CN.Web.Order.index',compact('user_order','status','user_login','subscribe','data','pages_show','next_page','last_page','current_page'));
        }
    }

    /**
     * 点击更多加载
     */
    public function moredata(Request $request)
    {
        //接收从前台传过来的数据
        $offset = $request->get('start',0);
        $offset = intval($offset);
        //获取用户id
        $user_info = session('USER_DATA');
        $user_id = $user_info['id'];

        //获取勘察状态
        $status = $this->status();

        //查询订阅数据（带分页）
        $user_order_2 = Order::getAllOrderDataById($user_id,$offset);

        //把结果集中的店铺信息列表部分，分装为$data数组
        $data = [];
        foreach($user_order_2['result'] as $k => $v){
            $data[$k] = $v['shopline'];
            $data[$k]['order_status'] = $v['status'];
        }

        //为店铺列表信息部分添加程序和商圈信息,处理图片信息，和添加收藏时间
        foreach($data as $k => $v){
            $city = Area::where('id',$data[$k]['city'])->first();
            $data[$k]['city'] = $city['name'];
            $county = Area::where('id',$data[$k]['county'])->first();
            $data[$k]['county'] = $county['name'];
            $data[$k]['our_image'] = asset(strExplode($v['our_image']));
            $data[$k]['created_at'] = timeShow($v['created_at']);
        }

        //查询周边建筑
        foreach($data as $k => $v){
            $kilometer = 1;//距离该店铺周边多少千米范围内
            $longitude = floatval($v['longitude']);//为确保不报错，经纬度强转为浮点数
            $latitude = floatval($v['latitude']);//为确保不报错，经纬度强转为浮点数
            $data[$k]['officebuilding_num'] = SurroundNumStore::getSurroundOfficeBuildingNum($longitude,$latitude,$kilometer);
            $data[$k]['village_num'] = SurroundNumStore::getSurroundVillageNum($longitude,$latitude,$kilometer);
            $data[$k]['shoppingcenter_num'] = SurroundNumStore::getSurroundShoppingCentergNum($longitude,$latitude,$kilometer);
            $data[$k]['shopsurrounding_num'] = SurroundNumStore::getSurroundShopNum($longitude,$latitude,$kilometer);
        }

        foreach ($data as $k=>$v){
            $data[$k]['order_status'] = $status[$v['order_status']];
        }


        return response()->json($data);
    }

    /**
     * 状态
     */
    public function status(){
        $status['1'] = '已申请勘察服务';
        $status['2'] = '已完成';
        $status['5'] = '待支付';
        return $status;
    }

    /**
     * 返回一个数组，装有分页用的数据
     * @param $current_page
     * @param $pages
     * @return int
     */
    public function showpage($current_page,$pages){
        $data = [];
//        $pages = 10;
//        $current_page = 1;
        if($pages <= 5){
            for($i=1;$i<=$pages;$i++){
                $data[] = $i;
            }
        }else{
            if(($current_page >= 1) && ($current_page <= 3)){
                $data = [1,2,3,4,'...',$pages];
            }elseif(($current_page > 3) && ($current_page < $pages - 2) ){
                $data = [1,'...',$current_page-1,$current_page,$current_page+1,'...',$pages];
            }elseif(($current_page >= $pages - 2) && ($current_page <= $pages)){
                $data = [1,'...',$pages-3,$pages-2,$pages-1,$pages];
            }else{
                $data = [1];
            }
        }
//        dd($data);
        return $data;
    }


}