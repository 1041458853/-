<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends M_Controller {

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * 首页
     */
    public function index() {
        if (!$this->uid) {
            redirect (SITE_URL .'?c=weixin&m=sync&url='.urlencode(dr_now_url ()));
            return;
        }
		parent::_index();
    }
    
        //邀请页面
    public function yaoqingma(){
        $qrcode = $this->cache->file->get("inviter-$this->uid");
        if (!$qrcode) {
            $this->load->model('weixin_model');
            $qrcode = $this->weixin_model->get_qrcode(['inviter' => $this->uid]);
            if (!$qrcode) {
                $this->msg('分享链接生成失败，请尝试重新进入页面');
            }
            $this->cache->file->save("inviter-$this->uid", $qrcode, 86400);
        }
        $this->template->assign([
            'meta_titile' => '邀请有礼',
            'ticket' => $qrcode['ticket']
        ]);
        $this->template->display('yaoqingma.html');
    }
    
    //打开邀请后的页面
    public function openyaoqing(){
        $this->template->display('fenxiang.html');
    }
}