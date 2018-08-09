<?php

$this->load->helper('bbs');
$time = $this->db->where('id', 1)->get($this->content_model->prefix.'_config')->row_array();
if (!$time) {
    $time = array('id' => 1, 'value' => SYS_TIME);
    $this->db->replace($this->content_model->prefix.'_config', $time);
    $this->db->update($this->content_model->prefix.'_cat_count', array('today_subjects' => 0, 'today_replys' => 0));
} else {
    $mk = date('ymd', $time['value']) != date('ymd', SYS_TIME);
    // 更新时间不是当天的话就清空今日统计数量
    $mk && $this->db->update($this->content_model->prefix.'_cat_count', array('today_subjects' => 0, 'today_replys' => 0));
    // 更新时间不是当天的话就重置配置最新更新时间
    $mk && $this->db->update($this->content_model->prefix.'_config', array('value' => SYS_TIME));
}