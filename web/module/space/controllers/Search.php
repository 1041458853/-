<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search extends M_Controller {

    /**
     * 搜索
     */
    public function index() {

        // 搜索参数
        $get = $this->input->get(NULL, TRUE);
        $get = isset($get['rewrite']) ? dr_rewrite_decode($get['rewrite']) : $get;
        $_GET['page'] = max(1, (int)$get['page']);
        $get['keyword'] = str_replace(array('%', ' '), array('', '%'), $get['keyword']);
        unset($get['s'], $get['c'], $get['m'], $get['page']);

        // URL定向
        //$url = dr_space_search_url($get);

        $auth = $this->input->get('auth');
        if ($auth) {
            if ($auth != md5(SYS_KEY)) {
                // 授权认证码不正确
                echo $this->callback_json(array(
                    'msg' => '授权认证码不正确',
                    'code' => 0
                ));exit;
            }
            $call = 0;
            define('SELECT_API_AUTH', 1);
        }


        $where = '';
        if ($get) {
            $field = $this->get_cache('member', 'field');
            $space = $this->get_cache('member', 'spacefield');
            foreach ($get as $name => $v) {
                if (isset($space[$name]) && $space[$name]['fieldtype'] == 'Linkage') {
                    // 组合空间字段的联动菜单
                    $link = dr_linkage($space[$name]['setting']['option']['linkage'], $v);
                    if ($link) {
                        if ($link['child']) {
                            $where.= 'IN_'.$name.'='.$link['childids'].' ';
                        } else {
                            $where.= $name.'='.$link['ii'].' ';
                        }
                    }
                } elseif (isset($field[$name]) && $field[$name]['fieldtype'] == 'Linkage') {
                    // 组合会员字段的联动菜单
                    $link = dr_linkage($field[$name]['setting']['option']['linkage'], $v);
                    if ($link) {
                        if ($link['child']) {
                            $where.= 'IN_'.$name.'='.$link['childids'].' ';
                        } else {
                            $where.= $name.'='.$link['ii'].' ';
                        }
                    }
                } else {
                    $where.= $name.'='.$v.' ';
                }
            }
        }

        if (defined('SELECT_API_AUTH')) {
            $pagesize = max(1, (int)$this->input->get('pagesize'));
            $result = $this->template->list_tag('list action=space '.$where.' more=2 page=1 pagesize='.$pagesize.' urlrule=test');
            $data['result'] = $result['return'];

            $function = $this->input->get('function');
            if ($function) {
                if (!function_exists($function)) {
                    $data = array('msg' => fc_lang('自定义函数'.$function.'不存在'), 'code' => 0);
                } else {
                    $data = $function($data);
                }
            }
            echo $this->callback_json($data);exit;
        }

        $this->template->assign(array(
            'get' => $get,
            'where' => $where,
            'params' => $get,
            'keyword' => $get['keyword'],
            'urlrule' => dr_space_search_url($get, 'page', '[page]'),
            'meta_title' => $this->space['title'],
            'meta_keywords' => $this->space['keywords'],
            'meta_description' => $this->space['description'],
        ));
        $this->template->display('search.html');
    }
}