<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/2/28
 * Time: 14:28
 */

function date_range($min, $max) {
    $res = array();
    $diff = (int)date_diff(date_create($min), date_create($max)) ->format("%a");

    for($i = 0; $i <= $diff; ++ $i) {
        $res[date("Ymd", strtotime($min) + $i * 86400)] = 0;
    }

    return $res;
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
    $arr = array();
    $mArr = array();
    $arr['name'] = $mName;
    foreach($dataArray as $k => $v) {
        array_push($mArr, round((float)$v, 4));
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

function generate_response($res, $nav_title, $title, $yTitle){
        $rep = array();
        $xData = array();
        $yData = array();
        $mainPage = '<a name="select"></a>'.'<div id="select_plot" style="width: 1000px; height: 600px; margin: 0 auto"> </div>';
        $navPage = '<li class="layui-nav-item"><a href="#select">' . $nav_title . '</a></li>';
        foreach($res as $i) {
            $xData = array_keys($i['data']);
            array_push($yData, generate_series($i['exp'], $i['data']));
        }

        // 产生title
        $picRes['title'] = generate_title($title);
        $picRes['subtitle'] = generate_title('');
        $picRes['xAxis'] = generate_x($xData);
        $picRes['yAxis'] = generate_y($yTitle);
        $picRes['series'] = $yData;
        $picRes['plotOptions'] = generate_plot_option();
        $finRes['div'] = "select_plot";
        $finRes['json'] = json_encode($picRes);

        $rep['title'] = $title;
        $rep['mainPage'] = $mainPage;
        $rep['navPage'] = $navPage;
        $rep['json'] = json_encode($finRes);

        return $rep;
}