<?php
/*************************************************************************
> FileName: search_info.php
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年02月06日 星期二 15时06分55秒
 ************************************************************************/
if(!defined('IN_TEST')) {
    exit('NOT ACCESS!');
}
if(!strcasecmp(INTEST, 'DEBUG')) {
    error_reporting(E_ERROR);                                             // 开启错误报告
}

require ROOT_PATH . '/include/plot_func.php';
require ROOT_PATH . '/include/common_util.php';
require ROOT_PATH . '/include/parse_string.php';

function search_retent($data) {
    define('DB_NAME', 'item_retention');
    $req = json_decode(utf8_encode($data), true);
    $table = 'item_retent' . $req['table'];
    $fee = $req['fee'];
    $para = $req['para'];
    $target = $req['target'];
    $startTim = $req['start'];
    $stopTim = $req['stop'];

    // 最后输出的
    $title = "留存率相关查询";
    $yTitle = "留存率(100%) / 阅读量(阅读人数)";
    $xmin = 0;
    $xmax = 0;
    $xData = array();
    $yData = array();
    $picRes = array();
    $finRes = array();

    // 最后生成 x 和 y
    $cate = array();
    $xArray = array();
    $xyArray = array();

    $mainPage = '<a name="select"</a> <div id="select_plot" style="width: 1000px; height: 600px; margin: 0 auto"> </div>';
    $navPage = '<li class="layui-nav-item"><a href="#select">留存率相关查询</a></li>';

    // 查询并返回
    $sql = 'SELECT * FROM ' . $table . ' WHERE timeStamp>=' . $startTim . ' AND ' . 'timeStamp<=' . $stopTim . ' AND ';

    if(!strcasecmp($table, 'item_exhibit_summary')) {
        foreach($target as $i) {
            foreach($para as $j) {
                $msql = $sql . 'tfCate=' . retent_flag_to_number($j); 
                $result = _mysql_query($msql);
                $mxArray = array();
                $mxyArray = array();
                $mcate = '';
                $flag = false;

                while ($row = _mysql_fetch_array($result)) {
                    $flag = true;
                    $mcate = retent_prekey_split($row['irid']);
                    array_push($mxArray, $row['timeStamp']);
                    $mxyArray[$row['timeStamp']] = $row[$i];
                }
                if($flag) {
                    $mTmp = max($mxArray);
                    $xmin = min($mxArray);
                    $xmax = $mTmp > $xmax ? $mTmp : $xmax;
                    array_push($cate, $mcate . '-' . retent_parse_to_chinese($i));
                    array_push($xyArray, $mxyArray);
                }
            }
        }
    }

    $xArray = date_min_to_max($xmin, $xmax);

    // 产生x
    $xData = generate_x($xArray);

    // 产生y
    for($i = 0; $i < count($xyArray); ++$i) {
        $yArray = array();
        for($j = 0; $j < count($xArray); ++ $j) {
            if(!array_key_exists($xArray[$i], $xyArray)) {
                array_push($yArray, $xyArray[$xArray[$i]]);
            } else {
                array_push($yArray, 0);
            }
        }
        array_push($yData, generate_series($cate[$i], $yArray));
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
    $rep['title'] = '留存率相关';
    $rep['mainPage'] = $mainPage;
    $rep['navPage'] = $navPage;
    $rep['json'] = json_encode($finRes);

    return json_encode($rep);
}

?>
