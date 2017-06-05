<?php
namespace App\Utils;

class SSDBUtil
{

    public $ssdb;

    public function __construct()
    {
        include_once(app_path('Library' . DIRECTORY_SEPARATOR . 'SSDB.php'));
        try {
            $this->ssdb = new \SimpleSSDB(config('ssdb.hostname'), config('ssdb.port'));
            $this->ssdb->auth(config('ssdb.password'));
        } catch (SSDBException $e) {
            die(__LINE__ . ' ' . $e->getMessage());
        }
    }

    /**
     * @param $key
     * @param $value
     * @param int $expire expire time in seconds
     */
    public function set($key, $value, $expire = 3600)
    {
        $key = self::set_prefix($key);
        if ($expire) {
            $this->ssdb->setx($key, $value, $expire);
        } else {
            $this->ssdb->set($key, $value);
        }
    }

    public function set_prefix($key)
    {
        return config('ssdb.prefix').$key;
    }

    public function get($key)
    {
        $key = $this->set_prefix($key);
        return $this->ssdb->get($key);
    }

    public function exists($key)
    {
        $key = $this->set_prefix($key);
        return $this->ssdb->exists($key);
    }

    public function del($key)
    {
        $key = $this->set_prefix($key);
        return $this->ssdb->del($key);
    }

    public function incrByFloat($key, $value)
    {
        $key = $this->set_prefix($key);
        return $this->ssdb->INCRBYFLOAT($key, $value);
    }

    /**
     * get time of the key to be expired
     * @param $key
     * @return mixed
     */
    public function ttl($key)
    {
        $key = $this->set_prefix($key);
        return $this->ssdb->ttl($key);
    }

    /**
     * get length of list key
     * @param $key
     * @return mixed
     */
    public function llen($key)
    {
        $key = $this->set_prefix($key);
        return $this->ssdb->llen($key);
    }

    public function lrange($key, $start = 0, $end = 100)
    {
        $key = $this->set_prefix($key);
        return $this->ssdb->lrange($key, $start, $end);
    }

}