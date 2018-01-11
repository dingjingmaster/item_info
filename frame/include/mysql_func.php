<?php
if(!defined('IN_TEST')) {
    echo 'NOT ACCESS';
    exit('NOT ACCESS');
}

// 连接数据库
function _mysql_connect(){
    if(!mysql_connect(DB_HOST,DB_USER,DB_PWD)) {
        echo 'connect mysql wrong';
        exit('wrong connect!');
    }
}

// 选择数据库
function _mysql_select_db(){
    if(!mysql_select_db(DB_NAME)) {
        exit('wrong database'.DB_NAME);
    }
}

// 设置字符集
function _mysql_set_name() {
    if(!mysql_query('set names utf8')) {
        exit('set name error');
    }
}

// 结果
function _mysql_query($sql) {

    return mysql_query($sql);
}

// fetch_array 和 query 结果集作用的结果
function _mysql_fetch_array($sql) {
    return mysql_fetch_array(_query($sql));
}

// 单纯的mysql_fetch_array执行结果
function _mysql_array_list($res) {
    return mysql_fetch_array($res);
}

// 返回结果集中包含的结果个数
function _mysql_num_rows($sql) {
    return mysql_num_rows(_query($sql));
}

// 返回结果集中包含的结果个数
function _mysql_num_rows_list($res) {
    return mysql_num_rows($res);
}

// 判断插入信息在数据库中是否存在
function _mysql_is_repeat($sql, $info) {
    if(_mysql_fetch_array($sql)) {
        _alert_back($info);
    }
}

?>
