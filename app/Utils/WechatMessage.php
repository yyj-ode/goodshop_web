<?php
/**
 * Created by PhpStorm.
 * User: yangcuiwang
 * Date: 2017/4/27
 * Time: 下午6:20
 */

namespace App\Utils;


class WechatMessage
{
    /**
     * 投标成功
     */
    const INVESTED = 1;
    /**
     * 投标放款
     */
    const INVESTED_AND_LOANED = 2;
    /**
     * 充值成功
     */
    const MONEY_CHANGED = 3;

    /**
     * 红包奖励
     */
    const RED_ENVELOP = 4;
}