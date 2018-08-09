<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require FCPATH.'branch/fqb/D_Admin_Home.php';
 
class Home extends D_Admin_Home {
	
    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
	}
	
	public function del() {

        $id = (int) $this->input->post('id');
        if($this->db->delete('imt_member_paylog', array('id' => $id))){
            exit(dr_json(1, fc_lang('操作成功，正在刷新...')));
        }else {
            exit(dr_json(1, fc_lang('删除失败')));
        };

    }

}