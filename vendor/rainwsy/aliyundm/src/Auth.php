<?php
namespace Rainwsy\Aliyunmail;

class Auth
{

    private static $AccessKeyId;

    private static $AccessSecret;

    public static function config($AccessKeyId, $AccessSecret)
    {
        self::$AccessKeyId = $AccessKeyId;
        self::$AccessSecret = $AccessSecret;
    }

    public static function getAccessKeyId()
    {
        return self::$AccessKeyId;
    }

    public static function getAccessSecret()
    {
        return self::$AccessSecret;
    }
}