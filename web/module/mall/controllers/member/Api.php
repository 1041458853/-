<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Api extends M_Controller {
	
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }
	
	
	// 商品规格
	public function specification() {
			
		$name = $this->input->post('name');
		$catid = (int)$this->input->post('catid');
		$value = $this->input->post('value', true);
		
		$return = dr_get_spec($name, $catid, $value);
		if ($return) {
            exit(dr_json(1, $return));
		} else {
            exit(dr_json(0, $return));
		}
	}
	
	// 商品属性
	public function property() {
		
		$name = $this->input->post('name');
		$catid = (int)$this->input->post('catid');
		$value = $this->input->post('value', true);
		
		$return = dr_get_property($name, $catid, $value);
        if ($return) {
            exit(dr_json(1, $return));
        } else {
            exit(dr_json(0, $return));
        }
	}
	
}