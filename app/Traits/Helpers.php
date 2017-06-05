<?php
namespace App\Traits;

Trait Helpers
{

    /**
     * 处理banner 字符串
     * @return array
     */
    public function getBanners()
    {

        $banners  = explode('|',$this->banner);

        $banners_new = array_map(function($item) {
            return explode('~',$item);
        },$banners);

        $res = [];
        foreach ($banners_new as $key => $val) {

            if (isset($val[1]) && strpos($val[1],'视频') !==false ) {
                $arr['type'] = 'video';
                $arr['img'] = $val[0] ;
                $arr['url'] =  substr($val[1], strpos($val[1], 'http'));
                $res[] = $arr;
            }elseif (isset($val[1]) && strpos($val[1],'直播') !==false ) {
                $arr['type'] = 'live';
                $arr['img'] = $val[0] ;
                $arr['url'] =  substr($val[1], strpos($val[1], 'http'));
                $res[] = $arr;
            }elseif (isset($val[1]) && strpos($val[1],'http') !==false ) {
                $arr['type'] = 'img';
                $arr['img'] = $val[0] ;
                $arr['url'] =  substr($val[1], strpos($val[1], 'http'));
                $res[] = $arr;
            }

        }
        return $res;

    }

}
