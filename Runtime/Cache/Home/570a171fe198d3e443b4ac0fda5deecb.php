<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>宜搜物品信息展示平台</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="Public/lib/layui/css/layui.css" media="all"/>
    <link rel="stylesheet" href="Public/css/main_global.css"/>
    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="Public/lib/layui/layui.js"></script>
    <script src="Public/lib/highcharts/code/highcharts.js"></script>
    <script type="text/javascript" src="Public/js/common.js"></script>
    <script type="text/javascript" src="Public/js/get_request.js"></script>
    <script type="text/javascript" src="Public/js/post_request.js"></script>
</head>
<body class="layui-layout-body" onload="get_request('retent', 'retent_init')">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div id="title_div" class="layui-logo"></div>
        <ul id="nav_div" class="layui-nav layui-layout-left"></ul>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-slide-scroll">
            <ul class="layui-nav layui-nav-tree layui-nav-slide">
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">留存相关统计</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:get_request('retent', 'retent_init');">留存率查询</a></dd>
                        <dd><a href="javascript:get_request('retent', 'value_init');">阅读查询</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">订展比相关查询</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:get_request('exhibit', 'exhibit_init');">比例查询</a></dd>
                        <dd><a href="javascript:get_request('exhibit', 'value_init');">阅读量查询</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">天相关统计查询</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:get_request('day', 'day_buy_init');">天购买量查询</a></dd>
                        <dd><a href="javascript:get_request('day', 'day_read_init');">天阅读量查询</a></dd>
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