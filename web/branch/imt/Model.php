<?php
/* Created by mtdev Chaixiha@mutaoinc.com */

namespace \imt\model;

class Model extends CI_Model {
    
    // 获取指定模型
    public function get(){
        // 检测模型是否被禁用
    }
    // 获取所有模型
    public function all(){
        
    }
    // 添加模型
    public function add(){
        // 检查模型是否存在
        
        // 检测模型对应控制器是否存在
        
        // 是否建立附表
        
        // 是否分表存储
    }
    // 批量添加模型
    public function add_batch($array){
        foreach ($array as $value) {
            $this->add();
        }
    }
    // 编辑模型
    public function edit($id, $array){
        
    }
    // 删除模型
    public function drop(){
        if(is_array()){
            
        } else {
            
        }
    }
    
    protected function model_filed(){
        
    }
    
    protected function cache(){
        
    }
}