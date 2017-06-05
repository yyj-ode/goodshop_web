<?php

namespace App\Http\Controllers\Frontend\Wechat;

use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use EasyWeChat\Foundation\Application;

class WechatController extends FrontendController
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve(Request $request)
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            return "欢迎关注 overtrue！";
        });

        Log::info('return response.');

        return $wechat->server->serve();
    }

}
