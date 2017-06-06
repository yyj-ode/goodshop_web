<?php namespace zgldh\QiniuStorage;

use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use zgldh\QiniuStorage\Plugins\DownloadUrl;
use zgldh\QiniuStorage\Plugins\Fetch;
use zgldh\QiniuStorage\Plugins\ImageExif;
use zgldh\QiniuStorage\Plugins\ImageInfo;
use zgldh\QiniuStorage\Plugins\AvInfo;
use zgldh\QiniuStorage\Plugins\ImagePreviewUrl;
use zgldh\QiniuStorage\Plugins\PersistentFop;
use zgldh\QiniuStorage\Plugins\PersistentStatus;
use zgldh\QiniuStorage\Plugins\PrivateDownloadUrl;
use zgldh\QiniuStorage\Plugins\Qetag;
use zgldh\QiniuStorage\Plugins\UploadToken;
use zgldh\QiniuStorage\Plugins\PrivateImagePreviewUrl;
use zgldh\QiniuStorage\Plugins\VerifyCallback;

class QiniuFilesystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        \Storage::extend(
            'qiniu',
            function ($app, $config) {
                if (isset($config['domains'])) {
                    $domains = $config['domains'];
                } else {
                    $domains = [
                        'default' => $config['domain'],
                        'https'   => null,
                        'custom'  => null
                    ];
                }
                $qiniu_adapter = new QiniuAdapter(
                    $config['access_key'],
                    $config['secret_key'],
                    $config['bucket'],
                    $domains,
                    $config['notify_url'] ? $config['notify_url'] : null,
                    $config['access'] ? $config['access'] : 'public'
                );
                $file_system = new Filesystem($qiniu_adapter);
                $file_system->addPlugin(new PrivateDownloadUrl());
                $file_system->addPlugin(new DownloadUrl());
                $file_system->addPlugin(new AvInfo());
                $file_system->addPlugin(new ImageInfo());
                $file_system->addPlugin(new ImageExif());
                $file_system->addPlugin(new ImagePreviewUrl());
                $file_system->addPlugin(new PersistentFop());
                $file_system->addPlugin(new PersistentStatus());
                $file_system->addPlugin(new UploadToken());
                $file_system->addPlugin(new PrivateImagePreviewUrl());
                $file_system->addPlugin(new VerifyCallback());
                $file_system->addPlugin(new Fetch());
                $file_system->addPlugin(new Qetag());

                return $file_system;
            }
        );
    }

    public function register()
    {
        //
    }
}
