<?php
if(!defined('IN_TEST')) {
    exit('NOT ACCESS!');
}
if(!strcasecmp(INTEST, 'DEBUG')) {
    error_reporting(E_ERROR);                                             // 开启错误报告
}

define('SLIDE_PAGE', '');
define('DB_NAME', 'item_exhibit');

define('SHOWDAYS', 7);

function get_item_exhibit($cate) {
    $resArr = array();
    $mainPage = '';
    $navPage = '';
    define('RETENT', $cate); 

    $mainPage = ''. 
        '<a name="summary"></a>'.'<h5>总计</h5>'.'<div id="summary_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>' .
        '<a name="fee"></a>'.'<h5>付费类型</h5>'.'<div id="fee_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="strategy"></a>'.'<h5>推荐策略</h5>'.'<div id="strategy_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="status"></a>'.'<h5>连载状态</h5>'.'<div id="status_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="view"></a>'.'<h5>订阅量级别</h5>'.'<div id="view_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="intime"></a>'.'<h5>入库时间</h5>'.'<div id="intime_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="update"></a>'.'<h5>更新时间</h5>'.'<div id="update_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>'.
        '<a name="cate1"></a>'.'<h5>一级分类</h5>'.'<div id="cate1_plot" style="width: 900px; height: 600px; margin: 0 auto"> </div>';

    $navPage = ''. 
        '<li class="layui-nav-item"><a href="#summary">总计</a></li>'.
        '<li class="layui-nav-item"><a href="#fee">付费类型</a></li>'.
        '<li class="layui-nav-item"><a href="#strategy">推荐策略</a></li>'.
        '<li class="layui-nav-item"><a href="#status">连载状态</a></li>'.
        '<li class="layui-nav-item"><a href="#view">订阅量级别</a></li>'.
        '<li class="layui-nav-item"><a href="#intime">入库时间</a></li>'.
        '<li class="layui-nav-item"><a href="#update">更新时间</a></li>'.
        '<li class="layui-nav-item"><a href="#cate1">一级分类</a></li>';

    // 总体情况
    $arr['divId'] = "summary_plot";
    $arr['json'] = get_chart_json("summary", "summary_plot");
    array_push($resArr, json_encode($arr));

    // 付费类型
    $arr['divId'] = "fee_plot";
    $arr['json'] = get_chart_json("fee", "fee_plot");
    array_push($resArr, json_encode($arr));
    
    // 入库时间
    $arr['divId'] = "intime_plot";
    $arr['json'] = get_chart_json("intime", "intime_plot");
    array_push($resArr, json_encode($arr));

    // 策略
    $arr['divId'] = "strategy_plot";
    $arr['json'] = get_chart_json("strategy", "strategy_plot");
    array_push($resArr, json_encode($arr));

    // 连载
    $arr['divId'] = "status_plot";
    $arr['json'] = get_chart_json("status", "status_plot");
    array_push($resArr, json_encode($arr));

    // 订阅量级别
    $arr['divId'] = "view_plot";
    $arr['json'] = get_chart_json("view", "view_plot");
    array_push($resArr, json_encode($arr));

    // 更新时间
    $arr['divId'] = "update_plot";
    $arr['json'] = get_chart_json("update", "update_plot");
    array_push($resArr, json_encode($arr));

    // 一级分类
    $arr['divId'] = "cate1_plot";
    $arr['json'] = get_chart_json("cate1", "cate1_plot");
    array_push($resArr, json_encode($arr));

    $res = array();
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
        'clkDsp' => '点展比 ',
        'srbClk' => '订点比 ',
        'srbDsp' => '订展比 ',
        'redSrb' => '阅订比 ',
        'redDsp' => '阅展比',
        'retent' => '留存率',
        'rteDsp' => '留展比 ',
        'shfRecMdl' => '书架推荐',
        'freGusMdl' => '免费-猜你喜欢',
        'bakArdMdl' => '章末页-读本书的人还看过',
        'foeArdMdl' => '封面页-读本书的人还看过',
        'shfGusMdl' => '书架-猜你喜欢',
        'chsStmMdl' => '精选-瀑布流',
        'foeArdMorMdl' => '封面页-读本书的人还看过更多',
        'monStmMdl' => '包月瀑布流',
        'foeCtgMdl' => '封面页-类别推荐',
        'foeAutMdl' => '封面页-作者推荐',
        'chsFinStmMdl' => '精选-完结瀑布流',
        'chsGilStmMdl' => '精选-女频瀑布流',
        'freMonRecMdl' => '免费-包月推荐',
        'chsBoyStmMdl' => '精选-男频瀑布流',
        'chsRakStmMdl' => '精选-排行瀑布流',
        'redRecMdl' => '根据阅读推荐',
        'extRecMdl' => '退出拦截推荐',
        'chgFee' => '付费',
        'freFee' => '免费',
        'monFee' => '包月',
        'pubFee' => '公版',
        'tfFee' => '限免',
        'livStmRec' => '实时流',
        'usrKnnRec' => '用户协同',
        'codBotRec' => '冷启动',
        'popRec' => '流行度',
        'itmKnnRec' => '物品协同',
        'samCtgRec' => '同分类',
        'subMdlRec' => '订阅模型',
        'redMdlRec' => '阅读模型',
        'cotSimRec' => '内容相似',
        'redSimRec' => '阅读同分类',
        'cat1SimCtgRec' => '一级同分类',
        'cmpStau' => '完结',
        'noCmpStau' => '连载',
        'bt0to10Sub' => '[0,10)',
        'bt10to1bSub' => '[10,100)',
        'bt1bto1kSub' => '[100,1000)',
        'bt1kto10kSub' => '[1000,10000)',
        'bt10kto100kSub' => '[10000,100000)',
        'bt100kto1000kSub' => '[100000,1000000)',
        'bt1000kto10000kSub' => '[1000000,10000000)',
        'lesMonIn' => '1月内入库',
        'bt1mto3mIn' => '1~3月内入库',
        'bt3mto12mIn' => '3~12月内入库',
        'bt12mto99mIn' => '12~99月内入库',
        'lesMonUpd' => '0~1月未更新',
        'bt1mto3mUpd' => '1~3月未更新',
        'bt3mto12mUpd' => '3~12月未更新',
        'bt12mto99mUdp' => '12~99月未更新',
        'boyCfy1' => '男频',
        'girlCfy1' => '女频',
        'monCfy1' => '包月',
        'pshCfy1' => '出版',
        'othCfy1' => '其他',
    );
    
    if(in_array($mstr, array_keys($chArray))) {
        return $chArray[$mstr];
    }

    return $mstr;
}



