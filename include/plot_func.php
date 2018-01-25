<?php
/*************************************************************************
> FileName: plot_func.php
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月24日 星期三 17时31分24秒
 ************************************************************************/
if(!defined('IN_TEST')) {
    exit('NOT ACCESS!');
}
if(!strcasecmp(INTEST, 'DEBUG')) {
    error_reporting(E_ERROR);                                             // 开启错误报告
}

// json title
function generate_title($title) {
    $arr = array();
    $arr['text'] = $title;
    
    return $arr;
}

// json subtitle
function generate_subtitle($subtitle) {
    $arr = array();
    $arr['text'] = $subtitle;
    
    return $arr;
}

// json x
function generate_x($mArray) {
    if (count($mArray) <= 1) {
        return false;
    }

    $arr = array();
    $mArr = array();
    for($i = 0; $i < count($mArray); ++ $i) {
        array_push($mArr, $mArray[$i]);
    }
    $arr['categories'] = $mArr;
   
    return $arr;
}

// json y
function generate_y($mName) {
    $arr = array();
    $mArr = array();
    $mArr['text'] = $mName;
    $arr['title'] = $mArr;
   
    return $arr;
}

// json series
function generate_series($mName, $dataArray) {
    if (count($dataArray) <= 1 || strlen($mName) <= 1) {
        return false;
    }

    $arr = array();
    $mArr = array();
    $arr['name'] = $mName;
    for($i=0; $i<count($dataArray); ++$i) {
        array_push($mArr, round((float)$dataArray[$i], 4));
    }
    $arr['data'] = $mArr;

    return $arr;
}

function generate_plot_option() {
    $arr = array();
    $mArr1 = array();
    $mArr2 = array();

    $mArr1['enabled'] = true;
    $mArr2['dataLabels'] = $mArr1;
    $mArr2['enableMouseTracking'] = true;
    $arr['line'] = $mArr2;

    return $arr;
}





?>
