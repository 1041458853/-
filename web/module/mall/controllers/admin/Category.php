<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require FCPATH.'branch/fqb/D_Category.php';

class Category extends D_Category {

    /**
     * 构造函数
     */
    public function __construct() {
        parent::__construct();
    }

    /*
	 * 列表统计显示
	 */
    public function get_option($cat) {

        $list = '';
        $catid = $cat['id'];
        if (!$cat['child'] && $this->is_auth(APP_DIR.'/admin/property/index')) {
            $count = $this->db->where('catid', $catid)->where('pid<>0')->count_all_results(SITE_ID.'_'.APP_DIR.'_property');
            $list.= '<a class="alist onloading" href='.dr_url(APP_DIR.'/property/index', array('catid' => $catid)).'>'.fc_lang('属性').'('.$count.')</a>';
        }
        if (!$cat['child'] && $this->is_auth(APP_DIR.'/admin/spec/index')) {
            $count = $this->db->where('catid', $catid)->count_all_results(SITE_ID.'_'.APP_DIR.'_specification');
            $list.= '<a class="alist onloading" href='.dr_url(APP_DIR.'/spec/index', array('catid' => $catid)).'>'.fc_lang('规格').'('.$count.')</a>';
        }

        return $list;
    }
	
}