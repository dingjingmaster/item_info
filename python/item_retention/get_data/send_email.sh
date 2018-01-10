#!/bin/bash
source ~/.bash_profile
source ~/.bashrc

workDir=$(cd $(dirname $0); pwd)

thisDay=$1
lastDay=$2
itemData=$3

# 时间表述
last_d_t=$4
this_d_t=$5

last_w_t1=$6
last_w_t2=$7
this_w_t1=$8
this_w_t2=$9

last_w7_t1=${10}
this_w7_t1=${11}
this_w7_t2=${12}

headDay="<ul><li>天留存: ${last_d_t}有过阅读行为，且${this_d_t}依然有阅读行为的为留存用户</li>   <li>周留存: ${last_w_t1}至${last_w_t2}有过阅读行为且${this_w_t1} 至 ${this_w_t2}依然有阅读行为的为留存用户</li></ul><br/><br/>${thisDay}数据，仅统计从书架进入阅读的用户<hr/>"
headWeek7="<ul><li>七日内留存: ${last_w7_t1}有过阅读行为，且${this_w7_t1} 至 ${this_w7_t2}依然有阅读行为的为留存用户</li></ul> <br/><br/>${thisDay}数据，仅统计从书架进入的阅读用户<hr/>"


headFee="以下分别是天(前天和昨天)和周(上上周和上周，共14天)付费点处留存<${thisDay}数据>"


hadoop fs -cat hdfs://10.26.24.165:9090/rs/iteminfo/${itemData}/* 1>.tmp 2>&1
line=`cat ./.tmp | wc -l`
((line = $line - 1))
for((i = 0; i < ${line}; ++i))
do
    sed -i '1d' ./.tmp
done
sed -i 's/`/|/g' ./.tmp
sed -i 's/'"'"'/|/g' ./.tmp

# 检查是否把文件读取下来
function check_file_right() {
    lines="`cat $1 | wc -l`"
    if [ ${lines} -gt 100 ]
    then
        return 0
    fi
    return 1
}

###################     参数定义      ###########################
itemPath=`awk -F '|' '{print $2}' ./.tmp`                                                                                                                                           # 书籍信息
logBasePath="hdfs://10.26.24.165:9090/rs/appsinfo/data/user_retention_rate/reader_event/"                                                                                           # 每天阅读事件解析结果
resultBase="hdfs://10.26.24.165:9090/rs/appsinfo/data/user_retention_rate/"                                                                                                         # 存储 天、周、月 的相关(把每天阅读事件进行整合)
hadLogBase="hdfs://10.26.24.165:9090/rs/appsinfo/data/user_retention_rate/"                                                                                                         #

# 天数据
thisDayLog="data/day_${thisDay}"
lastDayLog="data/day_${lastDay}"

# 周数据
thisWeekLog="data/week_${thisDay}"
lastWeekLog="data/week_${lastDay}"

# 7日留存数据
thisWeek7Log="data/week7_${thisDay}"
lastWeek7Log="data/week7_${lastDay}"

# 付费点留存率
thisFeeDayLog="data/fee_day_${thisDay}"
lastFeeDayLog="data/fee_day_${lastDay}"

thisFeeWeekLog="data/fee_week_${thisDay}"
lastFeeWeekLog="data/fee_week_${lastDay}"

###################     开始执行      ###########################
cd ${workDir} && rm -fr data && mkdir data > /dev/null 2>&1 && rm -fr result                                                                                                        # 删除数据
sleep 1

# 获取留存情况
cd ${workDir}/day_week/ && rm -fr libs.zip && zip libs.zip ./*
spark-submit --total-executor-cores=30 --executor-memory=20g --py-files libs.zip user_retention_rate_all.py "${itemPath}/*" ${logBasePath} ${resultBase} ${lastDay} ${thisDay}      # 计算全部留存情况
spark-submit --total-executor-cores=30 --executor-memory=20g --py-files libs.zip user_retention_rate_week7.py "${itemPath}/*" ${logBasePath} ${resultBase} ${lastDay} ${thisDay}    # 计算七日留存情况

sleep 1

# 拉取数据
cd ${workDir}
hadoop fs -cat "${hadLogBase}/${thisDay}/day/remain/*" > ${thisDayLog}
hadoop fs -cat "${hadLogBase}/${thisDay}/day/last/*" > ${lastDayLog}
#hadoop fs -cat "${hadLogBase}/${thisDay}/day/fee_point_last/*" > ${lastFeeDayLog}
#hadoop fs -cat "${hadLogBase}/${thisDay}/day/fee_point_remain/*" > ${thisFeeDayLog}
hadoop fs -cat "${hadLogBase}/${thisDay}/week/remain/*" > ${thisWeekLog}
hadoop fs -cat "${hadLogBase}/${thisDay}/week/last/*" > ${lastWeekLog}
#hadoop fs -cat "${hadLogBase}/${thisDay}/week/fee_point_last/*" > ${lastFeeWeekLog}
#hadoop fs -cat "${hadLogBase}/${thisDay}/week/fee_point_remain/*" > ${thisFeeWeekLog}
hadoop fs -cat "${hadLogBase}/${thisDay}/week/remain_1_7/*" > ${thisWeek7Log}
hadoop fs -cat "${hadLogBase}/${thisDay}/week/last_1_7/*" > ${lastWeek7Log}

# 检查文件是否获取成功
check_file_right ${thisDayLog}
if [ $? -eq 1 ]
then
    sh ./email_error.sh
    exit 1
fi
check_file_right ${lastDayLog}
if [ $? -eq 1 ]
then
    sh ./email_error.sh
    exit 1
fi
check_file_right ${thisWeekLog}
if [ $? -eq 1 ]
then
    sh ./email_error.sh
    exit 1
fi
check_file_right ${lastWeekLog}
if [ $? -eq 1 ]
then
    sh ./email_error.sh
    exit 1
fi
check_file_right ${thisWeek7Log}
if [ $? -eq 1 ]
then
    sh ./email_error.sh
    exit 1
fi
check_file_right ${lastWeek7Log}
if [ $? -eq 1 ]
then
    sh ./email_error.sh
    exit 1
fi

# 留存率结果统计
cd ${workDir}/
python email/res_main_all.py ${lastDayLog} ${thisDayLog} ${lastWeekLog} ${thisWeekLog} 
sh auto_email.sh "${headDay}" "次日留存+周留存统计"                                                                        # 发邮件
python email/res_main_week7.py ${lastWeek7Log} ${thisWeek7Log} 
sh auto_email.sh "${headWeek7}" "七日内留存统计"                                                                           # 发邮件
#python email/res_main_fee.py ${lastFeeDayLog} ${thisFeeDayLog} ${lastFeeWeekLog} ${thisFeeWeekLog}
#sh auto_email.sh ${headFee}                                                                                             # 发邮件






