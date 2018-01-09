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
                        <h3><a href="#">留存率</a></h3>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span> Menu </span></a></li>
                </ul>

                <section class="top-bar-section">
                    <ul class="left">
                        <li data-magellan-arrival="month"><a href="#month">包月书</a></dd>
                        <li data-magellan-arrival="free"><a href="#free">免费书</a></dd>
                        <li data-magellan-arrival="charge"><a href="#charge">付费书</a></dd>
                        <li data-magellan-arrival="limit_free"><a href="#limit_free">限免书</a></dd>
                        <li data-magellan-arrival="pub"><a href="#pub">公版书</a></dd>
                    </ul>
                </section>
            </nav>
        </div>
        <div>

            <h4 data-magellan-destination="month">包月书</h4>
                <a name="month"></a>
                <div id="month_plot" style="width: 550px; height: 400px; margin: 0 auto"> </div>


        <!-- 画图 -->
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

                $('#month_plot').highcharts(json);
            });
            
        </script>







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


