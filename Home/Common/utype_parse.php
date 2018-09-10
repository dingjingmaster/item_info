<?php
/**
 * Created by PhpStorm.
 * User: DingJing
 * Date: 2018/9/10
 * Time: 16:55
 */

function to_chinese_character($str) {
    $trans = array(
        'freNum' => '免费用户量', 'nchNum' => '准付费用户量', 'chaNum' => '付费用户量', 'monNum' => '包月用户量', 'allNum' => '天用户量',
        'frePro' => '免费用户占比', 'nchPro' => '准付费用户占比', 'chaPro' => '付费用户占比', 'monPro' => '包月用户占比',
    );

    return $trans[$str];
}