<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/2/28
 * Time: 10:51
 */

function str_to_number($str) {
    if(strlen($str) <= 1) {
        return $str;
    }

    $trans = array(
        "freFee" => 1, "chgFee" => 2, "monFee" => 3, "pubFee" => 4, "tfFee" => 5, "allFee"=>6,
        "rteDay" => 1, "rteWeek" => 2, "rteWk7" => 3,
        "valDay" => 1, "valWeek" => 2, "valWk7" => 3,
        "limfe1" => 1, "limfe2" => 2, "limfe3" => 3, "limfe4" => 4,
        "unfinish" => 1, "finish" => 2,
        "bt0to1b" => 1, "bt1bto1k" => 2, "bt1kto1w" => 3, "bt1wto10w" => 4, "gt10w" => 5,
        "lesMonIn" => 1, "bt1mto3mIn" => 2, "bt3mto12mIn" => 3, "gt1yIn" => 4,
        "lesMonUpd" => 1, "bt1mto3mUpd" => 2, "bt3mto12mUpd" => 3, "gt1yUpd" => 4,
        "boyCfy1" => 1, "girlCfy1" => 2, "pshCfy1" => 3, "othCfy1" => 4
    );

    return $trans[$str];
}

function to_chinese_character($str) {
    $trans = array(
        'freFee' => '免费(互联网书)', 'chgFee' => '付费', 'monFee' => '包月', 'pubFee'=>'公版', 'tfFee'=>'限免', 'allFee'=>'全免(付费书免费读)',
        'rteDay' => '天留存', 'rteWeek'=>'周留存', 'rteWk7'=>'七日留存',
        'valDay' => '天阅读量', 'valWeek'=>'周阅读量', 'valWk7'=>'七日阅读量',
        "limfe1" => '第一批限免', "limfe2" => '第二批限免', "limfe3" => '第三批限免', "limfe4" => '第四批限免',
        "finish" => '完结', "unfinish" => '连载',
        "bt0to1b" => '1到1百', "bt1bto1k" => '1百到1千', "bt1kto1w" => '1千到1万', "bt1wto10w" => '1万到10万', "gt10w" => '大于10万',
        "lesMonIn" => '少于1月入库', "bt1mto3mIn" => '1月到3月入库', "bt3mto12mIn" => '3月到12月入库', "gt1yIn" => '大于1年入库',
        "lesMonUpd" => '少于1月更新', "bt1mto3mUpd" => '1月到3月更新', "bt3mto12mUpd" => '3月到12月更新', "gt1yUpd" => '大于1年更新',
        "boyCfy1" => '男频', "girlCfy1" => '女频', "pshCfy1" => '出版', "othCfy1" => '其它'
    );

    return $trans[$str];
}