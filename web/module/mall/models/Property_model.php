<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Property_model extends CI_Model {

	/*
	 * 构造函数
	 */
    public function __construct() {
        parent::__construct();
    }
	
	public function add($catid, $data) {
		
		if ($data['pid'] 
			&& $this->db->where('catid', $catid)->where('cname', $data['cname'])->count_all_results(SITE_ID.'_'.APP_DIR.'_property')) {
			return fc_lang('别名重复');
		}
		
		$data['catid'] = $catid;
		$data['search'] = $data['type'] == 'text' || $data['pid'] == 0 ? 0 : $data['search'];
		$data['displayorder'] = 0;
		
		$this->db->insert(SITE_ID.'_'.APP_DIR.'_property', $data);
		
		return $this->db->insert_id();
	}
	
	
	public function edit($id, $catid, $data) {
		
		if ($data['pid'] 
			&& $this->db->where('catid', $catid)->where('id<>'.$id)->where('cname', $data['cname'])->count_all_results(SITE_ID.'_'.APP_DIR.'_property')) {
			return fc_lang('别名重复');
		}
		
		$data['search'] = $data['type'] == 'text' || $data['pid'] == 0 ? 0 : $data['search'];
		$this->db->where('id', $id)->update(SITE_ID.'_'.APP_DIR.'_property', $data);
		
		return $id;
	}
	
	public function delete($catid, $ids) {
		
		$this->db->where_in('id', $ids)->delete(SITE_ID.'_'.APP_DIR.'_property');
		$this->db->where_in('pid', $ids)->delete(SITE_ID.'_'.APP_DIR.'_property');
	}
	
	// 获取栏目下的属性列表
	public function get_cat_data($catid) {
		
		$data = $this->db->where('catid', $catid)->where('pid=0')->order_by('displayorder ASC, id ASC')->get(SITE_ID.'_'.APP_DIR.'_property')->result_array();
		if (!$data) {
			return array();
		}
		
		$list = array();
		foreach ($data as $t) {
            $list[$t['id']] = $t;
			$row = $this->db->where('pid', (int)$t['id'])->order_by('displayorder ASC, id ASC')->get(SITE_ID.'_'.APP_DIR.'_property')->result_array();
			if ($row) {
				foreach ($row as $a) {
					$a['value'] = dr_string2array($a['value']);
					$list[$t['id']]['list'][$a['cname']] = $a;
				}
			}
		}
		
		return $list;
	}
	
	// 获取栏目下的属性列表
	public function get_cat_data_insert($catid) {
		
		$data = $this->db->where('catid', $catid)->where('pid=0')->order_by('displayorder ASC, id ASC')->get(SITE_ID.'_'.APP_DIR.'_property')->result_array();
		if (!$data) {
			return array();
		}
		
		$list = array();
		foreach ($data as $t) {
			$row = $this->db->where('pid', (int)$t['id'])->order_by('displayorder ASC, id ASC')->get(SITE_ID.'_'.APP_DIR.'_property')->result_array();
			if ($row) {
				foreach ($row as $a) {
					$a['search'] && $list[$a['cname']] = $a['id'];
				}
			}
		}
		
		return $list;
	}
}