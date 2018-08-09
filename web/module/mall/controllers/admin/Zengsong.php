<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require FCPATH.'branch/fqb/D_Admin_Home.php';
 
class Zengsong extends D_Admin_Home {
	
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
	}
	
	public function index (){
		$this->template ->display ('zengsong_index.html');
	}
	
	

}