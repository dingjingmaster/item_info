<?php

define('IN_TEST', 'DEBUG');
define('ROOT_PATH', substr(dirname(__FILE__), 0, -8));
require ROOT_PATH .'/include/common_info.php';
require ROOT_PATH .'/include/mysql_func.php';
header('Content-Type: text/html; charset=utf-8');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', 'dingjing1009.');

function _set_mysql($func) {
    if($func == 'retent') {
        define('DB_NAME', 'item_retention');
    }
}

if(!strcasecmp($_GET['type'], 'retent')) {
    _set_mysql('retent');
    require ROOT_PATH . '/include/item_retent_info.php';
    _mysql_connect();
    _mysql_select_db();
    echo get_item_retent($_GET['req']);
} 




?>
