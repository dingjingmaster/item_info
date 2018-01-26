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
define('DB_NAME', 'item_exhibit');
require ROOT_PATH . '/include/parse_string.php';

function search_init(){
    $page = '<form class="layui-form" action="">'.
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
                ''.
                '<div id="form_mod_div" class="layui-form-item ele_hidden">'.
                    '<label class="layui-form-label">查询模块</label>'.
                    '<div class="layui-input-block">'.
                        '<input type="checkbox" lay-skin="primary" name="shfRecMdl" title="书架推荐"/>'.
                        '<input type="checkbox" lay-skin="primary" name="monStmMdl" title="包月瀑布流"/>'.
                        '<input type="checkbox" lay-skin="primary" name="redRecMdl" title="根据阅读推荐"/>'.
                        '<input type="checkbox" lay-skin="primary" name="extRecMdl" title="退出拦截推荐"/>'.
                        '<input type="checkbox" lay-skin="primary" name="freGusMdl" title="免费-猜你喜欢"/>'.
                        '<input type="checkbox" lay-skin="primary" name="freMonRecMdl" title="免费-包月推荐"/>'.
                        '<input type="checkbox" lay-skin="primary" name="shfGusMdl" title="书架-猜你喜欢"/>'.
                        '<input type="checkbox" lay-skin="primary" name="chsStmMdl" title="精选-瀑布流"/>'.
                        '<input type="checkbox" lay-skin="primary" name="chsBoyStmMdl" title="精选-男频瀑布流"/>'.
                        '<input type="checkbox" lay-skin="primary" name="chsGilStmMdl" title="精选-女频瀑布流"/>'.
                        '<input type="checkbox" lay-skin="primary" name="chsRakStmMdl" title="精选-排行瀑布流"/>'.
                        '<input type="checkbox" lay-skin="primary" name="chsFinStmMdl" title="精选-完结瀑布流"/>'.
                        '<input type="checkbox" lay-skin="primary" name="foeCtgMdl" title="封面页-类别推荐"/>'.
                        '<input type="checkbox" lay-skin="primary" name="foeAutMdl" title="封面页-作者推荐"/>'.
                        '<input type="checkbox" lay-skin="primary" name="foeArdMdl" title="封面页-读本书的人还看过"/>'.
                        '<input type="checkbox" lay-skin="primary" name="foeArdMorMdl" title="封面页-读本书的人还看过更多"/>'.
                        '<input type="checkbox" lay-skin="primary" name="bakArdMdl" title="章末页-读本书的人还看过"/>'.
                    '</div>'.
                '</div>'.
                ''.
                '<div id="form_fee_div" class="layui-form-item ele_hidden">'.
                    '<label class="layui-form-label">付费类型</label>'.
                    '<div class="layui-input-block">'.
                        '<input type="checkbox" lay-skin="primary" name="freFee" title="免费">'.
                        '<input type="checkbox" lay-skin="primary" name="chgFee" title="付费">'.
                        '<input type="checkbox" lay-skin="primary" name="monFee" title="包月">'.
                        '<input type="checkbox" lay-skin="primary" name="pubFee" title="公版">'.
                        '<input type="checkbox" lay-skin="primary" name="tfFee" title="限免">'.
                    '</div>'.
                '</div>'.
                ''.
                '<div id="form_sub_div" class="layui-inline ele_hidden">'.
                    '<label class="layui-form-label">维度细分</label>'.
                    '<div id="form_sub" class="layui-input-block"></div>'.
                '</div>'.
                ''.
                '<div id="form_target_div" class="layui-form-item ele_hidden">'.
                    '<label class="layui-form-label">查询指标</label>'.
                    '<div class="layui-input-block">'.
                        '<input type="checkbox" lay-skin="primary" name="clkDsp" title="点展比">'.
                        '<input type="checkbox" lay-skin="primary" name="subClk" title="订点比">'.
                        '<input type="checkbox" lay-skin="primary" name="subDsp" title="订展比">'.
                        '<input type="checkbox" lay-skin="primary" name="redSub" title="阅订比">'.
                        '<input type="checkbox" lay-skin="primary" name="redDsp" title="阅展比">'.
                        '<input type="checkbox" lay-skin="primary" name="retent" title="留存率">'.
                        '<input type="checkbox" lay-skin="primary" name="rteDsp" title="留展比">'.
                    '</div>'.
                '</div>'.
                ''.
                '<div id="form_time_div" class="layui-form-item ele_hidden">'.
                    '<div class="layui-inline">'.
                        '<label class="layui-form-label">开始时间</label>'.
                        '<div class="layui-input-block">'.
                            '<input type="text" class="layui-input" id="fstart_tim">'.
                        '</div>' .
                    '</div>'.
                    '<div class="layui-inline">'.
                        '<label class="layui-form-label">截止时间</label>'.
                        '<div class="layui-input-inline">'.
                            '<input type="text" class="layui-input" id="fstop_tim">'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                ''.
                '<div id="form_submit" class="layui-form-item ele_hidden">'.
                    '<div class="layui-input-block">'.
                        '<button class="layui-btn" lay-submit lay-filter="form_submit">立即提交</button>'.
                        '<button id="form_reset" type="reset" class="layui-btn layui-btn-primary" lay-filter="form_reset">重置</button>'.
                    '</div>'.
                '</div>'.
            '</form>';

    return $page;
}

