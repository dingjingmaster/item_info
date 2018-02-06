<?php
/*************************************************************************
> FileName: common_util.php
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年02月06日 星期二 15时41分16秒
 ************************************************************************/

function date_min_to_max($min, $max) {
    $res = array();
    $diff = (int)date_diff(date_create($min), date_create($max)) ->format("%a");

    for($i = 0; $i <= $diff; ++ $i) {
        array_push($res, date("Ymd", strtotime($min) + $i * 86400));
    }

    return $res;
}





?>
