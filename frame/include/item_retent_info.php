<?php
if(!defined('IN_TEST')) {
    exit('NOT ACCESS!');
}
error_reporting(E_ERROR);                                               // 开启错误报告
session_start();
header('Content-Type: text/html; charset=utf-8');
define('ROOT_PATH', substr(dirname(__FILE__),0,-8));                    // 转换硬路径常量
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', 'dingjing1009.');
define('DB_NAME', 'item_retention');

define('ACTION', '/frame/include/common_action.php');

require ROOT_PATH.'/include/mysql_func.php';
_mysql_connect();
_mysql_select_db();

// 生成x轴cate数据
function generate_x_data($data, $res) {
    if(strlen($res) > 1) {
        $res = $res . ','; 
    } 

    $res = $res . '"' . $data . '"';

    return $res;
}

// 生成y轴数据
function generate_y_data($name, $mArray, $res) {
    if (strlen($res) > 1) {
        $buf = $buf . ',';
    }

    $res = $res . '{name: "' . $name . '", data: [';
    for($i=0; $i<count($mArray); ++$i) {
        $res = $res . $mArray[$i] . ',';
    }

    $res = substr($res, 0, strlen($res) - 1);
    $res = $res . ']}';

    return $res;
}


// 绘制则线图
function plot_line_chart($title, $xCate, $yTitle, $series, $divId) {
    echo '<script language="JavaScript">'.
        '$(document).ready(function(){' .
        'var title = {text: "' . $title . '" };' .
        'var subtitle = {text:' . '""};' .
        'var xAxis = { categories: [' . $xCate. ']};' . 
        'var yAxis = { title: { text: "' . $yTitle . '" }};' . 
        'var plotOptions = { line:{ dataLabels: { enabled: true }, enableMouseTracking: true}};' . 
        'var series = ['. $series . '];' .
        'var json = {};' .
        'json.title = title; json.subtitle = subtitle; json.xAxis = xAxis; json.yAxis = yAxis; json.series = series; json.plotOptions = plotOptions;' . 
        '$("#' . $divId . '").highcharts(json);});' .
        '</script>';
}


?>
