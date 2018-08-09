<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Extend extends M_Controller {

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }
	
	/**
     * 内容
     */
    public function index() {
        return $this->_extend((int)$this->input->get('id'));
    }
}