<?php

namespace App\Models;

/**
 * Class ImageDown
 */
class ImageDown
{
    public static function grabImage($url='http://img2.lepu.cn/lepu-upload/2017-03/ef/04/ef04a5dd035370921aea1745b5a42df8.jpeg@!140w_80h.jpg',$filename='590efde684b48d14b6094303.png'){
        if($url==""):return false;endif;
        $url = str_replace('140w_80h','700w_400h',$url);
        ob_start();
        readfile($url);
        $img = ob_get_contents();
        ob_end_clean();
        $size = strlen($img);
//        dd($size);
        //"../../images/books/"为存储目录，$filename为文件名
        $fp2=@fopen("assets/frontend/index/web/shopimage/shopline/".$filename, "a");
        fwrite($fp2,$img);
        fclose($fp2);

        return $filename;
    }
}