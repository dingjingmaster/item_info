<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/2/28
 * Time: 10:51
 */

function set_field($tableName) {
    echo $tableName;
    switch($tableName) {
        case 'limitfree':
            return array('irid', 'last', 'remain', 'retent', 'tfCate', 'timeStamp');
        case 'fee':
            return array('irid', 'last', 'remain', 'retent', 'feeCate', 'typeCate', 'timeStamp');
        case 'status':
            return array('irid', 'last', 'remain', 'retent', 'statuCate', 'feeCate', 'typeCate', 'timeStamp');
        case 'viewCount':
            return array('irid', 'last', 'remain', 'retent', 'viewCate', 'feeCate', 'typeCate', 'timeStamp');
        case 'intime':
            return array('irid', 'last', 'remain', 'retent', 'intimeCate', 'feeCate', 'typeCate', 'timeStamp');
        case 'update':
            return array('irid', 'last', 'remain', 'retent', 'updateCate', 'feeCate', 'typeCate', 'timeStamp');
        case 'classify1':
            return array('irid', 'last', 'remain', 'retent', 'cate1Cate', 'feeCate', 'typeCate', 'timeStamp');
    }
}

function str_to_number($str) {
    if(strlen($str) <= 1) {
        return $str;
    }

    $trans = array(
        "freFee" => 1, "chgFee" => 2, "monFee" => 3, "pubFee" => 4, "tfFee" => 5,
        "rteDay" => 1, "rteWeek" => 2, "rteWk7" => 3,
        "valDay" => 1, "valWeek" => 2, "valWk7" => 3,
        "limfe1" => 1, "limfe2" => 2, "limfe3" => 3, "limfe4" => 4,
        "finish" => 1, "unfinish" => 2,
        "bt0to1b" => 1, "bt1bto1k" => 2, "bt1kto1w" => 3, "bt1wto10w" => 4, "gt10w" => 5,
        "lesMonIn" => 1, "bt1mto3mIn" => 2, "bt3mto12mIn" => 3, "gt1yIn" => 4,
        "lesMonUpd" => 1, "bt1mto3mUpd" => 2, "bt3mto12mUpd" => 3, "gt1yUpd" => 4,
        "boyCfy1" => 1, "girlCfy1" => 2, "pshCfy1" => 3, "othCfy1" => 4
    );

    return $trans[$str];
}

function to_chinese_character($str) {
    $trans = array(
        'freFee' => '免费', 'chgFee' => '付费', 'monFee' => '包月', 'pubFee'=>'公版', 'tfFee'=>'限免',
        'rteDay' => '天', 'rteWeek'=>'周', 'rteWk7'=>'七日',
        'valDay' => '天', 'valWeek'=>'周', 'valWk7'=>'七日',
        "limfe1" => '第一批限免', "limfe2" => '第二批限免', "limfe3" => '第三批限免', "limfe4" => '第四批限免',
        "finish" => '完结', "unfinish" => '连载',
        "bt1to1b" => '1~1百', "bt1bto1k" => '1百~1千', "bt1kto1w" => '1千~1万', "bt1wto10w" => '1万~10万', "gt10w" => '大于10万',
        "lesMonIn" => '少于1月入库', "bt1mto3mIn" => '1月~3月入库', "bt3mto12mIn" => '3月~12月入库', "gt1yIn" => '大于1年入库',
        "lesMonUpd" => '少于1月更新', "bt1mto3mUpd" => '1月~3月更新', "bt3mto12mUpd" => '3月~12月更新', "gt1yUpd" => '大于1年更新',
        "boyCfy1" => '男频', "girlCfy1" => '女频', "pshCfy1" => '出版', "othCfy1" => '其它'
    );

    return $trans[$str];
}