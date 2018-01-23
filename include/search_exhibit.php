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
               /* '<div class="layui-form-item">'.
                    '<label class="layui-form-label">要查询的模块</label>'.
                    '<div class="layui-input-block">'.
                        '<select name="city" lay-verify="required">'.
                            '<option value=""></option>'.
                            '<option value="0">北京</option>'.
                            '<option value="1">上海</option>'.
                            '<option value="2">广州</option>'.
                            '<option value="3">深圳</option>'.
                            '<option value="4">杭州</option>'.
                        '</select>'.
                    '</div>'.
                    '</div>'.*/
                '<div class="layui-form-item">'.
                    '<label class="layui-form-label">复选框</label>'.
                    '<div class="layui-input-block">'.
                        '<input type="checkbox" name="like[write]" title="写作">'.
                        '<input type="checkbox" name="like[read]" title="阅读" checked>'.
                        '<input type="checkbox" name="like[dai]" title="发呆">'.
                    '</div>'.
                '</div>'.
                '<div class="layui-form-item">'.
                    '<label class="layui-form-label">单选框</label>'.
                    '<div class="layui-input-block">'.
                        '<input type="radio" name="sex" value="男" title="男">'.
                        '<input type="radio" name="sex" value="女" title="女" checked>'.
                    '</div>'.
                '</div>'.
                '<div class="layui-form-item">'.
                    '<div class="layui-input-block">'.
                        '<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>'.
                        '<button type="reset" class="layui-btn layui-btn-primary">重置</button>'.
                    '</div>'.
                '</div>'.
            '</form>'.
            '<script>'.
                'layui.use("form", function(){'.
                    'var form = layui.form;'.
                    'form.on("submit(formDemo)", function(data){'.
                        'layer.msg(JSON.stringify(data.field));'.
                        'return false;'.
                    '});'.
                '});'.
            '</script>';
    return $page;
}
?>


