<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script>
    
</script>

<div class="page-bar">
	<!--<button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-hover="dropdown" onclick="javascript:window.location.href='<?php echo dr_url(''.APP_DIR.'/huodong/add'); ?>'"> <?php echo fc_lang('添加'); ?>-->
	<!--			<i class="fa fa-plus"></i>-->
	<!--		</button>-->
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
				<!--<li>-->
				<!--	<a href="<?php echo dr_url(''.APP_DIR.'/huodong/fanjuan_add'); ?>">-->
				<!--		<i class="icon-refresh"></i> <?php echo fc_lang('增加'); ?></a>-->
				<!--</li>-->
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
				<th width="400" align="left" style="text-align:center"><?php echo fc_lang('返劵规则名称'); ?></th>
				<th width="250" align="left" style="text-align:center"><?php echo fc_lang('返劵减免金额'); ?></th>
				<th width="350" align="left" style="text-align:center"><?php echo fc_lang('修改时间'); ?></th>
				<th width="350" align="left" style="text-align:center"><?php echo fc_lang('状态'); ?></th>
				<th align="left" class="dr_option" style="text-align:center"><?php echo fc_lang('操作'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
					<tr>
						<td align="right"><input name="ids[]" type="checkbox" class="dr_select toggle md-check" value="<?php echo $t['id']; ?>" /></td>
						<!--<td align='left'><input class='input-text displayorder' type='text' name='data[<?php echo $t['id']; ?>][displayorder]' value='<?php echo intval($t['displayorder']); ?>' /></td>-->
						<td align="center"><?php echo $t['id']; ?></td>
						<td align="center"><?php echo $t['name']; ?></td>
						<td align="center"><?php echo $t['jianmian']; ?></td>
						<td align="center"><?php echo dr_date($t['time']); ?></td>
						<td align="center"><?php echo $t['status']; ?></td>
						<td align="left" class="dr_option">
		
							<label><a href="<?php echo dr_url(''.APP_DIR.'/huodong/fanjuan_edit',array('name'=>$t['name'],'id'=>$t['id'],'jianmian'=>$t['jianmian'])); ?>" class="btn btn-xs green onloading">
								<i class="fa fa-edit"></i> <?php echo fc_lang('修改'); ?> </a></label>
							
							<?php if ($t['status'] == 0) { ?>	
    							<label><a href="<?php echo dr_url(''.APP_DIR.'/huodong/fanjuan_status',array('id'=>$t['id'],'status'=>$t['status'])); ?>" class="btn btn-xs green onloading">
    							<i class="fa fa-edit"></i> 启用 </a></label>
					        <?php } else { ?>
    					        <label><a href="<?php echo dr_url(''.APP_DIR.'/huodong/fanjuan_status',array('id'=>$t['id'],'status'=>$t['status'])); ?>" class="btn btn-xs green onloading">
    							<i class="fa fa-edit"></i> 禁用 </a></label>
    						<?php } ?>
						</td>
					</tr>
			<?php } } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<script>
    $(function(){
        if()
        $("#status").text();
    })

    function del(){
      var id_array=new Array();  
      $('.dr_select.toggle.md-check:checked').each(function(){  
          id_array.push($(this).val());//向数组中添加元素
      })
      $.ajax({
         url:"/admin.php/?s=mall&c=huodong&m=fanjuan_del",
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