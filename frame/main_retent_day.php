<?php
define('IN_TEST', true);
define('SCRIPT', 'day_retention');
require dirname(__FILE__).'/include/item_retent_info.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <?php _print_head(); ?>
        <link rel="stylesheet" type="text/css" href="../css/slide_main.css">

        <script>
            $(document).ready(function() {
                $(document).foundation();
            })
        </script>

    </head>
    <body>
        <div data-magellan-expedition="fixed">
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <li class="name">
                        <h3><a href="#">天留存率相关统计</a></h3>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span> Menu </span></a></li>
                </ul>
                <section class="top-bar-section">
                    <ul class="left">
                        <li data-magellan-arrival="limitfree"><a href="#limitfree">各批次限免书留存</a></dd>
                        <li data-magellan-arrival="fee"><a href="#fee">各付费情况留存</a></dd>
                        <li data-magellan-arrival="status"><a href="#status">连载/完结状态留存</a></dd>
                        <li data-magellan-arrival="viewcount"><a href="#viewcount">各订阅量阶段留存</a></dd>
                        <li data-magellan-arrival="intime"><a href="#intime">入库时间段留存</a></dd>
                        <li data-magellan-arrival="update"><a href="#update">更新时间段留存</a></dd>
                        <li data-magellan-arrival="cate1"><a href="#cate1">一级分类留存</a></dd>
                    </ul>
                </section>
            </nav>
        </div>
        <div id="slide_main">
            <a name="limitfree"></a>
            <h5 data-magellan-destination="limitfree">各限免批次留存率</h5>
            <div id="limitfree_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <a name="fee"></a>
            <h5 data-magellan-destination="fee">各付费情况留存率</h5>
            <div id="fee_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <a name="status"></a>
            <h5 data-magellan-destination="status">连载/完结状态留存率</h5>
            <div id="status_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <a name="viewcount"></a>
            <h5 data-magellan-destination="viewcount">订阅量留存率</h5>
            <div id="viewCount_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <a name="intime"></a>
            <h5 data-magellan-destination="intime">入库时间留存率</h5>
            <div id="intime_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <a name="update"></a>
            <h5 data-magellan-destination="update">更新时间留存率</h5>
            <div id="update_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <a name="cate1"></a>
            <h5 data-magellan-destination="cate1">一级分类留存</h5>
            <div id="cate1_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <?php

                plot_retention("limitfree", "limitfree_plot");
                plot_retention("fee", "fee_plot");
                plot_retention("status", "status_plot");
                plot_retention("viewCount", "viewCount_plot");
                plot_retention("intime", "intime_plot");
                plot_retention("update", "update_plot");
                plot_retention("classify1", "cate1_plot");

            ?>
        </div>
    </body>
</html>


