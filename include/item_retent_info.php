<?php
if(!defined('IN_TEST')) {
    exit('NOT ACCESS!');
}
if(!strcasecmp(INTEST, 'DEBUG')) {
    error_reporting(E_ERROR);                                             // 开启错误报告
}

define('SLIDE_PAGE', '');
define('DB_NAME', 'item_retention');

function get_item_retent($cate) {
    $resArr = array();
    $mainPage = '';
    $navPage = '';

    if($cate == "day") {
        define('RETENT', 1);
        $arr['divId'] = "limitfree_plot";
        $arr['json'] = get_chart_json("limitfree", "limitfree_plot");
        array_push($resArr, json_encode($arr));
        // 主页
        $mainPage = $mainPage .
            '<a name="limitfree"></a>'.'<h5>各限免批次留存率</h5>'.'<div id="limitfree_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>';
        // 导航栏
        $navPage = $navPage .
            '<li class="layui-nav-item"><a href="#limitfree">各限免批次留存率</a></li>';
    } else if ($cate == "week") {
        define('RETENT', 2);
    } else if ($cate == "week7"){
        define('RETENT', 3);
    }

    
    $arr['divId'] = "fee_plot";
    $arr['json'] = get_chart_json("fee", "fee_plot");
    array_push($resArr, json_encode($arr));

    $arr['divId'] = "status_plot";
    $arr['json'] = get_chart_json("status", "status_plot");
    array_push($resArr, json_encode($arr));

    $arr['divId'] = "viewCount_plot";
    $arr['json'] = get_chart_json("viewCount", "viewCount_plot");
    array_push($resArr, json_encode($arr));

    $arr['divId'] = "intime_plot";
    $arr['json'] = get_chart_json("intime", "intime_plot");
    array_push($resArr, json_encode($arr));

    $arr['divId'] = "update_plot";
    $arr['json'] = get_chart_json("update", "update_plot");
    array_push($resArr, json_encode($arr));

    $arr['divId'] = "cate1_plot";
    $arr['json'] = get_chart_json("classify1", "cate1_plot");
    array_push($resArr, json_encode($arr));


    $mainPage = $mainPage . 
        '<a name="fee"></a>'.'<h5>各付费情况留存率</h5>'.'<div id="fee_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>' .
        '<a name="status"></a>'.'<h5>连载/完结状态留存率</h5>'.'<div id="status_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="viewcount"></a>'.'<h5>订阅量留存率</h5>'.'<div id="viewCount_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="intime"></a>'.'<h5>入库时间留存率</h5>'.'<div id="intime_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="update"></a>'.'<h5>更新时间留存率</h5>'.'<div id="update_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="cate1"></a>'.'<h5>一级分类留存率</h5>'.'<div id="cate1_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>';

    $navPage = $navPage . 
        '<li class="layui-nav-item"><a href="#fee">各付费情况留存率</a></li>'.
        '<li class="layui-nav-item"><a href="#status">连载/完结状态留存率</a></li>'.
        '<li class="layui-nav-item"><a href="#viewcount">订阅量留存率</a></li>'.
        '<li class="layui-nav-item"><a href="#intime">入库时间留存率</a></li>'.
        '<li class="layui-nav-item"><a href="#update">更新时间留存率</a></li>'.
        '<li class="layui-nav-item"><a href="#cate1">一级分类留存率</a></li>';

    $res = array();
    $res['title'] = parse_to_chinese($cate);
    $res['mainPage'] = $mainPage;
    $res['navPage'] = $navPage;
    $res['json'] = json_encode($resArr);

    return json_encode($res);
}


// 解析字符
function parse_to_chinese($mstr) {
    if(strlen($mstr) <= 1) {
        return $mstr;
    }

    $chArray = array (
        'day' => '天留存统计',
        'week' => '周留存统计',
        'week7' => '七日留存统计',
        'tf1' => '第一批限免',
        'tf2' => '第二批限免',
        'tf3' => '第三批限免',
        'tf4' => '第四批限免',
        'free' => '免费',
        'charge' => '付费',
        'month' => '包月',
        'pub' => '公版',
        'limitfree' => '限免',
        'publish' => '连载',
        'accomplish' => '完结',
        'bt0to1b' => '订阅量:0 ~ 100',
        'bt1bto1k' => '订阅量:100 ~ 1000',
        'bt1kto1w' => '订阅量:1000 ~ 10000',
        'bt1wto10w' => '订阅量:10000 ~ 100000',
        'gt10w' => '订阅量: 大于100000',
        'l1m' => '时间: 小于1个月',
        'bt1mt3m' => '时间: 介于1个月到3个月',
        'bt3mt1y' => '时间: 介于3个月到1年',
        'gt1y' => '时间: 大于1年',
        'boy' => '男频',
        'girl' => '女频',
        'other' => '其它',
    );

    if(in_array($mstr, array_keys($chArray))) {
        return $chArray[$mstr];
    }

    return $mstr;
}



// 主键切割 - 获取字段信息
function prekey_split($mstr) {
    $arr = explode('-', $mstr);
    if(count($arr) == 3) {
        return parse_to_chinese($arr[1]);
    } else if (count($arr) == 4) {
        return parse_to_chinese($arr[1]) . '-' . parse_to_chinese($arr[2]);
    }

    return 'unknow' . '-' . $mstr . '-' . 'error';
}

// json title
function generate_title($title) {
    $arr = array();
    $arr['text'] = $title;
    
    return $arr;
}

// json subtitle
function generate_subtitle($subtitle) {
    $arr = array();
    $arr['text'] = $subtitle;
    
    return $arr;
}

