<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shipping extends M_Controller {
	
	private $table;
	private $valuation;
	
    /**
     * 运费模板设置
     */
    public function __construct() {
        parent::__construct();
		$this->table = SITE_ID.'_'.APP_DIR.'_shipping';
    }
	
	// 运费模板
	public function index() {
		
		$list = $this->db->where('uid', $this->uid)->get($this->table)->result_array();
		//$this->db->query('select a.*,count(b.id) as total from '.$this->db->dbprefix($this->table).' as a left join '.$this->db->dbprefix(SITE_ID.'_'.APP_DIR.' as b').' on a.id=b.order_shipping where b.uid='.$this->uid)->result_array()
		$this->template->assign(array(
			'list' => $list,
		));
		$this->template->display('shipping_index.html');
	}
	
	public function del() {
		
		$id = (int)$this->input->get('id');
		$data = $this->db->where('id', $id)->where('uid', $this->uid)->get($this->table)->row_array();
		!$data && $this->member_msg(fc_lang('数据不存在').'('.$id.')');
		
		$this->db->where('id', $id)->delete($this->table);
		$this->db->where('uid', $this->uid)->where('order_shipping', $id)->update(SITE_ID.'_'.APP_DIR, array('order_shipping' => 0));
		$this->member_msg(fc_lang('操作成功'), dr_member_url(''.APP_DIR.'/shipping/index'), 1);
	}
	
	// add
	public function add() {
		
		if (IS_POST) {
			$data = $this->input->post('data', true);
			$freight = $free = array();
			if ($data['freight']) {
                foreach ($data['freight'] as $i => $t) {
                    $tt = isset($t['city']) && $t['city'] ? $t['city'] : 0;
                    $t['city'] = array();
                    if ($tt) {
                        $arr = @explode(',', $tt);
                        if ($arr) {
                            foreach ($arr as $a) {
                                $a = intval($a);
                                $a && $t['city'][] = $a;
                            }
                            $t['city'] = @array_unique($t['city']);
                        } else {
                            $t['city'] = array();
                        }
                    } else {

                    }
                    $freight[$i] = $t;
                }
            }
			if ($data['free']) {
                foreach ($data['free'] as $i => $t) {
                    $tt = isset($t['city']) && $t['city'] ? $t['city'] : 0;
                    $t['city'] = array();
                    if ($tt) {
                        $arr = @explode(',', $tt);
                        if ($arr) {
                            foreach ($arr as $a) {
                                $a = intval($a);
                                $a && $t['city'][] = $a;
                            }
                            $t['city'] = @array_unique($t['city']);
                        } else {
                            $t['city'] = array();
                        }
                    } else {

                    }
                    $free[$i] = $t;
                }
            }

			$this->db->insert($this->table, array(
				'uid' => $this->uid,
				'name' => dr_safe_replace($data['name'] ? $data['name'] : '新建模板'),
				'valuation' => intval($data['valuation']),
				'freight' => dr_array2string($freight),
				'free' => dr_array2string($free),
			));
			$this->member_msg(fc_lang('操作成功'), dr_member_url(''.APP_DIR.'/shipping/index'), 1);
		}
		
		$data = array(
			'valuation' => 1,
		);
		
		$freight_id = $free_id = 0;
		
		$this->template->assign(array(
			'data' => $data,
			'free_id' => $free_id,
			'meta_name' => fc_lang('新建模板'),
			'freight_id' => $freight_id,
		));
		$this->template->display('shipping_add.html');
	}
	
	// edit
	public function edit() {
		
		$id = (int)$this->input->get('id');
		$data = $this->db->where('id', $id)->where('uid', $this->uid)->get($this->table)->row_array();
		if (!$data) {
			$this->member_msg(fc_lang('数据不存在').'('.$id.')');
		}
		
		if (IS_POST) {
			$ii = 0;
			$data = $this->input->post('data', true);
			$freight = $free = array();
			if ($data['freight']) {
                foreach ($data['freight'] as $i => $t) {
                    $i = $i == 'default' ? $i : $ii;
                    $tt = isset($t['city']) && $t['city'] ? $t['city'] : 0;
                    $t['city'] = array();
                    if ($tt) {
                        $arr = @explode(',', $tt);
                        if ($arr) {
                            foreach ($arr as $a) {
                                $a = intval($a);
                                if ($a) {
                                    $t['city'][] = $a;
                                }
                            }
                            $t['city'] = @array_unique($t['city']);
                        } else {
                            $t['city'] = array();
                        }
                    } else {

                    }
                    $freight[$i] = $t;
                    $ii++;
                }
            }
			if ($data['free']) {
                foreach ($data['free'] as $t) {
                    $tt = isset($t['city']) && $t['city'] ? $t['city'] : 0;
                    $t['city'] = array();
                    if ($tt) {
                        $arr = @explode(',', $tt);
                        if ($arr) {
                            foreach ($arr as $a) {
                                $a = intval($a);
                                if ($a) {
                                    $t['city'][] = $a;
                                }
                            }
                            $t['city'] = @array_unique($t['city']);
                        } else {
                            $t['city'] = array();
                        }
                    } else {

                    }
                    $free[] = $t;
                }
            }
			
			$this->db->where('id', $id)->update($this->table, array(
				'uid' => $this->uid,
				'name' => dr_safe_replace($data['name'] ? $data['name'] : '新建模板'),
				'valuation' => intval($data['valuation']),
				'freight' => dr_array2string($freight),
				'free' => dr_array2string($free),
			));
			$this->member_msg(fc_lang('操作成功'), dr_member_url(''.APP_DIR.'/shipping/index'), 1);
		}
		
		$data['free'] = dr_string2array($data['free']);
		$data['freight'] = dr_string2array($data['freight']);
		
		$free_id = count($data['free']);
		$freight_id = count($data['freight']);
		
		$this->template->assign(array(
			'data' => $data,
			'free_id' => $free_id,
			'meta_name' => fc_lang('修改模板'),
			'freight_id' => $freight_id,
		));
		$this->template->display('shipping_add.html');
	}
	
	// 城市
	public function city() {
		
		// 联动菜单缓存
		$linkage = $this->get_cache('linkage-'.SITE_ID.'-address');
        $linklevel = $this->get_cache('linklevel-'.SITE_ID);
		$linkageid = $this->get_cache('linkage-'.SITE_ID.'-address-id');
		// 
		$linklevel = $linklevel['address'] + 1;
		$str= '<script type="text/javascript">var memberpath = "'.MEMBER_PATH.'";</script>';
		$str.= '<script type="text/javascript" src="'.MEMBER_PATH.'statics/js/jquery.min.js"></script>';
		$str.= '<script type="text/javascript" src="'.MEMBER_PATH.'statics/js/jquery.ld.js"></script>';
		$level = 1;
		$default = '';
		$value = '';
		/*
		if ($value) {
			$pids = substr($linkage[$linkageid[$value]]['pids'], 2);
			$level = substr_count($pids, ',') + 1;
			$default = !$pids ? '["'.$value.'"]' : '["'.str_replace(',', '","', $pids).'","'.$value.'"]';
		}*/

		// 每次可以添加4组城市
		foreach (array(1, 2, 3, 4) as $id) {
			$name = 'city_'.$id;
			$str.= '<div style="padding:10px">';
			$str.= '<input type="hidden" id="dr_select_'.$name.'" value="">';
			$str.= '<input type="hidden" id="dr_select_name_'.$name.'" value="">';
			$str.= '<span id="dr_linkage_'.$name.'_select" style="'.($value ? 'display:none' : '').'">';
			for ($i = 1; $i <= $linklevel; $i++) {
				$style = $i > $level ? 'style="display:none"' : '';
				$str.= '<select class="finecms-select-'.$name.'" name="'.$name.'-'.$i.'" id="'.$name.'-'.$i.'" width="100" '.$style.'><option value=""> -- </option></select>&nbsp;&nbsp;';
			}
			$str.= '</span>';
			$str.= '
			<script type="text/javascript">
				function dr_linkage_select_'.$name.'() {
					$("#dr_linkage_'.$name.'_select").show();
					$("#dr_linkage_'.$name.'_cxselect").hide();
				}
				$(function(){
					var $ld5 = $(".finecms-select-'.$name.'");					  
					$ld5.ld({ajaxOptions:{"url":"/index.php?s=member&c=api&m=linkage&code=address"},defaultParentId:0})	 
					var ld5_api = $ld5.ld("api");
					ld5_api.selected('.$default.');
					$ld5.bind("change",onchange);
					function onchange(e){
						var $target = $(e.target);
						var index = $ld5.index($target);
						//$("#'.$name.'-'.$i.'").remove();
						$("#dr_select_'.$name.'").val($ld5.eq(index).show().val());
						$("#dr_select_name_'.$name.'").val($ld5.eq(index).show().find("option:selected").text());
						index ++;
						$ld5.eq(index).show();
					}
				})
			</script></div>';
		}
		
		echo $str;
	}
	
}