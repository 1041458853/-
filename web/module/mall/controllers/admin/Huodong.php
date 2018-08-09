
<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
require FCPATH .'branch/fqb/D_Admin_Home.php';
//定义请求数据的方法
define('IS_POST',strtolower($_SERVER["REQUEST_METHOD"])=='post');
//判断是否是post方法
define('IS_GET',strtolower($_SERVER["REQUEST_METHOD"])=='get');
//判断是否是get方法
define('IS_AJAX',isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest');
//判断是否是ajax请求
class huodong extends D_Admin_Home {
	/**
     * 构造函数
     */
	public function  __construct (){
		parent::__construct ();
	}
	public function  index (){
		$query=$this->db ->get ('imt_huodong');
		$list=$query->result_array ();
		foreach ($list as &$t){
			$query=$this->db ->where ('id',$t['mall_id'])->get ('imt_1_mall');
			$data=$query->row_array ();
			//  $this->msg($data['title']);
			$t['title']=$data['title'];
		}
		$this->template ->assign (array ('list'=>$list,));
		$this->template ->display ('huodong_index.html');
	}
	
	/**
     * 修改打折规则
     */
	public function  edit (){
		if (IS_POST ){
			$huodong_id=$_POST['id'];
			$huodong_name=$_POST['name'];
			$huodong_jian=$_POST['jian'];
			$huodong_zhe=$_POST['zhe'];
			$huodong_mall_title=$_POST['mall_title'];
			$query=$this->db ->where ('title',$huodong_mall_title)->get ('imt_1_mall');
			$data0=$query->row_array ();
			$mall_id=$data0[id ];
			$data=array ('mall_id'=>$mall_id,'name'=>$huodong_name,'content'=>'满'.$huodong_jian.'件,打'.$huodong_zhe.'折');
			$updata_query=$this->db->where('id',$huodong_id)->update ('imt_huodong',$data);
			if ($updata_query>0){
				$this->msg ('修改成功','/admin.php/?s=mall&c=huodong&m=index');
			}else {
				$this->msg ('修改失败','/admin.php/?s=mall&c=huodong&m=index');
			}
		}else {
			$huodong_id=$_GET['id'];
			$huodong_name=$_GET['name'];
			$this->template ->assign (array ('name'=>$huodong_name,'id'=>$huodong_id,));
			$this->template ->display ('huodong_edit.html');
		}
	}

    //增加打折规则
	public function  add(){
	    if(IS_POST){
			$huodong_name=$_POST['name'];
			$huodong_jian=$_POST['jian'];
			$huodong_zhe=$_POST['zhe'];
			$huodong_mall_title=$_POST['mall_title'];

			$query=$this->db->where ('title',$huodong_mall_title)->get ('imt_1_mall');
			$data0=$query->row_array ();
			$mall_id=$data0[id ];
			
			//查询同一个课程是否绑定了5个以上的活动，如果是则返回禁止绑定
			$query=$this->db->where ('mall_id',$mall_id)->get ('imt_huodong');
			$num=$query->num_rows();
			if($num>5){
			    $this->msg ('对同一课程绑定的活动超过上限','/admin.php/?s=mall&c=huodong&m=index');
			    return;
			}
			if(($num=$query->row_array["status"] != 1)){
			    $this->msg ('此课程已绑定其他类型的策略','/admin.php/?s=mall&c=huodong&m=index');
			    return;
			}
			
			$data=array ('id'=>$huodong_id,'mall_id'=>$mall_id,'name'=>$huodong_name,'content'=>'满'.$huodong_jian.'件,打'.$huodong_zhe.'折','status'=>1);
			$updata_query=$this->db->insert ('imt_huodong',$data);
			if ($updata_query>0){
				$this->msg ('修改成功','/admin.php/?s=mall&c=huodong&m=index');
			}else {
				$this->msg ('修改失败','/admin.php/?s=mall&c=huodong&m=index');
			}
	    }else{
			$this->template->display ('huodong_add.html');
		}
	}
	
	//删除规则
	public function  del(){
	    $array = $_POST['data'];

        foreach($array as $key => $value){
           $this->db->where('id', $value);
		   $this->db->delete('imt_huodong');
        }
        return true;
	}
	
	
	/**
     * 修改满减规则
     */
	public function  manjian_edit (){
		if (IS_POST ){
			$huodong_id=$_POST['id'];
			$huodong_name=$_POST['name'];
			$huodong_jian=$_POST['jian'];
			$huodong_yuan=$_POST['yuan'];
			$huodong_mall_title=$_POST['mall_title'];
			$query=$this->db ->where ('title',$huodong_mall_title)->get ('imt_1_mall');
			$data0=$query->row_array ();
			$mall_id=$data0[id ];
			$data=array ('mall_id'=>$mall_id,'name'=>$huodong_name,'content'=>'满'.$huodong_jian.'件,减'.$huodong_yuan.'元');
			$updata_query=$this->db->where('id',$huodong_id)->update ('imt_huodong',$data);
			if ($updata_query>0){
				$this->msg ('修改成功','/admin.php/?s=mall&c=huodong&m=index',1);
			}else {
				$this->msg ('修改失败','/admin.php/?s=mall&c=huodong&m=index');
			}
		}else {
			$huodong_id=$_GET['id'];
			$huodong_name=$_GET['name'];
			$this->template ->assign (array ('name'=>$huodong_name,'id'=>$huodong_id,));
			$this->template ->display ('huodong_manjian_edit.html');
		}
	}

    //增加满减规则
	public function  manjian_add(){
	    if(IS_POST){
			$huodong_name=$_POST['name'];
			$huodong_jian=$_POST['jian'];
			$huodong_yuan=$_POST['yuan'];
			$huodong_mall_title=$_POST['mall_title'];

			$query=$this->db->where ('title',$huodong_mall_title)->get ('imt_1_mall');
			$data0=$query->row_array ();
			$mall_id=$data0[id ];
			
			//查询同一个课程是否绑定了5个以上的活动，如果是则返回禁止绑定
			$query=$this->db->where ('mall_id',$mall_id)->get ('imt_huodong');
			$num=$query->num_rows();
			if($num>5){
			    $this->msg ('对同一课程绑定的活动超过上限','/admin.php/?s=mall&c=huodong&m=index');
			    return;
			}
			if(($num=$query->row_array["status"] != 0)){
			    $this->msg ('此课程已绑定其他类型的策略','/admin.php/?s=mall&c=huodong&m=index');
			    return;
			}
			
			$data=array ('id'=>$huodong_id,'mall_id'=>$mall_id,'name'=>$huodong_name,'content'=>'满'.$huodong_jian.'件,减'.$huodong_yuan.'元','status'=>0);
			$updata_query=$this->db->insert ('imt_huodong',$data);
			if ($updata_query>0){
				$this->msg ('修改成功','/admin.php/?s=mall&c=huodong&m=index',1);
			}else {
				$this->msg ('修改失败','/admin.php/?s=mall&c=huodong&m=index');
			}
	    }else{
			$this->template->display ('huodong_manjian_add.html');
		}
	}
	
	
	
	public function  fanjuancelve (){
		$query=$this->db ->get ('imt_fanjuancelve');
		$list=$query->result_array ();
		$this->template ->assign (array ('list'=>$list,));
		$this->template ->display ('fanjuancelve.html');
	}
	
	/**
     * 修改返劵规则
     */
	public function  fanjuan_edit (){
		if (IS_POST ){
			$fanjuan_id=$_POST['id'];
			$fanjuan_name=$_POST['name'];
			$fanjuan_jianmian=$_POST['jianmian'];
			$data=array ('name'=>$fanjuan_name,'jianmian'=>$fanjuan_jianmian,'time'=>SYS_TIME);
			$updata_query=$this->db->where('id', $fanjuan_id)->update ('imt_fanjuancelve',$data);
			if ($updata_query>0){
				$this->msg ('修改成功','/admin.php/?s=mall&c=huodong&m=fanjuancelve',1);
			}else {
				$this->msg ('修改失败','/admin.php/?s=mall&c=huodong&m=fanjuancelve');
			}
		}else {
			$fanjuan_id=$_GET['id'];
			$fanjuan_name=$_GET['name'];
			$fanjuan_jianmian=$_GET['jianmian'];
			$this->template ->assign (array ('name'=>$fanjuan_name,'id'=>$fanjuan_id,'jianmian'=>$fanjuan_jianmian));
			$this->template ->display ('fanjuan_edit.html');
		}
	}
	
	//启用或关闭规则
	public function  fanjuan_status(){
	
			$fanjuan_id=$_GET['id'];
			$status = $_GET['status'];
			if($status==0){
			   $updata_query=$this->db->set('status', 1)->where('id', $fanjuan_id)->update('imt_fanjuancelve');
			    if ($updata_query>0){
    				$this->msg ('修改成功','/admin.php/?s=mall&c=huodong&m=fanjuancelve',1);
    			}else {
    				$this->msg ('修改失败','/admin.php/?s=mall&c=huodong&m=fanjuancelve');
    			}
			}else{
			   $updata_query=$this->db->set('status', 0)->where('id', $fanjuan_id)->update('imt_fanjuancelve');
			    if ($updata_query>0){
    				$this->msg ('修改成功','/admin.php/?s=mall&c=huodong&m=fanjuancelve',1);
    			}else {
    				$this->msg ('修改失败','/admin.php/?s=mall&c=huodong&m=fanjuancelve');
    			}
			}
		
	}

    //增加返劵规则  未启用，未修改
// 	public function  fanjuan_add(){
// 	    if(IS_POST){
// 			$huodong_name=$_POST['name'];
// 			$huodong_jian=$_POST['jian'];
// 			$huodong_zhe=$_POST['zhe'];
// 			$huodong_mall_title=$_POST['mall_title'];

// 			$query=$this->db->where ('title',$huodong_mall_title)->get ('imt_1_mall');
// 			$data0=$query->row_array ();
// 			$mall_id=$data0[id ];
			
// 			//查询同一个课程是否绑定了5个以上的活动，如果是则返回禁止绑定
// 			$query=$this->db->where ('mall_id',$mall_id)->get ('imt_huodong');
// 			$num=$query->num_rows();
// 			if($num>5){
// 			    $this->msg ('对同一课程绑定的活动超过上限','/admin.php/?s=mall&c=huodong&m=index');
// 			    return;
// 			}
			
// 			$data=array ('id'=>$huodong_id,'mall_id'=>$mall_id,'name'=>$huodong_name,'content'=>'满'.$huodong_jian.'件,打'.$huodong_zhe.'折');
// 			$updata_query=$this->db->insert ('imt_huodong',$data);
// 			if ($updata_query>0){
// 				$this->msg ('修改成功','/admin.php/?s=mall&c=huodong&m=index');
// 			}else {
// 				$this->msg ('修改失败','/admin.php/?s=mall&c=huodong&m=index');
// 			}
// 	    }else{
// 			$this->template->display ('huodong_add.html');
// 		}
// 	}
	
	//删除返劵策略  未启用，未修改
// 	public function  fanjuan_del(){
// 	    $array = $_POST['data'];

//         foreach($array as $key => $value){
//           $this->db->where('id', $value);
// 		   $this->db->delete('imt_huodong');
//         }
//         return true;
// 	}
}