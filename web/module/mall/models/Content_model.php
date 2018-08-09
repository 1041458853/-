<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* v3.1.0  */

require FCPATH.'branch/fqb/C_Model.php';

class Content_model extends C_Model {

    /*
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }

    /*
     *判断是否已经购买过
     */
    public function is_bought($uid,$mall_id){
        $sql = 'select * from imt_member_paylog where uid='.$uid.' and mall_id='.$mall_id.' and status=1';
        $query = $this->db->query($sql);
        if($query->row()){
            return true;
        }else {
            return false;
        }
    }
}