# Qiniu 云储存 Laravel 5 Storage版

基于 https://github.com/qiniu/php-sdk 开发

符合Laravel 5 的Storage用法。

## 更新

 v0.6 增加了```fetch```, ```qetag``` 命令。

 v0.5 增加了```QiniuUrl```来更方便的设置文件 URL 参数。

 v0.3 增加了对PIPE以及回调地址参数的配置。 感谢abcsun提供的灵感。

 v0.2 提供了对多域名的支持。这是为了配合七牛的默认域名、HTTPS域名和自定义域名而添加的功能。

## 安装

 - ```composer require zgldh/qiniu-laravel-storage```
 - ```config/app.php``` 里面的 ```providers``` 数组， 加上一行 ```zgldh\QiniuStorage\QiniuFilesystemServiceProvider```
 - ```config/filesystem.php``` 里面的 ```disks```数组加上：

```php

    'disks' => [
        ... ,
        'qiniu' => [
            'driver'  => 'qiniu',
            'domains' => [
                'default'   => 'xxxxx.com1.z0.glb.clouddn.com', //你的七牛域名
                'https'     => 'dn-yourdomain.qbox.me',         //你的HTTPS域名
                'custom'    => 'static.abc.com',                //你的自定义域名
             ],
            'access_key'=> '',  //AccessKey
            'secret_key'=> '',  //SecretKey
            'bucket'    => '',  //Bucket名字
            'notify_url'=> '',  //持久化处理回调地址
            'access'    => 'public'  //空间访问控制 public 或 private
        ],
    ],

```

 - 完成

## 使用

第一种用法

```php

    $disk = \Storage::disk('qiniu');
    $disk->exists('file.jpg');                      //文件是否存在
    $disk->get('file.jpg');                         //获取文件内容
    $disk->put('file.jpg',$contents);               //上传文件
    $disk->put('file.jpg',fopen('path/to/big.jpg','r+')); //分段上传文件。建议大文件>10Mb使用。
    $disk->prepend('file.log', 'Prepended Text');   //附加内容到文件开头
    $disk->append('file.log', 'Appended Text');     //附加内容到文件结尾
    $disk->delete('file.jpg');                      //删除文件
    $disk->delete(['file1.jpg', 'file2.jpg']);
    $disk->copy('old/file1.jpg', 'new/file1.jpg');  //复制文件到新的路径
    $disk->move('old/file1.jpg', 'new/file1.jpg');  //移动文件到新的路径
    $size = $disk->size('file1.jpg');               //取得文件大小
    $time = $disk->lastModified('file1.jpg');       //取得最近修改时间 (UNIX)
    $files = $disk->files($directory);              //取得目录下所有文件
    $files = $disk->allFiles($directory);               //这个没实现。。。
    $directories = $disk->directories($directory);      //这个也没实现。。。
    $directories = $disk->allDirectories($directory);   //这个也没实现。。。
    $disk->makeDirectory($directory);               //这个其实没有任何作用
    $disk->deleteDirectory($directory);             //删除目录，包括目录下所有子文件子目录

    $disk->getDriver()->uploadToken();                          //获取上传Token
    $disk->getDriver()->uploadToken('file.jpg');                //获取上传Token
    $disk->getDriver()->downloadUrl('file.jpg');                //获取下载地址
    $disk->getDriver()->downloadUrl('file.jpg')
                      ->setDownload('foo.jpg');                 //获取下载地址，文件名为 foo.jpg
    $disk->getDriver()->downloadUrl('file.jpg', 'https');       //获取HTTPS下载地址
    $disk->getDriver()->privateDownloadUrl('file.jpg');         //获取私有bucket下载地址
    $disk->getDriver()->privateDownloadUrl('file.jpg', 'https');//获取私有bucket的HTTPS下载地址
    $disk->getDriver()->privateDownloadUrl('file.jpg',
                                        [
                                            'domain'=>'https',
                                            'expires'=>3600
                                        ]);                     //获取私有bucket的HTTPS下载地址。超时 3600 秒。
    $disk->getDriver()->avInfo('file.mp3');                     //获取多媒体文件信息
    $disk->getDriver()->imageInfo('file.jpg');                  //获取图片信息
    $disk->getDriver()->imageExif('file.jpg');                  //获取图片EXIF信息
    $disk->getDriver()->imagePreviewUrl('file.jpg','imageView2/0/w/100/h/200');                         //获取图片预览URL
    $disk->getDriver()->privateImagePreviewUrl('file.jpg','imageView2/0/w/100/h/200');                  //获取私有bucket图片预览URL
    $disk->getDriver()->verifyCallback('application/x-www-form-urlencoded', $request->header('Authorization'), 'callback url', $request->getContent());//验证回调内容是否合法
    $disk->getDriver()->persistentFop('file.flv','avthumb/m3u8/segtime/40/vcodec/libx264/s/320x240');   //执行持久化数据处理
    $disk->getDriver()->persistentFop('file.flv','fop','队列名');   //使用私有队列执行持久化数据处理
    $disk->getDriver()->persistentStatus($persistent_fop_id);       //查看持久化数据处理的状态。
    $disk->getDriver()->fetch('http://abc.com/foo.jpg', 'bar.jpg'); //调用fetch将 foo.jpg 数据以 bar.jpg 的名字储存起来。
    $disk->getDriver()->qetag();    //得到最后一次执行 put, copy, append 等写入操作后，得到的hash值。详见 https://github.com/qiniu/qetag

```

