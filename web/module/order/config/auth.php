<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */

$config['auth'][] = array(
	'name' => fc_lang('内容管理'),
	'auth' => array(
		'admin/home/index' => fc_lang('管理'),
	)
);
