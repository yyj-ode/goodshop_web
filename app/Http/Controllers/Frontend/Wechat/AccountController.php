<?php

namespace App\Http\Controllers\Frontend\Wechat;

use App\Models\User;
use Log;
use PhpParser\Node\Stmt\UseUse;
use URL;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;

use App\Utils\WechatUtils;
use EasyWeChat\Foundation\Application;
use App\Utils\Wechat;

class AccountController extends FrontendController
{
    /**
     * 微信登录
     * @param Request $request
     */
    public function login(Request $request)
    {
        $config = [
            'app_id' => env('WECHAT_APPID'),
            'secret' => env('WECHAT_SECRET'),
            'oauth' => [
                /*'scopes' => ['snsapi_login'],*/
                'scopes' => ['snsapi_userinfo'],
                'callback' => url('wechat/account/register'),
            ],
        ];
       /* $i = 'nndealnndealnndealnndealnndeal00';*/
        $app = new Application($config);
        $oauth = $app->oauth;
        return $oauth->redirect();
    }


    /**
     * 微信注册 实现登录
     * @param Request $request
     */
    public function register(Request $request)
    {
        //获取微信用户的基本信息
        $result = Wechat::getBase();
        $param = ['wechat_openid' => $result['openId']];
        if (!empty($result)) {
            $checkOpenId = User::checkData($param);
            if ($checkOpenId == false) {
                $addData = [
                    'wechat_openid' => $result['openId'],
                    'nickname' => $result['nickname'],
                    'name' => $result['name'],
                    'email' => $result['email'],
                    'avatar' => $result['avatar'],
                    'province' => $result['original']['province'],
                    'city' => $result['original']['city'],
                    'sex' => $result['original']['sex'],
                ];
                User::addData($addData);
            }
        }

        if (Session::exists('USER_DATA')) {
            $userData = User::getOneData($param);
            $result = ['id' => $userData->id, 'name' => $userData->name, 'email' => $userData->email];
            Session::put('USER_DATA', $result);
        }

        if (Session::exists('REDIRECT_BACK')) {
            return Session::get('REDIRECT_BACK');
        } else {
            /* return redirect('wechat/account/index');*/
            return redirect('/');
        }
    }

    public function index(Request $request)
    {
        $options = [
            'app_id' => env('WECHAT_APPID'),
            'secret' => env('WECHAT_SECRET'),
        ];
        $app = new Application($options);
        $menu = $app->menu;
        $menu->destroy(); // 全部

        // var_dump(Session::get('WECHAT_OPENID'));die();

        $buttons = [
            [
                "type" => "click",
                "name" => "今日歌曲",
                "key" => "V1001_TODAY_MUSIC"
            ],
            [
                "name" => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url" => "http://www.nndeal.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url" => "http://www.nndeal.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
            [
                "name" => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url" => "http://www.nndeal.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url" => "http://www.nndeal.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];
        Wechat::setMenu($buttons);
    }

    public function notise()
    {
        /**
         * $userId = 'obnims7gch-zdGpm-xvq3DzngVKQ';
         * $templateId = '-DZ3nL_TN0yvZDIZIiqlFjM-YRSZgfadAk_Ymh5wqKA';
         * $url = 'http://www.nndeal.com';
         * $data = array(
         * "first" => "员工加入通知",
         * "keyword1" => "杨翠旺",
         * "keyword2" => "云循信息",
         * "remark" => "此消息由微信系统发出，请勿回复。",
         * );
         *
         * $data = Wechat::sendMsg($userId, $templateId, $data, $url);
         * var_dump($data);
         * die();
         **/
    }

    //以下部分为元永健写的测试代码，没有用就全删掉
    public function wxlogin(){
        $url = "https://open.weixin.qq.com/connect/qrconnect?appid=wx973d59ef6e30eddb&redirect_uri=http%3A%2F%2Fwww.xuanpu100.com%2Faccount%2Fwxcode&response_type=code&scope=snsapi_login&state=STATE#wechat_redirect";
        Header("location:$url");
    }

    public function wxcode(){
        $code = $_GET['code'];
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx973d59ef6e30eddb&secret=9b6634d0ab657fd606f0f9333e69da78&code=$code&grant_type=authorization_code";
        $get_token_url = $url;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$get_token_url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $res = curl_exec($ch);
        curl_close($ch);
        $json_obj = json_decode($res,true);
        $access_token = $json_obj['access_token'];
        $openid = $json_obj['openid'];
        $url2 = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url2);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $res = curl_exec($ch);
        curl_close($ch);
        $userinfo = json_decode($res,true);
//        dd($userinfo);
        $param = ['wechat_openid' => $userinfo['openid']];
        if (!empty($userinfo)) {
            $checkOpenId = User::checkData($param);
            if ($checkOpenId == false) {
                $addData = [
                    'wechat_openid' => $userinfo['openid'],
                    'nickname' => $userinfo['nickname'],
                    'name' => $userinfo['nickname'],
                    'avatar' => $userinfo['headimgurl'],
                    'province' => $userinfo['province'],
                    'city' => $userinfo['city'],
                    'sex' => $userinfo['sex'],
                ];
                User::addData($addData);
            }

            $userData = User::getOneData($param);
            $result = ['id' => $userData->id, 'name' => $userData->name];
            Session::put('USER_DATA', $result);


            if (Session::exists('REDIRECT_BACK')) {
                return Session::get('REDIRECT_BACK');
            } else {
                /* return redirect('wechat/account/index');*/
                return redirect('/');
            }
        }

    }
}