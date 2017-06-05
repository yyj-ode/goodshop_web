<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */

    'name' => 'Laravel',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', true),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'Asia/Shanghai',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */
        Laravel\Tinker\TinkerServiceProvider::class,

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        //Iseed
        //Way\Generators\GeneratorsServiceProvider::class,
        //Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class,
        //Orangehill\Iseed\IseedServiceProvider::class,

        /*** Agent ***/
        Jenssegers\Agent\AgentServiceProvider::class,

        /*** LaravelIdeHelper ***/
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,

        /*** Html ***/
        Collective\Html\HtmlServiceProvider::class,

        /*** Mongodb ***/
        Jenssegers\Mongodb\MongodbServiceProvider::class,
        Jenssegers\Mongodb\Auth\PasswordResetServiceProvider::class,
        Jenssegers\Mongodb\MongodbQueueServiceProvider::class,

        /*** Passport ***/
        Laravel\Passport\PassportServiceProvider::class,

        /** Debugbar 与微信插件冲突 "barryvdh/laravel-debugbar": "^2.2.3", */
        //Barryvdh\Debugbar\ServiceProvider::class,

        /** Entrust **/
        Zizaco\Entrust\EntrustServiceProvider::class,

        /** Breadcrumbs **/
        DaveJamesMiller\Breadcrumbs\ServiceProvider::class,

        /** LogViewer **/
        Arcanedev\LogViewer\LogViewerServiceProvider::class,

        /** Captcha **/
        Mews\Captcha\CaptchaServiceProvider::class,

        /** Excel **/
        Maatwebsite\Excel\ExcelServiceProvider::class,

        /** Queue **/
//        Barryvdh\Queue\AsyncServiceProvider::class,

        /** 加载扩展 **/
//        App\Providers\FormServiceProvider::class,

        /** 用户日志 **/
//        luoyangpeng\ActionLog\ActionLogServiceProvider::class,

        /** 图片处理 **/
        Intervention\Image\ImageServiceProvider::class,

        /** passport **/
        Laravel\Passport\PassportServiceProvider::class,

        /** Socialite **/
        Laravel\Socialite\SocialiteServiceProvider::class,

        /** Notifynder **/
        Fenos\Notifynder\NotifynderServiceProvider::class,

        /** ElfSundae **/
        ElfSundae\BearyChat\Laravel\ServiceProvider::class,

        /** 无限制分类 **/
        Baum\Providers\BaumServiceProvider::class,

        /*** 微信登录注册服务 ***/
        Overtrue\LaravelWechat\ServiceProvider::class,

        /*** rss ***/
        Moell\LaravelRss\RssServiceProvider::class,

        /*** Clockwork ***/
        Clockwork\Support\Laravel\ClockworkServiceProvider::class,

        /**** QiniuStorage ****/
        zgldh\QiniuStorage\QiniuFilesystemServiceProvider::class,

        /**** Api ****/
        Dingo\Api\Provider\LaravelServiceProvider::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

        /*** Html ***/
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,

        /** Mongodb **/
        'Moloquent' => Jenssegers\Mongodb\Eloquent\Model::class,

        /**** Agent ****/
        'Agent' => Jenssegers\Agent\Facades\Agent::class,

        /** Entrust **/
        'Entrust' => Zizaco\Entrust\EntrustFacade::class,

        /** Breadcrumbs **/
        'Breadcrumbs' => DaveJamesMiller\Breadcrumbs\Facade::class,

        /** Captcha **/
        'Captcha' => Mews\Captcha\Facades\Captcha::class,

        /** Excel **/
        'Excel' => Maatwebsite\Excel\Facades\Excel::class,

        /** 用户日志 **/
//        'ActionLog'    => luoyangpeng\ActionLog\Facades\ActionLogFacade::class,

        /** 图片处理 **/
        'Image' => Intervention\Image\Facades\Image::class,

        /** Socialite **/
        'Socialite' => Laravel\Socialite\Facades\Socialite::class,

        /** Notifynder **/
        'Notifynder' => Fenos\Notifynder\Facades\Notifynder::class,

        /** Rss **/
        'Rss' => Moell\LaravelRss\RssFacade::class,
        /** Uuid  Rss **/
        'Uuid' => Webpatser\Uuid\Uuid::class,

        /** LaravelWechat **/
        'EasyWeChat' => Overtrue\LaravelWechat\Facade::class,
    ],

];
