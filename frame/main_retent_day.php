<?php
session_start();
define('IN_TEST', true);
define('SCRIPT', 'day_retention');   // 指定本页内容
require dirname(__FILE__).'/include/item_retent_info.php'

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
        <!--
        <div>
            <?php
                //echo ACTION;
                echo '<form action="' . ACTION . '" method="get">';
            ?>
                姓名<input type="text" name="test">
                <input type="submit" value="提交">
            <?php
                echo '</form>';
            ?>

        </div> -->
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
                    </ul>
                </section>
            </nav>
        </div>
        <div>
            <a name="limitfree"></a>
            <h5 data-magellan-destination="limitfree">各限免批次留存</h5>
            <div id="limitfree_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <a name="fee"></a>
            <h5 data-magellan-destination="fee">各付费情况留存率</h5>
            <div id="fee_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>

            <?php
                // 各限免批次留存
                $title = "各批次限免书留存率统计";
                $yTitle = "留存率(100%)";
                $xData = "";
                $yData = "";
                $tfDiv = "limitfree_plot";
                // 第1批
                $tf1 = "第一批限免";
                $sql='SELECT * FROM item_retent_limitfree WHERE tfCate=1';
                $result = _mysql_query($sql);
                $xArray = array();
                $yArray = array();
                while($row = _mysql_fetch_array($result)) {
                    array_push($xArray, $row['timeStamp']);
                    array_push($yArray, $row['retent']);
                }
                // 生成第一批
                $xData = generate_x_data($xArray, $xData);
                $yData = generate_y_data($tf1, $yArray, $yData);

                // 第二批
                $tf2 = "第二批限免";
                $sql='SELECT * FROM item_retent_limitfree WHERE tfCate=2';
                $result = _mysql_query($sql);
                $yArray = array();
                while($row = _mysql_fetch_array($result)) {
                    array_push($yArray, $row['retent']);
                }
                // 生成第二批
                $yData = generate_y_data($tf2, $yArray, $yData);

                // 第三批
                $tf3 = "第三批限免";
                $sql='SELECT * FROM item_retent_limitfree WHERE tfCate=3';
                $result = _mysql_query($sql);
                $yArray = array();
                while($row = _mysql_fetch_array($result)) {
                    array_push($yArray, $row['retent']);
                }
                // 生成第三批
                $yData = generate_y_data($tf3, $yArray, $yData);

                // 第四批
                $tf4 = "第四批限免";
                $sql='SELECT * FROM item_retent_limitfree WHERE tfCate=4';
                $result = _mysql_query($sql);
                $yArray = array();
                while($row = _mysql_fetch_array($result)) {
                    array_push($yArray, $row['retent']);
                }
                // 生成第四批
                $yData = generate_y_data($tf4, $yArray, $yData);

                // 画图
                plot_line_chart($title, $xData, $yTitle, $yData, $tfDiv);



                // 各付费情况留存
                $title = "各付费书留存率统计";
                $yTitle = "留存率(100%)";
                $xData = "";
                $yData = "";
                $feeDiv = "fee_plot";
                // 免费
                $free = "免费书";
                $sql='SELECT * FROM item_retent_fee WHERE feeCate=1 AND typeCate=1';
                $result = _mysql_query($sql);
                $xArray = array();
                $yArray = array();
                while($row = _mysql_fetch_array($result)) {
                    array_push($xArray, $row['timeStamp']);
                    array_push($yArray, $row['retent']);
                }
                // 免费
                $xData = generate_x_data($xArray, $xData);
                $yData = generate_y_data($free, $yArray, $yData);

                // 付费
                $charge = "付费书";
                $sql='SELECT * FROM item_retent_fee WHERE feeCate=2 AND typeCate=1';
                $result = _mysql_query($sql);
                $yArray = array();
                while($row = _mysql_fetch_array($result)) {
                    array_push($yArray, $row['retent']);
                }
                // 
                $yData = generate_y_data($charge, $yArray, $yData);

                // 包月
                $month = "包月书";
                $sql='SELECT * FROM item_retent_fee WHERE feeCate=3 AND typeCate=1';
                $result = _mysql_query($sql);
                $yArray = array();
                while($row = _mysql_fetch_array($result)) {
                    array_push($yArray, $row['retent']);
                }
                $yData = generate_y_data($month, $yArray, $yData);

                // 公版
                $pub = "公版书";
                $sql='SELECT * FROM item_retent_fee WHERE feeCate=4 AND typeCate=1';
                $result = _mysql_query($sql);
                $yArray = array();
                while($row = _mysql_fetch_array($result)) {
                    array_push($yArray, $row['retent']);
                }
                $yData = generate_y_data($pub, $yArray, $yData);

                // 画图
                plot_line_chart($title, $xData, $yTitle, $yData, $feeDiv);






            ?>




        </div>
    </body>
</html>


