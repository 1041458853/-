<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Spec extends M_Controller {
	
	public $type;
	public $catid;

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
		$this->catid = (int)$this->input->get('catid');
		$category = $this->db->where('id', $this->catid)->get(SITE_ID.'_'.APP_DIR.'_category')->row_array();
		if (!$category) {
			$this->admin_msg(fc_lang('栏目#%s不存在', $this->catid));
		}
		$this->type = array(
			'' => fc_lang('标准'),
			'color' => fc_lang('颜色'),
		);
		$this->template->assign(array(
			'type' => $this->type,
			'menu' => $this->get_menu_v3(array(
                fc_lang('返回') => array(APP_DIR.'/admin/category/index', 'reply'),
				fc_lang('【%s】商品规格', $category['name']) => array(APP_DIR.'/admin/spec/index/catid/'.$this->catid, 'cube'),
				fc_lang('添加') => array(APP_DIR.'/admin/spec/add/catid/'.$this->catid, 'plus'),
			)),
			'catid' => $this->catid,
		));
		$this->load->model('spec_model');
    }
	
	/**
     * 规格管理
     */
	public function index() {
		
		$table = SITE_ID.'_'.APP_DIR.'_specification';
		
		if (IS_POST) {
			$ids = $this->input->post('ids', TRUE);
			if (!$ids) {
                exit(dr_json(0, fc_lang('你还没有选择呢')));
            }
			if ($this->input->post('action') == 'copy') {
				$ok = $err = 0;
				$cid = (int)$this->input->post('catid');
				$data = $this->db->where_in('id', $ids)->get($table)->result_array();
				if ($data) {
					foreach ($data as $t) {
						unset($t['id']);
						$result = $this->spec_model->add($cid, $t);
						if (is_numeric($result)) {
							$ok++;
						} else {
							$err++;
						}
					}
				}
				exit(dr_json(1, fc_lang('复制成功%s个，失败%s个', $ok, $err)));
			} elseif ($this->input->post('action') == 'order') {
				$data = $this->input->post('data');
				foreach ($ids as $id) {
					$this->db->where('id', $id)->update($table, $data[$id]);
				}
                $this->system_log('排序站点【#'.SITE_ID.'】模块【'.APP_DIR.'】商品规格【#'.@implode(',', $ids).'】'); // 记录日志
				exit(dr_json(1, fc_lang('操作成功')));
			} else {
				if (!$this->is_auth(APP_DIR.'/admin/spec/index')) {
                    exit(dr_json(0, fc_lang('无权限操作')));
                }
				$this->spec_model->delete($this->catid, $ids);
                $this->system_log('删除站点【#'.SITE_ID.'】模块【'.APP_DIR.'】商品规格【#'.@implode(',', $ids).'】'); // 记录日志
				exit(dr_json(1, fc_lang('操作成功')));
			}
		}
		
		$this->template->assign(array(
			'list' => $this->db->where('catid', $this->catid)->order_by('displayorder ASC, id ASC')->get($table)->result_array(),
            'select' => $this->select_category($this->get_cache('module-'.SITE_ID.'-'.APP_DIR, 'category'), 0, 'id=\'copy_id\' name=\'catid\'', ' --- ', 1, 1),
		));
		$this->template->display('spec_index.html');
	}
	
	/**
     * 添加规格
     */
	public function add() {
		
		if (IS_POST) {
			$data = $this->input->post('data');
			if (!$data['name']) {
				$result = fc_lang('名称不能为空');
			} elseif (!$data['cname']) {
				$result = fc_lang('别名不能为空');
			} else {
                $value = $this->input->post('value');
                if ($value) {
                    foreach ($value['name'] as $i => $name) {
                        $var = str_replace(array('_', '#', '|'), '', strtolower($value['value'][$i]));
                        if (strlen($var)) {
                            $data['value'][$var] = $name;
                        }
                    }
                    $data['value'] = dr_array2string($data['value']);
                }
				$result = $this->spec_model->add($this->catid, $data);
				if (is_numeric($result)) {
					$this->system_log('添加站点【#'.SITE_ID.'】模块【'.APP_DIR.'】商品规格【'.$data['name'].'#'.$result.'】'); // 记录日志
					$this->admin_msg(fc_lang('操作成功'), dr_url(''.APP_DIR.'/spec/index', array('catid' => $this->catid)), 1);
				}
			}
		} else {
			$data = array(
				'type' => '',
			);
			$result = '';
		}
		
		$this->template->assign(array(
			'data' => $data,
			'result' => $result,
		));
		$this->template->display('spec_add.html');
	}
	
	/**
     * 修改规格
     */
	public function edit() {
		
		$id = intval($_GET['id']);
		if (IS_POST) {
			$data = $this->input->post('data');
			if (!$data['name']) {
				$result = fc_lang('规格名称不能空');
			} elseif (!$data['cname']) {
				$result = fc_lang('别名不能为空');
			} else {
                $value = $this->input->post('value');
                if ($value) {
                    foreach ($value['name'] as $i => $name) {
                        $var = str_replace(array('_', '#', '|'), '', strtolower($value['value'][$i]));
                        if (strlen($var)) {
                            $data['value'][$var] = $name;
                        }
                    }
                    $data['value'] = dr_array2string($data['value']);
                }
				$result = $this->spec_model->edit($id, $this->catid, $data);
				if (is_numeric($result)) {
					$this->system_log('修改站点【#'.SITE_ID.'】模块【'.APP_DIR.'】商品规格【'.$data['name'].'#'.$result.'】'); // 记录日志
					$this->admin_msg(fc_lang('操作成功'), dr_url(''.APP_DIR.'/spec/index', array('catid' => $this->catid)), 1);
				}
			}
		} else {
			$data = $this->db->where('id', $id)->get(SITE_ID.'_'.APP_DIR.'_specification')->row_array();
            if (!$data) {
                $this->admin_msg(fc_lang('规格数据不存在'));
            }
            $data['value'] = dr_string2array($data['value']);
			$result = '';
		}
		
		$this->template->assign(array(
			'data' => $data,
			'result' => $result,
		));
		$this->template->display('spec_add.html');
	}
	
}