<?php
/**
 * Created by PhpStorm.
 * User: yangcuiwang
 * Date: 2017/4/27
 * Time: 下午3:43
 */

namespace App\Utils;
use EasyWeChat\Foundation\Application;
use EasyWeChat;

class WechatUtils
{
    private static $server;
    private  static $app;

    function __construct()
    {
//        $options = [];
        $this->app = new Application();
        $this->server = $this->server;
    }

    /**
     * 获取微信登录信息
     * @return array
     */
    public static function getUserData()
    {
        $user_data = [];
        $user = session('wechat.oauth_user');
        if ($user && isset($user['id']) && !empty($user['id'])) {
            $user_data = ['openid'=>$user->id,'name'=>$user->name,'nickname'=>$user->nickname,'avatar'=>$user->avatar];
        }
        return $user_data;
    }


}