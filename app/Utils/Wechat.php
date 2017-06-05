<?php
/**
 * Created by PhpStorm.
 * User: yangcuiwang
 * Date: 2017/4/27
 * Time: 下午6:20
 */

namespace App\Utils;

use Log;
use Illuminate\Database\QueryException;
use EasyWeChat\Foundation\Application;

use EasyWeChat\Payment\Order;
use EasyWeChat\Message\Text;
use EasyWeChat\Message\Image;
use EasyWeChat\Message\Video;
use EasyWeChat\Message\Voice;
use EasyWeChat\Message\News;
use EasyWeChat\Message\Article;
use EasyWeChat\Message\Material;


class Wechat
{
    //{{first.DATA}}
    //项目名称：{{keyword1.DATA}}
    //投资金额：{{keyword2.DATA}}
    //{{remark.DATA}}
    const INVESTED = 'mKywj0xCAIbtwgXDD8mBlBLoX0CDtARNKI4gemKnb_Q';

    /**
     *  您好，您的项目已成功上线
     * 项目名称：沙先生做生意需要资金周转
     * 年化收益率：12%
     * 项目期限：1个月
     * 还款方式：等额本息
     * 如有疑问，请拨打客服热线或直接输入您的问题，我们会尽快给你回复
     * @param        $openid
     * @param        $project
     * @param        $url
     * @param string $first
     * @param string $remark
     * @return object
     */
    public static function sendProjectReady($openid, $project, $url, $first = '', $remark = '')
    {
        $data = [
            "first" => ["value" => $first . "\n", "color" => "#cccccc"],
            "keyword1" => $project['name'],
            "keyword2" => $project['year_rate'],
            "keyword3" => $project['duration'],
            "keyword4" => $project['repay_way'],
            "remark" => ["value" => "\n" . $remark, "color" => "#cccccc"]
        ];

        return self::sendMsg($openid, self::PROJECT_READY, $data, $url);
    }

    public static function sendRedEnvelop($openid, $data)
    {
        return self::sendMsg($openid, self::LUCK_MONEY, $data);
    }

    public static function sendAccount($openid, $account)
    {
    }

    public static function sendLottery($openid, $money, $url)
    {
        $data = [
            "num" => ["value" => $money]
        ];

        return self::sendMsg($openid, self::LOTTERY, $data, $url);
    }

    public static function sendTextMsg($openid, $content)
    {
        try {
            $message = new Text(['content' => $content]);
            $result = app('wechat')->staff->message($message)->to($openid)->send();
            Log::info('SendWechatTextMsgResult:' . json_encode($result));
            return $result;
        } catch (\Exception $e) {
            Log::error('SendWxTextMsgError:' . json_encode($e));
        }
    }

    /**
     * @param $openid 用户微信公众号ID
     * @param $template 消息模板 可使用Wechat静态常量
     * @param $data 模板数据JSON字符串 具体见模板说明
     * @param $url 模板详情URL
     * @return object
     */
    public static function sendMsg($openid, $template, $data, $url = '')
    {
        if (array_key_exists('url', $data)) {
            $url = $data['url'];
        }

        try {
            $messageData = [
                'template_id' => $template,
                'touser' => $openid,
                'url' => $url,
                'data' => $data,
            ];

            $config = [
                'app_id' => env('WECHAT_APPID'),
                'secret' => env('WECHAT_SECRET'),
            ];
            $app = new Application($config);
            $notice = $app->notice;
            $messageId = $notice->send($messageData);
            Log::info("WechatMessageId:" . $messageId);
            return true;
        } catch (\Exception $ex) {
            Log::error('WechatLogError:' . $ex->getMessage());
            return false;
        }

    }

    public static function getProjectShare($project)
    {
        $user = Auth::user();
        $url = route('wechat.project_detail', $project->eid);
        $link = $user ? $url . '?refer=' . Utils::hashidEncode($user->id) : $url;
        $img = $project->video_cover ? 'http://cdn.nndeal.com/' . $project->video_cover : 'http://cdn.nndeal.com/logo.png';
        if (!$project->intro) {
            $project->intro = 'nndeal';
        }
        $title = $project->name . ' 年化收益率' . ($project->rate() * 100) . '%';
        return self::getShareData($title, $project->intro, $link, $title . '『政府监管,国资背景,值得信赖』', $img);
    }


    /**
     * 微信页面分享属性
     * @param $title 标题
     * @param $desc 描述
     * @param $imgUrl 缩略图
     * @param $link 链接地址
     * @param $titleOfTimeline 分享到朋友圈的标题
     * @return array
     */
    public static function getShareData($title, $desc, $link, $titleOfTimeline, $imgUrl = 'http://cnd.nndeal.com/logo.png')
    {
        return [
            'title' => $title,
            'desc' => $desc,
            'imgUrl' => $imgUrl,
            'link' => $link,
            'titleOfTimeline' => $titleOfTimeline
        ];
    }


