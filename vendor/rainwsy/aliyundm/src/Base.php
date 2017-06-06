<?php
namespace Rainwsy\Aliyunmail;

class Base
{

    public $Format = 'JSON';

    public $Version = '2015-11-23';

    public $SignatureMethod = 'HMAC-SHA1';

    public $SignatureVersion = '1.0';

    public $parameters;

    public static $api = 'https://dm.aliyuncs.com/';

    public function percentEncode($str)
    {
        $res = urlencode($str);
        $res = preg_replace('/\+/', '%20', $res);
        $res = preg_replace('/\*/', '%2A', $res);
        $res = preg_replace('/%7E/', '~', $res);
        return $res;
    }

    public function makeSign($parameters)
    {
        date_default_timezone_set("GMT");
        $parameters['Format'] = $this->Format;
        $parameters['Version'] = $this->Version;
        $parameters['AccessKeyId'] = Auth::getAccessKeyId();
        $parameters['SignatureMethod'] = $this->SignatureMethod;
        $parameters['Timestamp'] = date('Y-m-d\TH:i:s\Z');
        $parameters['SignatureVersion'] = $this->SignatureVersion;
        $parameters['SignatureNonce'] = uniqid();
        $this->parameters = $parameters;
        ksort($parameters);
        $canonicalizedQueryString = '';
        foreach ($parameters as $key => $value) {
            $canonicalizedQueryString .= '&' . $this->percentEncode($key) . '=' . $this->percentEncode($value);
        }
        $stringToSign = 'POST&%2F&' . $this->percentencode(substr($canonicalizedQueryString, 1));
        $signature = hash_hmac('sha1', $stringToSign, Auth::getAccessSecret() . "&", true);
        
        $signature = base64_encode($signature);
        return $signature;
    }

    public function buildPostData($parameters)
    {
        $content = "";
        foreach ($parameters as $apiParamKey => $apiParamValue) {
            $content .= "$apiParamKey=" . urlencode($apiParamValue) . "&";
        }
        return substr($content, 0, - 1);
    }
}