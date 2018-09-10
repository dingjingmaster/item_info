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


def get_summary_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, typeCate, timeStamp):
    sql = "INSERT INTO item_exhibit_summary(dzid,\
            dspNum, clkNum, srbNum, redNum, rteNum,\
            clkDsp, subClk, subDsp, redSub, redDsp, retent, rteDsp,\
            typeCate, timeStamp)\
            VALUES('%s', '%d', '%d', '%d', '%d', '%d', '%f', '%f', '%f', '%f', '%f', '%f', '%f', '%d', '%d');" %\
            (dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, typeCate, timeStamp)

    return sql

def get_fee_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, typeCate, timeStamp):

    sql = "INSERT INTO item_exhibit_fee(dzid,\
            dspNum, clkNum, srbNum, redNum, rteNum,\
            clkDsp, subClk, subDsp, redSub, redDsp, retent, rteDsp,\
            feeCate, typeCate, timeStamp)\
            VALUES('%s', '%d', '%d', '%d', '%d', '%d', '%f', '%f', '%f', '%f', '%f', '%f', '%f', '%d', '%d', '%d');" %\
            (dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, typeCate, timeStamp)

    return sql


def get_strategy_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, strategyCate, typeCate, timeStamp):

    sql = "INSERT INTO item_exhibit_strategy(dzid,\
            dspNum, clkNum, srbNum, redNum, rteNum,\
            clkDsp, subClk, subDsp, redSub, redDsp, retent, rteDsp,\
            feeCate, strategyCate, typeCate, timeStamp)\
            VALUES('%s', '%d', '%d', '%d', '%d', '%d', '%f', '%f', '%f', '%f', '%f', '%f', '%f','%d', '%d', '%d', '%d');" %\
            (dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, strategyCate, typeCate, timeStamp)

    return sql

def get_status_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, statusCate, typeCate, timeStamp):

    sql = "INSERT INTO item_exhibit_status(dzid,\
            dspNum, clkNum, srbNum, redNum, rteNum,\
            clkDsp, subClk, subDsp, redSub, redDsp, retent, rteDsp,\
            feeCate, statusCate, typeCate, timeStamp)\
            VALUES('%s', '%d', '%d', '%d', '%d', '%d', '%f', '%f', '%f', '%f', '%f', '%f', '%f','%d', '%d', '%d', '%d');" %\
            (dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, statusCate, typeCate, timeStamp)

    return sql

def get_view_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, viewCate, typeCate, timeStamp):

    sql = "INSERT INTO item_exhibit_view(dzid,\
            dspNum, clkNum, srbNum, redNum, rteNum,\
            clkDsp, subClk, subDsp, redSub, redDsp, retent, rteDsp,\
            feeCate, viewCate, typeCate, timeStamp)\
            VALUES('%s', '%d', '%d', '%d', '%d', '%d', '%f', '%f', '%f', '%f', '%f', '%f', '%f','%d', '%d', '%d', '%d');" %\
            (dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, viewCate, typeCate, timeStamp)

    return sql

def get_intime_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, intimeCate, typeCate, timeStamp):

    sql = "INSERT INTO item_exhibit_intime(dzid,\
            dspNum, clkNum, srbNum, redNum, rteNum,\
            clkDsp, subClk, subDsp, redSub, redDsp, retent, rteDsp,\
            feeCate, intimeCate, typeCate, timeStamp)\
            VALUES('%s', '%d', '%d', '%d', '%d', '%d', '%f', '%f', '%f', '%f', '%f', '%f', '%f','%d', '%d', '%d', '%d');" %\
            (dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, intimeCate, typeCate, timeStamp)

    return sql

