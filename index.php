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
                <ul id="nav_page" class="layui-nav layui-layout-left"></ul>
            </div>

            <div class="layui-side layui-bg-black">
                <div class="layui-slide-scroll">
                    <ul class="layui-nav layui-nav-tree" lay-filter="test">
                        <li class="layui-nav-item">
                            <a class="" href="javascript:;">留存相关统计</a>
                            <dl class="layui-nav-child">
                                <dd><button class="layui-btn layui-btn-fluid" onclick="request_retent('day')">天留存统计</button></dd>
                                <dd><button class="layui-btn layui-btn-fluid" onclick="request_retent('week')">周留存统计</button></dd>
                                <dd><button class="layui-btn layui-btn-fluid" onclick="request_retent('week7')">七日留存统计</button></dd>
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
                <div id="menu_div" style="padding: 15px;"></div>
                <div id="main_div" style="padding: 15px;"></div>
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

