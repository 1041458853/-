<!doctype html>
<html>
<head>
    <?php if ($fn_include = $this->_include("head.html", "/")) include($fn_include); ?>
    <style type="text/css">.sharecontent{min-height:100vh;width:100vw;background:url(<?php echo HOME_THEME_PATH; ?>images/sharecontent.jpg) no-repeat top;background-size:100% auto;background-position:0 -15vw}</style>
    <script>
        wx.ready(function() {
            wx.onMenuShareTimeline({
                title: '注册注册注册！',
                link: '<?php echo SITE_URL; ?>?s=mall&c=home&m=openyaoqing#<?php echo $ticket; ?>'
            });
            wx.onMenuShareAppMessage({
                title: '注册注册',
                desc: '盛情邀您帮拆包，同等礼包送给您~',
                link: '<?php echo SITE_URL; ?>?s=mall&c=home&m=openyaoqing#<?php echo $ticket; ?>'
            });
        });
    </script>
</head>
<body>
<div id="app">
    <div><div class="sharecontent"></div></div>
</div>
<?php if ($fn_include = $this->_include("popup.html", "/")) include($fn_include); ?>
</body>
</html>