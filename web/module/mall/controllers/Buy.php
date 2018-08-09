<?php
require_once FCPATH.'branch/fqb/D_Common.php';
//require_once FCPATH.'branch/fqb/C_Model.php';

class buy extends D_Common {
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

    public function index() {
        //这里的id 是课程的id
        $id = (int)$this->input->get('id');
        $name = $this->input->get('chiyouren_name');
        $phone = (int)$this->input->get('chiyouren_phone');
        $goumaishuliang = (int)$this->input->get('shuliang');
        $shengyushuliang = (int)$this->input->get('shuliang');
        $order_price = $_GET['order_price'];
        $laiyuan = $_GET['laiyuan'];
        // $this->msg($_GET['youhuiquan']);
        $youhuiquan = $_GET['youhuiquan']?(int)$_GET['youhuiquan']:0;
        $order_price = $order_price - $youhuiquan;
        // $this->msg($order_price);
        
        $array = array();
        array_push($array,$id,$name,$phone);
        
        if($goumaishuliang){
             array_push($array,$goumaishuliang);
        }else{
            $this->msg('未获取到数量');
        }
        array_push($array,$laiyuan,$shengyushuliang);
        
        //优惠券，添加进数组(第六位)，优惠券默认额为0
        array_push($array,$youhuiquan);
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
        
        
        //调出表单
        public function biaodan() {
            $id = (int)$this->input->get('id');
            $order_price = $_GET['order_price'];
            // $this->msg($order_price);
            //查询活动策略信息表，并将其规则传入前端
            $this->db->where('mall_id', $id);
            $data = $this->db->get('imt_huodong')->result_array();
            
            //获取状态值判断是满减还是打折,还是无优惠
            $this->db->where('mall_id', $id);
            $status = $this->db->get('imt_huodong')->row_array()["status"];
            if($status){
                $this->template->assign(array(
                    'id' => $id,
                    'order_price' => $order_price,
                    'guizhe' => $data,
                    'status' => $status
                ));
            }else{
                $this->template->assign(array(
                    'id' => $id,
                    'order_price' => $order_price,
                    'guizhe' => $data,
                    'status' => 2
                ));
            }
            
            $this->template->display('goumaibiaodan.html');
        }

}