CREATE TABLE IF NOT EXISTS `item_retention`(
   `rid` VARCHAR(64) NOT NULL COMMENT '主键',
   `day_free` float COMMENT '免费-次日留存',
   `day_free_status_publish` float DEFAULT 0 COMMENT '免费-连载-次日留存',
   `day_free_status_end` float DEFAULT 0 COMMENT '免费-完结-次日留存',
   `day_free_view_gt10w` float DEFAULT 0 COMMENT '免费-订阅量大于10万-次日留存',
   `day_free_view_bt1wto10w` float DEFAULT 0 COMMENT '免费-订阅量1万到10万-次日留存',
   `day_free_view_bt1kto1w` float DEFAULT 0 COMMENT '免费-订阅量1千到1万-次日留存',
   `day_free_view_bt100to1k` float DEFAULT 0 COMMENT '免费-订阅量1百到1千-次日留存',
   `day_free_view_bt0to100` float DEFAULT 0 COMMENT '免费-订阅量0到100-次日留存',
   `day_free_intime_gtyear` float DEFAULT 0 COMMENT '免费-入库时间大于1年-次日留存',
   `day_free_intime_bt3mto1y` float DEFAULT 0 COMMENT '免费-入库时间3月到1年-次日留存',
   `day_free_intime_bt1mto3m` float DEFAULT 0 COMMENT '免费-入库时间1月到3月-次日留存',
   `day_free_intime_ls1m` float DEFAULT 0 COMMENT '免费-入库时间小于1月-次日留存',
   `day_free_update_gtyear` float DEFAULT 0 COMMENT '免费-最后更新时间大于1年-次日留存',
   `day_free_update_bt3mto1y` float DEFAULT 0 COMMENT '免费-最后更新时间3月到1年-次日留存',
   `day_free_update_bt1mto3m` float DEFAULT 0 COMMENT '免费-最后更新时间1月到3月-次日留存',
   `day_free_update_ls1m` float DEFAULT 0 COMMENT '免费-最后更新时间小于1月-次日留存',
   `day_free_cate1_boy` float DEFAULT 0 COMMENT '免费-一级分类男频-次日留存',
   `day_free_cate1_girl` float DEFAULT 0 COMMENT '免费-一级分类女频-次日留存',
   `day_free_cate1_pub` float DEFAULT 0 COMMENT '免费-一级分类公版-次日留存',
   `day_free_cate1_other` float DEFAULT 0 COMMENT '免费-一级分类其它-次日留存',
   `day_charge` float DEFAULT 0 COMMENT '付费-次日留存',
   `day_charge_status_publish` float DEFAULT 0 COMMENT '付费-连载-次日留存',
   `day_charge_status_end` float DEFAULT 0 COMMENT '付费-完结-次日留存',
   `day_charge_view_gt10w` float DEFAULT 0 COMMENT '付费-订阅量大于10万-次日留存',
   `day_charge_view_bt1wto10w` float DEFAULT 0 COMMENT '付费-订阅量1万到10万-次日留存',
   `day_charge_view_bt1kto1w` float DEFAULT 0 COMMENT '付费-订阅量1千到1万-次日留存',
   `day_charge_view_bt100to1k` float DEFAULT 0 COMMENT '付费-订阅量1百到1千-次日留存',
   `day_charge_view_bt0to100` float DEFAULT 0 COMMENT '付费-订阅量0到1百-次日留存',
   `day_charge_intime_gtyear` float DEFAULT 0 COMMENT '付费-入库时间大于1年-次日留存',
   `day_charge_intime_bt3mto1y` float DEFAULT 0 COMMENT '付费-入库时间3月到1年-次日留存',
   `day_charge_intime_bt1mto3m` float DEFAULT 0 COMMENT '付费-入库时间1月到3月-次日留存',
   `day_charge_intime_ls1m` float DEFAULT 0 COMMENT '付费-入库时间小于1月-次日留存',
   `day_charge_update_gtyear` float DEFAULT 0 COMMENT '付费-最后更新时间大于1年-次日留存',
   `day_charge_update_bt3mto1y` float DEFAULT 0 COMMENT '付费-最后更新时间3月到1年-次日留存',
   `day_charge_update_bt1mto3m` float DEFAULT 0 COMMENT '付费-最后更新时间1月到3月-次日留存',
   `day_charge_update_ls1m` float DEFAULT 0 COMMENT '付费-最后更新时间小于1月-次日留存',
   `day_charge_cate1_boy` float DEFAULT 0 COMMENT '付费-一级分类男频-次日留存',
   `day_charge_cate1_girl` float DEFAULT 0 COMMENT '付费-一级分类女频-次日留存',
   `day_charge_cate1_pub` float DEFAULT 0 COMMENT '付费-一级分类公版-次日留存',
   `day_charge_cate1_other` float DEFAULT 0 COMMENT '付费-一级分类其它-次日留存',
   `day_month` float DEFAULT 0 COMMENT '包月-次日留存',
   `day_month_status_publish` float DEFAULT 0 COMMENT '包月-连载-次日留存',
   `day_month_status_end` float DEFAULT 0 COMMENT '包月-完结-次日留存',
   `day_month_view_gt10w` float DEFAULT 0 COMMENT '包月-订阅量大于10万-次日留存',
   `day_month_view_bt1wto10w` float DEFAULT 0 COMMENT '包月-订阅量1万到10万-次日留存',
   `day_month_view_bt1kto1w` float DEFAULT 0 COMMENT '包月-订阅量1千到1万-次日留存',
   `day_month_view_bt100to1k` float DEFAULT 0 COMMENT '包月-订阅量1百到1千-次日留存',
   `day_month_view_bt0to100` float DEFAULT 0 COMMENT '包月-订阅量0到1百-次日留存',
   `day_month_intime_gtyear` float DEFAULT 0 COMMENT '包月-入库时间大于1年-次日留存',
   `day_month_intime_bt3mto1y` float DEFAULT 0 COMMENT '包月-入库时间3月到1年-次日留存',
   `day_month_intime_bt1mto3m` float DEFAULT 0 COMMENT '包月-入库时间1月到3月-次日留存',
   `day_month_intime_ls1m` float DEFAULT 0 COMMENT '包月-入库时间小于1月-次日留存',
   `day_month_update_gtyear` float DEFAULT 0 COMMENT '包月-最后更新时间大于1年-次日留存',
   `day_month_update_bt3mto1y` float DEFAULT 0 COMMENT '包月-最后更新时间3月到1年-次日留存',
   `day_month_update_bt1mto3m` float DEFAULT 0 COMMENT '包月-最后更新时间1月到3月-次日留存',
   `day_month_update_ls1m` float DEFAULT 0 COMMENT '包月-最后更新时间小于1月-次日留存',
   `day_month_cate1_boy` float DEFAULT 0 COMMENT '包月-一级分类男频-次日留存',
   `day_month_cate1_girl` float DEFAULT 0 COMMENT '包月-一级分类女频-次日留存',
   `day_month_cate1_pub` float DEFAULT 0 COMMENT '包月-一级分类出版-次日留存',
   `day_month_cate1_other` float DEFAULT 0 COMMENT '包月-一级分类其它-次日留存',
   `day_pub` float DEFAULT 0 COMMENT '公版-次日留存',
   `day_pub_status_publish` float DEFAULT 0 COMMENT '公版-连载-次日留存',
   `day_pub_status_end` float DEFAULT 0 COMMENT '公版-完结-次日留存',
   `day_pub_view_gt10w` float DEFAULT 0 COMMENT '公版-订阅量大于10万-次日留存',
   `day_pub_view_bt1wto10w` float DEFAULT 0 COMMENT '公版-订阅量1万-10万-次日留存',
   `day_pub_view_bt1kto1w` float DEFAULT 0 COMMENT '公版-订阅量1千到1万-次日留存',
   `day_pub_view_bt100to1k` float DEFAULT 0 COMMENT '公版-订阅量1百到1千-次日留存',
   `day_pub_view_bt0to100` float DEFAULT 0 COMMENT '公版-订阅量0到100-次日留存',
   `day_pub_intime_gtyear` float DEFAULT 0 COMMENT '公版-入库时间大于1年-次日留存',
   `day_pub_intime_bt3mto1y` float DEFAULT 0 COMMENT '公版-入库时间3月到1年-次日留存',
   `day_pub_intime_bt1mto3m` float DEFAULT 0 COMMENT '公版-入库时间1月到3月-次日留存',
   `day_pub_intime_ls1m` float DEFAULT 0 COMMENT '公版-入库时间小于1月-次日留存',
   `day_pub_update_gtyear` float DEFAULT 0 COMMENT '公版-最后更新时间大于1年-次日留存',
   `day_pub_update_bt3mto1y` float DEFAULT 0 COMMENT '公版-最后更新时间3月到1年-次日留存',
   `day_pub_update_bt1mto3m` float DEFAULT 0 COMMENT '公版-最后更新时间1月到3月-次日留存',
   `day_pub_update_ls1m` float DEFAULT 0 COMMENT '公版-最后更新时间小于1月-次日留存',
   `day_pub_cate1_boy` float DEFAULT 0 COMMENT '公版-一级分类男频-次日留存',
   `day_pub_cate1_girl` float DEFAULT 0 COMMENT '公版-一级分类女频-次日留存',
   `day_pub_cate1_pub` float DEFAULT 0 COMMENT '公版-一级分类出版-次日留存',
   `day_pub_cate1_other` float DEFAULT 0 COMMENT '公版-一级分类其它-次日留存',
   `day_lfree` float DEFAULT 0 COMMENT '限免-次日留存',
   `day_lfree_status_publish` float DEFAULT 0 COMMENT '限免-连载-次日留存',
   `day_lfree_status_end` float DEFAULT 0 COMMENT '限免-完结-次日留存',
   `day_lfree_view_gt10w` float DEFAULT 0 COMMENT '限免-订阅量大于10万-次日留存',
   `day_lfree_view_bt1wto10w` float DEFAULT 0 COMMENT '限免-订阅量1万到10万-次日留存',
   `day_lfree_view_bt1kto1w` float DEFAULT 0 COMMENT '限免-订阅量1千到1万-次日留存',
   `day_lfree_view_bt100to1k` float DEFAULT 0 COMMENT '限免-订阅量1百到1千-次日留存',
   `day_lfree_view_bt0to100` float DEFAULT 0 COMMENT '限免-订阅量0到100-次日留存',
   `day_lfree_intime_gtyear` float DEFAULT 0 COMMENT '限免-入库时间大于1年-次日留存',
   `day_lfree_intime_bt3mto1y` float DEFAULT 0 COMMENT '限免-入库时间3月到1年-次日留存',
   `day_lfree_intime_bt1mto3m` float DEFAULT 0 COMMENT '限免-入库时间1月到3月-次日留存',
   `day_lfree_intime_ls1m` float DEFAULT 0 COMMENT '限免-入库时间小于1月-次日留存',
   `day_lfree_update_gtyear` float DEFAULT 0 COMMENT '限免-最后更新时间大于1年-次日留存',
   `day_lfree_update_bt3mto1y` float DEFAULT 0 COMMENT '限免-最后更新时间3月到1年-次日留存',
   `day_lfree_update_bt1mto3m` float DEFAULT 0 COMMENT '限免-最后更新时间1月到3月-次日留存',
   `day_lfree_update_ls1m` float DEFAULT 0 COMMENT '限免-最后更新时间小于1月-次日留存',
   `day_lfree_cate1_boy` float DEFAULT 0 COMMENT '限免-一级分类男频-次日留存',
   `day_lfree_cate1_girl` float DEFAULT 0 COMMENT '限免-一级分类女频-次日留存',
   `day_lfree_cate1_pub` float DEFAULT 0 COMMENT '限免-一级分类出版-次日留存',
   `day_lfree_cate1_other` float DEFAULT 0 COMMENT '限免-一级分类其它-次日留存',
   `week_free` float COMMENT '免费-周留存',
   `week_free_status_publish` float DEFAULT 0 COMMENT '免费-连载-周留存',
   `week_free_status_end` float DEFAULT 0 COMMENT '免费-完结-周留存',
   `week_free_view_gt10w` float DEFAULT 0 COMMENT '免费-订阅量大于10万-周留存',
   `week_free_view_bt1wto10w` float DEFAULT 0 COMMENT '免费-订阅量1万到10万-周留存',
   `week_free_view_bt1kto1w` float DEFAULT 0 COMMENT '免费-订阅量1千到1万-周留存',
   `week_free_view_bt100to1k` float DEFAULT 0 COMMENT '免费-订阅量1百到1千-周留存',
   `week_free_view_bt0to100` float DEFAULT 0 COMMENT '免费-订阅量0到100-周留存',
   `week_free_intime_gtyear` float DEFAULT 0 COMMENT '免费-入库时间大于1年-周留存',
   `week_free_intime_bt3mto1y` float DEFAULT 0 COMMENT '免费-入库时间3月到1年-周留存',
   `week_free_intime_bt1mto3m` float DEFAULT 0 COMMENT '免费-入库时间1月到3月-周留存',
   `week_free_intime_ls1m` float DEFAULT 0 COMMENT '免费-入库时间小于1月-周留存',
   `week_free_update_gtyear` float DEFAULT 0 COMMENT '免费-最后更新时间大于1年-周留存',
   `week_free_update_bt3mto1y` float DEFAULT 0 COMMENT '免费-最后更新时间3月到1年-周留存',
   `week_free_update_bt1mto3m` float DEFAULT 0 COMMENT '免费-最后更新时间1月到3月-周留存',
   `week_free_update_ls1m` float DEFAULT 0 COMMENT '免费-最后更新时间小于1月-周留存',
   `week_free_cate1_boy` float DEFAULT 0 COMMENT '免费-一级分类男频-周留存',
   `week_free_cate1_girl` float DEFAULT 0 COMMENT '免费-一级分类女频-周留存',
   `week_free_cate1_pub` float DEFAULT 0 COMMENT '免费-一级分类公版-周留存',
   `week_free_cate1_other` float DEFAULT 0 COMMENT '免费-一级分类其它-周留存',
   `week_charge` float DEFAULT 0 COMMENT '付费-周留存',
   `week_charge_status_publish` float DEFAULT 0 COMMENT '付费-连载-周留存',
   `week_charge_status_end` float DEFAULT 0 COMMENT '付费-完结-周留存',
   `week_charge_view_gt10w` float DEFAULT 0 COMMENT '付费-订阅量大于10万-周留存',
   `week_charge_view_bt1wto10w` float DEFAULT 0 COMMENT '付费-订阅量1万到10万-周留存',
   `week_charge_view_bt1kto1w` float DEFAULT 0 COMMENT '付费-订阅量1千到1万-周留存',
   `week_charge_view_bt100to1k` float DEFAULT 0 COMMENT '付费-订阅量1百到1千-周留存',
   `week_charge_view_bt0to100` float DEFAULT 0 COMMENT '付费-订阅量0到1百-周留存',
   `week_charge_intime_gtyear` float DEFAULT 0 COMMENT '付费-入库时间大于1年-周留存',
   `week_charge_intime_bt3mto1y` float DEFAULT 0 COMMENT '付费-入库时间3月到1年-周留存',
   `week_charge_intime_bt1mto3m` float DEFAULT 0 COMMENT '付费-入库时间1月到3月-周留存',
   `week_charge_intime_ls1m` float DEFAULT 0 COMMENT '付费-入库时间小于1月-周留存',
   `week_charge_update_gtyear` float DEFAULT 0 COMMENT '付费-最后更新时间大于1年-周留存',
   `week_charge_update_bt3mto1y` float DEFAULT 0 COMMENT '付费-最后更新时间3月到1年-周留存',
   `week_charge_update_bt1mto3m` float DEFAULT 0 COMMENT '付费-最后更新时间1月到3月-周留存',
   `week_charge_update_ls1m` float DEFAULT 0 COMMENT '付费-最后更新时间小于1月-周留存',
   `week_charge_cate1_boy` float DEFAULT 0 COMMENT '付费-一级分类男频-周留存',
   `week_charge_cate1_girl` float DEFAULT 0 COMMENT '付费-一级分类女频-周留存',
   `week_charge_cate1_pub` float DEFAULT 0 COMMENT '付费-一级分类公版-周留存',
   `week_charge_cate1_other` float DEFAULT 0 COMMENT '付费-一级分类其它-周留存',
   `week_month` float DEFAULT 0 COMMENT '包月-周留存',
   `week_month_status_publish` float DEFAULT 0 COMMENT '包月-连载-周留存',
   `week_month_status_end` float DEFAULT 0 COMMENT '包月-完结-周留存',
   `week_month_view_gt10w` float DEFAULT 0 COMMENT '包月-订阅量大于10万-周留存',
   `week_month_view_bt1wto10w` float DEFAULT 0 COMMENT '包月-订阅量1万到10万-周留存',
   `week_month_view_bt1kto1w` float DEFAULT 0 COMMENT '包月-订阅量1千到1万-周留存',
   `week_month_view_bt100to1k` float DEFAULT 0 COMMENT '包月-订阅量1百到1千-周留存',
   `week_month_view_bt0to100` float DEFAULT 0 COMMENT '包月-订阅量0到1百-周留存',
   `week_month_intime_gtyear` float DEFAULT 0 COMMENT '包月-入库时间大于1年-周留存',
   `week_month_intime_bt3mto1y` float DEFAULT 0 COMMENT '包月-入库时间3月到1年-周留存',
   `week_month_intime_bt1mto3m` float DEFAULT 0 COMMENT '包月-入库时间1月到3月-周留存',
   `week_month_intime_ls1m` float DEFAULT 0 COMMENT '包月-入库时间小于1月-周留存',
   `week_month_update_gtyear` float DEFAULT 0 COMMENT '包月-最后更新时间大于1年-周留存',
   `week_month_update_bt3mto1y` float DEFAULT 0 COMMENT '包月-最后更新时间3月到1年-周留存',
   `week_month_update_bt1mto3m` float DEFAULT 0 COMMENT '包月-最后更新时间1月到3月-周留存',
   `week_month_update_ls1m` float DEFAULT 0 COMMENT '包月-最后更新时间小于1月-周留存',
   `week_month_cate1_boy` float DEFAULT 0 COMMENT '包月-一级分类男频-周留存',
   `week_month_cate1_girl` float DEFAULT 0 COMMENT '包月-一级分类女频-周留存',
   `week_month_cate1_pub` float DEFAULT 0 COMMENT '包月-一级分类出版-周留存',
   `week_month_cate1_other` float DEFAULT 0 COMMENT '包月-一级分类其它-周留存',
   `week_pub` float DEFAULT 0 COMMENT '公版-周留存',
   `week_pub_status_publish` float DEFAULT 0 COMMENT '公版-连载-周留存',
   `week_pub_status_end` float DEFAULT 0 COMMENT '公版-完结-周留存',
   `week_pub_view_gt10w` float DEFAULT 0 COMMENT '公版-订阅量大于10万-周留存',
   `week_pub_view_bt1wto10w` float DEFAULT 0 COMMENT '公版-订阅量1万-10万-周留存',
   `week_pub_view_bt1kto1w` float DEFAULT 0 COMMENT '公版-订阅量1千到1万-周留存',
   `week_pub_view_bt100to1k` float DEFAULT 0 COMMENT '公版-订阅量1百到1千-周留存',
   `week_pub_view_bt0to100` float DEFAULT 0 COMMENT '公版-订阅量0到100-周留存',
   `week_pub_intime_gtyear` float DEFAULT 0 COMMENT '公版-入库时间大于1年-周留存',
   `week_pub_intime_bt3mto1y` float DEFAULT 0 COMMENT '公版-入库时间3月到1年-周留存',
   `week_pub_intime_bt1mto3m` float DEFAULT 0 COMMENT '公版-入库时间1月到3月-周留存',
   `week_pub_intime_ls1m` float DEFAULT 0 COMMENT '公版-入库时间小于1月-周留存',
   `week_pub_update_gtyear` float DEFAULT 0 COMMENT '公版-最后更新时间大于1年-周留存',
   `week_pub_update_bt3mto1y` float DEFAULT 0 COMMENT '公版-最后更新时间3月到1年-周留存',
   `week_pub_update_bt1mto3m` float DEFAULT 0 COMMENT '公版-最后更新时间1月到3月-周留存',
   `week_pub_update_ls1m` float DEFAULT 0 COMMENT '公版-最后更新时间小于1月-周留存',
   `week_pub_cate1_boy` float DEFAULT 0 COMMENT '公版-一级分类男频-周留存',
   `week_pub_cate1_girl` float DEFAULT 0 COMMENT '公版-一级分类女频-周留存',
   `week_pub_cate1_pub` float DEFAULT 0 COMMENT '公版-一级分类出版-周留存',
   `week_pub_cate1_other` float DEFAULT 0 COMMENT '公版-一级分类其它-周留存',
   `week_lfree` float DEFAULT 0 COMMENT '限免-周留存',
   `week_lfree_status_publish` float DEFAULT 0 COMMENT '限免-连载-周留存',
   `week_lfree_status_end` float DEFAULT 0 COMMENT '限免-完结-周留存',
   `week_lfree_view_gt10w` float DEFAULT 0 COMMENT '限免-订阅量大于10万-周留存',
   `week_lfree_view_bt1wto10w` float DEFAULT 0 COMMENT '限免-订阅量1万到10万-周留存',
   `week_lfree_view_bt1kto1w` float DEFAULT 0 COMMENT '限免-订阅量1千到1万-周留存',
   `week_lfree_view_bt100to1k` float DEFAULT 0 COMMENT '限免-订阅量1百到1千-周留存',
   `week_lfree_view_bt0to100` float DEFAULT 0 COMMENT '限免-订阅量0到100-周留存',
   `week_lfree_intime_gtyear` float DEFAULT 0 COMMENT '限免-入库时间大于1年-周留存',
   `week_lfree_intime_bt3mto1y` float DEFAULT 0 COMMENT '限免-入库时间3月到1年-周留存',
   `week_lfree_intime_bt1mto3m` float DEFAULT 0 COMMENT '限免-入库时间1月到3月-周留存',
   `week_lfree_intime_ls1m` float DEFAULT 0 COMMENT '限免-入库时间小于1月-周留存',
   `week_lfree_update_gtyear` float DEFAULT 0 COMMENT '限免-最后更新时间大于1年-周留存',
   `week_lfree_update_bt3mto1y` float DEFAULT 0 COMMENT '限免-最后更新时间3月到1年-周留存',
   `week_lfree_update_bt1mto3m` float DEFAULT 0 COMMENT '限免-最后更新时间1月到3月-周留存',
   `week_lfree_update_ls1m` float DEFAULT 0 COMMENT '限免-最后更新时间小于1月-周留存',
   `week_lfree_cate1_boy` float DEFAULT 0 COMMENT '限免-一级分类男频-周留存',
   `week_lfree_cate1_girl` float DEFAULT 0 COMMENT '限免-一级分类女频-周留存',
   `week_lfree_cate1_pub` float DEFAULT 0 COMMENT '限免-一级分类出版-周留存',
   `week_lfree_cate1_other` float DEFAULT 0 COMMENT '限免-一级分类其它-周留存',
   `week7_free` float COMMENT '免费-7日留存',
   `week7_free_status_publish` float DEFAULT 0 COMMENT '免费-连载-7日留存',
   `week7_free_status_end` float DEFAULT 0 COMMENT '免费-完结-7日留存',
   `week7_free_view_gt10w` float DEFAULT 0 COMMENT '免费-订阅量大于10万-7日留存',
   `week7_free_view_bt1wto10w` float DEFAULT 0 COMMENT '免费-订阅量1万到10万-7日留存',
   `week7_free_view_bt1kto1w` float DEFAULT 0 COMMENT '免费-订阅量1千到1万-7日留存',
   `week7_free_view_bt100to1k` float DEFAULT 0 COMMENT '免费-订阅量1百到1千-7日留存',
   `week7_free_view_bt0to100` float DEFAULT 0 COMMENT '免费-订阅量0到100-7日留存',
   `week7_free_intime_gtyear` float DEFAULT 0 COMMENT '免费-入库时间大于1年-7日留存',
   `week7_free_intime_bt3mto1y` float DEFAULT 0 COMMENT '免费-入库时间3月到1年-7日留存',
   `week7_free_intime_bt1mto3m` float DEFAULT 0 COMMENT '免费-入库时间1月到3月-7日留存',
   `week7_free_intime_ls1m` float DEFAULT 0 COMMENT '免费-入库时间小于1月-7日留存',
   `week7_free_update_gtyear` float DEFAULT 0 COMMENT '免费-最后更新时间大于1年-7日留存',
   `week7_free_update_bt3mto1y` float DEFAULT 0 COMMENT '免费-最后更新时间3月到1年-7日留存',
   `week7_free_update_bt1mto3m` float DEFAULT 0 COMMENT '免费-最后更新时间1月到3月-7日留存',
   `week7_free_update_ls1m` float DEFAULT 0 COMMENT '免费-最后更新时间小于1月-7日留存',
   `week7_free_cate1_boy` float DEFAULT 0 COMMENT '免费-一级分类男频-7日留存',
   `week7_free_cate1_girl` float DEFAULT 0 COMMENT '免费-一级分类女频-7日留存',
   `week7_free_cate1_pub` float DEFAULT 0 COMMENT '免费-一级分类公版-7日留存',
   `week7_free_cate1_other` float DEFAULT 0 COMMENT '免费-一级分类其它-7日留存',
   `week7_charge` float DEFAULT 0 COMMENT '付费-7日留存',
   `week7_charge_status_publish` float DEFAULT 0 COMMENT '付费-连载-7日留存',
   `week7_charge_status_end` float DEFAULT 0 COMMENT '付费-完结-7日留存',
   `week7_charge_view_gt10w` float DEFAULT 0 COMMENT '付费-订阅量大于10万-7日留存',
   `week7_charge_view_bt1wto10w` float DEFAULT 0 COMMENT '付费-订阅量1万到10万-7日留存',
   `week7_charge_view_bt1kto1w` float DEFAULT 0 COMMENT '付费-订阅量1千到1万-7日留存',
   `week7_charge_view_bt100to1k` float DEFAULT 0 COMMENT '付费-订阅量1百到1千-7日留存',
   `week7_charge_view_bt0to100` float DEFAULT 0 COMMENT '付费-订阅量0到1百-7日留存',
   `week7_charge_intime_gtyear` float DEFAULT 0 COMMENT '付费-入库时间大于1年-7日留存',
   `week7_charge_intime_bt3mto1y` float DEFAULT 0 COMMENT '付费-入库时间3月到1年-7日留存',
   `week7_charge_intime_bt1mto3m` float DEFAULT 0 COMMENT '付费-入库时间1月到3月-7日留存',
   `week7_charge_intime_ls1m` float DEFAULT 0 COMMENT '付费-入库时间小于1月-7日留存',
   `week7_charge_update_gtyear` float DEFAULT 0 COMMENT '付费-最后更新时间大于1年-7日留存',
   `week7_charge_update_bt3mto1y` float DEFAULT 0 COMMENT '付费-最后更新时间3月到1年-7日留存',
   `week7_charge_update_bt1mto3m` float DEFAULT 0 COMMENT '付费-最后更新时间1月到3月-7日留存',
   `week7_charge_update_ls1m` float DEFAULT 0 COMMENT '付费-最后更新时间小于1月-7日留存',
   `week7_charge_cate1_boy` float DEFAULT 0 COMMENT '付费-一级分类男频-7日留存',
   `week7_charge_cate1_girl` float DEFAULT 0 COMMENT '付费-一级分类女频-7日留存',
   `week7_charge_cate1_pub` float DEFAULT 0 COMMENT '付费-一级分类公版-7日留存',
   `week7_charge_cate1_other` float DEFAULT 0 COMMENT '付费-一级分类其它-7日留存',
   `week7_month` float DEFAULT 0 COMMENT '包月-7日留存',
   `week7_month_status_publish` float DEFAULT 0 COMMENT '包月-连载-7日留存',
   `week7_month_status_end` float DEFAULT 0 COMMENT '包月-完结-7日留存',
   `week7_month_view_gt10w` float DEFAULT 0 COMMENT '包月-订阅量大于10万-7日留存',
   `week7_month_view_bt1wto10w` float DEFAULT 0 COMMENT '包月-订阅量1万到10万-7日留存',
   `week7_month_view_bt1kto1w` float DEFAULT 0 COMMENT '包月-订阅量1千到1万-7日留存',
   `week7_month_view_bt100to1k` float DEFAULT 0 COMMENT '包月-订阅量1百到1千-7日留存',
   `week7_month_view_bt0to100` float DEFAULT 0 COMMENT '包月-订阅量0到1百-7日留存',
   `week7_month_intime_gtyear` float DEFAULT 0 COMMENT '包月-入库时间大于1年-7日留存',
   `week7_month_intime_bt3mto1y` float DEFAULT 0 COMMENT '包月-入库时间3月到1年-7日留存',
   `week7_month_intime_bt1mto3m` float DEFAULT 0 COMMENT '包月-入库时间1月到3月-7日留存',
   `week7_month_intime_ls1m` float DEFAULT 0 COMMENT '包月-入库时间小于1月-7日留存',
   `week7_month_update_gtyear` float DEFAULT 0 COMMENT '包月-最后更新时间大于1年-7日留存',
   `week7_month_update_bt3mto1y` float DEFAULT 0 COMMENT '包月-最后更新时间3月到1年-7日留存',
   `week7_month_update_bt1mto3m` float DEFAULT 0 COMMENT '包月-最后更新时间1月到3月-7日留存',
   `week7_month_update_ls1m` float DEFAULT 0 COMMENT '包月-最后更新时间小于1月-7日留存',
   `week7_month_cate1_boy` float DEFAULT 0 COMMENT '包月-一级分类男频-7日留存',
   `week7_month_cate1_girl` float DEFAULT 0 COMMENT '包月-一级分类女频-7日留存',
   `week7_month_cate1_pub` float DEFAULT 0 COMMENT '包月-一级分类出版-7日留存',
   `week7_month_cate1_other` float DEFAULT 0 COMMENT '包月-一级分类其它-7日留存',
   `week7_pub` float DEFAULT 0 COMMENT '公版-7日留存',
   `week7_pub_status_publish` float DEFAULT 0 COMMENT '公版-连载-7日留存',
   `week7_pub_status_end` float DEFAULT 0 COMMENT '公版-完结-7日留存',
   `week7_pub_view_gt10w` float DEFAULT 0 COMMENT '公版-订阅量大于10万-7日留存',
   `week7_pub_view_bt1wto10w` float DEFAULT 0 COMMENT '公版-订阅量1万-10万-7日留存',
   `week7_pub_view_bt1kto1w` float DEFAULT 0 COMMENT '公版-订阅量1千到1万-7日留存',
   `week7_pub_view_bt100to1k` float DEFAULT 0 COMMENT '公版-订阅量1百到1千-7日留存',
   `week7_pub_view_bt0to100` float DEFAULT 0 COMMENT '公版-订阅量0到100-7日留存',
   `week7_pub_intime_gtyear` float DEFAULT 0 COMMENT '公版-入库时间大于1年-7日留存',
   `week7_pub_intime_bt3mto1y` float DEFAULT 0 COMMENT '公版-入库时间3月到1年-7日留存',
   `week7_pub_intime_bt1mto3m` float DEFAULT 0 COMMENT '公版-入库时间1月到3月-7日留存',
   `week7_pub_intime_ls1m` float DEFAULT 0 COMMENT '公版-入库时间小于1月-7日留存',
   `week7_pub_update_gtyear` float DEFAULT 0 COMMENT '公版-最后更新时间大于1年-7日留存',
   `week7_pub_update_bt3mto1y` float DEFAULT 0 COMMENT '公版-最后更新时间3月到1年-7日留存',
   `week7_pub_update_bt1mto3m` float DEFAULT 0 COMMENT '公版-最后更新时间1月到3月-7日留存',
   `week7_pub_update_ls1m` float DEFAULT 0 COMMENT '公版-最后更新时间小于1月-7日留存',
   `week7_pub_cate1_boy` float DEFAULT 0 COMMENT '公版-一级分类男频-7日留存',
   `week7_pub_cate1_girl` float DEFAULT 0 COMMENT '公版-一级分类女频-7日留存',
   `week7_pub_cate1_pub` float DEFAULT 0 COMMENT '公版-一级分类出版-7日留存',
   `week7_pub_cate1_other` float DEFAULT 0 COMMENT '公版-一级分类其它-7日留存',
   `week7_lfree` float DEFAULT 0 COMMENT '限免-7日留存',
   `week7_lfree_status_publish` float DEFAULT 0 COMMENT '限免-连载-7日留存',
   `week7_lfree_status_end` float DEFAULT 0 COMMENT '限免-完结-7日留存',
   `week7_lfree_view_gt10w` float DEFAULT 0 COMMENT '限免-订阅量大于10万-7日留存',
   `week7_lfree_view_bt1wto10w` float DEFAULT 0 COMMENT '限免-订阅量1万到10万-7日留存',
   `week7_lfree_view_bt1kto1w` float DEFAULT 0 COMMENT '限免-订阅量1千到1万-7日留存',
   `week7_lfree_view_bt100to1k` float DEFAULT 0 COMMENT '限免-订阅量1百到1千-7日留存',
   `week7_lfree_view_bt0to100` float DEFAULT 0 COMMENT '限免-订阅量0到100-7日留存',
   `week7_lfree_intime_gtyear` float DEFAULT 0 COMMENT '限免-入库时间大于1年-7日留存',
   `week7_lfree_intime_bt3mto1y` float DEFAULT 0 COMMENT '限免-入库时间3月到1年-7日留存',
   `week7_lfree_intime_bt1mto3m` float DEFAULT 0 COMMENT '限免-入库时间1月到3月-7日留存',
   `week7_lfree_intime_ls1m` float DEFAULT 0 COMMENT '限免-入库时间小于1月-7日留存',
   `week7_lfree_update_gtyear` float DEFAULT 0 COMMENT '限免-最后更新时间大于1年-7日留存',
   `week7_lfree_update_bt3mto1y` float DEFAULT 0 COMMENT '限免-最后更新时间3月到1年-7日留存',
   `week7_lfree_update_bt1mto3m` float DEFAULT 0 COMMENT '限免-最后更新时间1月到3月-7日留存',
   `week7_lfree_update_ls1m` float DEFAULT 0 COMMENT '限免-最后更新时间小于1月-7日留存',
   `week7_lfree_cate1_boy` float DEFAULT 0 COMMENT '限免-一级分类男频-7日留存',
   `week7_lfree_cate1_girl` float DEFAULT 0 COMMENT '限免-一级分类女频-7日留存',
   `week7_lfree_cate1_pub` float DEFAULT 0 COMMENT '限免-一级分类出版-7日留存',
   `week7_lfree_cate1_other` float DEFAULT 0 COMMENT '限免-一级分类其它-7日留存'
   PRIMARY KEY (`rid`)
);