// json x
function generate_x($mArray) {
    if (count($mArray) == 0) {
        return '';
    }

    $arr = array();
    $mArr = array();
    for($i = 0; $i < count($mArray); ++ $i) {
        array_push($mArr, $mArray[$i]);
    }
    $arr['categories'] = $mArr;
   
    return $arr;
}

// json y
function generate_y($mName) {
    $arr = array();
    $mArr = array();
    $mArr['text'] = $mName;
    $arr['title'] = $mArr;
   
    return $arr;
}

// json series
function generate_series($mName, $dataArray) {
    
    if (count($dataArray) == 0 || strlen($mName) == "") {
        return false;
    }

    $arr = array();
    $mArr = array();

    $arr['name'] = $mName;

    for($i=0; $i<count($dataArray); ++$i) {
        array_push($mArr, round((float)$dataArray[$i], 1));
    }
    $arr['data'] = $mArr;

    return $arr;
}

function generate_plot_option() {
    $arr = array();
    $mArr1 = array();
    $mArr2 = array();

    $mArr1['enabled'] = true;
    $mArr2['dataLabels'] = $mArr1;
    $mArr2['enableMouseTracking'] = true;

    $arr['line'] = $mArr2;

    return $arr;
}

function get_chart_json($which, $div) {
    // 中间变量
    $tableName = "";
    $typeCate = "AND typeCate=" . RETENT;                   // 天、周、七日
    $paraCate = "";                                         // 自定义字段
    $feeCate = "";                                          // 付费
    $paraNum = 0;                                           // 自定义字段最大值
    $feeNum = 0;                                            // 付费最大值

    // 
    $finRes = array();

    // 最终变量
    $title = "";
    $yTitle = "留存率(100%)";
    $xData ;
    $yData = array();

    if ($which == 'limitfree') {
        $tableName = "item_retent_limitfree";
        $title = "各批次限免书留存率统计";
        $paraCate = "tfCate=";
        $paraNum = 4;
        $typeCate = "";
    } else if ($which == 'fee') {
        $tableName = "item_retent_fee";
        $title = "付费留存率统计";
        $paraCate = "feeCate=";
        $paraNum = 5;
    } else if ($which == 'status') {
        $tableName = "item_retent_status";
        $title = "书籍状态留存率统计";
        $paraCate = "statuCate=";
        $paraNum = 2;
        $feeCate = "feeCate=";
        $feeNum = 5;
    } else if ($which == 'viewCount') {
        $tableName = "item_retent_viewCount";
        $title = "书籍订阅留存率统计";
        $paraCate = "viewCate=";
        $paraNum = 5;
        $feeCate = "feeCate=";
        $feeNum = 5;
    } else if ($which == 'intime') {
        $tableName = "item_retent_intime";
        $title = "书籍入库时间留存率统计";
        $paraCate = "intimeCate=";
        $paraNum = 4;
        $feeCate = "feeCate=";
        $feeNum = 5;
    } else if ($which == 'update') {
        $tableName = "item_retent_update";
        $title = "书籍最后更新时间留存率统计";
        $paraCate = "updateCate=";
        $paraNum = 4;
        $feeCate = "feeCate=";
        $feeNum = 5;
    } else if ($which == 'classify1') {
        $tableName = "item_retent_classify1";
        $title = "书籍一级分类留存率统计";
        $paraCate = "cate1Cate=";
        $paraNum = 4;
        $feeCate = "feeCate=";
        $feeNum = 5;
    }

    $sql = 'SELECT * FROM ' . $tableName . ' WHERE ';

    if ($feeNum <= 0) {
        for ($i = 1; $i <= $paraNum; ++ $i) {
            $msql = $sql . ' ' . $paraCate . $i . ' ' . $typeCate;
            $result = _mysql_query($msql);
            $xArray = array();
            $yArray = array();
            $cate = '';
            while ($row = _mysql_fetch_array($result)) {
                $cate = prekey_split($row['irid']);
                array_push($xArray, $row['timeStamp']);
                array_push($yArray, $row['retent']);
            }

            // 生成 xdata
            $xData1 = $xData;
            $xData = generate_x($xArray);
            if($xData == '') {
                $xData = $xData1;
            }

            // 生成 ydata
            $ret = generate_series($cate, $yArray);
            if($ret) {
                array_push($yData, generate_series($cate, $yArray));
            }

        }
    } else {
        // 其它情况
        for($i = 1; $i <= $paraNum; ++ $i) {
            for($j = 1; $j <= $feeNum; ++ $j) {
                $msql = $sql . ' ' . $paraCate . $i . ' AND ' . $feeCate . $j . ' ' . $typeCate;
                $result = _mysql_query($msql);
                $xArray = array();
                $yArray = array();
                $cate = '';
                while ($row = _mysql_fetch_array($result)) {
                    $cate = prekey_split($row['irid']);
                    array_push($xArray, $row['timeStamp']);
                    array_push($yArray, $row['retent']);
                }

                // 生成 xdata
                $xData1 = $xData;
                $xData = generate_x($xArray);
                if($xData == '') {
                    $xData = $xData1;
                }
    
                // 生成 ydata
                $ret = generate_series($cate, $yArray);
                if($ret) {
                    array_push($yData, generate_series($cate, $yArray));
                }
            } 
        }
    }

    // 产生title
    $finRes['title'] = generate_title($title);
    $finRes['subtitle'] = generate_subtitle('');
    $finRes['xAxis'] = $xData;
    $finRes['yAxis'] = generate_y("留存率(100%)");
    $finRes['series'] = $yData;
    $finRes['plotOptions'] = generate_plot_option(); 

    // 产生最后 json 结果
    return json_encode($finRes);
}

?>





