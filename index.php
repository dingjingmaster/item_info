<!--
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://cdn.static.runoob.com/libs/foundation/5.5.3/js/foundation.min.js"></script>
        <script src="http://cdn.static.runoob.com/libs/foundation/5.5.3/js/vendor/modernizr.js"></script>
        <script type="text/javascript" src="js/main_size.js"></script>
        <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/foundation/5.5.3/css/foundation.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <title>宜搜物品信息展示平台</title>
        <script>
            function body_resize(){
                frame_width();
            }

            function mtest(){
                alert("test");
                document.getElementById('frame_main').src="frame/common_left_slider.php";
            }
        </script>
    </head>
    <body onresize="body_resize()">
        <iframe src="frame/common_left_slider.php" id="frame_slider" scrolling="auto" width="200" height="100%"></iframe>
        <iframe src="frame/main_retent_day.php" id="frame_main" onload="frame_width()" float="right" scrolling="auto" height="100%"></iframe>
    </body>
</html>

-->

<?php
/*************************************************************************
> FileName: index.php
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月17日 星期三 14时23分34秒
 ************************************************************************/
require dirname(__FILE__) . '/include/common_action.php';

?>
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <?php _common_print_head() ?>
        <title>宜搜物品信息展示平台</title>
        <script type="text/javascript" src="js/main_request.js"></script>
        <script>
            $(document).ready(function() {
            })
        </script>
    </head>

    <body class="layui-layout-body">
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header">
                <div class="layui-logo"> logo </div>


                <ul class="layui-nav layui-layout-left">
                    <li class="layui-nav-item"> <a href="">item1</a></li>
                    <li class="layui-nav-item"> <a href="">item2</a></li>
                    <li class="layui-nav-item"> <a href="">item3</a></li>
                    <li class="layui-nav-item">
                        <a href="javascript:;">other</a>
                        <dl class="layui-nav-child">
                            <dd><a href="">l1</a></dd>
                            <dd><a href="">l2</a></dd>
                            <dd><a href="">l3</a></dd>
                        </dl>
                    </li>
                </ul>


            </div>

            <div class="layui-side layui-bg-black">
                <div class="layui-slide-scroll">
                    <ul class="layui-nav layui-nav-tree" lay-filter="test">
                        <li class="layui-nav-item">
                            <a class="" href="javascript:;">留存相关统计</a>
                            <dl class="layui-nav-child">
                                <dd><button class="layui-btn layui-btn-fluid" onclick="request_retent_day()">天留存统计</button></dd>
                                <dd><button class="layui-btn layui-btn-fluid" onclick="request_retent_week()">周留存统计</button></dd>
                                <dd><button class="layui-btn layui-btn-fluid" onclick="request_retent_week7()">七日留存统计</button></dd>
                            </dl>
                        </li>

                        <li class="layui-nav-item">
                            <a href="javascript:;">订展比相关统计</a>
                            <dl class="layui-nav-child">
                                <dd><a href="javascript:;">子1</a></dd>
                                <dd><a href="javascript:;">子2</a></dd>
                                <dd><a href="javascript:;">子3</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
            </div>




            <div class="layui-body">
                <div id="main_div" style="padding: 15px;">主体区域</div>
            </div>

            <div class="layui-footer">
                @ this is a demo
            </div>
        </div>
    <script>
        layui.use('element', function(){
            var element = layui.element;
        })
    </script>
    </body>
</html>

