<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mail;

/**
 * 实现定时发邮件
 * Class SendEmails
 * @package App\Console\Commands
 */
class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

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
        $user = [
            'email' => 'yangcuiwang@gmail.com',//一个有效的邮箱接收地址
            'name'  => 'yangcuiwang',
        ];
        $status = Mail::send('emails.send', ['user'=>$user], function($msg) use ($user){
            /** 一个有效的邮箱发送地址 */
            $msg->from('yangcuiwang@qq.com', 'wangyu');
            $msg->to($user['email'], $user['name'])->subject('This is a demo about sending emails to myself');
        });

        if(is_null($status)){
            $this->info('Success to send email');
        }else{
            $this->error('Fail to send email');
        }
    }
}
