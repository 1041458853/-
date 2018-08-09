<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Property extends M_Controller {
	
	public $type;
	public $menu;
	public $catid;

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
		$this->catid = (int)$this->input->get('catid');
		$category = $this->db->where('id', $this->catid)->get(SITE_ID.'_'.APP_DIR.'_category')->row_array();
		!$category && $this->admin_msg(fc_lang('栏目#%s不存在', $this->catid));
		$this->type = array(
			'text' => fc_lang('文本输入'),
			'select' => fc_lang('下拉选择框'),
			'checkbox' => fc_lang('复选框'),
		);
		$this->menu = array(
			fc_lang('返回') => array(APP_DIR.'/admin/category/index', 'reply'),
			fc_lang('【%s】商品属性', $category['name']) => array(APP_DIR.'/admin/property/index/catid/'.$this->catid, 'cubes'),
		);
		$this->template->assign(array(
			'type' => $this->type,
			'catid' => $this->catid,
		));
		$this->load->model('property_model');
    }
	
	/**
     * 属性管理
     */
	public function index() {
		
		$table = SITE_ID.'_'.APP_DIR.'_property';
		
		if (IS_POST) {
			$ids = $this->input->post('ids', TRUE);
			!$ids && exit(dr_json(0, fc_lang('你还没有选择呢')));
			if ($this->input->post('action') == 'copy') {
				$ok = $err = 0;
                $ins = implode(',', $ids);
				$cid = (int)$this->input->post('catid');
                $sql = 'select * from '.$this->db->dbprefix($table).' where id IN ('.$ins.') order by field(id, '.$ins.')';
				$data = $this->db->query($sql)->result_array();
				if ($data) {
                    if ($data[0]['pid'] == 0) {
                        $pid = 0;
                    } else {
                        // 查询是否存在数据
                        $row = $this->db->where('catid', $cid)->where('pid=0')->get($table)->row_array();
						$row && $pid = $row['id'];
                    }
					foreach ($data as $t) {
						unset($t['id']);
                        if ($t['pid'] == 0) {
                            // 表示第一个选择的分组，我们就把分组也复制过去
                            $pid = $this->property_model->add($cid, array(
                                'name' => $t['name'],
                                'pid' => 0,
                                'search' => 0,
                                'displayorder' => 0,
                                'catid' => $cid,
                                'value' => '',
                            ));
                            continue;
                        }
                        if (!$pid) {
                            // 没有数据的话就创建一个默认分组
                            $pid = $this->property_model->add($cid, array(
                                'name' => '未命名分组',
                                'pid' => 0,
                                'search' => 0,
                                'displayorder' => 0,
                                'catid' => $cid,
                                'value' => '',
                            ));
                        }
						$t['pid'] = $pid;
						$result = $this->property_model->add($cid, $t);
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
                $this->system_log('排序站点【#'.SITE_ID.'】模块【'.APP_DIR.'】商品属性【#'.@implode(',', $ids).'】'); // 记录日志
				exit(dr_json(1, fc_lang('操作成功')));
			} else {
				if (!$this->is_auth(APP_DIR.'/admin/property/index')) {
					exit(dr_json(0, fc_lang('无权限操作')));
                }
				$this->property_model->delete($this->catid, $ids);
                $this->system_log('删除站点【#'.SITE_ID.'】模块【'.APP_DIR.'】商品属性【#'.@implode(',', $ids).'】'); // 记录日志
				exit(dr_json(1, fc_lang('操作成功')));
			}
		}
		
		$this->template->assign(array(
			'menu' => $this->get_menu_v3($this->menu),
			'list' => $this->property_model->get_cat_data($this->catid),
            'select' => $this->select_category($this->get_cache('module-'.SITE_ID.'-'.APP_DIR, 'category'), 0, 'id=\'copy_id\' name=\'catid\'', ' --- ', 1, 1),
		));
		$this->template->display('property_index.html');
	}
	
	/**
     * 添加
     */
	public function add() {
		
		$pid = (int)$this->input->get('pid');
		
		if (IS_POST) {
			$data = $this->input->post('data');
			if (!$data['name']) {
				$result = fc_lang('名称不能为空');
			} elseif (!$data['cname'] && $pid) {
				$result = fc_lang('别名不能为空');
			} else {
                $value = $this->input->post('value');
                if ($value) {
                    $v = 1;
                    foreach ($value['name'] as $i => $name) {
						$var = trim($value['value'][$i] ? $value['value'][$i] : $v);
						$name = trim(strtolower($name));
						$name && $data['value'][$var] = $name;
                        $v++;
                    }
                    $data['value'] = dr_array2string($data['value']);
                }
				$data['pid'] = $pid;
				$result = $this->property_model->add($this->catid, $data);
				if (is_numeric($result)) {
					if (!$pid) {
						echo dr_json(1, fc_lang('操作成功'));exit;
					}
					$this->system_log('添加站点【#'.SITE_ID.'】模块【'.APP_DIR.'】商品属性【'.$data['name'].'#'.$result.'】'); // 记录日志
					$this->admin_msg(fc_lang('操作成功'), dr_url(''.APP_DIR.'/property/index', array('catid' => $this->catid)), 1);
				}
			}
			if (!$pid) {
				echo dr_json(0, $result);exit;
			}
		} else {
			$data = array(
				'type' => 'text',
				'search' => 1,
			);
			$result = '';
		}
		
		$this->menu[fc_lang('添加')] = array(''.APP_DIR.'/admin/property/add/catid/'.$this->catid.'/pid/'.$pid, 'plus');
		
		$this->template->assign(array(
			'pid' => $pid,
			'row' => $pid ? $this->db->where('id', $pid)->get(SITE_ID.'_'.APP_DIR.'_property')->row_array() : array(),
			'data' => $data,
			'menu' => $this->get_menu_v3($this->menu),
			'result' => $result,
		));
		$this->template->display('property_add.html');exit;
	}
	
	/**
     * 修改属性
     */
	public function edit() {
		
		$id = intval($_GET['id']);
		$data = $this->db->where('id', $id)->get(SITE_ID.'_'.APP_DIR.'_property')->row_array();
		!$data && $this->admin_msg(fc_lang('数据不存在'));
		$data['value'] = dr_string2array($data['value']);
		$result = '';
		$pid = $data['pid'];
			
		if (IS_POST) {
			$data = $this->input->post('data');
			$pid = $data['pid'];
			if (!$data['name']) {
				$result = fc_lang('名称不能为空');
			} elseif (!$data['cname'] && $pid) {
				$result = fc_lang('别名不能为空');
			} else {
                $value = $this->input->post('value');
                if ($value) {
					$v = 1;
                    foreach ($value['name'] as $i => $name) {
						$var = trim($value['value'][$i] ? $value['value'][$i] : $v);
						$name = trim(strtolower($name));
						$name && $data['value'][$var] = $name;
						$v++;
                    }
                    $data['value'] = dr_array2string($data['value']);
                }
				$result = $this->property_model->edit($id, $this->catid, $data);
				if (is_numeric($result)) {
					if (!$pid) {
						echo dr_json(1, fc_lang('操作成功'));exit;
					}
					$this->system_log('修改站点【#'.SITE_ID.'】模块【'.APP_DIR.'】商品属性【'.$data['name'].'#'.$result.'】'); // 记录日志
					$this->admin_msg(fc_lang('操作成功'), dr_url(''.APP_DIR.'/property/index', array('catid' => $this->catid)), 1);
				}
			}
			if (!$pid) {
				echo dr_json(0, $result);exit;
			}
		}
		
		//$this->menu[fc_lang('修改')] = ''.APP_DIR.'/admin/property/edit/catid/'.$this->catid.'/id/'.$id;
		
		$this->template->assign(array(
			'pid' => $pid,
			'row' => $pid ? $this->db->where('id', $pid)->get(SITE_ID.'_'.APP_DIR.'_property')->row_array() : array(),
			'data' => $data,
			'menu' => $this->get_menu_v3($this->menu),
			'group' => $this->db->where('pid', 0)->where('catid', $this->catid)->get(SITE_ID.'_'.APP_DIR.'_property')->result_array(),
			'result' => $result,
		));
		$this->template->display('property_add.html');
	}
	
}