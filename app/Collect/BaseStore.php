<?php
/**
 * Created by PhpStorm.
 * User: yangcuiwang
 * Date: 2017/5/2
 * Time: 下午8:46
 */

namespace App\Collect;

use Moloquent;
use Log;

class BaseStore extends Moloquent
{
    /**
     * 添加数据
     * @param $data
     * @return bool
     */
    public static function addData(Moloquent $model, $data)
    {
        try {
            foreach ($data as $key => $value) {
                $model->{$key} = $value;
            }
            Log::info('addData:' . json_encode($data));
            return $model->save();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 通过ID更新数据
     * @param $id
     * @param $data
     * @return bool
     */
    public static function updateData(Moloquent $model, $id, $data)
    {
        try {
            $model = $model::where('_id', $id)->first();
            foreach ($data as $key => $value) {
                $model->{$key} = $value;
            }
            Log::info('addData:' . json_encode($data));
            return $model->save();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 判断是否存在（如：用户手机号码）
     * @param $data
     * @return bool
     */
    public static function checkData(Moloquent $model, $data)
    {
        try {
            $param = [];
            foreach ($data as $key => $value) {
                $param[$key] = $value;
            }
            $model = $model::where($param)->first();
            Log::info('addData:' . json_encode($param));
            return $model ? true : false;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return false;
    }

    /**
     * 获取单条信息
     * @param $data
     * @return array
     */
    public static function getOneData(Moloquent $model, $data)
    {
        $result = [];
        try {
            $param = [];
            foreach ($data as $key => $value) {
                $param[$key] = $value;
            }
            $result = $model::where($param)->first();
            return $result;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return $result;
    }

    /**
     * 获取多条信息
     * @param $data
     * @param $limit
     * @return array
     */
    public static function getMoreData(Moloquent $model, $data, $limit = '')
    {
        $result = [];
        try {
            $param = [];
            foreach ($data as $key => $value) {
                $param[$key] = $value;
            }
            $limit = $limit ? $limit : env('PAGE_SIZE');
            $result = $model::where($param)->limit($limit)->get();
            return $result;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
        return $result;
    }

}