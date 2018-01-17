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

if(!strcasecmp($_GET['type'], 'retent_day')) {
    _set_mysql('retent');
    require ROOT_PATH . '/include/item_retent_info.php';
    define('RETENT', 1);
    _mysql_connect();
    _mysql_select_db();


            plot_retention("limitfree", "limitfree_plot");
            plot_retention("fee", "fee_plot");
            plot_retention("status", "status_plot");
            plot_retention("viewCount", "viewCount_plot");
            plot_retention("intime", "intime_plot");
            plot_retention("update", "update_plot");
            plot_retention("classify1", "cate1_plot");



    echo '' .
            '<a name="limitfree"></a>' .
            '<h5>各限免批次留存率</h5>' .
            '<div id="limitfree_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>' .
            '' .
            '<a name="fee"></a>' .
            '<h5>各付费情况留存率</h5>' .
            '<div id="fee_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>' .
            ''.
            '<a name="status"></a>'.
            '<h5>连载/完结状态留存率</h5>' .
            '<div id="status_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>' .
            ''.
            '<a name="viewcount"></a>'.
            '<h5>订阅量留存率</h5>'.
            '<div id="viewCount_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
            ''.
            '<a name="intime"></a>'.
            '<h5>入库时间留存率</h5>' .
            '<div id="intime_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
            ''.
            '<a name="update"></a>'.
            '<h5>更新时间留存率</h5>'.
            '<div id="update_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
            ''.
            '<a name="cate1"></a>'.
            '<h5>一级分类留存</h5>'.
            '<div id="cate1_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>';

} else if(!strcasecmp($_GET['type'], 'retent_week')) {
    _set_mysql('retent');
    require ROOT_PATH . '/include/item_retent_info.php';
    define('RETENT', 2);

} else if(!strcasecmp($_GET['type'], 'retent_week7')) {
    _set_mysql('retent');
    require ROOT_PATH . '/include/item_retent_info.php';
    define('RETENT', 3);

}



?>
