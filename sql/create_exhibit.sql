alter database item_exhibit default character set utf8;

CREATE TABLE IF NOT EXISTS `item_exhibit_summary`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );


-- 2付费类型
CREATE TABLE IF NOT EXISTS `item_exhibit_fee`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `feeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '付费类型: 1免费 2付费 3包月 4公版 5限免',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );


-- 3推荐策略
CREATE TABLE IF NOT EXISTS `item_exhibit_strategy`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `feeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '付费类型: 1免费 2付费 3包月 4公版 5限免',
    `strategyCate` INT(12) DEFAULT 0 NOT NULL COMMENT '策略类型: 1实时流 2用户协同 3冷启动 4流行度 5物品协同 6同分类 7订阅模型 8阅读模型 9内容相似 10阅读同分类 11一级同分类 12无策略',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );


-- 4连载状态
CREATE TABLE IF NOT EXISTS `item_exhibit_status`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `feeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '付费类型: 1免费 2付费 3包月 4公版 5限免',
    `statusCate` INT(12) DEFAULT 0 NOT NULL COMMENT '状态类型: 1连载 2完结',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );


-- 5订阅量级别
CREATE TABLE IF NOT EXISTS `item_exhibit_view`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `feeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '付费类型: 1免费 2付费 3包月 4公版 5限免',
    `viewCate` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量类型: 1介于0到10 2介于10到100 3介于100到1000 4介于1000到1w 5介于1w到10w 6介于10w到100w 7介于100w到1000万',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );

-- 6入库时间
CREATE TABLE IF NOT EXISTS `item_exhibit_intime`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `feeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '付费类型: 1免费 2付费 3包月 4公版 5限免',
    `intimeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '入库时间类型: 1小于1月 2介于1-3月 3介于3-12月 4介于12-99月',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );


-- 7更新时间
CREATE TABLE IF NOT EXISTS `item_exhibit_update`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `feeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '付费类型: 1免费 2付费 3包月 4公版 5限免',
    `updateCate` INT(12) DEFAULT 0 NOT NULL COMMENT '入库时间类型: 1小于1月 2介于1-3月 3介于3-12月 4介于12-99月',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );


-- 8一级分类
CREATE TABLE IF NOT EXISTS `item_exhibit_classify1`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `feeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '付费类型: 1免费 2付费 3包月 4公版 5限免',
    `classify1Cate` INT(12) DEFAULT 0 NOT NULL COMMENT '一级分类: 1男频 2女频 3包月 4出版 5其它',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );


-- 9二级分类
CREATE TABLE IF NOT EXISTS `item_exhibit_classify2`(
    `dzid` VARCHAR(128) NOT NULL COMMENT '主键 模块名+时间戳',
    `dspNum` INT(12) DEFAULT 0 NOT NULL COMMENT '展现量',
    `clkNum` INT(12) DEFAULT 0 NOT NULL COMMENT '点击量',
    `srbNum` INT(12) DEFAULT 0 NOT NULL COMMENT '订阅量',
    `redNum` INT(12) DEFAULT 0 NOT NULL COMMENT '阅读量',
    `rteNum` INT(12) DEFAULT 0 NOT NULL COMMENT '留存量',
    `clkDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '点展比',
    `subClk` FLOAT DEFAULT 0 NOT NULL COMMENT '订点比',
    `subDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '订展比',
    `redSub` FLOAT DEFAULT 0 NOT NULL COMMENT '阅订比',
    `redDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '阅展比',
    `retent` FLOAT DEFAULT 0 NOT NULL COMMENT '留存率',
    `rteDsp` FLOAT DEFAULT 0 NOT NULL COMMENT '留展比',
    `feeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '付费类型: 1免费 2付费 3包月 4公版 5限免',
    `classify2Cate` INT(12) DEFAULT 0 NOT NULL COMMENT '一级分类: 1现代言情 2现代都市 3玄幻奇幻 4古代言情 5幻想言情 6武侠仙侠 7历史军事 8科幻小说 9浪漫青春 10二次元 11游戏竞技 12灵异悬疑 13女生悬疑 14同人小说 15现代文学 16短篇 17经典名著 18其他',
    `typeCate` INT(12) DEFAULT 0 NOT NULL COMMENT '类型: 1书架推荐 2免费-猜你喜欢 3章末页-读本书还看过 4封面页-读本书还看过 5书架-猜你喜欢 6精选-瀑布流 7封面页-读本书人看过更多 8包月-瀑布流 9封面页-类别推荐 10封面页-作者推荐 11精选-完结瀑布流 12免费-包月推荐 13精选-男频瀑布流 14精选-排行瀑布流 15精选-女频瀑布流 16根据阅读推荐 17退出拦截推荐',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`dzid`)
    );


alter table item_exhibit_summary default character set utf8;
alter table item_exhibit_fee default character set utf8;
alter table item_exhibit_strategy default character set utf8;
alter table item_exhibit_status default character set utf8;
alter table item_exhibit_view default character set utf8;
alter table item_exhibit_intime default character set utf8;
alter table item_exhibit_update default character set utf8;
alter table item_exhibit_classify1 default character set utf8;
alter table item_exhibit_classify2 default character set utf8;