function min_to_max($min, $max) {
    $res = array();
    for($m = $min; $m < $max; ++$m) {
        array_push($res, $m);
    }

    return $res;
}

function search_select($data){

    require ROOT_PATH . '/include/plot_func.php';
    $req = json_decode(utf8_encode($data), true);
    $table = 'item_exhibit_' . $req['table'];
    $fee = $req['fee'];
    $para = $req['para'];
    $module = $req['module'];
    $target = $req['target'];
    $startTim = $req['start'];
    $stopTim = $req['stop'];

    // 最后输出的变量
    $title = "自定义查询";
    $yTitle = "占比(100%)";
    $xmin = 0;
    $xmax = 0;
    $xData = array();
    $yData = array();
    $picRes = array();
    $finRes = array();

    // 最后生成 x 和 y
    $cate = array();
    $xArray = array();
    $yArray = array();

    $mainPage = '<a name="select"></a>'.'<h5>自定义查询</h5>'.'<div id="select_plot" style="width: 1000px; height: 600px; margin: 0 auto"> </div>';
    $navPage = '<li class="layui-nav-item"><a href="#select">自定义查询</a></li>';

    // 查询并返回
    $sql = 'SELECT * FROM ' . $table . ' WHERE timeStamp>='. $startTim . ' AND ' . 'timeStamp<=' . $stopTim . ' AND ';
    if(!strcasecmp($table, 'item_exhibit_summary')) {
        $minTim = $stopTim;
        $maxTim = $startTim;
        foreach($module as $i) {
            foreach($target as $j) {
                $msql = $sql . ' typeCate=' . exhibit_flag_to_number($i);
                $result = _mysql_query($msql);
                $mxArray = array();
                $myArray = array();
                $mcate = '';
                $flag = false;
                while($row = _mysql_fetch_array($result)) {
                    $flag = true;
                    $mcate = exhibit_prekey_split($row['dzid']);
                    array_push($mxArray, $row['timeStamp']);
                    array_push($myArray, $row[$j]);
                }
                if($flag) {
                    $xmin = min($mxArray);
                    $xmax = max($mxArray);
                    array_push($cate, $mcate . '-' . exhibit_parse_to_chinese($j));                                                 // 保存标签
                    array_push($yArray, $myArray);
                }
            }
        }
    } else if (!strcasecmp($table, 'item_exhibit_fee')) {
        $minTim = $stopTim;
        $maxTim = $startTim;
        foreach($module as $i) {
            foreach($fee as $j) {
                foreach($target as $k) {
                    $msql = $sql . ' typeCate=' . exhibit_flag_to_number($i) . 
                        ' AND feeCate=' . exhibit_flag_to_number($j);
                    $result = _mysql_query($msql);
                    $mxArray = array();
                    $myArray = array();
                    $mcate = '';
                    $flag = false;
                    while($row = _mysql_fetch_array($result)) {
                        $flag = true;
                        $mcate = exhibit_prekey_split($row['dzid']);
                        array_push($mxArray, $row['timeStamp']);
                        array_push($myArray, $row[$k]);
                    }
                    if($flag) {
                        $xmin = min($mxArray);
                        $xmax = max($mxArray);
                        array_push($cate, $mcate . '-' . exhibit_parse_to_chinese($k));                                             // 保存标签
                        array_push($yArray, $myArray);
                    }
                }
            }
        }

    } else {
        $minTim = $stopTim;
        $maxTim = $startTim;
        foreach($module as $i) {
            foreach($fee as $j) {
                foreach($para as $k) {
                    foreach($target as $l) {
                        $msql = $sql . ' typeCate=' . exhibit_flag_to_number($i) . 
                            ' AND feeCate=' . exhibit_flag_to_number($j) . 
                            ' AND ' . exhibit_table_field($table) . '=' . exhibit_flag_to_number($k);
                        $result = _mysql_query($msql);
                        $mxArray = array();
                        $myArray = array();
                        $mcate = '';
                        $flag = false;
                        while($row = _mysql_fetch_array($result)) {
                            $flag = true;
                            $mcate = exhibit_prekey_split($row['dzid']);
                            array_push($mxArray, $row['timeStamp']);
                            array_push($myArray, $row[$l]);
                        }
                        if($flag) {
                            $xmin = min($mxArray);
                            $xmax = max($mxArray);
                            array_push($cate, $mcate . '-' . exhibit_parse_to_chinese($l));                                             // 保存标签
                            array_push($yArray, $myArray);
                        }
                    }   
                }
            }
        }
    }

    $xArray = min_to_max($xmin, $xmax);                                                                    // 一条直线完成
    $xData = generate_x($xArray);

    for($i = 0; $i < count($yArray); ++ $i) {
        if(count($yArray[$i]) == count($xArray)) {
            array_push($yData, generate_series($cate[$i], $yArray[$i]));
        }
    }

    // 产生title
    $picRes['title'] = generate_title($title);
    $picRes['subtitle'] = generate_title('');
    $picRes['xAxis'] = $xData;
    $picRes['yAxis'] = generate_y($yTitle);
    $picRes['series'] = $yData;
    $picRes['plotOptions'] = generate_plot_option();

    $finRes['div'] = "select_plot";
    $finRes['json'] = json_encode($picRes);

    $rep = array();
    $rep['title'] = "自定义查询";
    $rep['mainPage'] = $mainPage;
    $rep['navPage'] = $navPage;
    $rep['json'] = json_encode($finRes);

    return json_encode($rep);
}


?>


