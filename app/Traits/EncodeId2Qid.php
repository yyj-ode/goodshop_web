<?php

namespace App\Traits;

use App\Utils\Common;

trait EncodeId2Qid
{
    /**
     * 序列化额外属性
     * @var array
     */

    function __construct($args=[])
    {
        array_push($this->appends,'qid');
        parent::__construct($args);
    }
    /**
     * eid getter
     * @return array
     */
    public function getQidAttribute()
    {
        return Common::hashidEncode($this->id);
    }
}
