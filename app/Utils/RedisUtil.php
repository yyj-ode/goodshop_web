<?php namespace App\Utils;

use Illuminate\Support\Facades\Redis;

class RedisUtil
{

    public $redis;

    public function __construct()
    {
        $this->redis = Redis::connection('default');
    }

    /**
     * @param $key
     * @param $value
     * @param int $expire expire time in seconds
     */
    public function set($key, $value, $expire = 3600)
    {
        $value = serialize($value);
        if ($expire) {
            $this->redis->setex($key, $expire, $value);
        } else {
            $this->redis->set($key, $value);
        }
    }

    public function get($key)
    {
        $value = $this->redis->get($key);
        $result = $value ? unserialize($value) : '';
        return $result;
    }

    public function exists($key)
    {
        return $this->redis->exists($key);
    }

    public function del($key)
    {
        return $this->redis->del($key);
    }

    public function incrByFloat($key, $value)
    {
        return $this->redis->INCRBYFLOAT($key, $value);
    }

    /**
     * get time of the key to be expired
     * @param $key
     * @return mixed
     */
    public function ttl($key)
    {
        return $this->redis->ttl($key);
    }

    /**
     * get length of list key
     * @param $key
     * @return mixed
     */
    public function llen($key)
    {
        return $this->redis->llen($key);
    }

    public function lrange($key, $start = 0, $end = 100)
    {
        return $this->redis->lrange($key, $start, $end);
    }

}