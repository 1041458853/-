<?php
/**
 * 主表结构（由开发者定义）
 */


return array (
  'sql' => 'CREATE TABLE IF NOT EXISTS `{tablename}` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL COMMENT \'栏目id\',
  `title` varchar(255) DEFAULT NULL COMMENT \'主题\',
  `thumb` varchar(255) DEFAULT NULL COMMENT \'缩略图\',
  `keywords` varchar(255) DEFAULT NULL COMMENT \'关键字\',
  `description` text COMMENT \'描述\',
  `hits` mediumint(8) unsigned DEFAULT NULL COMMENT \'浏览数\',
  `uid` mediumint(8) unsigned NOT NULL COMMENT \'作者id\',
  `author` varchar(50) NOT NULL COMMENT \'作者名称\',
  `status` tinyint(2) NOT NULL COMMENT \'状态\',
  `url` varchar(255) DEFAULT NULL COMMENT \'地址\',
  `link_id` int(10) NOT NULL DEFAULT \'0\' COMMENT \'同步id\',
  `tableid` smallint(5) unsigned NOT NULL COMMENT \'附表id\',
  `inputip` varchar(15) DEFAULT NULL COMMENT \'录入者ip\',
  `inputtime` int(10) unsigned NOT NULL COMMENT \'录入时间\',
  `updatetime` int(10) unsigned NOT NULL COMMENT \'更新时间\',
  `comments` int(10) unsigned NOT NULL COMMENT \'评论数量\',
  `favorites` int(10) unsigned NOT NULL COMMENT \'收藏数量\',
  `displayorder` tinyint(3) NOT NULL DEFAULT \'0\',
  `order_price` decimal(10,2) DEFAULT NULL,
  `order_quantity` varchar(255) DEFAULT NULL,
  `order_volume` int(10) DEFAULT NULL,
  `order_specification` text,
  `order_shipping` int(10) DEFAULT NULL,
  `order_shipping_param` text,
  `order_city` mediumint(8) unsigned DEFAULT NULL,
  `order_status` tinyint(1) DEFAULT \'0\',
  `order_sn` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `catid` (`catid`,`updatetime`),
  KEY `link_id` (`link_id`),
  KEY `status` (`status`),
  KEY `hits` (`hits`),
  KEY `order_price` (`order_price`),
  KEY `order_volume` (`order_volume`),
  KEY `order_shipping` (`order_shipping`),
  KEY `order_city` (`order_city`),
  KEY `displayorder` (`displayorder`,`updatetime`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT=\'主表\'',
  'field' => 
  array (
    0 => 
    array (
      'fieldname' => 'order_status',
      'fieldtype' => 'Radio',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'options' => '上架|1
下架|0',
          'value' => '1',
          'fieldtype' => 'TINYINT',
          'fieldlength' => '1',
        ),
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '95',
      'textname' => '商品状态',
    ),
    1 => 
    array (
      'fieldname' => 'order_specification',
      'fieldtype' => 'Specification',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '7',
      'textname' => '商品规格',
    ),
    2 => 
    array (
      'fieldname' => 'order_shipping',
      'fieldtype' => 'Shipping',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '11',
      'textname' => '商品运费',
    ),
    3 => 
    array (
      'fieldname' => 'order_shipping_param',
      'fieldtype' => 'Shipping_param',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '13',
      'textname' => '运输参数',
    ),
    4 => 
    array (
      'fieldname' => 'order_city',
      'fieldtype' => 'Linkage',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'linkage' => 'address',
          'value' => '',
        ),
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '12',
      'textname' => '商品所在地',
    ),
    5 => 
    array (
      'fieldname' => 'order_sn',
      'fieldtype' => 'Text',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'width' => '200',
          'ispwd' => '0',
          'unique' => '0',
          'value' => '',
          'fieldtype' => 'VARCHAR',
          'fieldlength' => '',
        ),
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '0',
      'textname' => '商品编码',
    ),
    6 => 
    array (
      'fieldname' => 'order_price',
      'fieldtype' => 'Price',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '1',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'width' => '200',
        ),
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '0',
      'textname' => '商品价格',
    ),
    7 => 
    array (
      'fieldname' => 'order_quantity',
      'fieldtype' => 'Text',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '1',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'width' => '200',
          'ispwd' => '0',
          'unique' => '0',
          'value' => '',
          'fieldtype' => 'INT',
          'fieldlength' => '',
        ),
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '0',
      'textname' => '库存数量',
    ),
    8 => 
    array (
      'fieldname' => 'order_volume',
      'fieldtype' => 'Text',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '1',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'width' => '200',
          'ispwd' => '0',
          'unique' => '0',
          'value' => '',
            'fieldtype' => 'INT',
          'fieldlength' => '',
        ),
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '1',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '0',
      'textname' => '出售数量',
    ),
    9 => 
    array (
      'fieldname' => 'title',
      'fieldtype' => 'Text',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '1',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'width' => '400',
          'ispwd' => '0',
          'unique' => '0',
          'value' => '',
          'fieldtype' => 'VARCHAR',
          'fieldlength' => '255',
        ),
        'validate' => 
        array (
          'required' => '1',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '1',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => 'onblur="check_title();get_keywords(\'keywords\');"',
        ),
      ),
      'displayorder' => '0',
      'textname' => '商品',
    ),

    13 => 
    array (
      'fieldname' => 'thumb',
      'fieldtype' => 'Image',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'width' => '50%',
          'size' => '10',
          'count' => '3',
          'uploadpath' => '',
        ),
        'validate' => 
        array (
          'required' => '0',
          'pattern' => '',
          'errortips' => '',
          'isedit' => '0',
          'xss' => '0',
          'check' => '',
          'filter' => '',
          'tips' => '',
          'formattr' => '',
        ),
      ),
      'displayorder' => '5',
      'textname' => '缩略图',
    ),
      14 =>array (
          'fieldname' => 'description',
          'fieldtype' => 'Textarea',
          'relatedid' => '10',
          'relatedname' => 'module',
          'isedit' => '1',
          'ismain' => '1',
          'issystem' => 1,
          'ismember' => '1',
          'issearch' => '1',
          'disabled' => '0',
          'setting' =>
              array (
                  'option' =>
                      array (
                          'width' => 500,
                          'height' => 60,
                          'fieldtype' => 'VARCHAR',
                          'fieldlength' => '255',
                      ),
                  'validate' =>
                      array (
                          'xss' => 1,
                          'filter' => 'dr_clearhtml',
                      ),
              ),
          'displayorder' => '0',
          'textname' => '描述',
      ),
    15 =>
    array (
      'fieldname' => 'keywords',
      'fieldtype' => 'Text',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '1',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '1',
      'disabled' => '0',
      'setting' =>
      array (
        'option' =>
        array (
          'width' => 400,
          'fieldtype' => 'VARCHAR',
          'fieldlength' => '255',
        ),
        'validate' =>
        array (
          'xss' => 1,
          'tips' => '多个关键字以小写分号“,”分隔',
        ),
      ),
      'displayorder' => '3',
      'textname' => '关键字',
    ),


  ),
);?>