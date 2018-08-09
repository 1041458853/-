<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 管理后台菜单分布
 *
 * array(
 *		'name' => '分组菜单名称',
 *		'menu' => array(
 *			array(
 *				'name' => '链接菜单名称',
 *				'uri' => '链接菜单的uri'
 *			)
 *			......
 *		)
 * )
 * .......
 */

return array(

    'icon' => 'fa fa-cart-plus',
	// 后台菜单部分
	
	'admin' => array(
		array(
			'name' => '订单管理',
			'icon' => 'fa fa-shopping-cart',
			'menu' => array(
				array(
					'name' => '全部',
					'uri' => 'admin/home/index',
					'icon' => 'fa fa-shopping-cart',
				),
				array(
					'name' => '待付款',
					'uri' => 'admin/home/fk',
					'icon' => 'fa fa-jpy',
				),
				array(
					'name' => '待发货',
					'uri' => 'admin/home/fh',
					'icon' => 'fa fa-truck',
				),
                array(
                    'name' => '交易完成',
                    'uri' => 'admin/home/wc',
                    'icon' => 'fa fa-check-circle-o',
                ),
                array(
                    'name' => '交易关闭',
                    'uri' => 'admin/home/close',
                    'icon' => 'fa fa-frown-o',
                ),
			),
		),
		array(
			'name' => '资金管理',
			'icon' => 'fa fa-jpy',
			'menu' => array(
				array(
					'name' => '转账受理',
					'uri' => 'admin/transfer/index',
					'icon' => 'fa fa-jpy',
				),
			),
		),
		array(
			'name' => '订单配置',
			'icon' => 'fa fa-cog',
			'menu' => array(
				array(
					'name' => '订单配置',
					'uri' => 'admin/mconfig/index',
					'icon' => 'fa fa-certificate',
				),
				array(
					'name' => '付款方式',
					'uri' => 'admin/mconfig/paytype',
					'icon' => 'fa fa-jpy',
				),
				array(
					'name' => '通知提醒',
					'uri' => 'admin/mconfig/notice',
					'icon' => 'fa fa-bullhorn',
				),
				array(
					'name' => '模块配置',
					'uri' => 'admin/mconfig/module',
					'icon' => 'fa fa-cog',
				),
				array(
					'name' => '权限配置',
					'uri' => 'admin/mconfig/permission',
					'icon' => 'fa fa-group',
				),
				array(
					'name' => '自定义字段',
					'uri' => 'admin/field/index/rname/module/rid/{id}',
					'icon' => 'fa fa-code',
				),
			),
		),

	),

    //  会员菜单部分

    'member' => array(
        array(
            'name' => '订单管理',
			'icon' => 'fa fa-shopping-cart',
            'menu' => array(
                array(
                    'name' => '我的订单',
                    'uri' => 'home/index',
                    'icon' => 'fa fa-shopping-cart',
                ),
            )
        ),
		array(
			'name' => '商家订单',
			'icon' => 'fa fa-cart-plus',
			'menu' => array(
				array(
					'name' => '全部',
					'uri' => 'sell/index',
					'icon' => 'fa fa-shopping-cart',
				),
				array(
					'name' => '待付款',
					'uri' => 'sell/fk',
					'icon' => 'fa fa-paypal',
				),
				array(
					'name' => '待发货',
					'uri' => 'sell/fh',
					'icon' => 'fa fa-truck',
				),
				array(
					'name' => '交易完成',
					'uri' => 'sell/wc',
					'icon' => 'fa fa-check-circle-o',
				),
				array(
					'name' => '交易关闭',
					'uri' => 'sell/close',
					'icon' => 'fa fa-frown-o',
				),
			)
		),
    ),

);