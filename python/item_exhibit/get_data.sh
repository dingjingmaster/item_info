#!/bin/bash
#source ~/.bash_profile
#source ~/.bashrc
workDir=$(cd $(dirname $0); pwd)
nowTime=`date -d "-1 day" +%Y%m%d`

###################     参数定义      ###########################
exhibitBase="hdfs://10.26.24.165:9090/rs/stat/${nowTime}/mail/"

total="data/total.txt"                                                  # 总计
fee="data/fee.txt"                                                      # 付费类型
strategy="data/strategy.txt"                                            # 推荐策略
statu="data/status.txt"                                                 # 连载状态
viewCount="data/viewcount.txt"                                          # 订阅量级别
intime="data/intime.txt"                                                # 入库时间
update="data/update.txt"                                                # 更新时间
classify1="data/classify1.txt"                                          # 一级分类
classify2="data/classify2.txt"                                          # 二级分类

### 测试
total="mail/total/part-00000"
fee="mail/charge/part-00000"
strategy="mail/strategy/part-00000"
statu="mail/status/part-00000"
viewCount="mail/level/part-00000"
intime="mail/itime/part-00000"
update="mail/utime/part-00000"
classify1="mail/firstType/part-00000"



###################     开始执行      ###########################
# 拉取数据
#cd ${workDir} && rm -fr data && mkdir data
#hadoop fs -cat "${exhibitBase}/total/*" > ${total}
#hadoop fs -cat "${exhibitBase}/charge/*" > ${fee}
#hadoop fs -cat "${exhibitBase}/strategy/*" > ${strategy}
#hadoop fs -cat "${exhibitBase}/status/*" > ${statu}
#hadoop fs -cat "${exhibitBase}/level/*" > ${viewCount}
#hadoop fs -cat "${exhibitBase}/itime/*" > ${intime}
#hadoop fs -cat "${exhibitBase}/utime/*" > ${update}
#hadoop fs -cat "${exhibitBase}/firstType/*" > ${classify1}
#hadoop fs -cat "${exhibitBase}/secondType/*" > ${classify2}

# 留存率结果统计
cd ${workDir}/
python inject_exhibit.py "root" "dingjing1009." "${nowTime}" "${total}" "${fee}" "${strategy}" "${statu}" "${viewCount}" "${intime}" "${update}" "${classify1}" "${classify2}"













