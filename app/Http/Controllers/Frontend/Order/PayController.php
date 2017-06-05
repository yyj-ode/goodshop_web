<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Models\Area;
use App\Models\Format;
use App\Models\Banner;
use App\Models\Order;
use App\Models\BannerSort;
use App\Models\DiseaseCategory;
use App\Models\ShopLine;
use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use Session;
use Response;
use Cookie;
use Uuid;
use Validator;
use App\WxPaypubconfig;
use App\WxPayPubHelper;
use App\SDKRuntimeException;
use App\Library\CreateQueueAndSendMessage;

/**
 * Class IndexController
 * @package App\Http\Controllers\Frontend\Index
 */
class PayController extends FrontendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //===================================
    private $wxpayConfig;
    private $wxpay;
    public function __construct(){
       // require('../app/Library/WxPayPubHelper/WxPayPubHelper.php');

        header("Content-type: text/html; charset=utf-8");
        require('../app/Library/Wxpay/jsapi/WxPaypubconfig.php');
        require('../app/Library/Wxpay/jsapi/WxPayPubHelper.php');
        $this->wxpayConfig = array(
            'SSLCERT_PATH' => '/app/Library/Vendor/Wxpay/jsapi/cacert/apiclient_cert.pem',        // 证书路径,注意应该填写绝对路径
            'SSLKEY_PATH' => '/app/Library/Vendor/Wxpay/jsapi/cacert/apiclient_key.pem',          // 证书路径,注意应该填写绝对路径
            'CURL_TIMEOUT' => 30,
            'NOTIFYURL' =>'http://web.nndeal.app/index.php/Home/order/bxxy_notify/'
        );
        $this->wxpayConfig['APPID'] = 'wx29c4db473ac5eee7';      // 微信公众号身份的唯一标识
        $this->wxpayConfig['APPSECRET'] = 'bb5895a3097988954e6c638005386e70'; // JSAPI接口中获取openid
        $this->wxpayConfig['MCHID'] ='1366037102';     // 受理商ID
        $this->wxpayConfig['SKEY'] = 'tilifangtilifangtilifangtilifang';

        // 商户支付密钥Key
        $this->wxpayConfig['js_api_call_url'] = $this->get_url();
        // 初始化WxPayConf_pub
        $wxpaypubconfig = new \WxPayConf_pub($this->wxpayConfig);
    }
    private function get_url() {
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : $path_info);
        return $sys_protocal . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') . $relate_url;
    }
    public function createQrcode()
    {
        //使用统一支付接口
        $unifiedOrder = new \UnifiedOrder_pub();
        $unifiedOrder->setParameter("body",'1');//商品描述
        $out_trade_no = time(); //自定义订单号，此处仅作举例
        $unifiedOrder->setParameter("out_trade_no","$out_trade_no");//商户订单号
        $unifiedOrder->setParameter("total_fee",1);//总金额
        $url='http://web.nndeal.app/index.php/Home/order/notify/';
        $unifiedOrder->setParameter("notify_url",$url);//通知地址
        $unifiedOrder->setParameter("trade_type","NATIVE");//交易类型
        //非必填参数，商户可根据实际情况选填

        //获取统一支付接口结果
        $unifiedOrderResult = $unifiedOrder->getResult();
        //商户根据实际情况设置相应的处理流程
        if ($unifiedOrderResult["return_code"] == "FAIL")
        {
            //商户自行增加处理流程
            echo "通信出错：".$unifiedOrderResult['return_msg']."<br>";
        }
        elseif($unifiedOrderResult["result_code"] == "FAIL")
        {
            //商户自行增加处理流程
            /*echo "错误代码：".$unifiedOrderResult['err_code']."<br>";
            echo "错误代码描述：".$unifiedOrderResult['err_code_des']."<br>";*/
            echo '该订单已支付';
        }
        elseif($unifiedOrderResult["code_url"] != NULL)
        {
            //从统一支付接口获取到code_url
            $code_url = $unifiedOrderResult["code_url"];
            //商户自行增加处理流程
            //......
        }

        return view('Frontend.Index.CN.Web.Order.qrcode',compact('out_trade_no','code_url','unifiedOrderResult'));
    }

    public function pay()
    {
        //判断是否登录
        $user_login=$this->check_user();
        if(!$user_login){
            $data['static'] = 100;  // 用户没有登录
            $data['message'] = '请您先登录';  // 成功
            return response()->json($data);
        }
        //订单入库
        $shop_id = Session::get('session_detail_id');
        if(!$shop_id){
            $data['static'] = 400;  // 用户没有登录
            $data['message'] = '您勘查的商铺不存在';  // 成功
            return response()->json($data);
        }
        $shop = ShopLine::where('id',$shop_id)->first();
        if(!$shop){
            $data['static'] = 400;  // 用户没有登录
            $data['message'] = '您勘查的商铺不存在';  // 成功
            return response()->json($data);
        }
        $order = new Order;
        //获取用户id
        $price = 100; //金钱
        $user_info = session('USER_DATA');
        $order->user_id = $user_info['id'];
        $order->goods_name = '勘察服务';
        $order->shop_id = $shop['id'];
        $order->total = $price;
        $order->price = $price;
        $order->status = 5; //待支付
        if(!$order->save()){
            $data['static'] = 300;  // 用户没有登录
            $data['message'] = '生成二维码失败';
            return response()->json($data);
        }
        //保存订单编号
        $id = $order->id;
        $order_up = Order::where('id',$id)->first();
        $order_number = time().$order_up['id'];
        $order_up->order_number = $order_number;
        $order_up->save();

        //使用统一支付接口
        $unifiedOrder = new \UnifiedOrder_pub();
        $unifiedOrder->setParameter("body",'勘察服务');//商品描述
        $out_trade_no = $order_number; //自定义订单号，此处仅作举例
        $unifiedOrder->setParameter("out_trade_no","$out_trade_no");//商户订单号
        $unifiedOrder->setParameter("total_fee",$price*100);//总金额
        $url='http://web.nndeal.app/index.php/Home/order/notify/';
        $unifiedOrder->setParameter("notify_url",$url);//通知地址
        $unifiedOrder->setParameter("trade_type","NATIVE");//交易类型
        //非必填参数，商户可根据实际情况选填

        //获取统一支付接口结果
        $unifiedOrderResult = $unifiedOrder->getResult();
        //商户根据实际情况设置相应的处理流程
        if ($unifiedOrderResult["return_code"] == "FAIL")
        {
            //商户自行增加处理流程
            echo "通信出错：".$unifiedOrderResult['return_msg']."<br>";
        }
        elseif($unifiedOrderResult["result_code"] == "FAIL")
        {
            //商户自行增加处理流程
            /*echo "错误代码：".$unifiedOrderResult['err_code']."<br>";
            echo "错误代码描述：".$unifiedOrderResult['err_code_des']."<br>";*/
            echo '该订单已支付';
        }
        elseif($unifiedOrderResult["code_url"] != NULL)
        {
            //从统一支付接口获取到code_url
            $code_url = $unifiedOrderResult["code_url"];
            //商户自行增加处理流程
            //......
        }

        $data['out_trade_no'] = $out_trade_no;
        $data['code_url'] = $code_url;
        $data['unifiedOrderResult'] = $unifiedOrderResult;
        if($data['code_url']){
            $data['id'] = $id;  // 成功
            $data['static'] = 200;  // 成功
            $data['message'] = '成功';  // 成功
        }else{
            $data['static'] = 300;  //生成二维码失败;
            $data['message'] = '生成二维码失败';  //生成二维码失败;
        }


        return response()->json($data);
    }


    public function notify()
    {
        //使用通用通知接口
        $notify = new \Notify_pub();
        //存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $notify->saveData($xml);
        //验证签名，并回应微信。
        //对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
        //微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
        //尽可能提高通知的成功率，但微信不保证通知最终能成功。
        if($notify->checkSign() == FALSE){
            $notify->setReturnParameter("return_code","FAIL");//返回状态码
            $notify->setReturnParameter("return_msg","签名失败");//返回信息
        }else{
            $notify->setReturnParameter("return_code","SUCCESS");//设置返回码
        }
        $returnXml = $notify->returnXml();
        echo $returnXml;
        //==商户根据实际情况设置相应的处理流程，此处仅作举例=======
        //以log文件形式记录回调信息
        //         $log_ = new Log_();
        if($notify->checkSign() == TRUE)
        {
            if ($notify->data["return_code"] == "FAIL") {
                //此处应该更新一下订单状态，商户自行增删操作
                // log_result($log_name,"【通信出错】:\n".$xml."\n");
            }
            elseif($notify->data["result_code"] == "FAIL"){
                //此处应该更新一下订单状态，商户自行增删操作
                //  log_result($log_name,"【业务出错】:\n".$xml."\n");
            }
            else{
                    $order = new Order();
                    $data['user_id'] =1;
                    Order::addData($order,$data);
            }
            //商户自行增加处理流程,
            //例如：更新订单状态
            //例如：数据库操作
            //例如：推送支付完成信息
        }
    }
    public function check_pay(Request $request){
        $id = $request->get('id');
        if($id){
            $res =  Order::where('id',$id)->first();
            if($res['status'] == 1){  //支付成功
                $data['static']  = 200;
                $data['message']  = '支付成功';
                return response()->json($data);
            }
        }
        $data['static']  = 400;
        $data['message']  = '待支付';
        $data['id']  = $id;
        return response()->json($data);
    }

    public function success()
    {
        //判断是否登录，没登录则跳转到首页
        $user_login=$this->check_user();
        if(!$user_login){
            return redirect('/');
        }


        $subscribe = $this->subscribe(); //订阅
        return view('Frontend.Index.CN.Web.Order.success',compact('subscribe','user_login'));
    }

}