    public function addOrder()
    {
        $attributes = [
            'trade_type' => 'JSAPI', // JSAPI，NATIVE，APP...
            'body' => 'iPad mini 16G 白色',
            'detail' => 'iPad mini 16G 白色',
            'out_trade_no' => '1217752501201407033233368018',
            'total_fee' => 5388, // 单位：分
            'notify_url' => 'http://xxx.com/order-notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid' => '当前用户的 openid', // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
        ];
        $order = new Order($attributes);
    }

    public function sendMessage($msgType)
    {
        $config = [
            'app_id' => env('WECHAT_APPID'),
            'secret' => env('WECHAT_SECRET'),
        ];
        $app = new Application($config);
        // 从项目实例中得到服务端应用实例。
        $server = $app->server;
        $message = $server->getMessage();
        $message->ToUserName;               //接收方帐号（该公众号 ID）
        $message->FromUserName;             //发送方帐号（OpenID, 代表用户的唯一标识）
        $message->CreateTime;               //消息创建时间（时间戳）
        $message->MsgId;                    //消息 ID（64位整型）

        switch ($msgType) {
            case 'event':                   //return '收到事件消息';

                $message->MsgType;          //event
                $message->Event;            //事件类型 （如：subscribe(订阅)、unsubscribe(取消订阅) ...， CLICK 等）

                //扫描带参数二维码事件
                $message->EventKey;         //事件KEY值，比如：qrscene_123123，qrscene_为前缀，后面为二维码的参数值
                $message->Ticket;           //二维码的 ticket，可用来换取二维码图片

                //上报地理位置事件
                $message->Latitude;         //23.137466   地理位置纬度
                $message->Longitude;        //113.352425  地理位置经度
                $message->Precision;        //119.385040  地理位置精度

                //自定义菜单事件
                $message->EventKey;         //事件KEY值，与自定义菜单接口中KEY值对应，如：CUSTOM_KEY_001, www.qq.com

                break;
            case 'text':                    //return '收到文字消息';
                $message->MsgType;          //text
                $message->Content;          //文本消息内容

                break;
            case 'image':                   //return '收到图片消息';

                $message->MsgType;          //image
                $message->PicUrl;           //图片链接

                break;
            case 'voice':                   //return '收到语音消息';

                $message->MsgType;          //voice
                $message->MediaId;          //语音消息媒体id，可以调用多媒体文件下载接口拉取数据。
                $message->Format;           //语音格式，如 amr，speex 等
                $message->Recognition;      //开通语音识别后才有

                break;
            case 'video':                   //return '收到视频消息';

                $message->MsgType;          //video
                $message->MediaId;          //视频消息媒体id，可以调用多媒体文件下载接口拉取数据。
                $message->ThumbMediaId;     //视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。

                break;

            case 'shortvideo':              //return '小视频';

                $message->MsgType;          //shortvideo
                $message->MediaId;          //视频消息媒体id，可以调用多媒体文件下载接口拉取数据。
                $message->ThumbMediaId;     //视频消息缩略图的媒体id，可以调用多媒体文件下载接口拉取数据。

                break;
            case 'location':                //return '收到坐标消息';s

                $message->MsgType;          //location
                $message->Location_X;       //地理位置纬度
                $message->Location_Y;       //地理位置经度
                $message->Scale;            //地图缩放大小
                $message->Label;            //地理位置信息

                break;
            case 'link':                    //return '收到链接消息';

                $message->MsgType;          //link
                $message->Title;            //消息标题
                $message->Description;      //消息描述
                $message->Url;              //消息链接

                break;

            default:                         //return '收到其它消息';

                break;
        }

        $response = $server->serve();
        $response->send();
    }

    /**
     * 获取微信用户的基本信息
     * @return array
     */
    public static function getBase()
    {
        $result = [];
        try {
            $config = [
                'app_id' => env('WECHAT_APPID'),
                'secret' => env('WECHAT_SECRET'),
            ];
            $app = new Application($config);
            $user = $app->oauth->user();

            $result = [
                'openId' => $user->getId(),
                'nickname' => $user->getNickname(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
                'original' => $user->getOriginal(),
                'token' => $user->getToken(),
            ];

            Log::info("WechatMessageBase:" . json_encode($result));
        } catch (\Exception $ex) {
            Log::error('WechatMessageBaseLogError:' . $ex->getMessage());
        }

        return $result;
    }

    /**
     * 微信菜单设置
     * @param $buttons
     */
    public static function setMenu($buttons)
    {
        try {
            $options = [
                'app_id' => env('WECHAT_APPID'),
                'secret' => env('WECHAT_SECRET'),
            ];
            $app = new Application($options);
            $menu = $app->menu;
            $menu->add($buttons);
            Log::info('setMenu:' . json_encode($buttons));
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}