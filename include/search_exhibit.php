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
    echo '<form class="layui-form" action="">' .
            '<div class="layui-form-item">' . 
                '<label class="layui-form-label">选择查询维度</label>' .
                '<div class="layui-input-block">' . 
                    '<select name="dim" lay-filter="">' .
                        '<option value="sumDim">总计</option>' . 
                        '<option value="feeDim">付费类型</option>' .
                        '<option value="stgDim">推荐策略</option>' .
                        '<option value="stuDim">连载状态</option>' .
                        '<option value="vewDim">订阅级别</option>' .
                        '<option value="itmDim">入库时间</option>' .
                        '<option value="utmDim">更新时间</option>' .
                        '<option value="ctg1Dim">一级分类</option>'.
                    '</select>' .
                '</div>' .
            '</div>' .
            '<div class="layui-form-item">' .
                '<button class="layui-btn" layui-submit="">提交</button>'.
            '</div>'.
         '</form>' .
         '<hr class="layui-bg-black"/>';

}
?>


