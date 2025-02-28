<html lang="zh-cmn-Hans" style="height: 100%; font-size: 50px;">
    
    <head>
        <title><?php echo $title; ?></title>
        <style media="screen">
        body {
            background-color: #69696B;
        }
        </style>
        <meta charset="UTF-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="format-detection" content="telephone=no">
        <script type="text/javascript">
        var memberpath = "<?php echo MEMBER_PATH; ?>";
        </script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/<?php echo SITE_LANGUAGE; ?>.js"></script>
        <script src="<?php echo THEME_PATH; ?>admin/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="<?php echo THEME_PATH; ?>js/ui-dialog.css">
        <script src="https://cdn.bootcss.com/layer/3.1.0/layer.js"></script>
        <script type="text/javascript" t src="<?php echo THEME_PATH; ?>js/dialog-plus.js"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/jquery.artDialog.js?skin=default"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/dayrui.js"></script>
        <link rel="stylesheet" href="<?php echo HOME_THEME_PATH; ?>layui/css/layui.css">
        <script src="<?php echo HOME_THEME_PATH; ?>layui/layui.js"></script>
        <style type="text/css">
        body {
            height: 100%
        }
        .resource-container {
            min-height: 100%;
            background: #fff
        }
        .details {
            background-color: #fff;
            margin: auto;
            max-width: 960px;
            padding: 0 .3rem;
            display: block
        }
        .comment-box {
            margin-top: .15rem;
            padding-bottom: 1rem
        }
        .border-heihgt {
            height: .15rem;
            background: #e0e0e6;
            margin: 0 -.3rem
        }
        </style>
        <style type="text/css">
        .article {
            display: block;
            word-wrap: break-word;
            padding-top: .3rem
        }
        .article-title {
            padding-bottom: .1rem;
            line-height: 1.4;
            font-weight: 700;
            line-height: 1.3;
            font-size: 20px;
            display: block
        }
        .author {
            display: block
        }
        .article-content {
            margin-top: 15px;
            margin-bottom: 15px;
            color: #2f2f2f;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.7;
            display: block;
            overflow: hidden;
            white-space: normal
        }
        .article img {
            max-width: 100%
        }
        .article iframe {
            width: 100%;
            min-height: 300px
        }
        .author-head {
            width: 48px;
            height: 48px;
            vertical-align: middle;
            display: inline-block;
            cursor: pointer;
            color: #333;
            text-decoration: none;
            background-color: transparent
        }
        .author-head-img {
            width: 100%;
            height: 100%;
            border: 1px solid #ddd;
            border-radius: 50%;
            vertical-align: middle
        }
        .author-info {
            vertical-align: middle;
            display: inline-block;
            margin-left: 8px
        }
        .author-tag {
            padding: 1px 2px;
            font-size: 12px;
            color: #ea6f5a;
            border: 1px solid #ea6f5a;
            border-radius: 3px
        }
        .author-name {
            margin-left: 3px;
            margin-right: 3px;
            font-size: 16px;
            vertical-align: middle
        }
        .author-name-a {
            cursor: pointer;
            color: #2f2f2f;
            text-decoration: none;
            background-color: transparent
        }
        .article-meta {
            margin-top: 5px;
            font-size: 12px;
            color: #969696;
            display: block
        }
        .article-meta span {
            padding-right: 5px
        }
        .detail-data {
            padding-bottom: .3rem;
            overflow: hidden
        }
        .detail-num-wrapper {
            float: left;
            margin-right: .2rem
        }
        .detail-num-img {
            width: .24rem;
            height: .24rem;
            vertical-align: middle
        }
        .detail-num {
            line-height: .3rem;
            display: inline-block;
            vertical-align: middle
        }
        .non_member_content {
            width: 100%;
            text-align: center;
            margin-top: .3rem;
            padding-top: .3rem;
            padding-bottom: .3rem
        }
        </style>
        <style type="text/css">
        .comment_bottom_face[_v-f599b7ce] {
            width: 100%;
            height: .96rem;
            box-sizing: border-box;
            border-top: 1px solid #eee;
            position: fixed;
            bottom: 0;
            z-index: 1000;
            left: 0;
            right: 0;
            margin: auto
        }
        .comment_bottom_wrap_face[_v-f599b7ce] {
            position: relative;
            width: 100%;
            height: 100%;
            background-color: #fff;
            padding: 0 .3rem
        }
        .comment_input_face[_v-f599b7ce] {
            width: 100%;
            height: .6rem;
            line-height: .6rem;
            color: #999;
            padding-left: .14rem;
            box-sizing: border-box;
            float: left;
            border: .02rem solid #eee;
            margin-top: .2rem;
            border-radius: .04rem
        }
        .comment_bottom[_v-f599b7ce] {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            z-index: 999999;
            background-color: hsla(240, 1%, 42%, .5)
        }
        .comment_bottom_wrap[_v-f599b7ce] {
            position: absolute;
            width: 6.8rem;
            height: 4.2rem;
            margin-left: auto;
            margin-right: auto;
            background-color: #fff;
            border-radius: .08rem;
            overflow: hidden;
            top: 0;
            bottom: 0;
            margin: auto;
            left: 0;
            right: 0
        }
        .comment_hint[_v-f599b7ce] {
            text-align: center;
            height: .8rem;
            line-height: .8rem
        }
        .comment_input[_v-f599b7ce] {
            width: 6.2rem;
            height: 2rem;
            box-sizing: border-box;
            border: .022rem solid #eee;
            margin-left: .3rem;
            border-radius: .04rem
        }
        .comment_input_real[_v-f599b7ce] {
            width: 6rem;
            height: 1.8rem;
            margin-top: .1rem;
            padding-left: .14rem;
            box-sizing: border-box;
            resize: none;
            outline: none
        }
        .send_btn_box[_v-f599b7ce] {
            margin-top: .4rem;
            position: relative
        }
        .background_default[_v-f599b7ce] {
            background-color: #fff
        }
        .input_button_l[_v-f599b7ce] {
            border-right: .022rem solid #e5e5e5
        }
        .input_button_l[_v-f599b7ce], .input_button_r[_v-f599b7ce] {
            width: 3.4rem;
            height: 1rem;
            box-sizing: border-box;
            border-top: .022rem solid #e5e5e5;
            float: left;
            outline: none
        }
        </style>
        <style type="text/css">
        .normal-comment-list[_v-08900d7e] {
            margin-top: .15rem
        }
        .comment-top[_v-08900d7e] {
            padding-bottom: .2rem;
            font-weight: 700;
            border-bottom: 1px solid #f0f0f0
        }
        .comment-top span[_v-08900d7e] {
            vertical-align: middle
        }
        .pull-right[_v-08900d7e] {
            float: right!important
        }
        .pull-right .active[_v-08900d7e], .pull-right a[_v-08900d7e]:hover {
            color: #2f2f2f
        }
        .pull-right a[_v-08900d7e] {
            margin-left: 10px;
            font-weight: 400;
            color: #969696;
            display: inline-block
        }
        .btn-danger[_v-08900d7e] {
            text-decoration: none;
            width: 100%;
            padding: 10px 0;
            margin: 40px 0;
            font-size: 15px;
            background-color: #f7f7f7;
            border: 1px solid #dcdcdc;
            text-align: center;
            color: #787878;
            display: inline-block;
            font-weight: 400;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            white-space: nowrap;
            line-height: 1.42857;
            border-radius: 4px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }
        </style>
        <style type="text/css">
        .comment_item[_v-1c9afd94] {
            width: 100%;
            position: relative;
            padding-top: .3rem;
            padding-bottom: .3rem
        }
        .comment_item_left_icon[_v-1c9afd94] {
            width: .9rem;
            position: absolute;
            top: .3rem;
            left: 0
        }
        .comment_item_icon_box[_v-1c9afd94] {
            width: .7rem;
            height: .7rem;
            border-radius: .04rem;
            clear: both;
            position: relative
        }
        .comment_item_icon[_v-1c9afd94] {
            width: 100%;
            height: 100%;
            clear: both;
            position: absolute;
            left: 0;
            top: 0;
            border-radius: .04rem
        }
        .comment_item_right_content[_v-1c9afd94] {
            width: 100%;
            height: 100%;
            padding-left: .9rem
        }
        .name_time_line[_v-1c9afd94] {
            position: relative;
            clear: both;
            height: .4rem
        }
        .comment_item_nickname[_v-1c9afd94] {
            height: .4rem;
            line-height: .4rem;
            float: left;
            width: 60%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }
        .comment_item_zan[_v-1c9afd94] {
            height: .32rem;
            line-height: .32rem;
            margin-top: .04rem;
            float: left;
            width: 40%;
            text-align: right;
            position: relative
        }
        .zan_num[_v-1c9afd94] {
            float: right;
            height: .24rem;
            line-height: .24rem
        }
        .zan_icon[_v-1c9afd94] {
            float: right;
            margin-right: .2rem;
            width: .6rem;
            height: .6rem;
            cursor: pointer
        }
        .zan_icon_inner[_v-1c9afd94] {
            width: .24rem;
            height: .24rem;
            margin-left: .36rem
        }
        .zan_icon_img[_v-1c9afd94] {
            width: 100%;
            height: 100%
        }
        .comment_item_content[_v-1c9afd94] {
            line-height: 1.4;
            margin-top: .2rem;
            clear: both;
            word-wrap: break-word;
            cursor: pointer
        }
        .comment_list_item_reply[_v-1c9afd94] {
            margin-top: .15rem;
            margin-right: .3rem;
            border: 1px solid #e7e7e7;
            padding: .2rem;
            box-sizing: border-box;
            overflow: hidden;
            word-wrap: break-word
        }
        .comment_item_time[_v-1c9afd94] {
            height: .32rem;
            line-height: .32rem;
            margin-top: .1rem
        }
        </style>
        <style type="text/css">
        .dropload-container[_v-aa0a7e0c] {
            width: 100%;
            -webkit-overflow-scrolling: touch;
            -webkit-transform: translateZ(0)
        }
        .hint[_v-aa0a7e0c] {
            width: 100%;
            height: .5rem;
            line-height: .5rem;
            text-align: center;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }
        </style>
        <style type="text/css">
        .pay-wrap-height[_v-150229b2], .pay-wrap[_v-150229b2] {
            height: 1.06rem;
            width: 100%
        }
        .pay-wrap[_v-150229b2] {
            position: fixed;
            bottom: 0;
            text-align: center;
            padding: .15rem 0;
            background: #fff;
            box-shadow: .01rem .01rem .05rem rgba(0, 0, 0, .2);
            border-top: 1px solid #dedede;
            z-index: 100;
            left: 0;
            right: 0;
            margin: auto
        }
        .pay-btn[_v-150229b2] {
            width: 100%;
            color: #fff;
            background-color: #09bb07;
            height: .76rem;
            border-radius: .1rem;
            outline: none;
            cursor: pointer
        }
        .sell-stop-wrap[_v-150229b2] {
            padding: 0;
            line-height: 1.06rem;
            height: 1.06rem;
            background-color: #b2b2b2;
            color: #fff;
            font-size: 18px
        }
        </style>
        <style type="text/css">
        .modal[_v-e4dc7386] {
            overflow-x: hidden;
            overflow-y: auto;
            background-color: hsla(240, 1%, 42%, .5);
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            -webkit-overflow-scrolling: touch;
            outline: 0
        }
        .modal-dialog[_v-e4dc7386] {
            width: 350px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -185px;
            margin-left: -175px;
            text-align: center
        }
        .modal-content[_v-e4dc7386] {
            box-shadow: 0 5px 25px rgba(0, 0, 0, .1);
            -webkit-box-shadow: 0 5px 25px rgba(0, 0, 0, .1);
            border: 1px solid rgba(0, 0, 0, .1);
            overflow: hidden;
            z-index: 9;
            position: relative;
            background-color: #fff;
            border-radius: 6px;
            background-clip: padding-box;
            outline: 0
        }
        .modal-header[_v-e4dc7386] {
            padding: 15px 20px 0;
            border-bottom: none
        }
        .modal-header .close[_v-e4dc7386] {
            margin-top: -2px
        }
        .close[_v-e4dc7386] {
            font-weight: 200;
            font-size: 26px;
            outline: none;
            text-shadow: none;
            float: right
        }
        button.close[_v-e4dc7386] {
            padding: 0;
            cursor: pointer;
            background: transparent;
            border: 0;
            -webkit-appearance: none
        }
        .modal-body[_v-e4dc7386] {
            padding: 0;
            overflow: auto;
            position: relative
        }
        .wx-qr-code[_v-e4dc7386] {
            display: inline-block
        }
        .weixin-pay h3[_v-e4dc7386] {
            margin-bottom: 20px;
            color: #787878
        }
        .wx-qr-code img[_v-e4dc7386] {
            padding: 10px;
            width: 200px;
            background-color: #fff
        }
        .pay-amount[_v-e4dc7386] {
            margin: 20px 0;
            color: #787878
        }
        .pay-amount span[_v-e4dc7386] {
            color: #f5a623
        }
        </style>
        <style type="text/css">
        .navigation_menu[_v-2ec80ed6] {
            position: fixed;
            bottom: 1.89rem;
            right: 0;
            left: 0;
            height: .6rem;
            width: 1.58rem;
            background-color: rgba(0, 0, 0, .5);
            z-index: 1000;
            border-radius: .5rem 0 0 .5rem;
            overflow: hidden;
            margin: auto
        }
        .navigation_home_menu[_v-2ec80ed6] {
            font-size: .24rem
        }
        .navi_control[_v-2ec80ed6] {
            position: absolute;
            right: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            z-index: 2;
            text-decoration: none;
            color: #fff;
            cursor: pointer
        }
        .navi_home[_v-2ec80ed6] {
            width: .24rem;
            height: .24rem;
            position: absolute;
            left: .2rem;
            top: 50%;
            margin-left: 0;
            margin-top: -.12rem;
            background-repeat: no-repeat;
            background-size: 100%
        }
        .navi_home_txt[_v-2ec80ed6] {
            text-align: right;
            padding-right: .1rem;
            line-height: .6rem;
            font-size: .24rem
        }
        </style>
        <style type="text/css">
        #menu_wrapper {
            width: 130px;
            padding: 10px 3px;
            background: #fff;
            display: none;
            position: absolute;
            left: 0;
            top: 0;
            border-radius: 5px;
            box-shadow: 0 0 10px #333
        }
        #menu_wrapper li {
            height: 28px;
            line-height: 28px;
            font-size: 14px;
            text-align: left;
            list-style: none;
            padding-left: 30px
        }
        #menu_wrapper li:hover {
            background: #2a75ed;
            color: #fff
        }
        </style>
        <style type="text/css">
        * {
            margin: 0;
            border: 0;
            padding: 0
        }
        body {
            background-color: #69696b;
            height: 100%;
            overflow-y: scroll;
            font-family: PingFangSC, Helvetica, Tahoma, Arial, Hiragino Sans GB, Hiragino Sans GB W3, Microsoft Yahei, STXihei, STHeiti, Heiti, SimSun, sans-serif!important
        }
        .vue_common, body {
            box-sizing: border-box
        }
        *, .vue_common *, :after, :before {
            box-sizing: inherit;
            word-wrap: break-word;
            word-break: break-all
        }
        a {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
            -webkit-touch-callout: none
        }
        button {
            user-select: none;
            -webkit-user-select: none
        }
        a, button, div, input, textarea {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
        }
        .t1 {
            font-size: .32rem
        }
        .t2 {
            font-size: .28rem
        }
        .t3 {
            font-size: .24rem
        }
        .t4 {
            font-size: .22rem
        }
        .t5 {
            font-size: .32rem
        }
        .t6 {
            font-size: .36rem
        }
        .t7 {
            font-size: .4rem
        }
        .t8 {
            font-size: .2rem
        }
        .c0_white {
            color: #fff
        }
        .c1 {
            color: #09bb07
        }
        .c2 {
            color: #353535
        }
        .c3 {
            color: #888
        }
        .c4 {
            color: #576b95
        }
        .c5 {
            color: #e64340
        }
        .c6 {
            color: #b2b2b2
        }
        .c7 {
            color: #2f96e6
        }
        .c8 {
            color: #757575
        }
        .c9 {
            color: #32cc6e
        }
        .c10 {
            color: #3cca72
        }
        .container {
            min-height: 100%;
            background: #e0e0e6
        }
        .container, .container-width-limit {
            width: 100%;
            max-width: 480px;
            margin: auto
        }
        .clearfix:after {
            content:"";
            display: table;
            clear: both
        }
        .clearfix {
            zoom: 1
        }
        .PressGreenBg:active {
            background-color: rgba(9, 187, 7, .2)!important;
            border-color: rgba(9, 187, 7, .2)!important
        }
        .pressGreyBg:active {
            background-color: hsla(0, 0%, 49%, .2)!important;
            border-color: hsla(0, 0%, 49%, .2)!important
        }
        .pressBlueBg:active {
            background-color: rgba(43, 143, 247, .2)!important;
            border-color: rgba(43, 143, 247, .2)!important
        }
        .pressActive:active {
            opacity: .5
        }
        .navi_href {
            height: 100%;
            width: .64rem;
            position: absolute
        }
        .navi_hrefIcon {
            width: .3rem;
            height: .3rem;
            position: absolute;
            left: 50%;
            margin-left: -.15rem;
            top: .2rem
        }
        .navi_hrefWord {
            font-size: .18rem;
            color: #fff;
            text-align: center;
            margin-top: .6rem
        }
        .navi_href:first-child {
            left: .3rem
        }
        .navi_href:nth-child(2) {
            left: 1rem
        }
        .navi_href:nth-child(3) {
            left: 1.7rem
        }
        .navi_href:nth-child(4) {
            left: 2.6rem
        }
        .naviControl_icon {
            width: .3rem;
            height: .3rem;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -.15rem;
            margin-top: -.15rem
        }
        .navi_close {
            animation: naviClose .2s 1;
            -webkit-animation: naviClose .2s 1
        }
        .navi_open {
            animation: naviOpen .2s 1;
            -webkit-animation: naviOpen .2s 1
        }
        @-webkit-keyframes naviClose {
            0% {
                width: 3.4rem
            }
            to {
                width: 1rem
            }
        }
        .detail-title {
            word-wrap: break-word;
            margin-top: 0.3rem;
            line-height: 0.6rem;
        }
        .detail-word-wrapper {
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: .3rem;
            position: relative;
        }
        .buttonWrapper[data-v-f7111940] {
            position: relative;
            float: right;
            line-height: 1;
            text-align: center;
            font-size: 0;
        }
        .moduleButton[data-v-f7111940] {
            width: 0.8rem;
            float: left;
            text-decoration: none;
            text-align: center;
            font-size: 0;
            cursor: pointer;
        }
        .product_time {
            margin-top: .13rem;
        }
        @keyframes naviClose {
            0% {
                width: 3.4rem
            }
            to {
                width: 1rem
            }
        }
        @-webkit-keyframes naviOpen {
            0% {
                width: 1rem
            }
            to {
                width: 3.4rem
            }
        }
        @keyframes naviOpen {
            0% {
                width: 1rem
            }
            to {
                width: 3.4rem
            }
        }
        .navi_openIcon {
            background: url("/images/navi/nav_open.png") 50%;
            background-repeat: no-repeat;
            background-size: 100%
        }
        .navi_closeIcon {
            background: url("/images/navi/nav_close.png") 50%;
            background-repeat: no-repeat;
            background-size: 100%
        }
        .select {
            -webkit-touch-callout: initial;
            -webkit-user-select: initial;
            -moz-user-select: initial;
            -ms-user-select: initial;
            user-select: auto
        }
        .un_select {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }
        .desc-mb {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0
        }
        </style>
        <script>
        $(function () {
            $(".navigation_menu.navigation_home_menu.t2").bind('click', function () {
                window.location.href = '<?php echo SITE_URL; ?>';
            });
            $("#goumai").click(function () {
                var status = $("#goumai").attr("status");
                if (status == "false") {
                    layer.open({
                      type: 2, 
                      area: ['300px', '280px'],
                      content: ['<?php echo SITE_URL; ?>?s=mall&c=buy&m=biaodan&id=' + <?php echo $id; ?> + '&order_price=' + <?php echo $order_price; ?>, 'no']
                    });
                    // window.location.href = '<?php echo SITE_URL; ?>?s=mall&c=buy&m=biaodan&id=' + <?php echo $id; ?> + '&order_price=' + <?php echo $order_price; ?>;
                } else if (status == "true") {
                    alert("你已经购买过了");
                }
            });
            // $("#songhaoyou").click(function () {
            //     alert("功能开发中");
            // });
            $("#yaoqingka").click(function () {
                alert("功能开发中");
            });
            
            //弹出赠送表单
            $('#songhaoyou').on('click', function(){
                layer.open({
                  type: 1,
                  title:'赠送',
                  content: '<form class="layui-form" action="<?php echo SITE_URL; ?>" id="tanchubiaodan" display:none method="GET">\
                            	<input name="s" type="hidden" value="mall" />\
            					<input name="c" type="hidden" value="zengsong" />\
            					<input name="m" type="hidden" value="index" />\
            					<input name="id" type="hidden" value="<?php echo $id; ?>" />\
            					<input name="order_price" type="hidden" value="<?php echo $order_price; ?>" />\
            					<input name="shuliang" type="hidden" value="1" />\
            					<input name="beizhu" type="hidden" value="用于赠送" />\
                            <div class="layui-form-item">\
                                <label class="layui-form-label">ID号码</label>\
                                <div class="layui-input-block" style="margin-left: 88px;">\
                                 <input type="Number" style="display: block;width: 88%;padding-left: 8px;margin-top: 22px;" name="user_id" required lay-verify="required" placeholder="请输入对方id"\ autocomplete="off" class="layui-input">\
                                </div>\
                            </div>\
                            <div class="layui-form-item">\
                                <label class="layui-form-label">姓名</label>\
                                <div class="layui-input-block" style="margin-left: 88px;">\
                                 <input type="text" style="display: block;width: 88%;padding-left: 8px;margin-top: 22px;" name="chiyouren_name" required lay-verify="required" placeholder="对方姓名"\ autocomplete="off" class="layui-input">\
                                </div>\
                            </div>\
                            <div class="layui-form-item">\
                                <label class="layui-form-label">号码</label>\
                                <div class="layui-input-block" style="margin-left: 88px;">\
                                 <input type="Number" style="display: block;width: 88%;padding-left: 8px;margin-top: 22px;" name="chiyouren_phone" required lay-verify="required" placeholder="对方手机号"\ autocomplete="off" class="layui-input">\
                                </div>\
                            </div>\
                            <div class="layui-form-item">\
                              <div class="layui-input-block" style="margin-left: 44px;">\
                                 <button class="layui-btn" lay-submit lay-filter="formDemo" style="width: 180px;">赠送￥<?php echo $order_price; ?></button>\
                              </div>\
                            </div>\
                        </form>',
                }); 
            });
        });
        </script>
    </head>
    
    <body>
        <div class="container resource-container c2">
            <div class="details">
                <div class="article">
                    	<h1 class="article-title"><?php echo $title; ?></h1>
                    <div data-v-00095686="" class="detail-title t2 c2">
                        <div data-v-00095686="" class="detail-word-wrapper clearfix">
                            <div class="author">
                                <div class="article-meta"><span><?php echo date("Y-m-d H-i", $updatetime); ?></span>
                                </div>
                            </div>
                            <div data-v-f7111940="" class="buttonWrapper clearfix" data-v-00095686="">
                                <div data-v-f7111940="" id="songhaoyou" class="moduleButton giftBuyButton pressGreyBg" style="margin-right:20px">
                                    <img style="max-width: 70%;" src="<?php echo HOME_THEME_PATH; ?>images/icon_Gift.png">
                                    <p data-v-f7111940="" class="c3 t4" style="margin-top:5px">送好友</p>
                                </div>
                                <!--<div data-v-f7111940="" id="yaoqingka" class="moduleButton pressGreyBg">-->
                                <!--    <img style="max-width: 70%;" src="<?php echo HOME_THEME_PATH; ?>images/icon_yaoqingka.png">-->
                                <!--    <p data-v-f7111940="" class="c3 t4" style="margin-top:5px">邀请卡</p>-->
                                <!--</div>-->
                            </div>
                     
                        </div>
                    </div>
                    <div class="article-content clearfix"><?php $return = array();$list_temp = $this->list_tag("action=content id=$id module=mall"); if ($list_temp) extract($list_temp); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <p><?php echo $t['content']; ?></p><?php } } ?></div>
                </div>
            </div>
            <div _v-150229b2="" class="pay-wrap-height"></div>
            <div _v-150229b2="" class="container-width-limit pay-wrap">
                <button _v-150229b2="" class="pay-btn t1 PressGreenBg " id="goumai" status="<?php echo $status; ?>">购买：￥<?php echo $order_price; ?></button>
            </div>
        </div>
    </body>


</html>