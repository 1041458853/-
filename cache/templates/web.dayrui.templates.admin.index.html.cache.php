<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo SITE_NAME; ?></title>
<link href="http://explorer.mutaoinc.net/static/images/common/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" href="/statics/imtcms/css/bootstrap.min.css">
<link rel="stylesheet" href="/statics/imtcms/css/font-awesome.min.css">
<link rel="stylesheet" href="/statics/imtcms/fonts/iconfont.css">
<link rel="stylesheet" href="/statics/imtcms/css/animate.css">
<link rel="stylesheet" href="/statics/imtcms/css/common.css">
<script src="/statics/imtcms/libs/jquery/jquery-1.11.1.min.js"></script>
<script src="/statics/imtcms/libs/bootstrap/bootstrap.min.js"></script>
<!--兼容老版本-->
<script type="text/javascript">var dr_index = 1;var siteurl = "<?php echo SITE_PATH;  echo SELF; ?>";var memberpath = "<?php echo MEMBER_PATH; ?>";var sys_theme = "<?php echo THEME_PATH; ?>admin/";</script>
<link rel="stylesheet" href="/statics/js/ui-dialog.css">
<script type="text/javascript" src="/statics/js/dialog-plus.js"></script>
<script type="text/javascript" src="/statics/js/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="/statics/js/validate.js"></script>
<script type="text/javascript" src="/statics/js/admin.js"></script>
<script type="text/javascript" src="/statics/js/dayrui.js"></script>
<!--/兼容老版本-->
<link rel="stylesheet" href="/statics/imtcms/css/style.css">
<script src="/statics/imtcms/js/require.js"></script>
<script src="/statics/imtcms/js/config.js"></script>
</head>
<body>
<!-- 一级导航 -->
<div class="wb-nav ">
    <div class="imtcms-logo">
		<img src="https://weixin.mutaoinc.cn/attachment/images/8/2018/01/MC7cJEvT2rH4EzvUG4iiE7Wt96V42R.jpg">
	</div>
	<p class="wb-nav-fold">
		<i class="icow icow-zhedie"></i>
	</p>
	<ul>
	<?php $key_a=1;  if (is_array($menus)) { $count=count($menus);foreach ($menus as $a) { ?>
		<li class="nav-go<?php if ($key_a==1) { ?> active<?php } ?>" data-nav="<?php echo $a['top']['id']; ?>">
    		<a href="#"><i class="<?php echo $a['top']['icon']; ?>"></i><span class="wb-nav-title"><?php echo $a['top']['name']; ?></span></a>
    		<span class="wb-nav-tip"><?php echo $a['top']['name']; ?></span>
		</li>
	<?php $key_a++;  } } ?>
	</ul>
</div>
<!-- 二级导航 -->
<div class="wb-subnav">
<?php $key_b=1;  if (is_array($menus)) { $count=count($menus);foreach ($menus as $a) {  $key_c=1;  if (is_array($a['data'])) { $count=count($a['data']);foreach ($a['data'] as $b) { ?>
	<div <?php if ($key_b==1) { ?>style="display: block"<?php } ?> class="nav-item nav-item-<?php echo $a['top']['id']; ?>">
		<?php if ($key_c==1) { ?>
		<div class="subnav-scene">
			<?php echo $a['top']['name']; ?>
		</div>
		<?php } ?>
		<div class='menu-header<?php if ($key_c==1) { ?> active<?php } ?>'>
			<div class="menu-icon fa <?php if ($key_c==1) { ?> fa-caret-down<?php } else { ?> fa-caret-right<?php } ?>">
			</div>
			<?php echo $b['left']['name']; ?>
		</div>
		<ul <?php if ($key_c==1) { ?>style="display: block"<?php } ?>>
		<?php if (is_array($b['left']['link'])) { $count=count($b['left']['link']);foreach ($b['left']['link'] as $c) { ?>
			<li class="iframe-go"><a href="#<?php echo $c['uri']; ?>"><?php echo $c['name']; ?></a>
		<?php } } ?>
		</ul>
		<div class="wb-subnav-fold icow"></div>
	</div>
	<?php $key_c++;  $key_b++;  } }  } } ?>
</div>
<div class="wb-container right-panel">
    <iframe id="iframe" src=""></iframe>
	<div id="page-loading">
		<div class="page-loading-inner">
			<div class="sk-three-bounce">
				<div class="sk-child sk-bounce1">
				</div>
				<div class="sk-child sk-bounce2">
				</div>
				<div class="sk-child sk-bounce3">
				</div>
			</div>
		</div>
	</div>
</div>
<script language='javascript'>
	function hideNavHide(){
	    $('#page-loading').hide();
	}
	function dr_loading(){
	    $('#page-loading').fadeIn();
	}
    require(['js/app'], function($){
        
    });
</script>
</body>
</html>