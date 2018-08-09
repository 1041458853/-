<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require FCPATH.'branch/fqb/D_Member_Extend.php';
 
class Extend extends D_Member_Extend {
	
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
	}

}