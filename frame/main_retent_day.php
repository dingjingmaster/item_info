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
                        <li data-magellan-arrival="fee"><a href="#free">付费情况留存</a></dd>
                        <li data-magellan-arrival="limitfree"><a href="#limitfree">限免书</a></dd>
                        <li data-magellan-arrival="status"><a href="#status">连载/完结统计</a></dd>
                        <li data-magellan-arrival="viewcount"><a href="#viewcount">订阅量</a></dd>
                        <li data-magellan-arrival="intime"><a href="#intime">入库时间</a></dd>
                        <li data-magellan-arrival="update"><a href="#update">更新时间</a></dd>
                    </ul>
                </section>
            </nav>
        </div>
        <div>
            <a name="fee"></a>
            <h5 data-magellan-destination="month">付费书情况留存</h5>
            <div id="fee_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>
            <?php
                $sql='SELECT * FROM item_retent_fee WHERE typeCate=1';
                $result = _mysql_query($sql);
                while($row = _mysql_fetch_array($result)) {
                    echo "<p>".$row['irid']."\t".$row['last']. "\t". $row['retent']."</p>";
                }

            ?>
            <!-- 画图 -->
            <?php
                $x = "";
                $y = "";
                $yd = array('1', '2', '3', '4', '5');
                echo "<hr><br/>";

                $x = generate_x_data("x1", $x);
                $x = generate_x_data("x2", $x);
                $x = generate_x_data("x3", $x);
                $x = generate_x_data("x4", $x);
                $x = generate_x_data("x5", $x);
                $y = generate_y_data("yname", $yd, $y);
                echo $x;
                echo '<br/>';
                echo $y;
                echo "<br/><hr/>";

                plot_line_chart("测试", $x, "y标题", $y, "fee_plot");
            ?>

            <!-- 画图 
            <script language="JavaScript">
                $(document).ready(function () {
                    var title = { text: '月留存情况统计' };
                    var subtitle = { text: '' };
                    var xAxis = {
                        categories: ['2017-12-01',
                            '2017-12-02',
                            '2017-12-03',
                            '2017-12-04',
                            '2017-12-05',
                            '2017-12-06']
                    };
                    var yAxis = {
                        title: {
                            text: '留存率'
                        }
                    };

                    var plotOptions = {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: true 
                        }
                    };

                    var series = [{
                        name: '留存率1',
                        data: [1.1, 2.2, 3.3, 4.4, 5.5, 6.6]
                    }, {
                        name: '留存率2',
                        data: [2.1, 3.2, 4.3, 5.4, 6.5, 7.6]
                    }
                    ];

                    var json = {};

                    json.title = title;
                    json.subtitle = subtitle;
                    json.xAxis = xAxis;
                    json.yAxis = yAxis;
                    json.series = series;
                    json.plotOptions = plotOptions;

                    $('#fee_plot').highcharts(json);
                });
            
            </script>

-->





            <h4 data-magellan-destination="free">免费书</h4>
                <a name="free"></a>
                <p>免费书留存情况<br/></p>

            <h4 data-magellan-destination="charge">付费书</h4>
                <a name="charge"></a>
                <p>付费书留存情况<br/></p>

            <h4 data-magellan-destination="limit_free">限免书</h4>
                <a name="limit_free"></a>
                <p>限免书留存情况<br/></p>

            <h4 data-magellan-destination="pub">公版书</h4>
                <a name="pub"></a>
                <p>公版书留存情况<br/></p>

        </div>
    </body>
</html>


