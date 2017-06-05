<?php
/**
 * Created by PhpStorm.
 * User: Medmagic
 * Date: 2015/1/29
 * Time: 11:24
 */
namespace App\Library;

class Categores {
    /**
     *无限极分类，压到一个数组
     */
    static function cateToOne($cate, $html='--', $pid=0, $level=0){
        $arr = array();
        foreach($cate as $k =>$v){
            if($v['parent_id'] == $pid){
                $v['level'] = $level + 1;
                $v['html'] = str_repeat($html, $level);
                $arr[] = $v;
                unset($cate[$k]);
                $arr = array_merge($arr, self::cateToOne($cate, $html, $v['id'], $level+1));
            }
        }
        return $arr;
    }

    /**
     *无限极分类，压成多维数组
     */
    static function cateToArray($cate, $child='child', $pid=0){
        $arr = array();
        foreach($cate as $k => $v){
            if($v['parent_id']==$pid){
                unset($cate[$k]);
                $v[$child] = self::cateToArray($cate, $child, $v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }


    static function getTree($items,$id='id',$pid='parent_id',$son = 'items'){
        $tree = array(); //格式化的树
        $tmpMap = array();  //临时扁平数据

        foreach ($items as $item) {
            $tmpMap[$item[$id]] = $item;
        }

        foreach ($items as $item) {
            if (isset($tmpMap[$item[$pid]])) {
                $tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
            } else {
                $tree[] = &$tmpMap[$item[$id]];
            }
        }
        unset($tmpMap);
        return $tree;
    }


    /**
     * area 是地区
     * @param $items
     * @param string $id
     * @param string $pid
     * @param string $son
     * @return array
     */
    static function areaTree($items,$id='id',$pid='parent_id',$son = 'items'){
        $tree = array(); //格式化的树
        $tmpMap = array();  //临时扁平数据

        foreach ($items as $item) {
            $tmpMap[$item[$id]] = $item;
        }

        foreach ($items as $item) {
            if (isset($tmpMap[$item[$pid]])) {
                $tmpMap[$item[$pid]][$son][$item[$id]] = &$tmpMap[$item[$id]];
            } else {
                $tree[$item[$id]] = &$tmpMap[$item[$id]];
            }
        }
        unset($tmpMap);
        return $tree;
    }

    /**
     *查找所有父类
     */
    static function getParents($cate, $id){
        $arr = array();
        foreach($cate as $k => $v){
            if($v['id'] == $id){
                $arr[] = $v;
                unset($cate[$k]);
                $arr = array_merge(self::getParents($cate, $v['parentid']), $arr);
            }
        }
        return $arr;
    }

    /**
     *传递一个父级分类ID返回所有子分类ID
     */
    static function getChildsId($cate, $pid){
        $arr = array();
        foreach($cate as $k => $v){
            if($v['parent_id']==$pid){
                $arr[] = $v['id'];
                unset($cate[$k]);
                $arr = array_merge($arr, self::getChildsId($cate, $v['id']));
            }
        }
        return $arr;
    }

    /**
     *传递一个父级分类ID返回所有子分类
     */
    static function getChilds($cate, $pid){
        $arr = array();
        foreach($cate as $k => $v){
            if($v['parent_id']==$pid){
                $arr[] = $v;
                unset($cate[$k]);
                $arr = array_merge($arr, self::getChilds($cate, $v['id']));
            }
        }
        return $arr;
    }
}