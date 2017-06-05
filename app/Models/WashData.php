<?php

namespace App\Models;

/**
 * 清洗数据的押金字段
 * author: 元永健
 * created time: 2017.5.24 16:43:00
 * Class ImageDown
 */
class WashData
{
    /**
     * 清洗押金数据
     * @param $deposit
     * @param $rent
     * @return int
     */
    public static function shopline_lepu_deposit($deposit,$rent){
        if(($deposit == null) || ($deposit == '')){
            $deposit = 0;
        }
        if($deposit == '无押金'){
            $deposit = 0;
        }
        preg_match('/([0-9]*)月/',$deposit,$month);
        if($month){
            $deposit = intval($rent) * intval($month[1]);
        }
        preg_match('/([0-9]*)年/',$deposit,$year);
        if($year){
            $deposit = intval($rent) * intval($year[1]) * 12;
        }
        preg_match('/([0-9]*)元/',$deposit,$yuan);
        if($yuan){
            $deposit = intval($deposit);
        }
        return $deposit;
    }

    /**
     * 清洗预算数据
     * @param $deposit
     * @param $rent
     * @param $payment_type
     * @return int
     */
    public static function shopline_lepu_budget($deposit,$rent,$payment_type,$leasing_payment){
        preg_match('/([0-9]*)月/',$payment_type,$month);
        preg_match('/([0-9]*)年/',$payment_type,$year);
        if($month){
            $budget = intval($rent) * intval($month[1]) + $deposit + $leasing_payment;
        }elseif ($year){
            $budget = intval($rent) * intval($year[1]) * 12 + $deposit + $leasing_payment;
        }else{
            $budget = 0;
        }
        //暂时没算转让费
//        echo '租金：'.$rent;
//        echo '<br>';
//        echo '支付方式：'.$payment_type;
//        echo '<br>';
//        echo '押金：'.$deposit;
//        echo '<br>';
//        echo '转让费：'.$leasing_payment;
//        echo '<br>';
//        echo '开店成本：'.$budget;
//        echo '<br>';
//        die;
        return $budget;
    }
}