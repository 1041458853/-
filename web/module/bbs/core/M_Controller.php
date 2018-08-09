<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');



require FCPATH.'branch/fqb/D_Module.php';

class M_Controller extends D_Module {

    /**
     * 构造函数继承公共Module类
     */
    public function __construct() {
        parent::__construct();
    }

    // 提交评论之后，方便二次开发和重写
    public function _post_commnet($data) {
        // 格式化
        $title = dr_clearhtml($data['content']);
        // 更新统计
        if ($data['catid']) {
            $this->db
                ->where('catid', intval($data['catid']))
                ->set('last_uid', $data['uid'])
                ->set('last_time', SYS_TIME)
                ->set('last_url', $data['url'])
                ->set('last_title', $data['title'])
                ->set('last_cid', $data['cid'])
                ->set('today_replys', 'today_replys+1', false)
                ->set('replys', 'replys+1', false)
                ->update($this->content_model->prefix.'_cat_count');
        }
        if ($data['cid']) {
            $this->db->where('id', intval($data['cid']))->update($this->content_model->prefix, array(
                'updatetime' =>SYS_TIME,
                'reply_info' => dr_array2string(array(
                    'uid' => $data['uid'],
                    'url' => $data['url'],
                    'title' => $title,
                    'inputtiem' => SYS_TIME,
                )),
            ));
        }
    }

}