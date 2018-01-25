<?php
/*************************************************************************
> FileName: common_info.php
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月17日 星期三 11时02分46秒
 ************************************************************************/
if(!defined('IN_TEST')) {
    exit('NOT ACCESS IN');
}

if(!strcasecmp(IN_TEST, 'DEBUG')) {
    error_reporting(E_ERROR);
}

header('Content-Type: text/html; charset=utf-8');
define('ROOT_PATH', substr(dirname(__FILE__), 0, -8));

function _common_print_head(){
    echo '<meta charset="utf-8">' .
        '<meta name="renderer" content="webkit">' .
        '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">' .
        '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">' .
        '<script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>'.
        '<link rel="stylesheet" href="lib/layui/css/layui.css" media="all">' .
        '<script src="lib/layui/layui.js"></script>'.
        '<script src="lib/highcharts/code/highcharts.js"></script>';

    return '';
}
        //'<script src="http://code.highcharts.com/highcharts.js"></script>';

?>




