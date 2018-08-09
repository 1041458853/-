<?php
require_once FCPATH.'branch/fqb/D_Common.php';
define('IS_POST',strtolower($_SERVER["REQUEST_METHOD"]) == 'post');//判断是否是post方法
define('IS_GET',strtolower($_SERVER["REQUEST_METHOD"]) == 'get');//判断是否是get方法
define('IS_AJAX',isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
//require_once FCPATH.'branch/fqb/C_Model.php';

class Zengsong extends D_Common {
    public $mdir;
    public $prefix;
    public $content_model;

    public function __construct() {
        parent::__construct();
        $this->mdir = $this->dir ?: (defined(MOD_DIR) ? MOD_DIR : $this->input->get('s'));
        $this->prefix = $this->db->dbprefix(SITE_ID.'_'.$this->mdir);
        // $this->content_model = new C_Model;
        $this->load->model('content_model');
        $this->content_model->mdir = $this->mdir;
        $this->content_model->prefix = $this->prefix;
    }
    
    
    //购买赠送
    public function index() {
        //这里的id 是课程的id
        $id = (int)$this->input->get('id');
        //被赠送人的id
        $user_id = (int)$this->input->get('user_id');
        
        $name = $this->input->get('chiyouren_name');
        $phone = (int)$this->input->get('chiyouren_phone');
        $goumaishuliang = (int)$this->input->get('shuliang');
        $shengyushuliang = $goumaishuliang-1;
        $order_price = $_GET['order_price'];
        $beizhu = $_GET['beizhu'];
        
        $array = array();
        array_push($array,$id,$name,$phone);
        
        if($goumaishuliang){
             array_push($array,1);
        }else{
            $this->msg('未获取到数量');
        }
        array_push($array,$beizhu,$shengyushuliang);
        
        if(!$this->db->where('uid', $user_id)->get('imt_member')->num_rows() == 1){
            $this->msg('此用户未注册');
        };
        
        $data = $this->content_model->get($id);
        if (!$this->uid) {
            $this->msg('请登录后再操作', '/?s=member&c=login&m=index&backurl=' . dr_now_url());
        } elseif (!$data) {
            $this->msg('内容不存在');
        }
        // elseif ($this->content_model->is_bought($this->uid,$id)) {
        //     $this->msg('已经购买过了');
        // }
            $this->load->model('pay_model');
            $type = 'weixin';
            if (in_array($type, ['weixin'])) {
                $data = $this->pay_model->add_for_online($type, $order_price, 'mall', $array);
                if ($data) {
                    if (!isset($data['error'])) {
                        if (isset($data['form']) && $data['form']) {
                            $this->msg(fc_lang('正在为您跳转到支付页面，请稍后...').'<div style="display:none">'.$data['form'].'</div>', 'javascript:;', 2, 0);
                        } elseif (isset($data['url']) && $data['url']) {
                            $this->msg(fc_lang('正在为您跳转到支付页面，请稍后...'), $data['url'], 2, 0);
                        } else {
                            $this->template->assign(array(
                                'pay' => $data,
                            ));
                            $this->template->display('pay_result.html');
                            exit;
                        }
                    } else {
                        $this->msg($data['error']);
                    }
                } else {
                    $this->msg(fc_lang('充值失败,未知错误'));
                }
            } else {
                $this->msg('请正确选择支付方式');
            }
        }
        
    //从我的已购赠送
    public function yigouzengsong() {
        if(IS_POST){
            //这里的id 是课程的id
            $mall_id = (int)$this->input->post('mall_id');
            //被赠送人的id
            $user_id = (int)$this->input->post('user_id');
            $name = $this->input->post('chiyouren_name');
            $phone = (int)$this->input->post('chiyouren_phone');
            //订单号
            $dingdanhao = (int)$this->input->post('dingdanhao');

            if(!$this->db->where('uid', $user_id)->get('imt_member')->num_rows() == 1){
                $this->msg('此用户未注册');
            };
            
 
            $data = array(
                'zengsongren_id' => $this->uid,
                'jieshouren_id' => $user_id,
                'jieshouren_name' => $name,
                'jieshouren_phone' => $phone,
                'kecheng_id' => $mall_id,
                'dingdanhao' => $dingdanhao,
                'time' => SYS_TIME,
                'status' => 1
            );
            $this->db->insert('zengsongjilu', $data);
            
            $query = $this->db->where('id', $dingdanhao)->get('member_paylog')->row_array();
            $num = $query['shengyushuliang'];
            $num = $num-1;
            $this->db->set('shengyushuliang', $num, FALSE);
            $this->db->where('id', $dingdanhao);
            $this->db->update('member_paylog');
            // $this->template->display('zengsong.html');
            // header('Location: /?s=member&c=home');

        }else{
            //这里的id 是课程的id
            $mall_id = (int)$this->input->get('mall_id');
            //订单号
            $dingdanhao = (int)$this->input->get('dingdanhao');
        
            $this->template->assign(array(
                'mall_id' => $mall_id,
                'dingdanhao' => $dingdanhao,
            ));
            $this->template->display('zengsong.html');
        }
        
    
    }

}