// 主键切割 - 获取字段信息
function prekey_split($mstr) {

    $arr = explode('-', $mstr);
    if(count($arr) == 2) {
        return parse_to_chinese($arr[0]);
    } else if (count($arr) == 3) {
        return parse_to_chinese($arr[0]) . '-' . parse_to_chinese($arr[1]);
    } else if (count($arr) == 4) {
        return parse_to_chinese($arr[0]) . '-' . parse_to_chinese($arr[1]) . '-' . parse_to_chinese($arr[2]);
    } else if (count($arr) == 5) {
        return parse_to_chinese($arr[0]) . '-' . parse_to_chinese($arr[1]) . '-' . parse_to_chinese($arr[2]) . '-' . parse_to_chinese($arr[3]);
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
    if (count($mArray) <= 1) {
        return false;
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
    if (count($dataArray) <= 1 || strlen($mName) <= 1) {
        return false;
    }

    $arr = array();
    $mArr = array();

    $arr['name'] = $mName;
    for($i=0; $i<count($dataArray); ++$i) {
        array_push($mArr, round((float)$dataArray[$i], 4));
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
    $tableName = "";                                        // 表名
    $typeCateNum = 17;                                      // 位置
    $feeCate = "";                                          // 付费 类型
    $strategy = "";                                         // 策略
    $feeCateNum = 0;                                        // 付费类型数量
    $paraNum = 0;                                           // 参数数量
    $finRes = array();
    $otherNum = 0;
    $otherPara = "";

    // 最终变量
    $title = "";
    $yTitle = parse_to_chinese(RETENT) . " (100%)";
    $xData ;
    $yData = array();
    $allTime = array();

    if ($which == 'summary') {
        $tableName = "item_exhibit_summary";
        $title = "总计";
        $paraNum = 1;
    } else if ($which == 'fee') {
        $tableName = "item_exhibit_fee";
        $title = "付费类型";
        $paraNum = 2;
        $feeCateNum = 5;
    } else if ($which == 'strategy') {
        $tableName = "item_exhibit_strategy";
        $title = "推荐策略";
        $paraNum = 3;
        $feeCateNum = 5;
        $otherNum = 12;
        $otherPara = "strategyCate=";
    } else if ($which == 'status') {
        $tableName = "item_exhibit_status";
        $title = "连载状态";
        $paraNum = 3;
        $feeCateNum = 5;
        $otherNum = 2;
        $otherPara = "statusCate=";
    } else if ($which == 'view') {
        $tableName = "item_exhibit_view";
        $title = "订阅量级别";
        $paraNum = 3;
        $feeCateNum = 5;
        $otherNum = 7;
        $otherPara = "viewCate=";
    } else if ($which == 'intime') {
        $tableName = "item_exhibit_intime";
        $title = "入库时间";
        $paraNum = 3;
        $feeCateNum = 5;
        $otherNum = 4;
        $otherPara = "intimeCate=";
    } else if ($which == 'update') {
        $tableName = "item_exhibit_update";
        $title = "更新时间";
        $paraNum = 3;
        $feeCateNum = 5;
        $otherNum = 4;
        $otherPara = "updateCate=";
    } else if ($which == 'cate1') {
        $tableName = "item_exhibit_classify1";
        $title = "一级分类";
        $paraNum = 3;
        $feeCateNum = 5;
        $otherNum = 5;
        $otherPara = "classify1Cate=";
    }

    $endTime = (int)date("Ymd",time());
    $startTime = (int)($endTime - SHOWDAYS);
    $sql = 'SELECT * FROM ' . $tableName . ' WHERE timeStamp>=' . $startTime;
    for($i = $startTime; $i <= $endTime; ++ $i) {
        array_push($allTime, ''.$i);
    }

    switch($paraNum) {
    case 1:
        for($i = 1; $i <= $typeCateNum; ++ $i) {
            $msql = $sql . ' AND typeCate=' . $i;
            $result = _mysql_query($msql);
            $xArray = array();
            $yArray = array();
            $cate = '';
    
            while($row = _mysql_fetch_array($result)) {
                $cate = prekey_split($row['dzid']);
                array_push($xArray, $row['timeStamp']);
                array_push($yArray, $row[RETENT]);
            }
    
            // 生成x
            $ret = generate_x($xArray);
            if($ret != false) {
                $xData = $ret;
            }
    
            // 生成y
            $ret = generate_series($cate, $yArray);
            if($ret) {
                array_push($yData, $ret);
            }
        }
        break;
    case 2:
        for($i = 1; $i <= $typeCateNum; ++ $i) {
            for($j = 1; $j <= $feeCateNum; ++ $j) {
                $msql = $sql . ' AND typeCate=' . $i . ' AND feeCate=' . $j;
                $result = _mysql_query($msql);
                $xArray = array();
                $yArray = array();
                $cate = '';

                while($row = _mysql_fetch_array($result)) {
                    $cate = prekey_split($row['dzid']);
                    if(in_array($row['timeStamp'], $allTime)) {
                        array_push($yArray, $row[RETENT]);
                    } else {
                        array_push($yArray, 0);
                    }
                }

                // 生成 x
                $xData = generate_x($allTime);

                // 生成 y
                if(count($yArray) == count($xArray)) {
                    array_push($yData, generate_series($cate, $yArray));
                }
            }
        }
        break;
    case 3:
        /*
        for($i = 1; $i <= $typeCateNum; ++ $i) {
            for($j = 1; $j <= $feeCateNum; ++ $j) {
                for($k = 1; $k <= $otherNum; ++ $k) {
                    $msql = $sql . ' AND typeCate=' . $i . ' AND feeCate=' . $j . ' AND ' . $otherPara . $k;
                    $result = _mysql_query($msql);
                    $xArray = array();
                    $yArray = array();
                    $cate = '';

                    while($row = _mysql_fetch_array($result)) {
                        $cate = prekey_split($row['dzid']);
                        array_push($xArray, $row['timeStamp']);
                        array_push($yArray, $row[RETENT]);
                    }
                    // 生成 x
                    $ret = generate_x($xArray);
                    if($ret != false){
                        $xData = $ret;
                    }
                    // 生成 y
                    $ret = generate_series($cate, $yArray);
                    if($ret) {
                        array_push($yData, $ret);
                    }
                }
            }
        }
         */
    }
    
    // 产生title
    $finRes['title'] = generate_title($title);
    $finRes['subtitle'] = generate_subtitle('');
    $finRes['xAxis'] = $xData;
    $finRes['yAxis'] = generate_y($yTitle);
    $finRes['series'] = $yData;
    $finRes['plotOptions'] = generate_plot_option(); 

    // 产生最后 json 结果
    return json_encode($finRes);
}

?>





