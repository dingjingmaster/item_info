alter database user_type default character set utf8;
CREATE TABLE IF NOT EXISTS `utype_summary`(
    `utid` VARCHAR(128) NOT NULL COMMENT '主键 类型 + 时间戳',
    `freNum` INT DEFAULT 0 NOT NULL COMMENT '免费类型人数',
    `nchNum` INT DEFAULT 0 NOT NULL COMMENT '准付费用户量',
    `chaNum` INT DEFAULT 0 NOT NULL COMMENT '付费用户量',
    `monNum` INT DEFAULT 0 NOT NULL COMMENT '包月用户量',
    `allNum` INT DEFAULT 0 NOT NULL COMMENT '总用户量',
    `frePro` FLOAT DEFAULT 0 NOT NULL COMMENT '免费用户占比',
    `nchPro` FLOAT DEFAULT 0 NOT NULL COMMENT '准付费用户占比',
    `chaPro` FLOAT DEFAULT 0 NOT NULL COMMENT '付费用户占比',
    `monPro` FLOAT DEFAULT 0 NOT NULL COMMENT '包月用户占比',
    `timeStamp` INT(10) NOT NULL COMMENT '时间戳20180110',
    PRIMARY KEY (`utid`)
    );

alter table utype_summary default character set utf8;

