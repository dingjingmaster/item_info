<?php

define('IN_TEST', 'DEBUG');
define('ROOT_PATH', substr(dirname(__FILE__), 0, -8));
require ROOT_PATH .'/include/common_info.php';
require ROOT_PATH .'/include/mysql_func.php';
header('Content-Type: text/html; charset=utf-8');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '123456');

if(!strcasecmp($_GET['page'], 'retent')) {

} else if (!strcasecmp($_GET['page'], 'exhibit')) {

}










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




} else if(!strcasecmp($_GET['type'], 'search') && (!strcasecmp($_GET['page'], 'exhibit'))) {
    require ROOT_PATH . '/include/search_exhibit.php';
    echo search_init();
} else if(!strcasecmp($_GET['type'], 'search') && (!strcasecmp($_GET['page'], 'exhValu'))) {
    require ROOT_PATH . '/include/search_exhibit_value.php';
    echo search_init();

} else if(!strcasecmp($_POST['page'], 'exhibit')) {
    require ROOT_PATH . '/include/search_exhibit.php';
    _mysql_connect();
    _mysql_select_db();
    echo search_select($_POST['data']);
} else if(!strcasecmp($_POST['page'], 'exhValu')) {
    require ROOT_PATH . '/include/search_exhibit_value.php';
    _mysql_connect();
    _mysql_select_db();
    echo search_select($_POST['data']);
}






?>
