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

class WxLoginController extends FrontendController
{
    /**
     * 微信登录
     * @param Request $request
     */
    /*public function login(Request $request)
    {
        $APPID = 'wx973d59ef6e30eddb';
        $REDIRECT_URI = UrlEncode('https://www.xuanpu100.com/wechat/account/register/');
        $url = "https://open.weixin.qq.com/connect/qrconnect?appid=$APPID&redirect_uri=$REDIRECT_URI&response_type=code&scope=snsapi_login&state=4a9ae8734433cd11ae612e148b5009db#wechat_redirect";
        dd($url);
    }*/
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
    public function wxlogin(){
        $url = "https://open.weixin.qq.com/connect/qrconnect?appid=wx973d59ef6e30eddb&redirect_uri=www.xuanpu100.com/%2Fwechat%2Faccount%2Fregister&response_type=code&scope=snsapi_login&state=STATE#wechat_redirect";
        $il = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx973d59ef6e30eddb&redirect_uri=http%3A%2F%2Fwww.xuanpu100.com%2Fwechat%2Faccount%2Fregister&response_type=code&scope=snsapi_login&state=7d491f800ce67f44a5bc97ef26cbb536&connect_redirect=1#wechat_redirect';
    }
}