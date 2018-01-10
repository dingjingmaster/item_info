#!/bin/env python
#-*- coding: UTF-8 -*-
import sys
reload(sys)
sys.setdefaultencoding('utf8')
import MySQLdb
import time

def execute_sql(cursor, sql):

    try:
        cursor.execute(sql)
        db.commit()
    except:
        db.rollback()
    return;



if __name__ == '__main__':

    if len(sys.argv) != 3:
        print "请输入数据库用户名和密码"
        exit(-1)
    user = sys.argv[1]
    passwd = sys.argv[2]

    day_free,\
    day_free_status_publish, day_free_status_end,\
    day_free_view_gt10w, day_free_view_bt1wto10w, day_free_view_bt1kto1w, day_free_view_bt100to1k, day_free_view_bt0to100,\
    day_free_intime_gtyear, day_free_intime_bt3mto1y, day_free_intime_bt1mto3m, day_free_intime_ls1m,\
    day_free_update_gtyear, day_free_update_bt3mto1y, day_free_update_bt1mto3m, day_free_update_ls1m,\
    day_free_cate1_boy, day_free_cate1_girl, day_free_cate1_pub, day_free_cate1_other,\
    day_charge,\
    day_charge_status_publish, day_charge_status_end,\
    day_charge_view_gt10w, day_charge_view_bt1wto10w, day_charge_view_bt1kto1w, day_charge_view_bt100to1k, day_charge_view_bt0to100,\
    day_charge_intime_gtyear, day_charge_intime_bt3mto1y, day_charge_intime_bt1mto3m, day_charge_intime_ls1m,\
    day_charge_update_gtyear, day_charge_update_bt3mto1y, day_charge_update_bt1mto3m, day_charge_update_ls1m,\
    day_charge_cate1_boy, day_charge_cate1_girl, day_charge_cate1_pub, day_charge_cate1_other,\
    day_month,\
    day_month_status_publish, day_month_status_end,\
    day_month_view_gt10w, day_month_view_bt1wto10w, day_month_view_bt1kto1w, day_month_view_bt100to1k, day_month_view_bt0to100,\
    day_month_intime_gtyear, day_month_intime_bt3mto1y, day_month_intime_bt1mto3m, day_month_intime_ls1m,\
    day_month_update_gtyear, day_month_update_bt3mto1y, day_month_update_bt1mto3m, day_month_update_ls1m,\
    day_month_cate1_boy, day_month_cate1_girl, day_month_cate1_pub, day_month_cate1_other,\
    day_pub,\
    day_pub_status_publish, day_pub_status_end,\
    day_pub_view_gt10w, day_pub_view_bt1wto10w, day_pub_view_bt1kto1w, day_pub_view_bt100to1k, day_pub_view_bt0to100,\
    day_pub_intime_gtyear, day_pub_intime_bt3mto1y, day_pub_intime_bt1mto3m, day_pub_intime_ls1m,\
    day_pub_update_gtyear, day_pub_update_bt3mto1y, day_pub_update_bt1mto3m, day_pub_update_ls1m,\
    day_pub_cate1_boy, day_pub_cate1_girl, day_pub_cate1_pub, day_pub_cate1_other,\
    day_lfree,\
    day_lfree_status_publish, day_lfree_status_end,\
    day_lfree_view_gt10w, day_lfree_view_bt1wto10w, day_lfree_view_bt1kto1w, day_lfree_view_bt100to1k, day_lfree_view_bt0to100,\
    day_lfree_intime_gtyear, day_lfree_intime_bt3mto1y, day_lfree_intime_bt1mto3m, day_lfree_intime_ls1m,\
    day_lfree_update_gtyear, day_lfree_update_bt3mto1y, day_lfree_update_bt1mto3m, day_lfree_update_ls1m,\
    day_lfree_cate1_boy, day_lfree_cate1_girl, day_lfree_cate1_pub, day_lfree_cate1_other,\
    \
    week_free,\
    week_free_status_publish, week_free_status_end,\
    week_free_view_gt10w, week_free_view_bt1wto10w, week_free_view_bt1kto1w, week_free_view_bt100to1k, week_free_view_bt0to100,\
    week_free_intime_gtyear, week_free_intime_bt3mto1y, week_free_intime_bt1mto3m, week_free_intime_ls1m,\
    week_free_update_gtyear, week_free_update_bt3mto1y, week_free_update_bt1mto3m, week_free_update_ls1m,\
    week_free_cate1_boy, week_free_cate1_girl, week_free_cate1_pub, week_free_cate1_other,\
    week_charge,\
    week_charge_status_publish, week_charge_status_end,\
    week_charge_view_gt10w, week_charge_view_bt1wto10w, week_charge_view_bt1kto1w, week_charge_view_bt100to1k, week_charge_view_bt0to100,\
    week_charge_intime_gtyear, week_charge_intime_bt3mto1y, week_charge_intime_bt1mto3m, week_charge_intime_ls1m,\
    week_charge_update_gtyear, week_charge_update_bt3mto1y, week_charge_update_bt1mto3m, week_charge_update_ls1m,\
    week_charge_cate1_boy, week_charge_cate1_girl, week_charge_cate1_pub, week_charge_cate1_other,\
    week_month,\
    week_month_status_publish, week_month_status_end,\
    week_month_view_gt10w, week_month_view_bt1wto10w, week_month_view_bt1kto1w, week_month_view_bt100to1k, week_month_view_bt0to100,\
    week_month_intime_gtyear, week_month_intime_bt3mto1y, week_month_intime_bt1mto3m, week_month_intime_ls1m,\
    week_month_update_gtyear, week_month_update_bt3mto1y, week_month_update_bt1mto3m, week_month_update_ls1m,\
    week_month_cate1_boy, week_month_cate1_girl, week_month_cate1_pub, week_month_cate1_other,\
    week_pub,\
    week_pub_status_publish, week_pub_status_end,\
    week_pub_view_gt10w, week_pub_view_bt1wto10w, week_pub_view_bt1kto1w, week_pub_view_bt100to1k, week_pub_view_bt0to100,\
    week_pub_intime_gtyear, week_pub_intime_bt3mto1y, week_pub_intime_bt1mto3m, week_pub_intime_ls1m,\
    week_pub_update_gtyear, week_pub_update_bt3mto1y, week_pub_update_bt1mto3m, week_pub_update_ls1m,\
    week_pub_cate1_boy, week_pub_cate1_girl, week_pub_cate1_pub, week_pub_cate1_other,\
    week_lfree,\
    week_lfree_status_publish, week_lfree_status_end,\
    week_lfree_view_gt10w, week_lfree_view_bt1wto10w, week_lfree_view_bt1kto1w, week_lfree_view_bt100to1k, week_lfree_view_bt0to100,\
    week_lfree_intime_gtyear, week_lfree_intime_bt3mto1y, week_lfree_intime_bt1mto3m, week_lfree_intime_ls1m,\
    week_lfree_update_gtyear, week_lfree_update_bt3mto1y, week_lfree_update_bt1mto3m, week_lfree_update_ls1m,\
    week_lfree_cate1_boy, week_lfree_cate1_girl, week_lfree_cate1_pub, week_lfree_cate1_other,\
    \
    week7_free,\
    week7_free_status_publish, week7_free_status_end,\
    week7_free_view_gt10w, week7_free_view_bt1wto10w, week7_free_view_bt1kto1w, week7_free_view_bt100to1k, week7_free_view_bt0to100,\
    week7_free_intime_gtyear, week7_free_intime_bt3mto1y, week7_free_intime_bt1mto3m, week7_free_intime_ls1m,\
    week7_free_update_gtyear, week7_free_update_bt3mto1y, week7_free_update_bt1mto3m, week7_free_update_ls1m,\
    week7_free_cate1_boy, week7_free_cate1_girl, week7_free_cate1_pub, week7_free_cate1_other,\
    week7_charge,\
    week7_charge_status_publish, week7_charge_status_end,\
    week7_charge_view_gt10w, week7_charge_view_bt1wto10w, week7_charge_view_bt1kto1w, week7_charge_view_bt100to1k, week7_charge_view_bt0to100,\
    week7_charge_intime_gtyear, week7_charge_intime_bt3mto1y, week7_charge_intime_bt1mto3m, week7_charge_intime_ls1m,\
    week7_charge_update_gtyear, week7_charge_update_bt3mto1y, week7_charge_update_bt1mto3m, week7_charge_update_ls1m,\
    week7_charge_cate1_boy, week7_charge_cate1_girl, week7_charge_cate1_pub, week7_charge_cate1_other,\
    week7_month,\
    week7_month_status_publish, week7_month_status_end,\
    week7_month_view_gt10w, week7_month_view_bt1wto10w, week7_month_view_bt1kto1w, week7_month_view_bt100to1k, week7_month_view_bt0to100,\
    week7_month_intime_gtyear, week7_month_intime_bt3mto1y, week7_month_intime_bt1mto3m, week7_month_intime_ls1m,\
    week7_month_update_gtyear, week7_month_update_bt3mto1y, week7_month_update_bt1mto3m, week7_month_update_ls1m,\
    week7_month_cate1_boy, week7_month_cate1_girl, week7_month_cate1_pub, week7_month_cate1_other,\
    week7_pub,\
    week7_pub_status_publish, week7_pub_status_end,\
    week7_pub_view_gt10w, week7_pub_view_bt1wto10w, week7_pub_view_bt1kto1w, week7_pub_view_bt100to1k, week7_pub_view_bt0to100,\
    week7_pub_intime_gtyear, week7_pub_intime_bt3mto1y, week7_pub_intime_bt1mto3m, week7_pub_intime_ls1m,\
    week7_pub_update_gtyear, week7_pub_update_bt3mto1y, week7_pub_update_bt1mto3m, week7_pub_update_ls1m,\
    week7_pub_cate1_boy, week7_pub_cate1_girl, week7_pub_cate1_pub, week7_pub_cate1_other,\
    week7_lfree,\
    week7_lfree_status_publish, week7_lfree_status_end,\
    week7_lfree_view_gt10w, week7_lfree_view_bt1wto10w, week7_lfree_view_bt1kto1w, week7_lfree_view_bt100to1k, week7_lfree_view_bt0to100,\
    week7_lfree_intime_gtyear, week7_lfree_intime_bt3mto1y, week7_lfree_intime_bt1mto3m, week7_lfree_intime_ls1m,\
    week7_lfree_update_gtyear, week7_lfree_update_bt3mto1y, week7_lfree_update_bt1mto3m, week7_lfree_update_ls1m,\
    week7_lfree_cate1_boy, week7_lfree_cate1_girl, week7_lfree_cate1_pub, week7_lfree_cate1_other,\
    





    sql = "INSERT INTO ITEM_RETENTION(rid,\
            day_free,\
            day_free_status_publish, day_free_status_end,\
            day_free_view_gt10w, day_free_view_bt1wto10w, day_free_view_bt1kto1w, day_free_view_bt100to1k, day_free_view_bt0to100,\
            day_free_intime_gtyear, day_free_intime_bt3mto1y, day_free_intime_bt1mto3m, day_free_intime_ls1m,\
            day_free_update_gtyear, day_free_update_bt3mto1y, day_free_update_bt1mto3m, day_free_update_ls1m,\
            day_free_cate1_boy, day_free_cate1_girl, day_free_cate1_pub, day_free_cate1_other,\
            day_charge,\
            day_charge_status_publish, day_charge_status_end,\
            day_charge_view_gt10w, day_charge_view_bt1wto10w, day_charge_view_bt1kto1w, day_charge_view_bt100to1k, day_charge_view_bt0to100,\
            day_charge_intime_gtyear, day_charge_intime_bt3mto1y, day_charge_intime_bt1mto3m, day_charge_intime_ls1m,\
            day_charge_update_gtyear, day_charge_update_bt3mto1y, day_charge_update_bt1mto3m, day_charge_update_ls1m,\
            day_charge_cate1_boy, day_charge_cate1_girl, day_charge_cate1_pub, day_charge_cate1_other,\
            day_month,\
            day_month_status_publish, day_month_status_end,\
            day_month_view_gt10w, day_month_view_bt1wto10w, day_month_view_bt1kto1w, day_month_view_bt100to1k, day_month_view_bt0to100,\
            day_month_intime_gtyear, day_month_intime_bt3mto1y, day_month_intime_bt1mto3m, day_month_intime_ls1m,\
            day_month_update_gtyear, day_month_update_bt3mto1y, day_month_update_bt1mto3m, day_month_update_ls1m,\
            day_month_cate1_boy, day_month_cate1_girl, day_month_cate1_pub, day_month_cate1_other,\
            day_pub,\
            day_pub_status_publish, day_pub_status_end,\
            day_pub_view_gt10w, day_pub_view_bt1wto10w, day_pub_view_bt1kto1w, day_pub_view_bt100to1k, day_pub_view_bt0to100,\
            day_pub_intime_gtyear, day_pub_intime_bt3mto1y, day_pub_intime_bt1mto3m, day_pub_intime_ls1m,\
            day_pub_update_gtyear, day_pub_update_bt3mto1y, day_pub_update_bt1mto3m, day_pub_update_ls1m,\
            day_pub_cate1_boy, day_pub_cate1_girl, day_pub_cate1_pub, day_pub_cate1_other,\
            day_lfree,\
            day_lfree_status_publish, day_lfree_status_end,\
            day_lfree_view_gt10w, day_lfree_view_bt1wto10w, day_lfree_view_bt1kto1w, day_lfree_view_bt100to1k, day_lfree_view_bt0to100,\
            day_lfree_intime_gtyear, day_lfree_intime_bt3mto1y, day_lfree_intime_bt1mto3m, day_lfree_intime_ls1m,\
            day_lfree_update_gtyear, day_lfree_update_bt3mto1y, day_lfree_update_bt1mto3m, day_lfree_update_ls1m,\
            day_lfree_cate1_boy, day_lfree_cate1_girl, day_lfree_cate1_pub, day_lfree_cate1_other,\
            \
            week_free,\
            week_free_status_publish, week_free_status_end,\
            week_free_view_gt10w, week_free_view_bt1wto10w, week_free_view_bt1kto1w, week_free_view_bt100to1k, week_free_view_bt0to100,\
            week_free_intime_gtyear, week_free_intime_bt3mto1y, week_free_intime_bt1mto3m, week_free_intime_ls1m,\
            week_free_update_gtyear, week_free_update_bt3mto1y, week_free_update_bt1mto3m, week_free_update_ls1m,\
            week_free_cate1_boy, week_free_cate1_girl, week_free_cate1_pub, week_free_cate1_other,\
            week_charge,\
            week_charge_status_publish, week_charge_status_end,\
            week_charge_view_gt10w, week_charge_view_bt1wto10w, week_charge_view_bt1kto1w, week_charge_view_bt100to1k, week_charge_view_bt0to100,\
            week_charge_intime_gtyear, week_charge_intime_bt3mto1y, week_charge_intime_bt1mto3m, week_charge_intime_ls1m,\
            week_charge_update_gtyear, week_charge_update_bt3mto1y, week_charge_update_bt1mto3m, week_charge_update_ls1m,\
            week_charge_cate1_boy, week_charge_cate1_girl, week_charge_cate1_pub, week_charge_cate1_other,\
            week_month,\
            week_month_status_publish, week_month_status_end,\
            week_month_view_gt10w, week_month_view_bt1wto10w, week_month_view_bt1kto1w, week_month_view_bt100to1k, week_month_view_bt0to100,\
            week_month_intime_gtyear, week_month_intime_bt3mto1y, week_month_intime_bt1mto3m, week_month_intime_ls1m,\
            week_month_update_gtyear, week_month_update_bt3mto1y, week_month_update_bt1mto3m, week_month_update_ls1m,\
            week_month_cate1_boy, week_month_cate1_girl, week_month_cate1_pub, week_month_cate1_other,\
            week_pub,\
            week_pub_status_publish, week_pub_status_end,\
            week_pub_view_gt10w, week_pub_view_bt1wto10w, week_pub_view_bt1kto1w, week_pub_view_bt100to1k, week_pub_view_bt0to100,\
            week_pub_intime_gtyear, week_pub_intime_bt3mto1y, week_pub_intime_bt1mto3m, week_pub_intime_ls1m,\
            week_pub_update_gtyear, week_pub_update_bt3mto1y, week_pub_update_bt1mto3m, week_pub_update_ls1m,\
            week_pub_cate1_boy, week_pub_cate1_girl, week_pub_cate1_pub, week_pub_cate1_other,\
            week_lfree,\
            week_lfree_status_publish, week_lfree_status_end,\
            week_lfree_view_gt10w, week_lfree_view_bt1wto10w, week_lfree_view_bt1kto1w, week_lfree_view_bt100to1k, week_lfree_view_bt0to100,\
            week_lfree_intime_gtyear, week_lfree_intime_bt3mto1y, week_lfree_intime_bt1mto3m, week_lfree_intime_ls1m,\
            week_lfree_update_gtyear, week_lfree_update_bt3mto1y, week_lfree_update_bt1mto3m, week_lfree_update_ls1m,\
            week_lfree_cate1_boy, week_lfree_cate1_girl, week_lfree_cate1_pub, week_lfree_cate1_other,\
            \
            week7_free,\
            week7_free_status_publish, week7_free_status_end,\
            week7_free_view_gt10w, week7_free_view_bt1wto10w, week7_free_view_bt1kto1w, week7_free_view_bt100to1k, week7_free_view_bt0to100,\
            week7_free_intime_gtyear, week7_free_intime_bt3mto1y, week7_free_intime_bt1mto3m, week7_free_intime_ls1m,\
            week7_free_update_gtyear, week7_free_update_bt3mto1y, week7_free_update_bt1mto3m, week7_free_update_ls1m,\
            week7_free_cate1_boy, week7_free_cate1_girl, week7_free_cate1_pub, week7_free_cate1_other,\
            week7_charge,\
            week7_charge_status_publish, week7_charge_status_end,\
            week7_charge_view_gt10w, week7_charge_view_bt1wto10w, week7_charge_view_bt1kto1w, week7_charge_view_bt100to1k, week7_charge_view_bt0to100,\
            week7_charge_intime_gtyear, week7_charge_intime_bt3mto1y, week7_charge_intime_bt1mto3m, week7_charge_intime_ls1m,\
            week7_charge_update_gtyear, week7_charge_update_bt3mto1y, week7_charge_update_bt1mto3m, week7_charge_update_ls1m,\
            week7_charge_cate1_boy, week7_charge_cate1_girl, week7_charge_cate1_pub, week7_charge_cate1_other,\
            week7_month,\
            week7_month_status_publish, week7_month_status_end,\
            week7_month_view_gt10w, week7_month_view_bt1wto10w, week7_month_view_bt1kto1w, week7_month_view_bt100to1k, week7_month_view_bt0to100,\
            week7_month_intime_gtyear, week7_month_intime_bt3mto1y, week7_month_intime_bt1mto3m, week7_month_intime_ls1m,\
            week7_month_update_gtyear, week7_month_update_bt3mto1y, week7_month_update_bt1mto3m, week7_month_update_ls1m,\
            week7_month_cate1_boy, week7_month_cate1_girl, week7_month_cate1_pub, week7_month_cate1_other,\
            week7_pub,\
            week7_pub_status_publish, week7_pub_status_end,\
            week7_pub_view_gt10w, week7_pub_view_bt1wto10w, week7_pub_view_bt1kto1w, week7_pub_view_bt100to1k, week7_pub_view_bt0to100,\
            week7_pub_intime_gtyear, week7_pub_intime_bt3mto1y, week7_pub_intime_bt1mto3m, week7_pub_intime_ls1m,\
            week7_pub_update_gtyear, week7_pub_update_bt3mto1y, week7_pub_update_bt1mto3m, week7_pub_update_ls1m,\
            week7_pub_cate1_boy, week7_pub_cate1_girl, week7_pub_cate1_pub, week7_pub_cate1_other,\
            week7_lfree,\
            week7_lfree_status_publish, week7_lfree_status_end,\
            week7_lfree_view_gt10w, week7_lfree_view_bt1wto10w, week7_lfree_view_bt1kto1w, week7_lfree_view_bt100to1k, week7_lfree_view_bt0to100,\
            week7_lfree_intime_gtyear, week7_lfree_intime_bt3mto1y, week7_lfree_intime_bt1mto3m, week7_lfree_intime_ls1m,\
            week7_lfree_update_gtyear, week7_lfree_update_bt3mto1y, week7_lfree_update_bt1mto3m, week7_lfree_update_ls1m,\
            week7_lfree_cate1_boy, week7_lfree_cate1_girl, week7_lfree_cate1_pub, week7_lfree_cate1_other,\
            )" % \
            ()

    db = MySQLdb.connect('localhost', 'root', user, passwd, 'item_info')                # 连接数据库
    cursor = db.cursor()                                                                # 获取操作游标

    execute_sql(cursor, sql)
    db.close()                                                                          # 关闭数据库

    pass
