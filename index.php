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
        <script type="text/javascript" src="js/main_search.js"></script>
        <script type="text/javascript" src="js/main_global.js"></script>
        <link rel="stylesheet" href="css/main_global.css"/>


    </head>

    <body class="layui-layout-body" onload="request_retent('day')">
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header">
                <div id="title_div" class="layui-logo"></div>
                <ul id="nav_page" class="layui-nav layui-layout-left"></ul>

                <ul class="layui-nav layui-layout-right">
                    <li class="layui-nav-item">
                        <a href="javascript:;">自定义查询</a>
                        <dl id="search_module" class="layui-nav-child">
                            <dd><a href="javascript:search_request_init('retent');">留存率相关查询</a></dd>
<!--                            <dd><a href="javascript:search_request_init('exhibit');">订展比相关查询</a></dd>
-->
                        </dl>
                    </li>
                </ul>
            </div>

            <div class="layui-side layui-bg-black">
                <div class="layui-slide-scroll">
                    <ul class="layui-nav layui-nav-tree layui-nav-slide">
                        <li class="layui-nav-item">
                            <a class="" href="javascript:;">留存相关统计</a>
                            <dl class="layui-nav-child">
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_retent('day')">天留存统计</button></dd>
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_retent('week')">周留存统计</button></dd>
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_retent('week7')">七日留存统计</button></dd>
                            </dl>
                        </li>

                        <li class="layui-nav-item">
                            <a href="javascript:;">订展比相关查询</a>
                            <dl class="layui-nav-child">
                                <dd><a href="javascript:search_request_init('exhibit');">各指标占比查询</a></dd>
<!--
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_exhibit('clkDsp')">点展比</button></dd>
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_exhibit('subClk')">订点比</button></dd>
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_exhibit('subDsp')">订展比</button></dd>
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_exhibit('redSub')">阅订比</button></dd>
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_exhibit('redDsp')">阅展比</button></dd>
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_exhibit('retent')">留存率</button></dd>
                                <dd><button class="layui-btn layui-btn-normal layui-btn-fluid" onclick="request_exhibit('rteDsp')">留展比</button></dd>
-->
                            </dl>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="layui-body">
                <div id="form_div" style="padding: 15px;"></div>
                <div id="main_div" style="padding: 15px;"></div>
            </div>
            <div class="layui-footer"> @  宜搜小说 </div>
        </div>
   </body>
</html>

