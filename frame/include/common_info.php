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

require ROOT_PATH.'/include/global_func.php';
require ROOT_PATH.'/include/mysql_func.php';
_mysql_connect();
_mysql_select_db();


?>
