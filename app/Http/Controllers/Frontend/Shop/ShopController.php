<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Controllers\Controller;
use App\Library\Pagination;
use Cookie;
use Log;
use Search;
use Elasticsearch;
use Elasticsearch\ClientBuilder;

class ShopController extends Controller
{
    public function index(Request $request)
    {
//        暂时先写死, 用户ID为3，之后改为从session读取, 目前代码只是在前台展示数据
        $users_id = 3;
        $data = Shop::getShopDataByUserId($users_id);
        echo '商铺数据展示：';
        echo '<br>';
        echo '<pre>';
        print_r($data);
    }

    public function create()
    {
        return view('Frontend.Shop.create');
    }

    public function store(Request $request){
        $result = ['status' => false, 'message' => '保存失败!'];
        $question = new Shop();
        $id = $request->get('id',null);
        $question->shop_name = $request->get('shop_name');
        $question->village = $request->get('village');
        $question->status = 5;

//        目前，改模块尚未跟前台登录关联，关联后，直接读取users_id，暂时先写死 users_id = 3
        $question->users_id = 3;
//        好平率应跟客户评价关联，目前先默认写死为50%
        $question->rate = 50;


        if(null == $id){
            $data['created_at'] = $request->get('created_at');
            if ($question->save()) {
                //dispatch(new AddCategory($question->id));
                $result = ['status' => true, 'message' => '保存成功!'];
            }
            return response()->json($result);
        }else{
            $data['name'] = $request->get('name');
            $data['price'] = $request->get('price');
            $data['content'] = $request->get('content');
            $data['updated_at'] = $request->get('updated_at');
            $data['status'] = 5;
            $res= Shop::updateData($id,$data);
            if ($res) {
                $result = ['status' => true, 'message' => '保存成功!'];
            }
            return response()->json($result);
        }
    }

}
