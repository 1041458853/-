<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Show extends M_Controller {

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();

    }
	/**
     * 内容
     */
    public function index($id = 0, $page = 0, $return = FALSE) {


		$id = $id ? $id : (int)$this->input->get('id');
		$page = $page ? $page : max(1, (int)$this->input->get('page'));
        return $this->_show($id, $page, $return);
    }
	
	/**
     * 创建html
     */
    public function create_html() {
        $this->_create_show_file((int)$this->input->get('id'), FALSE);
    }
	
	/**
     * 生成html
     */
    public function html() {
        $this->_show_html();
    }
    
    //跳转至详情页
    public function xiangqingye(){
        $sql = 'select * from imt_1_mall where id='.$_GET["id"];
        $query = $this->db->query($sql);
        $row = $query->row();
        
        $this->template->assign(array(
            'id' => $row->id,
            'title' => $row->title,
            'updatetime' => $row->updatetime,
            'order_price' => $row->order_price,
        ));
        
        $query = $this->db->select('*')
        ->where('uid', $this->uid)
        ->where('status', 1)
        ->where('mall_id', $_GET["id"])
        ->get('member_paylog');
        
        //判断此用户是否购买过这个课程
        $status = "false";
        // if($query->num_rows() == 1){
        //     $status = "true";
        // }else{
        //     $status = "false";
        // }
        $this->template->assign(array(
            'status' => $status,
        ));
        
        $this->template->display("show.html");
    }
}