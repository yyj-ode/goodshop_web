<?php

namespace App\Http\Controllers\Frontend\Collection;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($this->is_mobile() == true) {

            return view('Frontend.Index.CN.Wap.Collection.index');
        } else {
            //判断是否登录，没登录则跳转到首页
            $user_login = $this->check_user();
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

            //查询收藏数据（带分页）
            $model = new Collection();
            $collect = $model::getAllCollectionDataById($user_id,$offset);

            //把结果集中的店铺信息列表部分，分装为$data数组
            $data = [];
            foreach($collect['result'] as $k => $v){
                $data[] = $v['shopline'];
            }

            //计算总页数
            $pages = intval(ceil($collect['count']/6));

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

            return view('Frontend.Index.CN.Web.Collection.index',compact('data','pages_show','subscribe','next_page','last_page','user_login','current_page'));
        }
    }

    /**
     * 点击更多加载
     */
    public function moredata(Request $request)
    {
        $start = 6;//接收从前台传过来的数据
        $start += 6;
        $data = ShopInformation::orderBy('_id', 'desc')->skip($start)->take(6)->get();
//        dd($data);
        return response()->json($data);
    }

    /**
     * 点击添加收藏
     */
    public function create(Request $request)
    {
       $shopline_id = $request->get('id',null);
        $user_login = $this->check_user();
        if($user_login){
            $users_id = session('USER_DATA')['id'];
//            dd($users_id);
            $collectionModel = new Collection();
            $data['users_id'] = $users_id;
            $data['shopline_id'] = intval($shopline_id);
            $exist = $collectionModel::where('shopline_id','=',$shopline_id)->where('users_id','=',$users_id)->first();
            if($exist){
                $exist = $collectionModel::where('shopline_id','=',$shopline_id)->where('users_id','=',$users_id)->first()->toArray();
                $collectionModel::where('id','=',$exist['id'])->delete();
                return response()->json('取消收藏');
            }
            $res = $collectionModel::addData($collectionModel,$data);
            if($res){
                return response()->json('收藏成功');

            }else{
                return response()->json('收藏失败');

            }
        }else{
            return response()->json('您尚未登录');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 取消收藏
     */
    public function delete(Request $request)
    {
        $shopline_id = $request->get('id',null);
        $user_info = session('USER_DATA');
        $users_id = $user_info['id'];
        $collectionModel = new Collection();
        $if_exist = Collection::where('users_id','=',$users_id)->where('shopline_id','=',$shopline_id)->first();
        if($if_exist == null){
            $data = ['shopline_id' => $shopline_id,'users_id' => $users_id];
            $res = Collection::addData($collectionModel,$data);
            if($res){
                $result = '收藏成功';
                return response()->json($result);
            }else{
                $result = '收藏失败';
                return response()->json($result);
            }
        }else{
            $res = Collection::where('users_id','=',$users_id)->where('shopline_id','=',$shopline_id)->delete();
            if($res){
                $result = '取消收藏成功';
                return response()->json($result);
            }else{
                $result = '取消收藏失败';
                return response()->json($result);
            }
        }
    }

    public function protocal()
    {
        return view('Frontend.Index.CN.Web.Index.protocal');
    }

    public function demo()
    {
        $mode = new Dazhongdianping();
        $data = ['_id'=>'590aef7884b48d7af1a97d7c'];
        $data = $mode::getOneData($mode,$data);

        var_dump($data);die();
    }

    public function area($value){
        $county = Area::where('name','like','%'.$value.'%')->first();
        $city = Area::where('id',$county->parent_id)->first();
        $province = Area::where('id',$city->parent_id)->first();

        $data['county'] = $county->id;
        $data['city'] = $city->id;
        $data['province'] = $province->id;
        return $data;
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