<?php
/**
 * 附表结构（由开发者定义）
 */


return array (
  'sql' => 'CREATE TABLE IF NOT EXISTS `{tablename}` (
  `id` int(10) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL COMMENT \'作者uid\',
  `catid` smallint(5) unsigned NOT NULL COMMENT \'栏目id\',
  `content` mediumtext COMMENT \'内容\',
  `mycatid` text NULL,
  `shangpinshuxing` text,
  UNIQUE KEY `id` (`id`),
  KEY `uid` (`uid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT=\'附表\'',
  'field' => 
  array (
    0 => 
    array (
      'fieldname' => 'xitongshezhi',
      'fieldtype' => 'Merge',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '0',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'value' => '{hits}
{inputtime}
{updatetime}
{author}
{inputip}
{status}',
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
      'displayorder' => '7',
      'textname' => '系统设置',
    ),
    1 => 
    array (
      'fieldname' => 'shangpindingjia',
      'fieldtype' => 'Merge',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '0',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'value' => '{order_specification}
{order_price}
{order_quantity}
{order_sn}',
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
      'displayorder' => '4',
      'textname' => '商品定价',
    ),
    2 => 
    array (
      'fieldname' => 'wuliuxinxi',
      'fieldtype' => 'Merge',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '0',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'value' => '
{order_city}
{order_shipping}
{order_shipping_param}',
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
      'textname' => '物流信息',
    ),
    3 => 
    array (
      'fieldname' => 'shangpinxinxi',
      'fieldtype' => 'Merge',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '0',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'value' => '{shangpinshuxing}
{thumb}
{description}
{content}
{order_volume}',
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
      'displayorder' => '6',
      'textname' => '商品信息',
    ),

    5 => 
    array (
      'fieldname' => 'shangpinshuxing',
      'fieldtype' => 'Property2',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '0',
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
      'displayorder' => '6',
      'textname' => '商品属性',
    ),
    6 => 
    array (
      'fieldname' => 'content',
      'fieldtype' => 'Ueditor',
      'relatedid' => '10',
      'relatedname' => 'module',
      'isedit' => '1',
      'ismain' => '0',
      'issystem' => 1,
      'ismember' => '1',
      'issearch' => '0',
      'disabled' => '0',
      'setting' => 
      array (
        'option' => 
        array (
          'width' => '100%',
          'height' => '400',
          'autofloat' => '1',
          'autoheight' => '1',
          'autodown' => '1',
          'divtop' => '0',
          'page' => '0',
          'mode' => '1',
          'tool' => '\'bold\', \'italic\', \'underline\'',
          'mode2' => '1',
          'tool2' => '\'bold\', \'italic\', \'underline\'',
          'mode3' => '2',
          'tool3' => '\'bold\', \'italic\', \'underline\'',
          'value' => '',
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
          'formattr' => '',
        ),
      ),
      'displayorder' => '0',
      'textname' => '商品详情',
    ),

  ),
);?>