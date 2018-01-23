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
                    '<input type="radio" name="dim" value="sumDim" title="模块总计"/>' . 
                    '<input type="radio" name="dim" value="feeDim" title="付费类型"/>' .
                    '<input type="radio" name="dim" value="stgDim" title="推荐策略"/>' .
                    '<input type="radio" name="dim" value="stuDim" title="连载状态"/>' .
                    '<input type="radio" name="dim" value="vewDim" title="订阅级别"/>' .
                    '<input type="radio" name="dim" value="itmDim" title="入库时间"/>' .
                    '<input type="radio" name="dim" value="utmDim" title="更新时间"/>' .
                    '<input type="radio" name="dim" value="ctg1Dim" title="一级分类"/>'.
                '</div>' .
            '</div>' .
         '</form>' .
         '<hr class="layui-bg-black">';

}
?>