第二种用法 （就是省略了一个getDriver）

```php

    use zgldh\QiniuStorage\QiniuStorage;

    $disk = QiniuStorage::disk('qiniu');
    $disk->exists('file.jpg');                      //文件是否存在
    $disk->get('file.jpg');                         //获取文件内容
    $disk->put('file.jpg',$contents);               //上传文件
    $disk->put('file.jpg',fopen('path/to/big.jpg','r+')); //分段上传文件。建议大文件>10Mb使用。
    $disk->prepend('file.log', 'Prepended Text');   //附加内容到文件开头
    $disk->append('file.log', 'Appended Text');     //附加内容到文件结尾
    $disk->delete('file.jpg');                      //删除文件
    $disk->delete(['file1.jpg', 'file2.jpg']);
    $disk->copy('old/file1.jpg', 'new/file1.jpg');  //复制文件到新的路径
    $disk->move('old/file1.jpg', 'new/file1.jpg');  //移动文件到新的路径
    $size = $disk->size('file1.jpg');               //取得文件大小
    $time = $disk->lastModified('file1.jpg');       //取得最近修改时间 (UNIX)
    $files = $disk->files($directory);              //取得目录下所有文件
    $files = $disk->allFiles($directory);               //这个没实现。。。
    $directories = $disk->directories($directory);      //这个也没实现。。。
    $directories = $disk->allDirectories($directory);   //这个也没实现。。。
    $disk->makeDirectory($directory);               //这个其实没有任何作用
    $disk->deleteDirectory($directory);             //删除目录，包括目录下所有子文件子目录

    $disk->uploadToken();                               //获取上传Token
    $disk->uploadToken('file.jpg');                     //获取上传Token
    $disk->downloadUrl('file.jpg');                     //获取下载地址
    $disk->downloadUrl('file.jpg')
         ->setDownload('foo.jpg');                      //获取下载地址，文件名为 foo.jpg
    $disk->downloadUrl('file.jpg', 'https');            //获取HTTPS下载地址
    $disk->privateDownloadUrl('file.jpg');              //获取私有bucket下载地址
    $disk->privateDownloadUrl('file.jpg', 'https');     //获取私有bucket的HTTPS下载地址
    $disk->privateDownloadUrl('file.jpg',
                            [
                                'domain'=>'https',
                                'expires'=>3600
                            ]);                         //获取私有bucket的HTTPS下载地址。超时 3600 秒。
    $disk->avInfo('file.mp3');                          //获取多媒体文件信息
    $disk->imageInfo('file.jpg');                       //获取图片信息
    $disk->imageExif('file.jpg');                       //获取图片EXIF信息
    $disk->imagePreviewUrl('file.jpg','imageView2/0/w/100/h/200');                          //获取图片预览URL
    $disk->privateImagePreviewUrl('file.jpg','imageView2/0/w/100/h/200');                   //获取私有bucket图片预览URL
    $disk->verifyCallback('application/x-www-form-urlencoded', $request->header('Authorization'), 'callback url', $request->getContent());//验证回调内容是否合法
    $disk->persistentFop('file.flv','avthumb/m3u8/segtime/40/vcodec/libx264/s/320x240');    //执行持久化数据处理
    $disk->persistentFop('file.flv','fop','队列名');    //使用私有队列执行持久化数据处理
    $disk->persistentStatus($persistent_fop_id);        //查看持久化数据处理的状态。

    $disk->fetch('http://abc.com/foo.jpg', 'bar.jpg'); //调用fetch将 foo.jpg 数据以 bar.jpg 的名字储存起来。
    $disk->qetag();    //得到最后一次执行 put, copy, append 等写入操作后，得到的hash值。详见 https://github.com/qiniu/qetag

```


## 官方SDK / 手册

 - https://github.com/qiniu/php-sdk
 - http://developer.qiniu.com/docs/v6/sdk/php-sdk.html


