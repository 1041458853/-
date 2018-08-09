<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 程序A组设计
 * @author 王春杰
 */

class Spec_model extends CI_Model {

	public $mdir;

	/*
	 * 构造函数
	 */
    public function __construct() {
        parent::__construct();
		$this->mdir = APP_DIR;
    }
	
	public function add($catid, $data) {
		
		if ($this->db->where('catid', $catid)->where('cname', $data['cname'])->count_all_results(SITE_ID.'_'.$this->mdir.'_specification')) {
			return fc_lang('别名重复');
		}
		
		$data['catid'] = $catid;
		$data['displayorder'] = 0;

		$this->db->insert(SITE_ID.'_'.$this->mdir.'_specification', $data);
		
		return $this->db->insert_id();
	}
	
	
	public function edit($id, $catid, $data) {
		
		if ($this->db->where('catid', $catid)->where('id<>'.$id)->where('cname', $data['cname'])->count_all_results(SITE_ID.'_'.$this->mdir.'_specification')) {
			return fc_lang('别名重复');
		}
		
		$this->db->where('id', $id)->update(SITE_ID.'_'.$this->mdir.'_specification', $data);
		
		return $id;
	}
	
	public function delete($catid = 0, $ids) {
		
		$this->db->where_in('id', $ids)->delete(SITE_ID.'_'.$this->mdir.'_specification');
	}
	
	// 获取栏目下的属性列表
	public function get_cat_data($catid) {
		
		$data = $this->db->where('catid', (int)$catid)->order_by('displayorder ASC, id ASC')->get(SITE_ID.'_'.$this->mdir.'_specification')->result_array();
		if (!$data) {
			return array();
		}
		
		$list = array();
		foreach ($data as $t) {
			$t['value'] = dr_string2array($t['value']);
			$t['value'] && $list[$t['cname']] = $t;
		}
		
		return $list;
	}
}