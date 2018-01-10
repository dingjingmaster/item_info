
CREATE TABLE IF NOT EXISTS `item_retent_status`(
    `irid` VARCHAR(128) NOT NULL COMMENT '主键 状态+分类(付费情况)+时间戳',
    `yesterday` INT(12) DEFAULT 0 NOT NULL COMMENT '昨天用户数',
    `yesterdayLeft` INT(12) DEFAULT 0 NOT NULL COMMENT '今天留下用户数',
    `weekLast` INT(12) DEFAULT 0 NOT NULL COMMENT '上周用户数',
    `weekLeft` INT(12) DEFAULT 0 NOT NULL COMMENT '本周留下用户数',
    `7daysAgo` INT(12) DEFAULT 0 NOT NULL COMMENT '第7天前用户数',
    `7daysleft` INT(12) DEFAULT 0 NOT NULL COMMENT '第7天本周留下用户数',
    `feeCate` INT(3) DEFAULT 0 NOT NULL COMMENT '付费类别: 1免费 2付费 3包月 4公版 5限免',
    `timeStamp` VARCHAR(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`irid`)
    );

CREATE TABLE IF NOT EXISTS `item_retent_viewCount`(
    `irid` VARCHAR(128) NOT NULL COMMENT '主键 订阅+分类(付费情况)+时间戳',
    `bt0to1b` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量0到100',
    `bt1bto1k` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量100到1000',
    `bt1kto1w` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量1000到10000',
    `bt1wto10w` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量10000到100000',
    `gt10w` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量大于100000',
    `feeCate` INT(3) DEFAULT 0 NOT NULL COMMENT '付费类别: 1免费 2付费 3包月 4公版 5限免',
    `timeStamp` VARCHAR(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`irid`)
    );

CREATE TABLE IF NOT EXISTS `item_retent_intime`(
    `irid` VARCHAR(128) NOT NULL COMMENT '主键 入库时间+分类(付费情况)+时间戳',
    `ls1m` INT(12) DEFAULT 0 NOT NULL COMMENT '入库时间小于1月',
    `bt1mto3m` INT(12) DEFAULT 0 NOT NULL COMMENT '入库时间在1月到3月之间',
    `bt3mto1y` INT(12) DEFAULT 0 NOT NULL COMMENT '入库时间在3月到1年之间',
    `gt1y` INT(12) DEFAULT 0 NOT NULL COMMENT '入库时间大于1年',
    `feeCate` INT(3) DEFAULT 0 NOT NULL COMMENT '付费类别: 1免费 2付费 3包月 4公版 5限免',
    `timeStamp` VARCHAR(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`irid`)
    );

CREATE TABLE IF NOT EXISTS `item_retent_update`(
    `irid` VARCHAR(128) NOT NULL COMMENT '主键 最后更新时间+分类(付费情况)+时间戳',
    `ls1m` INT(12) DEFAULT 0 NOT NULL COMMENT '最后更新时间小于1月',
    `bt1mto3m` INT(12) DEFAULT 0 NOT NULL COMMENT '最后更新时间在1月到3月之间',
    `bt3mto1y` INT(12) DEFAULT 0 NOT NULL COMMENT '最后更新时间在3月到1年之间',
    `gt1y` INT(12) DEFAULT 0 NOT NULL COMMENT '最后更新时间大于1年',
    `feeCate` INT(3) DEFAULT 0 NOT NULL COMMENT '付费类别: 1免费 2付费 3包月 4公版 5限免',
    `timeStamp` VARCHAR(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`irid`)
    );

CREATE TABLE IF NOT EXISTS `item_retent_classify1`(
    `irid` VARCHAR(128) NOT NULL COMMENT '主键 一级分类+分类(付费情况)+时间戳',
    `boy` INT(12) DEFAULT 0 NOT NULL COMMENT '男频',
    `girl` INT(12) DEFAULT 0 NOT NULL COMMENT '女频',
    `pub` INT(12) DEFAULT 0 NOT NULL COMMENT '出版',
    `other` INT(12) DEFAULT 0 NOT NULL COMMENT '其它',
    `feeCate` INT(3) DEFAULT 0 NOT NULL COMMENT '付费类别: 1免费 2付费 3包月 4公版 5限免',
    `timeStamp` VARCHAR(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`irid`)
    );


