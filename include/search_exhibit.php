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

function search_init(){
    $page = '<form class="layui-form" action="">'.
                '<div class="layui-form-item">'.
                    '<label class="layui-form-label">查询维度</label>'.
                    '<div class="layui-input-block">'.
                        '<select id="form_dim" lay-filter="dim_select" name="dim">'.
                            '<option value=""></option>'.
                            '<option value="sum">总计</option>'.
                            '<option value="fee">付费类型</option>'.
                            '<option value="stg">推荐策略</option>'.
                            '<option value="stu">连载状态</option>'.
                            '<option value="vie">订阅级别</option>'.
                            '<option value="itim">入库时间</option>'.
                            '<option value="utim">更新时间</option>'.
                            '<option value="ctg1">一级分类</option>'.
                        '</select>'.
                    '</div>'.
                '</div>'.
                ''.
                '<div class="layui-form-item">'.
                    '<label class="layui-form-label">页面模块</label>'.
                    '<div class="layui-input-block">'.
                        '<select id="form_module" name="dim" lay-verify="required">'.
                            '<option value=""></option>'.
                        '</select>'.
                    '</div>'.
                '</div>'.
                ''.
                '<div class="layui-form-item">'.
                    '<label class="layui-form-label">付费类型</label>'.
                    '<div class="layui-input-block">'.
                        '<input type="checkbox" name="freFee" title="免费">'.
                        '<input type="checkbox" name="chgFee" title="付费">'.
                        '<input type="checkbox" name="monFee" title="包月">'.
                        '<input type="checkbox" name="pubFee" title="公版">'.
                        '<input type="checkbox" name="tfFee" title="限免">'.
                    '</div>'.
                '</div>'.
                ''.
                '<div class="layui-form-item">'.
                    '<div class="layui-input-block">'.
                        '<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>'.
                        '<button id="form_reset" type="reset" class="layui-btn layui-btn-primary">重置</button>'.
                    '</div>'.
                '</div>'.
            '</form>';

    return $page;
}
?>