def get_update_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, updateCate, typeCate, timeStamp):

    sql = "INSERT INTO item_exhibit_update(dzid,\
            dspNum, clkNum, srbNum, redNum, rteNum,\
            clkDsp, subClk, subDsp, redSub, redDsp, retent, rteDsp,\
            feeCate, updateCate, typeCate, timeStamp)\
            VALUES('%s', '%d', '%d', '%d', '%d', '%d', '%f', '%f', '%f', '%f', '%f', '%f', '%f','%d', '%d', '%d', '%d');" %\
            (dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, updateCate, typeCate, timeStamp)

    return sql

def get_classify1_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, classify1Cate, typeCate, timeStamp):

    sql = "INSERT INTO item_exhibit_classify1(dzid,\
            dspNum, clkNum, srbNum, redNum, rteNum,\
            clkDsp, subClk, subDsp, redSub, redDsp, retent, rteDsp,\
            feeCate, classify1Cate, typeCate, timeStamp)\
            VALUES('%s', '%d', '%d', '%d', '%d', '%d', '%f', '%f', '%f', '%f', '%f', '%f', '%f','%d', '%d', '%d', '%d');" %\
            (dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, classify1Cate, typeCate, timeStamp)

    return sql

# inject mysql
def inject_mysql(txtpath, cursor, times, type):

    fr = open(txtpath, "r")
    sql = ""
    dzid = ""
    shwNum = 0
    clkNum = 0
    subNum = 0
    redNum = 0
    remNum = 0
    clkShwRat = 0.0
    subClkRat = 0.0
    subShwRat = 0.0
    redSubRat = 0.0
    redShwRat = 0.0
    remRat = 0.0
    remShwRat = 0.0

    # 组装好 key
    timeStamp = int(times)

    for line in fr.readlines():
        line = line.strip('\n')
        arr = line.split("\t")
        moduleName = arr[0]
        feeStr = ""
        paraStr = ""

        # 获取数据 -- 总计
        if len(arr) == 13:
            shwNum = int(arr[1])
            clkNum = int(arr[2])
            subNum = int(arr[3])
            redNum = int(arr[4])
            remNum = int(arr[5])
            clkShwRat = float(arr[6][:-1])
            subClkRat = float(arr[7][:-1])
            subShwRat = float(arr[8][:-1])
            redSubRat = float(arr[9][:-1])
            redShwRat = float(arr[10][:-1])
            remRat = float(arr[11][:-1])
            remShwRat = float(arr[12][:-1])
        elif len(arr) == 14:
            feeStr = arr[1]
            shwNum = int(arr[2])
            clkNum = int(arr[3])
            subNum = int(arr[4])
            redNum = int(arr[5])
            remNum = int(arr[6])
            clkShwRat = float(arr[7][:-1])
            subClkRat = float(arr[8][:-1])
            subShwRat = float(arr[9][:-1])
            redSubRat = float(arr[10][:-1])
            redShwRat = float(arr[11][:-1])
            remRat = float(arr[12][:-1])
            remShwRat = float(arr[13][:-1])
        elif len(arr) == 15:
            feeStr = arr[1]
            paraStr = arr[2]
            shwNum = int(arr[3])
            clkNum = int(arr[4])
            subNum = int(arr[5])
            redNum = int(arr[6])
            remNum = int(arr[7])
            clkShwRat = float(arr[8][:-1])
            subClkRat = float(arr[9][:-1])
            subShwRat = float(arr[10][:-1])
            redSubRat = float(arr[11][:-1])
            redShwRat = float(arr[12][:-1])
            remRat = float(arr[13][:-1])
            remShwRat = float(arr[14][:-1])
        else:
            print 'error';

        if type == "summary":
            typeCate = get_module_number(moduleName)
            dzid = trans_to_word(moduleName) + '-' + str(times)
            sql = get_summary_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, typeCate, timeStamp)
        elif type == "fee":
            typeCate = get_module_number(moduleName)
            feeCate = get_fee_number(feeStr)
            dzid = trans_to_word(moduleName) + '-' + trans_to_word(feeStr) + '-' + str(times)
            sql = get_fee_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, typeCate, timeStamp)
        elif type == "strategy":
            typeCate = get_module_number(moduleName)
            feeCate = get_fee_number(feeStr)
            strategyCate = get_strategy_number(paraStr)
            dzid = trans_to_word(moduleName) + '-' + trans_to_word(feeStr) + '-' + trans_to_word(paraStr) + '-' + str(times)
            sql = get_strategy_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, strategyCate, typeCate, timeStamp)
        elif type == "status":
            typeCate = get_module_number(moduleName)
            feeCate = get_fee_number(feeStr)
            statusCate = get_status_number(paraStr)
            dzid = trans_to_word(moduleName) + '-' + trans_to_word(feeStr) + '-' + trans_to_word(paraStr) + '-' + str(times)
            sql = get_status_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, statusCate, typeCate, timeStamp)
        elif type == "view":
            typeCate = get_module_number(moduleName)
            feeCate = get_fee_number(feeStr)
            viewCate = get_view_number(paraStr)
            dzid = trans_to_word(moduleName) + '-' + trans_to_word(feeStr) + '-' + trans_to_word(paraStr) + '-' + str(times)
            sql = get_view_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, viewCate, typeCate, timeStamp)
        elif type == "intime":
            typeCate = get_module_number(moduleName)
            feeCate = get_fee_number(feeStr)
            intimeCate = get_intime_number(paraStr)
            dzid = trans_to_word(moduleName) + '-' + trans_to_word(feeStr) + '-' + trans_to_word(paraStr) + '-' + str(times)
            sql = get_intime_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, intimeCate, typeCate, timeStamp)
        elif type == "update":
            typeCate = get_module_number(moduleName)
            feeCate = get_fee_number(feeStr)
            updateCate = get_update_number(paraStr)
            dzid = trans_to_word(moduleName) + '-' + trans_to_word(feeStr) + '-' + trans_to_word(paraStr) + '-' + str(times)
            sql = get_update_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, updateCate, typeCate, timeStamp)
        elif type == "classify1":
            typeCate = get_module_number(moduleName)
            feeCate = get_fee_number(feeStr)
            classify1Cate = get_classify1_number(paraStr)
            dzid = trans_to_word(moduleName) + '-' + trans_to_word(feeStr) + '-' + trans_to_word(paraStr) + '-' + str(times)
            sql = get_classify1_sql(dzid, shwNum, clkNum, subNum, redNum, remNum, clkShwRat, subClkRat, subShwRat, redSubRat, redShwRat, remRat, remShwRat, feeCate, classify1Cate, typeCate, timeStamp)
        execute_sql(cursor, sql)
    fr.close()

    return

