-- 创建两个表
CREATE TABLE `tmp1` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
ROW_FORMAT=COMPACT
;


CREATE TABLE `NewTable` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`tel`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`pwd`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`status`  int(11) NOT NULL DEFAULT 0 COMMENT '0表示正常，1表示处于冻结状态' ,
`dj_time`  datetime NULL DEFAULT NULL COMMENT '冻结时间' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
ROW_FORMAT=COMPACT
;



