<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['auth'][] = array(
	'name' => fc_lang('内容管理'),
	'auth' => array(
		'admin/home/index' => fc_lang('管理'),
		'admin/home/add' => fc_lang('添加'),
		'admin/home/edit' => fc_lang('修改'),
		'admin/home/del' => fc_lang('删除'),
		'admin/home/verify' => fc_lang('审核'),
		'admin/home/draft' => fc_lang('草稿箱'),
	)
);

$config['auth'][] = array(
	'name' => fc_lang('栏目管理'),
	'auth' => array(
		'admin/category/index' => fc_lang('管理'),
		'admin/category/add' => fc_lang('添加'),
		'admin/category/edit' => fc_lang('修改'),
		'admin/category/del' => fc_lang('删除'),
	)
);

$config['auth'][] = array(
	'name' => fc_lang('Tag标签'),
	'auth' => array(
		'admin/tag/index' => fc_lang('管理'),
		'admin/tag/add' => fc_lang('添加'),
		'admin/tag/edit' => fc_lang('修改'),
		'admin/tag/del' => fc_lang('删除'),
	)
);
