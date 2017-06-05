<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mail;

use Rainwsy\Aliyunmail\Send\Single;
use Rainwsy\Aliyunmail\Auth;

/**
 * 实现定时发邮件
 * Class SendEmails
 * @package App\Console\Commands
 */
class SendYunEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 在Linux中添加计划任务
     # crontab -e
     # * * * * * php /Applications/MAMP/htdocs/laravelemail/artisan schedule:run 1>> /dev/null 2>&1
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $AccessKeyId = env('AccessKeyId');
        $AccessSecret = env('AccessSecret');
        $auth = Auth::config($AccessKeyId, $AccessSecret);
        $mail = new Single();
        $mail->setAccountName('system@notice.awbeci.xyz');
        $mail->setFromAlias('awbeci');
        $mail->setReplyToAddress('true');
        $mail->setAddressType('1');
        $mail->setToAddress('yangcuiwang@qq.com');

        $mail->setSubject('注册成功');
        $mail->setHtmlBody('欢迎您注册人类健康网,请点击以下链接验证您的邮箱:www.iqilong.com');

        $send = $mail->send();

        $this->info($send);

        if(is_null($send)){
            $this->$this->info('Success to send email');
        }else{
            $this->error('Fail to send email');
        }
    }
}
