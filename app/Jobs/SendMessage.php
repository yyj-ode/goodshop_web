<?php

namespace App\Jobs;

use App\Utils\Wechat;
use App\Utils\WechatMessage;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Log;

class SendMessage implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $user_id;
    protected $type;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $type, $data)
    {
        $this->user_id = $user_id;
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $user_id = $this->user_id;
        $type = $this->type;
        $data = $this->data;

        $user = User::with("detail")->find($user_id);

        //发送站内消息
        /**
         * $message = new Message();
         * $message->user_id = $user_id;
         * $message->type = $type;
         * $message->content = $content;
         * $saved = $message->save();
         */

        //发微信消息
        $openid = $user->openid;
        if ($openid) {
            switch ($type) {
                case WechatMessage::INVESTED_AND_LOANED:
                    Wechat::sendInvestedAndLoaned($openid, $data);
                    break;
                case WechatMessage::NEW_PROJECT:
                    Wechat::sendMsg($openid, Wechat::PROJECT_READY, $data);
                    break;
                case WechatMessage::INVESTED:
                    Wechat::sendInvestRecord($openid, $data);
                    break;
            }
        }
    }

    /**
     * Fire the job.
     *
     * @return void
     */
    public function fire()
    {
        // TODO: Implement fire() method.
    }

    /**
     * Get the number of times the job has been attempted.
     *
     * @return int
     */
    public function attempts()
    {
        // TODO: Implement attempts() method.
    }

    /**
     * Get the raw body string for the job.
     *
     * @return string
     */
    public function getRawBody()
    {
        // TODO: Implement getRawBody() method.
    }
}
