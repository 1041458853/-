<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/* v3.1.0  */
 
class Home extends M_Controller {


    /**
     * 首页
     */
    public function index() {
        if (!$this->uid) {
            redirect (SITE_URL .'?c=weixin&m=sync&url='.urlencode(dr_now_url ()));
            return;
        }
        $text = $this->input->get('text');
        
        if($text && $text != null){
            $data = $this->db->like('title', $text)->get('imt_1_mall')->result_array();
            $this->template->assign(array(
                'data' => $data,
                'text' => $text,
            ));
            $this->template->display('index.html');
        }else {
            $data = $this->db->get('imt_1_mall')->result_array();
            $this->template->assign(array(
                'data' => $data, 
                'text' => "请输入要查询的课程",
            ));
            $this->template->display('index.html');
        }
    }
    
    //首页搜索
    public function search() {
        $text = $this->input->get('text');
        
        if($text){
            $data = $this->db->like('title', $text)->get('imt_1_mall')->result_array();
            if($data){
                $this->template->assign(array(
                    'data' => $data,    
                ));
            }else{
              
            }
            $this->template->display('index.html');
        }else {
            $this->template->display('index.html');
        }
        
    }

}