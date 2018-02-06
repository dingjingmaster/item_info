<?php
/*************************************************************************
> FileName: search_page.php
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月23日 星期二 10时13分25秒
 ************************************************************************/
if(!defined('IN_TEST')) {
    exit('NOT ACCESS!');
}
if(!strcasecmp(INTEST, 'DEBUG')) {
    error_reporting(E_ERROR);                                             // 开启错误报告
}

function retent_rate_init(){

    $page_back = array();
    $script_div = "js/retent_global.js";
    $form_div = "";
    $main_div = "";
    $nav_div = "";
    $title_div = "留存率查询";

    $form_div = '<form class="layui-form" action="">'.
                '<div class="layui-form-item">'.
                    '<label class="layui-form-label">查询维度</label>'.
                    '<div class="layui-input-inline">'.
                        '<select id="form_dim" lay-filter="form_dim" name="dim">'.
                            '<option value=""></option>'.
                            '<option value="summary">限免</option>'.
                            '<option value="fee">付费类型</option>'.
                            '<option value="strategy">连载/完结状态</option>'.
                            '<option value="view">订阅级别</option>'.
                            '<option value="intime">入库时间</option>'.
                            '<option value="update">更新时间</option>'.
                            '<option value="classify1">一级分类</option>'.
                        '</select>'.
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
                        '<input type="checkbox" lay-skin="primary" name="clkDsp" title="天留存" checked/>'.
                        '<input type="checkbox" lay-skin="primary" name="subClk" title="周留存"/>'.
                        '<input type="checkbox" lay-skin="primary" name="subDsp" title="七日留存"/>'.
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

    $page_back['script'] = $script;
    $page_back['form_div'] = $form_div;
    $page_back['main_div'] = $main_div;
    $page_back['nav_div'] = $nav_div;
    $page_back['title_div'] = $title_div;
    $page_back['script_div'] = $script_div;

    return json_encode($page_back);
}


?>


