<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/3/1
 * Time: 15:32
 */

function exhibit_init($type){
    $page_back = array();
    $target = '';
    $script_div = "Public/js/exhibit.js";
    $main_div = "";
    $nav_div = "";
    $title_div = "订展比查询";

    if (!strcmp($type,  'value')) {
        $target = '<input type="checkbox" lay-skin="primary" name="dspNum" title="展现量"/>'.
            '<input type="checkbox" lay-skin="primary" name="clkNum" title="点击量"/>'.
            '<input type="checkbox" lay-skin="primary" name="srbNum" title="订阅量" checked/>'.
            '<input type="checkbox" lay-skin="primary" name="redNum" title="阅读量"/>'.
            '<input type="checkbox" lay-skin="primary" name="rteNum" title="留存量"/>';

    }else if (!strcmp($type, 'exhibit')) {
        $target = '<input type="checkbox" lay-skin="primary" name="clkDsp" title="点展比"/>'.
            '<input type="checkbox" lay-skin="primary" name="subClk" title="订点比"/>'.
            '<input type="checkbox" lay-skin="primary" name="subDsp" title="订展比" checked/>'.
            '<input type="checkbox" lay-skin="primary" name="redSub" title="阅订比"/>'.
            '<input type="checkbox" lay-skin="primary" name="redDsp" title="阅展比"/>'.
            '<input type="checkbox" lay-skin="primary" name="retent" title="留存率"/>'.
            '<input type="checkbox" lay-skin="primary" name="rteDsp" title="留展比"/>';
    }

    $form_div = '<form class="layui-form" action="">'.
        '<div class="layui-form-item">'.
        '<label class="layui-form-label">查询维度</label>'.
        '<div class="layui-input-inline">'.
        '<select id="form_dim" lay-filter="form_dim" name="dim">'.
        '<option value=""></option>'.
        '<option value="summary">总计</option>'.
        '<option value="fee">付费类型</option>'.
        '<option value="strategy">推荐策略</option>'.
        '<option value="status">连载状态</option>'.
        '<option value="view">订阅级别</option>'.
        '<option value="intime">入库时间</option>'.
        '<option value="update">更新时间</option>'.
        '<option value="classify1">一级分类</option>'.
        '</select>'.
        '</div>'.
        '</div>'.
        '<div id="form_mod_div" class="layui-form-item">'.
        '<label class="layui-form-label">查询模块</label>'.
        '<div class="layui-input-block">'.
        '<input type="checkbox" lay-skin="primary" name="chsStmMdl" title="精选-瀑布流" checked/>'.
        '<input type="checkbox" lay-skin="primary" name="chsBoyStmMdl" title="精选-男频瀑布流"/>'.
        '<input type="checkbox" lay-skin="primary" name="chsGilStmMdl" title="精选-女频瀑布流"/>'.
        '<input type="checkbox" lay-skin="primary" name="chsRakStmMdl" title="精选-排行瀑布流"/>'.
        '<input type="checkbox" lay-skin="primary" name="chsFinStmMdl" title="精选-完结瀑布流"/>'.
        '<input type="checkbox" lay-skin="primary" name="foeCtgMdl" title="封面页-类别推荐"/>'.
        '<input type="checkbox" lay-skin="primary" name="foeAutMdl" title="封面页-作者推荐"/>'.
        '<input type="checkbox" lay-skin="primary" name="foeArdMdl" title="封面页-读本书的人还看过"/>'.
        '<input type="checkbox" lay-skin="primary" name="foeArdMorMdl" title="封面页-读本书的人还看过更多"/>'.
        '<input type="checkbox" lay-skin="primary" name="bakArdMdl" title="章末页-读本书的人还看过"/>'.
        '<input type="checkbox" lay-skin="primary" name="shfRecMdl" title="书架推荐"/>'.
        '<input type="checkbox" lay-skin="primary" name="shfGusMdl" title="书架-猜你喜欢"/>'.
        '<input type="checkbox" lay-skin="primary" name="freGusMdl" title="免费-猜你喜欢"/>'.
        '<input type="checkbox" lay-skin="primary" name="freMonRecMdl" title="免费-包月推荐"/>'.
        '<input type="checkbox" lay-skin="primary" name="monStmMdl" title="包月瀑布流"/>'.
        '<input type="checkbox" lay-skin="primary" name="redRecMdl" title="根据阅读推荐"/>'.
        '<input type="checkbox" lay-skin="primary" name="extRecMdl" title="退出拦截推荐"/>'.
        '</div>'.
        '</div>'.
        '<div id="form_fee_div" class="layui-form-item ele_hidden">'.
        '<label class="layui-form-label">付费类型</label>'.
        '<div class="layui-input-block">'.
        '<input type="checkbox" lay-skin="primary" name="freFee" title="免费"/>'.
        '<input type="checkbox" lay-skin="primary" name="chgFee" title="付费" checked/>'.
        '<input type="checkbox" lay-skin="primary" name="monFee" title="包月"/>'.
        '<input type="checkbox" lay-skin="primary" name="pubFee" title="公版"/>'.
        '<input type="checkbox" lay-skin="primary" name="tfFee" title="限免"/>'.
        '</div>'.
        '</div>'.
        '<div id="form_sub_div" class="layui-inline ele_hidden">'.
        '<label class="layui-form-label">维度细分</label>'.
        '<div id="form_sub" class="layui-input-block"></div>'.
        '</div>'.
        '<div id="form_target_div" class="layui-form-item">'.
        '<label class="layui-form-label">查询指标</label>'.
        '<div class="layui-input-block">'.
        $target .
        '</div>'.
        '</div>'.
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