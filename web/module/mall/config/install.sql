
CREATE TABLE IF NOT EXISTS `{tablename}_property` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '0',
  `catid` int(11) DEFAULT NULL COMMENT '栏目id',
  `name` varchar(100) DEFAULT NULL COMMENT '属性名称',
  `cname` varchar(50) DEFAULT NULL COMMENT '属性别名',
  `type` varchar(50) DEFAULT NULL COMMENT '属性类别',
  `value` text COMMENT '属性值',
  `displayorder` tinyint(2) unsigned DEFAULT NULL COMMENT '排序号',
  `search` tinyint(1) DEFAULT NULL COMMENT '是否搜索',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `cname` (`cname`),
  KEY `catid` (`catid`),
  KEY `displayorder` (`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=144 DEFAULT CHARSET=utf8 COMMENT='商品规格属性表';

CREATE TABLE IF NOT EXISTS `{tablename}_property_search` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `cid` int(11) unsigned DEFAULT NULL COMMENT '商品id',
  `pid` int(11) DEFAULT NULL COMMENT '属性id',
  `value` varchar(100) DEFAULT NULL COMMENT '储存值',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品属性储存表';


CREATE TABLE IF NOT EXISTS `{tablename}_shipping` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name` varchar(100) DEFAULT NULL COMMENT '运费名称',
  `uid` int(10) unsigned DEFAULT NULL,
  `valuation` tinyint(1) DEFAULT NULL COMMENT '计价方式：1数量，2重量，3体积',
  `freight` text COMMENT '运费详情',
  `free` text COMMENT '包邮策略',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品运费配置';


CREATE TABLE IF NOT EXISTS `{tablename}_specification` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) DEFAULT NULL COMMENT '栏目id',
  `name` varchar(100) DEFAULT NULL COMMENT '属性名称',
  `cname` varchar(50) DEFAULT NULL COMMENT '属性别名',
  `type` varchar(50) DEFAULT NULL COMMENT '属性类别',
  `value` text COMMENT '属性值',
  `displayorder` tinyint(2) unsigned DEFAULT NULL COMMENT '排序号',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`),
  KEY `cname` (`cname`),
  KEY `displayorder` (`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='商品规格属性表';



