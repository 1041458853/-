<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

return array(

	// 后台菜单部分
	
	'admin' => array(
		array(
			'name' => '主题管理',
			'menu' => array(
				array(
					'name' => '已通过帖子',
					'uri' => 'admin/home/index'
				),
				array(
					'name' => '待审核帖子',
					'uri' => 'admin/home/verify'
				),
                array(
                    'name' => '我的草稿箱',
                    'uri' => 'admin/home/draft'
                ),
                array(
                    'name' => '我的回收站',
                    'uri' => 'admin/home/recycle'
                ),
				array(
					'name' => '版块管理',
					'uri' => 'admin/category/index'
				),
				array(
					'name' => 'Tag标签',
					'uri' => 'admin/tag/index'
				),
				array(
					'name' => '单页管理',
					'uri' => 'admin/page/index'
				),
				array(
					'name' => '重建统计',
					'uri' => 'admin/counts/index'
				),
			),
		),

        array(
            'name' => '回帖管理',
            'menu' => array(
                array(
                    'name' => '回帖设置',
                    'uri' => 'admin/comment/config'
                ),
                array(
                    'name' => '回帖管理',
                    'icon' => 'icon-comments',
                    'uri' => 'admin/comment/index'
                )
            ),
        )
	),
	
	//  会员菜单部分
	
	'member' => array(
		array(
			'name' => '帖子管理',
			'menu' => array(
				array(
					'name' => '已通过的帖子',
					'uri' => 'home/index',
				),
				array(
					'name' => '待审核的帖子',
					'uri' => 'verify/index',
				),
				array(
					'name' => '被退回的帖子',
					'uri' => 'back/index',
				),
				array(
					'name' => '我推荐的帖子',
					'uri' => 'home/flag',
				),
				array(
					'name' => '我收藏的帖子',
					'uri' => 'home/favorite',
				),
				array(
					'name' => '我购买的帖子',
					'uri' => 'home/buy',
				),
                array(
                    'name' => '我评论的帖子',
                    'uri' => 'comment/index',
                ),
			)
		),
	),
	
);