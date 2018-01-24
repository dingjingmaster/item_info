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
                    '<div class="layui-form-item ele_hidden">'.
                    '<label class="layui-form-label">查询维度</label>'.
                    '<div class="layui-input-block">'.
                        '<select id="form_dim" lay-filter="form_dim" name="dim">'.
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
                '<div id="form_sub_div" class="layui-form-item ele_hidden">'.
                    '<label class="layui-form-label">维度细分</label>'.
                    '<div class="layui-input-block">'.
                        '<select id="form_sub" lay-filter="form_module" name="module">'.
                            '<option value=""></option>'.
                        '</select>'.
                    '</div>'.
                '</div>'.
                ''.
                 '<div id="form_mod_div" class="layui-form-item">'.
                    '<label class="layui-form-label">查询模块</label>'.
                    '<div class="layui-input-block">'.
                        '<select id="form_mod" lay-filter="form_mod" name="mod">'.
                            '<option value="shfRecMdl">书架推荐</select>'.
                            '<option value="monStmMdl">包月瀑布流</select>'.
                            '<option value="redRecMdl">根据阅读推荐</select>'.
                            '<option value="extRecMdl">退出拦截推荐</select>'.
                            '<option value="freGusMdl">免费-猜你喜欢</select>'.
                            '<option value="freMonRecMdl">免费-包月推荐</select>'.
                            '<option value="shfGusMdl">书架-猜你喜欢</select>'.
                            '<option value="chsStmMdl">精选-瀑布流</select>'.
                            '<option value="chsBoyStmMdl">精选-男频瀑布流</select>'.
                            '<option value="chsGilStmMdl">精选-女频瀑布流</select>'.
                            '<option value="chsRakStmMdl">精选-排行瀑布流</select>'.
                            '<option value="chsFinStmMdl">精选-完结瀑布流</select>'.
                            '<option value="foeCtgMdl">封面页-类别推荐</select>'.
                            '<option value="foeAutMdl">封面页-作者推荐</select>'.
                            '<option value="foeArdMdl">封面页-读本书的人还看过</select>'.
                            '<option value="foeArdMorMdl">封面页-读本书的人还看过更多</select>'.
                            '<option value="bakArdMdl">章末页-读本书的人还看过</select>'.
                        '</select>'.
                    '</div>'.
                '</div>'.
                ''.
                '<div id="form_fee_div" class="layui-form-item ele_hidden">'.
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
                '<div id="form_target_div" class="layui-form-item ele_hidden">'.
                    '<label class="layui-form-label">查询指标</label>'.
                    '<div class="layui-input-block">'.
                        '<input type="checkbox" name="clkDsp" title="点展比">'.
                        '<input type="checkbox" name="srbClk" title="订点比">'.
                        '<input type="checkbox" name="srbDsp" title="订展比">'.
                        '<input type="checkbox" name="redSrb" title="阅订比">'.
                        '<input type="checkbox" name="redDsp" title="阅展比">'.
                        '<input type="checkbox" name="retent" title="留存率">'.
                        '<input type="checkbox" name="rteDsp" title="留展比">'.
                    '</div>'.
                '</div>'.
                ''.
                '<div id="form_submit" class="layui-form-item ele_hidden">'.
                    '<div class="layui-input-block">'.
                        '<button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>'.
                        '<button id="form_reset" type="reset" class="layui-btn layui-btn-primary">重置</button>'.
                    '</div>'.
                '</div>'.
            '</form>';

    return $page;
}
?>


