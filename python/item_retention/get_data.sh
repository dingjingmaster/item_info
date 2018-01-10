#!/bin/bash
source ~/.bash_profile
source ~/.bashrc
workDir=$(cd $(dirname $0); pwd)

###################     参数定义      ###########################
thisDay =`date -d "-2 day" +%Y-%m-%d`
hadLogBase="hdfs://10.26.24.165:9090/rs/appsinfo/data/user_retention_rate"

cd ${workDir} && rm data && mkdir data
# 天数据
thisDayLog="data/day_${thisDay}"
lastDayLog="data/day_${lastDay}"

# 周数据
thisWeekLog="data/week_${thisDay}"
lastWeekLog="data/week_${lastDay}"

# 7日留存数据
thisWeek7Log="data/week7_${thisDay}"
lastWeek7Log="data/week7_${lastDay}"

###################     开始执行      ###########################
# 拉取数据
cd ${workDir} && rm data && mkdir data
hadoop fs -cat "${hadLogBase}/${thisDay}/day/last/*" > ${lastDayLog}
hadoop fs -cat "${hadLogBase}/${thisDay}/day/remain/*" > ${thisDayLog}
hadoop fs -cat "${hadLogBase}/${thisDay}/week/last/*" > ${lastWeekLog}
hadoop fs -cat "${hadLogBase}/${thisDay}/week/remain/*" > ${thisWeekLog}
hadoop fs -cat "${hadLogBase}/${thisDay}/week/last_1_7/*" > ${lastWeek7Log}
hadoop fs -cat "${hadLogBase}/${thisDay}/week/remain_1_7/*" > ${thisWeek7Log}

# 留存率结果统计
cd ${workDir}/
python email/res_main_all.py ${lastDayLog} ${thisDayLog} ${lastWeekLog} ${thisWeekLog} 
python email/res_main_week7.py ${lastWeek7Log} ${thisWeek7Log} 






