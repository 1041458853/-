<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 程序A组设计
 * @author 王春杰
 */

require FCPATH.'branch/fqb/D_Comment.php';
 
class Comment extends D_Comment {
	
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
        $this->module(APP_DIR);
	}

}