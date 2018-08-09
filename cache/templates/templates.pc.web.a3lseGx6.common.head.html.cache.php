<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Cache" content="no-cache">
<title><?php echo $meta_title; ?></title>
<link href="<?php echo HOME_THEME_PATH; ?>css/app.css" rel="stylesheet">
<link href="<?php echo HOME_THEME_PATH; ?>css/style.css?v=<?php echo date('Ymd'); ?>" rel="stylesheet">
<script src="<?php echo HOME_THEME_PATH; ?>/js/jquery.min.js?v=2.2.2"></script>
<script src="<?php echo HOME_THEME_PATH; ?>/js/app.js?v=<?php echo date('Ymd'); ?>"></script>
<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>
    if (navigator.userAgent.toLowerCase().match(/microMessenger/i) == 'micromessenger') {
        var weixinJssdk = <?php echo json_encode(dr_weixin_jssdk()); ?>;
        wx.config({
            debug: false,
            appId: weixinJssdk.appId,
            timestamp: weixinJssdk.timestamp,
            nonceStr: weixinJssdk.nonceStr,
            signature: weixinJssdk.signature,
            jsApiList: [
                'scanQRCode',
                'getLocation',
                'openLocation',
                'onMenuShareTimeline',
                'onMenuShareAppMessage'
            ]
        });

        navigator.geolocation.getCurrentPosition = function(success, error, options){
            wx.getLocation({
                type: 'wgs84',
                success: function(res){
                    success({ coords:res });
                },
                error: error
            });
        };
    } else {
        var wx = {};
        wx.ready = function(func) {
            $(func);
        };
    }
</script>