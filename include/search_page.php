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

function chose_select_module() {
    echo '<div class="layui-form">' . 
        '<div class="layui-form-item">'.
        '<label class="layui-form-label">选择查询信息</label>'.
        '<div class="layui-input-block">'.
            '<select name="module">'.
                '<option value="1">付费类型查询</option>'.
                '<option value="2">留存率查询</option>'.
                '<option value="3">留存率查询</option>'.
                '<option value="4">留存率查询</option>'.
                '<option value="5">留存率查询</option>'.
                '<option value="6">留存率查询</option>'.
                '<option value="7">留存率查询</option>'.
                '<option value="8">留存率查询</option>'.
            '</select>'.
        '</div>'.
        '</div>'.
        '</form>';
}

?>


