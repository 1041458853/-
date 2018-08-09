<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');



class Home extends M_Controller {
	
	public $field;

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
		$this->load->model('order_model');
    }

    /**
     * 订单管理
     */
    public function index() {
       $this->_admin_list(fc_lang('订单管理'), 0);
    }

    /**
     * 待付款
     */
    public function fk() {
       $this->_admin_list(fc_lang('待付款的订单'), 1);
    }

    /**
     * 待发货
     */
    public function fh() {
       $this->_admin_list(fc_lang('待发货的订单'), 2);
    }

    /**
     * 交易完成
     */
    public function wc() {
       $this->_admin_list(fc_lang('交易完成的订单'), 3);
    }

    /**
     * 交易关闭
     */
    public function close() {
       $this->_admin_list(fc_lang('交易关闭的订单'), 9);
    }



    /**
     * 订单详情
     */
    public function info() {

        $id = (int)$this->input->get('id');
        $data = $this->order_model->get_info($id);
        if (!$data) {
            $this->admin_msg(fc_lang('订单不存在'), $_SERVER['HTTP_REFERER']);
        }

        $this->load->library('dip');

        $this->template->assign(array(
            'id' => $id,
            'kd' => require APPPATH.'libraries/Kd.php',
            'log' => $this->db->where('oid', $id)->order_by('inputtime desc')->get(SITE_ID.'_order_operate')->result_array(),
            'menu' => $this->get_menu_v3(array(
                fc_lang('订单管理') => array($this->_get_back_url('order/home/index'), 'reply'),
                fc_lang('订单详情') => array('order/admin/home/info/id/'.$id, 'file-text')
            )),
            'back' => ADMIN_URL.SELF.'?s=order&c=home&m=',
            'order' => $data,
            'field' => $this->get_cache('module-'.SITE_ID.'-order', 'field'),
            'paytype' => $this->mconfig['paytype'],
            'transfer' => $this->db->where('oid',$id)->get(SITE_ID.'_order_transfer')->row_array(),
        ));
        $this->template->display(is_file(APPPATH.'templates/admin/order_info_'.$data['mid'].'.html') ? 'order_info_'.$data['mid'].'.html' : 'order_info.html');
    }

    // 快递接口
    public function kd() {
        echo str_replace(
            array('<tr><th>时间</th><th>记录</th></tr>', 'ickd_return'),
            array('', 'table'),
            $this->_kd_info($_GET['name'], $_GET['sn'])
        );
        exit;
    }
}