#!/bin/env python
#-*- coding: UTF-8 -*-
import sys
reload(sys)
sys.setdefaultencoding('utf8')
import MySQLdb
import datetime

def execute_sql(cursor, sql):

    try:
        cursor.execute(sql)
        db.commit()
    except:
        print "sql:" + sql + "\t 执行错误"
        db.rollback()
    return;

'''
    irid = 状态 + 付费分类 + 时间戳
    last = 0
    remain = 0
    retent = 0.0
    feeCate = 1免费 2付费 3包月 4公版 5限免
    typeCate = 1天 2周 3七日
    timeStamp = 时间戳
'''
def get_status_sql(irid, last, remain, retent, feeCate, typeCate, timeStamp):

    sql = "INSERT INTO item_retent_status(irid,\
            last, remain, retent,\
            feeCate, typeCate,\
            timeStamp)\
            VALUES('%s', '%d', '%d', '%f', '%d', '%d', '%d')" % \
            (irid, last, remain, retent, feeCate, typeCate, timeStamp)

    return sql


'''
    irid = 状态 + 付费分类 + 时间戳
    last = 0
    remain = 0
    retent = 0.0
    feeCate = 1免费 2付费 3包月 4公版 5限免
    typeCate = 1天 2周 3七日
    viewCate = 1小于100 2介于100与1000 3介于1000与10000 4介于10000与100000 5大于100000
    timeStamp = 时间戳
'''
def get_viewCount_sql(irid, last, remain, retent, feeCate, typeCate, viewCate, timeStamp):

    sql = "INSERT INTO item_retent_status(irid,\
            last, remain, retent,\
            feeCate, typeCate,\
            viewCate,\
            timeStamp)\
            VALUES('%s', '%d', '%d', '%f', '%d', '%d', '%d', '%d')" % \
            (irid, last, remain, retent, feeCate, typeCate, viewCate, timeStamp)

    return sql


'''
    irid = 状态 + 付费分类 + 时间戳
    last = 0
    remain = 0
    retent = 0.0
    feeCate = 1免费 2付费 3包月 4公版 5限免
    typeCate = 1天 2周 3七日
    intimeCate = 1小于1月 2介于1月与3月 3介于3月与1年 4大于1年
    timeStamp = 时间戳
'''
def get_intime_sql(irid, last, remain, retent, feeCate, typeCate, intimeCate, timeStamp):

    sql = "INSERT INTO item_retent_status(irid,\
            last, remain, retent\
            feeCate, typeCate,\
            intimeCate,\
            timeStamp)\
            VALUES('%s', '%d', '%d', '%f', '%d', '%d', '%d', '%d')" % \
            (irid, last, remain, retent, feeCate, typeCate, intimeCate, timeStamp)

    return sql


'''
    irid = 状态 + 付费分类 + 时间戳
    last = 0
    remain = 0
    retent = 0.0
    feeCate = 1免费 2付费 3包月 4公版 5限免
    typeCate = 1天 2周 3七日
    updateCate = 1小于1月 2介于1月与3月 3介于3月与1年 4大于1年
    timeStamp = 时间戳
'''
def get_update_sql(irid, last, remain, retent, feeCate, typeCate, updateCate, timeStamp):

    sql = "INSERT INTO item_retent_status(irid,\
            last, remain, retent,\
            feeCate, typeCate,\
            updateCate,\
            timeStamp)\
            VALUES('%s', '%d', '%d', '%f', '%d', '%d', '%d', '%d')" % \
            (irid, last, remain, retent, feeCate, typeCate, updateCate, timeStamp)

    return sql


'''
    irid = 状态 + 付费分类 + 时间戳
    last = 0
    remain = 0
    retent = 0.0
    feeCate = 1免费 2付费 3包月 4公版 5限免
    typeCate = 1天 2周 3七日
    classify1Cate = 1男频 2女频 3出版 4其它
    timeStamp = 时间戳
'''
def get_classify1Count_sql(irid, last, remain, retent, feeCate, typeCate, classify1Cate, timeStamp):

    sql = "INSERT INTO item_retent_status(irid,\
            last, remain, retent,\
            feeCate, typeCate,\
            classify1Cate,\
            timeStamp)\
            VALUES('%s', '%d', '%d', '%f', '%d', '%d', '%d', '%d')" % \
            (irid, last, remain, retent, feeCate, typeCate, classify1Cate, timeStamp)

    return sql

# inject mysql
def inject_mysql(txtpath, type):

    pass




if __name__ == '__main__':

    if len(sys.argv) != 4:
        print '请输入数据库用户名和密码以及notime(例:"20180101")'
        exit(-1)
    user = sys.argv[1]
    passwd = sys.argv[2]
    time = sys.argv[3]
    day = sys.argv[4]
    week = sys.argv[5]
    week7 = sys.argv[6]

    sql = 'SELECT * FROM item_retent_status'

    db = MySQLdb.connect('localhost', user, passwd, 'item_retention')                   # 连接数据库
    cursor = db.cursor()                                                                # 获取操作游标

    execute_sql(cursor, sql)
    db.close()                                                                          # 关闭数据库

    pass
