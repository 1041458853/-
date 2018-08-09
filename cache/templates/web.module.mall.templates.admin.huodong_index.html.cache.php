<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script>
    
</script>

<div class="page-bar">
    
    <span style="color: red;">请不要给同一个课程同时绑定满减和打折策略！</span>
	<ul class="page-breadcrumb myname">
		<?php echo $menu['name']; ?>
	</ul>
	<div class="page-toolbar">
		<div class="btn-group pull-right">
			<button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-hover="dropdown"> <?php echo fc_lang('操作菜单'); ?>
				<i class="fa fa-angle-down"></i>
			</button>
			<ul class="dropdown-menu pull-right" role="menu">
				<?php if (is_array($menu['quick'])) { $count=count($menu['quick']);foreach ($menu['quick'] as $t) { ?>
				<li>
					<a href="<?php echo $t['url']; ?>"><?php echo $t['icon'];  echo $t['name']; ?></a>
				</li>
				<?php } } ?>
				<li class="divider"> </li>
				<li>
					<a href="javascript:window.location.reload();">
						<i class="icon-refresh"></i> <?php echo fc_lang('刷新页面'); ?></a>
				</li>
				<li>
					<a href="<?php echo dr_url(''.APP_DIR.'/huodong/add'); ?>">
						<i class="icon-compass"></i> <?php echo fc_lang('增加打折策略'); ?></a>
				</li>
				<li>
					<a href="<?php echo dr_url(''.APP_DIR.'/huodong/manjian_add'); ?>">
						<i class="icon-compass"></i> <?php echo fc_lang('增加满减策略'); ?></a>
				</li>
			</ul>
		</div>
	</div>
</div>
<h3 class="page-title">
	<small><?php echo fc_lang('活动打包策略'); ?></small>
</h3>
<div class="portlet mylistbody">
	<div class="portlet-body">
		<div class="table-scrollable">

			<table class="mytable table table-striped table-bordered table-hover table-checkable dataTable">

			<thead>
			<tr> 
				<th width="60" align="center"><?php echo fc_lang('选择'); ?></th>
				<th width="100" align="left" style="text-align:center"><?php echo fc_lang('打包策略编号'); ?></th>
				<th width="400" align="left" style="text-align:center"><?php echo fc_lang('参与活动的课程名称'); ?></th>
				<th width="250" align="left" style="text-align:center"><?php echo fc_lang('打包策略名称'); ?></th>
				<th width="350" align="left" style="text-align:center"><?php echo fc_lang('打包策略规则'); ?></th>
				<th width="350" align="left" style="text-align:center"><?php echo fc_lang('形式'); ?></th>   
				<th align="left" class="dr_option" style="text-align:center"><?php echo fc_lang('操作'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
					<tr>
						<td align="right"><input name="ids[]" type="checkbox" class="dr_select toggle md-check" value="<?php echo $t['id']; ?>" /></td>
						<!--<td align='left'><input class='input-text displayorder' type='text' name='data[<?php echo $t['id']; ?>][displayorder]' value='<?php echo intval($t['displayorder']); ?>' /></td>-->
						<td align="center"><?php echo $t['id']; ?></td>
						<td align="center"><?php echo $t['title']; ?></td>
						<td align="center"><?php echo $t['name']; ?></td>
						<td align="center"><?php echo $t['content']; ?></td>
						<?php if ($t['status'] == 1) { ?>
						   <td align="center">打折</td>
						<?php } else { ?>
						   <td align="center">满减</td>
						<?php }  if ($t['status'] == 1) { ?>
						   <td align="left" class="dr_option">
							<label><a href="<?php echo dr_url(''.APP_DIR.'/huodong/edit',array('name'=>$t['name'],'id'=>$t['id'])); ?>" class="btn btn-xs green onloading">
								<i class="fa fa-edit"></i> <?php echo fc_lang('修改'); ?> </a></label>
						   </td>
						<?php } else { ?>
						   <td align="left" class="dr_option">
							<label><a href="<?php echo dr_url(''.APP_DIR.'/huodong/manjian_edit',array('name'=>$t['name'],'id'=>$t['id'])); ?>" class="btn btn-xs green onloading">
								<i class="fa fa-edit"></i> <?php echo fc_lang('修改'); ?> </a></label>
						   </td>
						<?php } ?>
						
					</tr>
			<?php } } ?>
			<tr>
						<td colspan="7" align="left">
							<label><button type="button" class="btn red btn-sm" name="option" onClick="del()"> <i class="fa fa-trash"></i> <?php echo fc_lang('删除'); ?></button></label>
						</td>
					</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>
<script>
    function del(){
      var id_array=new Array();  
      $('.dr_select.toggle.md-check:checked').each(function(){  
          id_array.push($(this).val());//向数组中添加元素
      })
      $.ajax({
         url:"/admin.php/?s=mall&c=huodong&m=del",
         type : "POST",
         data:{
             'data' : id_array,
         },
        success : function(data) {
            alert('删除成功');
            window.location.reload();
        },
        error : function() {
            alert("删除失败"); 
        }
      })
    }
</script>

<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>