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

if(SCRIPT == 'day_retention') {
    define('RETENT', 1);
} else if (SCRIPT == 'week_retention') {
    define('RETENT', 2);
} else if (SCRIPT == 'week7_retention') {
    define('RETENT', 3);
}
define('ACTION', '/frame/include/common_action.php');

require ROOT_PATH.'/include/mysql_func.php';
_mysql_connect();
_mysql_select_db();



// 解析字符



// 主键切割 - 获取字段信息
function prekey_split($mstr) {
    $arr = explode('-', $mstr);
    if(count($arr) == 3) {
        return $arr[1];
    } else if (count($arr) == 4) {
        return $arr[1] . '-' . $arr[2];
    }
    return 'unknow' . '-' . $mstr . '-' . 'error';
}

// 生成x轴cate数据
function generate_x_data($mArray, $res) {
    if (count(mArray) == 0) {
        return $res;
    }
    if(strlen($res) > 1) {
        $res = $res . ','; 
    } 

    for($i = 0; $i < count($mArray); ++ $i) {
        $res = $res . '"' . $mArray[$i] . '"' . ',';
    }
    $res = substr($res, 0, strlen($res) - 1);

    return $res;
}

// 生成y轴数据
function generate_y_data($name, $mArray, $res) {
    if (count(mArray) == 0 || strlen($name) == "") {
        return $res;
    }
    if (strlen($res) > 1) {
        $res = $res . ',';
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

function plot_retention($which, $div, $retent) {
    // 中间变量
    $tableName = "";
    $typeCate = "AND typeCate=" . RETENT;                   // 天、周、七日
    $paraCate = "";                                         // 自定义字段
    $feeCate = "";                                          // 付费
    $paraNum = 0;                                           // 自定义字段最大值
    $feeNum = 0;                                            // 付费最大值

    // 最终变量
    $title = "";
    $yTitle = "留存率(100%)";
    $xData = "";
    $yData = "";

    if ($which == 'limitfree') {
        $tableName = "item_retent_limitfree";
        $title = "各批次限免书留存率统计";
        $paraCate = "tfCate=";
        $paraNum = 4;
        $typeCate = "";
    } else if ($which == 'fee') {
        $tableName = "item_retent_fee";
        $title = "付费留存率统计";
        $paraCate = "feeCate=";
        $paraNum = 5;
    } else if ($which == 'status') {
        $tableName = "item_retent_status";
        $title = "书籍状态留存率统计";
        $paraCate = "statuCate=";
        $paraNum = 2;
        $feeCate = "feeCate=";
        $feeNum = 5;
    } else if ($which == 'viewCount') {
        $tableName = "item_retent_viewCount";
        $title = "书籍订阅留存率统计";
        $paraCate = "viewCate=";
        $paraNum = 5;
        $feeCate = "feeCate=";
        $feeNum = 5;
    } else if ($which == 'intime') {
        $tableName = "item_retent_intime";
        $title = "书籍入库时间留存率统计";
        $paraCate = "intimeCate=";
        $paraNum = 4;
        $feeCate = "feeCate=";
        $feeNum = 5;
    } else if ($which == 'update') {
        $tableName = "item_retent_update";
        $title = "书籍最后更新时间留存率统计";
        $paraCate = "updateCate=";
        $paraNum = 4;
        $feeCate = "feeCate=";
        $feeNum = 5;
    } else if ($which == 'classify1') {
        $tableName = "item_retent_classify1";
        $title = "书籍一级分类留存率统计";
        $paraCate = "cate1Cate=";
        $paraNum = 4;
        $feeCate = "feeCate=";
        $feeNum = 5;
    }

    $sql = 'SELECT * FROM ' . $tableName . ' WHERE ';

    if ($feeNum <= 0) {
        for ($i = 1; $i <= $paraNum; ++ $i) {
            $msql = $sql . ' ' . $paraCate . $i . ' ' . $typeCate;
            $result = _mysql_query($msql);
            $xArray = array();
            $yArray = array();
            $cate = '';
            while ($row = _mysql_fetch_array($result)) {
                $cate = prekey_split($row['irid']);
                array_push($xArray, $row['timeStamp']);
                array_push($yArray, $row['retent']);
            }
            // 生成 xdata
            $xData1 = $xData;
            $xData = generate_x_data($xArray, '');
            if(strlen($xData) <= 3) {
                $xData = $xData1;
            }
            $yData = generate_y_data($cate, $yArray, $yData);
        }
    } else {
        // 其它情况
        for($i = 1; $i <= $paraNum; ++ $i) {
            for($j = 1; $j <= $feeNum; ++ $j) {
                $msql = $sql . ' ' . $paraCate . $i . ' AND ' . $feeCate . $j . ' ' . $typeCate;
                $result = _mysql_query($msql);
                $xArray = array();
                $yArray = array();
                $cate = '';
                while ($row = _mysql_fetch_array($result)) {
                    $cate = prekey_split($row['irid']);
                    array_push($xArray, $row['timeStamp']);
                    array_push($yArray, $row['retent']);
                }
                // 生成 xdata
                $xData1 = $xData;
                $xData = generate_x_data($xArray, '');
                if(strlen($xData) <= 3) {
                    $xData = $xData1;
                }
                $yData = generate_y_data($cate, $yArray, $yData);
            } 
        }
    }
    // 画图
    plot_line_chart($title, $xData, $yTitle, $yData, $div);

    return '';
}

?>





