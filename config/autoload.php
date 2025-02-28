<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

$autoload['libraries']		= array('dcache', 'encrypt', 'duri');
$autoload['language']		= array();
$autoload['drivers']		= array('cache');
$autoload['config']			= array();
$autoload['helper']			= array('durl', 'function', 'system', 'url', 'language', 'cookie', 'directory', 'my');
$autoload['model']			= array();

$autoload['packages'][]		= FCPATH;
$autoload['packages'][]		= FCPATH.'dayrui/';
$autoload['packages'][]		= APPPATH;