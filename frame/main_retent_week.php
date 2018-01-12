<?php
session_start();
define('IN_TEST', true);
define('SCRIPT', 'day_retention');   // 指定本页内容
require dirname(__FILE__).'/include/item_retent_info.php';

function plot_retention($which, $div) {
    // 中间变量
    $tableName = "";
    $typeCate = "AND typeCate=1";                           // 天、周、七日
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
            $xData = generate_x_data($xArray, '');
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
                $xData = generate_x_data($xArray, '');
                $yData = generate_y_data($cate, $yArray, $yData);
            } 
        }
    }
    // 画图
    plot_line_chart($title, $xData, $yTitle, $yData, $div);

    return '';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.bootcss.com/foundation/5.5.3/css/foundation.min.css">
        <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/foundation/5.5.3/js/foundation.min.js"></script>
        <script src="https://cdn.bootcss.com/foundation/5.5.3/js/vendor/modernizr.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
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
        <div>
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