def get_user_type(path):
	pass
	

if __name__ == '__main__':

    if len(sys.argv) != 5:
        print '请输入数据库用户名和密码以及notime(例:"20180101")'
        exit(-1)
    user = sys.argv[1]
    passwd = sys.argv[2]
    time = sys.argv[3]
    userTypePath = sys.argv[4]
	
	retdict = {}
    
    db = MySQLdb.connect('localhost', user, passwd, 'item_exhibit', unix_socket='/data/wapage/hhzk/mserver/mysql5713/mysql.sock');
    cursor = db.cursor()                                                                # 获取操作游标
	
	'''
		免费		用户量 		占比
		准付费		用户量		占比
		付费		用户量		占比
		包月		用户量		占比
		时间戳
	'''
	# 获取用户类别数据
	
	
	
	

    inject_mysql(summaryPath, cursor, time, "summary")
    inject_mysql(feePath, cursor, time, "fee")
    inject_mysql(strategyPath, cursor, time, "strategy")
    inject_mysql(statusPath, cursor, time, "status")
    inject_mysql(viewPath, cursor, time, "view")
    inject_mysql(intimePath, cursor, time, "intime")
    inject_mysql(updatePath, cursor, time, "update")
    inject_mysql(classify1Path, cursor, time, "classify1")

    db.close()                                                                          # 关闭数据库

