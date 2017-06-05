<?php

namespace App\Bootstrap;

use Illuminate\Log\Writer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\ConfigureLogging as IlluminateConfigureLogging;
use Illuminate\Support\Facades\Log;

class ConfigureLogging extends IlluminateConfigureLogging
{
    public function bootstrap(Application $app)
    {
        //bc计算保留5位小数
        bcscale(5);
        return parent::bootstrap($app);

    }


    protected function configureDailyHandler(Application $app, Writer $log)
    {
        $log->useDailyFiles(
            $app->storagePath() . '/logs/laravel-' . get_current_user() . '-console.log',
            $app->make('config')->get('app.log_max_files', 5)
        );
    }
}