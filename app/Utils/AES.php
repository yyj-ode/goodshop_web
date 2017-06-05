<?php namespace App\Utils;

/**
 * AES/CBC/PKCS5Padding 加密解密.
 *
 * @author JayChan <voidea@foxmail.com>
 *
 * @version 1.0
 */
class AES
{
    /**
     * 加密.
     *
     * @param mixed  $contents   要加密的内容
     * @param string $encryptKey 加密的Key，长度为16，24，32的key
     *
     * @return string 已加密的内容
     */
    public static function encrypt($contents, $encryptKey)
    {
        // 将非标量数据转换为字符串
        if (!is_scalar($contents)) {
            $contents = json_encode($contents);
        }
        // 获取块尺寸
        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        // 计算要填充的值
        $padding = $size - strlen($contents) % $size;
        // 添加Padding
        $contents .= str_repeat(chr($padding), $padding);
        // 生成随机字符串
        // $iv = str_random($size);
        $iv = mcrypt_create_iv($size);
        // 进行AES/CBC加密
        $encryptedData = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $encryptKey, $contents, MCRYPT_MODE_CBC, $iv).$iv;

        return base64_encode($encryptedData);
    }

    /**
     * 解密.
     *
     * @param string $contents   已加密的内容
     * @param string $encryptKey 解密Key，长度为16，24，32的key
     *
     * @return string 已解密的内容
     */
    public static function decrypt($contents, $encryptKey)
    {
        $encryptedData = base64_decode($contents);
        // 获取块尺寸
        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        // 获取加密iv
        $iv = substr($encryptedData, -$size);
        // 移除iv，获取加密正文
        $contents = substr($encryptedData, 0, -$size);
        // 进行AES/CBC解密
        $contents = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $encryptKey, $contents, MCRYPT_MODE_CBC, $iv);
        // 获取Padding的值
        $padding = ord($contents{strlen($contents) - 1});

        // 移除Padding，并返回加密前数据
        return substr($contents, 0, -$padding);
    }
}