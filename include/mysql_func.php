<?php
/*************************************************************************
> FileName: mysql.func.php
> Author  : DingJing
> Mail    : dingjing@live.cn
> Created Time: 2018年01月17日 星期三 11时27分43秒
 ************************************************************************/

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

// 
function _mysql_fetch_array($result) {
    return mysql_fetch_array($result);
}

?>
