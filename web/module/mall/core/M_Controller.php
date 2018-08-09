<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 程序A组设计
 * @author 王春杰
 */
	
require FCPATH.'branch/fqb/D_Module.php';

class M_Controller extends D_Module {

    /**
     * 构造函数继承公共Module类
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('mall');
    }
}