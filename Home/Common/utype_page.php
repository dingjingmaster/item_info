<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/9/10
 * Time: 10:18
 */

function utype_init($type) {
    $page_back = array();
    $target = '';
    $script_div = "Public/js/utype.js";
    $main_div = "";
    $nav_div = "";
    $title_div = "用户类型";

    if (!strcmp($type,  'value')) {
        $target = '<input type="checkbox" lay-skin="primary" name="freNum" title="免费用户量"/>'.
            '<input type="checkbox" lay-skin="primary" name="nchNum" title="准付费用户量"/>'.
            '<input type="checkbox" lay-skin="primary" name="chaNum" title="付费用户量" checked/>'.
            '<input type="checkbox" lay-skin="primary" name="monNum" title="包月用户量"/>'.
            '<input type="checkbox" lay-skin="primary" name="allNum" title="天用户量"/>';

    }else if (!strcmp($type, 'exhibit')) {
        $target = '<input type="checkbox" lay-skin="primary" name="frePro" title="免费用户占比"/>'.
            '<input type="checkbox" lay-skin="primary" name="nchPro" title="准付费用户占比"/>'.
            '<input type="checkbox" lay-skin="primary" name="chaPro" title="付费用户占比" checked/>'.
            '<input type="checkbox" lay-skin="primary" name="monPro" title="包月用户占比"/>';
    }

    $form_div = '<form class="layui-form" action="">'.
        '<div id="form_target_div" class="layui-form-item">'.
        '<label class="layui-form-label">查询指标</label>'.
        '<div class="layui-input-block">'.
        $target .
        '</div></div>'.
        '<div id="form_time_div" class="layui-form-item">'.
        '<div class="layui-inline">'.
        '<label class="layui-form-label">开始时间</label>'.
        '<div class="layui-input-block">'.
        '<input type="text" class="layui-input" readonly="" id="fstart_tim">'.
        '</div>' .
        '</div>'.
        '<div class="layui-inline">'.
        '<label class="layui-form-label">截止时间</label>'.
        '<div class="layui-input-inline">'.
        '<input type="text" class="layui-input" readonly="" id="fstop_tim">'.
        '</div>'.
        '</div>'.
        '</div>'.
        '<div id="form_submit" class="layui-form-item">'.
        '<div class="layui-input-block">'.
        '<button class="layui-btn" lay-submit lay-filter="form_submit">立即提交</button>'.
        '<button id="form_reset" type="reset" class="layui-btn layui-btn-primary" lay-filter="form_reset">重置</button>'.
        '</div>'.
        '</div>'.
        '</form>';

    $page_back['form_div'] = $form_div;
    $page_back['main_div'] = $main_div;
    $page_back['nav_div'] = $nav_div;
    $page_back['title_div'] = $title_div;
    $page_back['script_div'] = $script_div;

    return $page_back;
}