<?php

define('IN_TEST', 'DEBUG');
define('ROOT_PATH', substr(dirname(__FILE__), 0, -8));
require ROOT_PATH .'/include/common_info.php';
require ROOT_PATH .'/include/mysql_func.php';
header('Content-Type: text/html; charset=utf-8');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '123456');

if(!strcasecmp($_GET['type'], 'retent')) {
    require ROOT_PATH . '/include/item_retent_info.php';
    _mysql_connect();
    _mysql_select_db();
    echo get_item_retent($_GET['req']);
} else if(!strcasecmp($_GET['type'], 'exhibit')) {
    require ROOT_PATH . '/include/item_exhibit_info.php';
    _mysql_connect();
    _mysql_select_db();
    echo get_item_exhibit($_GET['req']);


} else if(!strcasecmp($_GET['type'], 'search')) {
    if((!strcasecmp($_GET['page'], 'retent')) && (count($_GET) == 2)) {
        require ROOT_PATH . '/include/search_retent.php';
        echo search_init();

    } else if (!strcasecmp($_POST['page'], 'exhibit')) {
        require ROOT_PATH . '/include/search_exhibit.php';
        if(count($_POST) == 2) {
            echo search_init();
        } else if (count($_POST) == 3) {
            echo $_POST['data'];
            //_mysql_connect();
            //_mysql_select_db();
            //echo $_POST['data'];
            //echo search_select($_GET['data']);
        }
    }

}




?>
