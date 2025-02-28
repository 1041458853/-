<html lang="zh-cmn-Hans" style="height: 100%; font-size: 50px;">

	<head>
		<title>个人信息</title>

		<!--<link rel="shortcut icon" href="favicon.ico">-->

		<style media="screen">
			body {
				background-color: #69696B;
			}
			ul,
            li {
                list-style: none;
            }
            
            a {
                text-decoration: none;
            }
            
            a:hover {
                cursor: pointer;
                text-decoration: none;
            }
            
            a:link {
                text-decoration: none;
            }
            
            img {
                vertical-align: middle;
            }
            
            .btn-numbox {
                overflow: hidden;
                /*margin-top: 10px;*/
            }
            
            .btn-numbox li {
                float: left;
            }
            
            .btn-numbox li .number,
            .kucun {
                display: block;
                font-size: 12px;
                color: #808080;
                vertical-align: sub;
            }
            
            .btn-numbox .count {
                overflow: hidden;
                margin: 0 16px 0 -20px;
            }
            
            .btn-numbox .count .num-jian,
            .input-num,
            .num-jia {
                display: inline-block;
                width: 28px;
                height: 28px;
                line-height: 28px;
                text-align: center;
                font-size: 25px;
                color: #999;
                cursor: pointer;
                border: 1px solid #e6e6e6;
            }
            .btn-numbox .count .input-num {
                width: 58px;
                height: 26px;
                color: #333;
                border-left: 0;
                border-right: 0;
            }
		</style>

		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">

<script type="text/javascript">var memberpath = "<?php echo MEMBER_PATH; ?>";</script>
<script type="text/javascript" src="<?php echo THEME_PATH; ?>js/<?php echo SITE_LANGUAGE; ?>.js"></script>
<script src="<?php echo THEME_PATH; ?>admin/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo THEME_PATH; ?>js/jquery-ui.min.js"></script>


<link rel="stylesheet" href="<?php echo THEME_PATH; ?>js/ui-dialog.css">

<script type="text/javascript"t src="<?php echo THEME_PATH; ?>js/dialog-plus.js"></script>
<script type="text/javascript" src="<?php echo THEME_PATH; ?>js/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo THEME_PATH; ?>js/dayrui.js"></script>

		<script>
			function isMobile() {
				var userAgentInfo = navigator.userAgent;
				var Agents = ["Android", "iPhone",
					"SymbianOS", "Windows Phone",
					"iPad", "iPod"
				];
				var flag = false;
				for(var v = 0; v < Agents.length; v++) {
					if(userAgentInfo.indexOf(Agents[v]) > 0) {
						flag = true;
						break;
					}
				}
				return flag;
			}
			//if (isMobile()) { // 手机浏览器
			if(false) { // 手机浏览器
				var htmlDom = document.documentElement;
				var windowWidth = htmlDom.clientWidth;
				var evt = "onorientationchange" in window ? "orientationchange" : "resize";
				htmlDom.style.fontSize = windowWidth / 7.5 + 'px';
				(function() {
					document.addEventListener('DOMContentLoaded', function() {
						if(!htmlDom.style.fontSize) {
							var htmlDomProtect = document.documentElement;
							var windowWidth = htmlDomProtect.clientWidth;
							htmlDomProtect.style.fontSize = windowWidth / 7.5 + 'px';
						}
					}, false);
				})();

				window.addEventListener(evt, function() {
					setTimeout(function() {
						var htmlDomProtect = document.documentElement;
						var windowWidth = htmlDomProtect.clientWidth;
						htmlDomProtect.style.fontSize = windowWidth / 7.5 + 'px';
					}, 200);
				}, false);
			} else { // pc浏览器
				var htmlDom = document.documentElement;
				var windowWidth = htmlDom.clientWidth;
				var evt = "onorientationchange" in window ? "orientationchange" : "resize";
				// htmlDom.style.fontSize = windowWidth / 7.5 + 'px';
				htmlDom.style.fontSize = 375 / 7.5 + 'px';
			}
		</script>

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
			
			.vue_common,
			body {
				box-sizing: border-box
			}
			
			*,
			.vue_common *,
			:after,
			:before {
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
			
			a,
			button,
			div,
			input,
			textarea {
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
			
			.container,
			.container-width-limit {
				width: 100%;
				max-width: 480px;
				margin: auto
			}
			
			.clearfix:after {
				content: "";
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
				background: url("<?php echo HOME_THEME_PATH; ?>images/navi/nav_open.png") 50%;
				background-repeat: no-repeat;
				background-size: 100%
			}
			
			.navi_closeIcon {
				background: url("<?php echo HOME_THEME_PATH; ?>images/navi/nav_close.png") 50%;
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
		<style type="text/css">
			.edit_container {
				background-color: #fff
			}
			
			.userinfo_edit_box {
				height: 100%
			}
			
			.userinfo_edit_item {
				text-align: right;
				line-height: 0;
				height: 1rem
			}
			
			.userinfo_edit_item,
			.userinfo_edit_item_first {
				background-color: #fff;
				border-bottom: 1px solid #eee;
				padding: 0 .3rem;
				overflow: hidden;
				box-sizing: border-box;
				width: 100%
			}
			
			.userinfo_edit_item_first {
				height: 1.6rem
			}
			
			.userinfo_edit_item_title_first {
				line-height: 1.6rem;
				float: left
			}
			
			.userinfo_edit_item_avatar_first {
				float: right;
				width: 1.1rem;
				height: 1.1rem;
				margin-top: .25rem
			}
			
			.userinfo_edit_item_title {
				line-height: 1rem;
				float: left
			}
			
			.userinfo_edit_item_arrow {
				float: right;
				width: .2rem;
				height: .3rem;
				margin-top: .35rem
			}
			
			.gender_span {
				line-height: 1rem
			}
			
			.birth_div,
			.gender_span {
				float: right;
				margin-right: .2rem
			}
			
			.birth_div {
				position: relative;
				height: 1rem;
				width: 4.5rem
			}
			
			.birth_show {
				height: 100%;
				text-align: right!important
			}
			
			.birth_show,
			.input_date {
				position: absolute;
				left: 0;
				width: 100%;
				line-height: 1rem
			}
			
			.input_date {
				outline: none;
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				height: 1rem;
				vertical-align: middle;
				opacity: 0
			}
			
			.input_area {
				padding-right: .2rem;
				text-align: right;
				height: .7rem;
				line-height: .7rem;
				margin-top: .14rem;
				width: 4.5rem
			}
			
			.userinfo_edit_save_single_btn {
				background-color: #32cd32;
				width: 100%;
				height: .8rem;
				line-height: .8rem;
				text-align: center;
				color: #fff!important;
				float: right;
				border-radius: .1rem;
				cursor: pointer
			}
			
			.userinfo_edit_save_single_btn:active {
				background-color: #09bb07
			}
			
			.action_box {
				width: 100%;
				margin-top: .4rem;
				padding-left: .8rem;
				padding-right: .8rem;
				box-sizing: border-box
			}
			
			.userinfo_edit_box .vue-datepicker input {
				text-align: right;
				height: .7rem;
				line-height: .7rem;
				margin-top: .14rem;
				width: 4.5rem;
				border: 0;
				font-size: .32rem;
				color: #353535
			}
			
			.userinfo_edit_box .vue-datepicker-panels {
				box-sizing: content-box
			}
			
			.userinfo_edit_box .vue-datepicker .vue-datepicker-panels {
				left: auto;
				right: 0
			}
		</style>
		<style type="text/css">
			.input_layer {
				position: fixed;
				z-index: 2;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background-color: hsla(0, 0%, 47%, .5)
			}
			
			.input_window {
				z-index: 3;
				position: relative;
				top: 1rem;
				width: 7rem;
				height: 4rem;
				background-color: #fff;
				border-radius: .3rem;
				overflow: hidden;
				margin: auto
			}
			
			.input_title {
				display: block;
				height: 1.2rem;
				line-height: 1.2rem;
				text-align: center;
				padding-top: .2rem
			}
			
			.gender_select {
				display: block;
				margin-top: .4rem;
				margin-bottom: .1rem;
				height: .5rem;
				line-height: .5rem
			}
			
			.gender_male {
				margin-left: 2rem;
				display: inline-block
			}
			
			.gender_img {
				width: .3rem;
				height: .3rem;
				vertical-align: middle
			}
			
			.gender_text {
				display: inline-block;
				vertical-align: middle;
				margin-left: .1rem
			}
			
			.gender_div {
				cursor: pointer
			}
			
			.gender_female {
				margin-left: 1.8rem;
				display: inline-block
			}
			
			.cancel_button {
				box-sizing: border-box;
				float: left;
				width: 50%;
				margin-top: .6rem;
				border-right: 1px solid #eee;
				z-index: 4
			}
			
			.input_button {
				width: 3.48rem;
				height: 1.2rem;
				border-top: 1px solid #eee;
				cursor: pointer;
				outline: none
			}
			
			.background_default {
				background-color: #fff
			}
			
			.confirm_button_right {
				box-sizing: border-box;
				float: left;
				width: 50%;
				margin-top: .6rem;
				z-index: 4
			}
		</style>
		<style type="text/css">
			.phone_layer[_v-8108337e] {
				position: fixed;
				z-index: 2;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background-color: hsla(0, 0%, 47%, .5);
				box-sizing: content-box
			}
			
			.phone_window[_v-8108337e] {
				z-index: 3;
				position: relative;
				top: 1rem;
				margin: auto;
				width: 7rem;
				height: 5.3rem;
				background-color: #fff;
				border-radius: .3rem;
				overflow: hidden
			}
			
			.input_title[_v-8108337e] {
				display: block;
				height: 1.2rem;
				line-height: 1.2rem;
				text-align: center;
				padding-top: .2rem
			}
			
			.input_div_phone[_v-8108337e] {
				position: relative;
				height: 1.3rem
			}
			
			.phone_area[_v-8108337e] {
				position: relative;
				display: inline-block;
				top: -.4rem;
				margin-left: .5rem;
				width: 5.6rem;
				border: 1px solid #d3d3d3;
				border-radius: .05rem;
				padding-left: .2rem;
				padding-right: .2rem;
				text-align: left;
				height: .8rem;
				line-height: .6rem
			}
			
			.input_div_code[_v-8108337e] {
				position: relative;
				height: 1.3rem
			}
			
			.code_area[_v-8108337e] {
				position: relative;
				display: inline-block;
				top: -.4rem;
				margin-left: .5rem;
				width: 3.1rem;
				border: 1px solid #d3d3d3;
				border-radius: .05rem;
				padding-left: .2rem;
				padding-right: .2rem;
				text-align: left;
				height: .82rem;
				line-height: .6rem
			}
			
			.get_code_button[_v-8108337e] {
				position: relative;
				display: inline-block;
				top: -.38rem;
				width: 2.15rem;
				height: .82rem;
				border-radius: .1rem
			}
			
			.background_blue_new[_v-8108337e] {
				background-color: #2f96e6;
				cursor: pointer
			}
			
			.c0_white[_v-8108337e] {
				color: #fff
			}
			
			.phone_cancel_button[_v-8108337e] {
				box-sizing: border-box;
				float: left;
				width: 50%;
				margin-top: .1rem;
				height: 1.2rem;
				overflow: hidden;
				border-right: 1px solid #d3d3d3;
				z-index: 4
			}
			
			.background_default[_v-8108337e] {
				background-color: #fff
			}
			
			.phone_confirm_button[_v-8108337e] {
				box-sizing: border-box;
				float: left;
				width: 50%;
				margin-top: .1rem;
				height: 1.2rem;
				overflow: hidden;
				z-index: 4
			}
			
			.input_button[_v-8108337e] {
				width: 3.48rem;
				height: 1.2rem;
				border-top: 1px solid #eee
			}
		</style>
		<style type="text/css">
			.alert-component[_v-452e13e2] {
				height: 100%;
				width: 100%;
				position: fixed;
				top: 0;
				left: 0;
				background-color: #fff;
				overflow: hidden;
				background: transparent;
				z-index: 999999
			}
			
			.box-mb[_v-452e13e2] {
				width: 100%;
				height: 100%;
				background-color: #000;
				opacity: .5;
				position: absolute;
				top: 0;
				left: 0;
				z-index: 9999
			}
			
			.alert-box[_v-452e13e2] {
				width: 5.6rem;
				border-radius: .08rem;
				overflow: hidden;
				padding-top: .5rem;
				margin: auto;
				top: 50%;
				-webkit-transform: translateY(-50%);
				transform: translateY(-50%);
				background-color: #fff;
				position: absolute;
				left: 0;
				right: 0;
				z-index: 10000
			}
			
			.box-title[_v-452e13e2] {
				text-align: center;
				font-size: .36rem;
				color: #000;
				margin-bottom: .18rem
			}
			
			.box-desc[_v-452e13e2] {
				padding: 0 .55rem;
				padding-bottom: .6rem;
				color: #888;
				font-size: .3rem;
				line-height: 1.5;
				text-align: center;
				overflow: hidden
			}
			
			.box-btn-item[_v-452e13e2] {
				border-top: 1px solid #e5e5e5;
				height: 1rem
			}
			
			.box-btn[_v-452e13e2] {
				height: 100%;
				font-size: .36rem;
				background-color: #fff;
				vertical-align: top
			}
			
			.btn-confirm[_v-452e13e2] {
				color: #02bb00;
				width: 100%
			}
			
			.btn-cancel[_v-452e13e2] {
				color: #888;
				border-right: 1px solid #e5e5e5
			}
			
			.confirm-btn-item button[_v-452e13e2] {
				width: 50%;
				float: left
			}
			
			.pressGreyBg[_v-452e13e2]:active {
				background-color: hsla(0, 0%, 49%, .2)
			}
			
			.toast-box[_v-452e13e2] {
				font-size: .26rem;
				position: absolute;
				top: 50%;
				left: 50%;
				margin: auto;
				background: rgba(0, 0, 0, .7);
				color: #fff;
				-webkit-transform: translate(-50%, -50%);
				transform: translate(-50%, -50%);
				transition: 200;
				z-index: 1000000;
				border-radius: .1rem;
				white-space: nowrap;
				max-width: 6rem;
				overflow: hidden;
				text-overflow: ellipsis;
				text-align: center
			}
			
			.toast-box_text[_v-452e13e2] {
				padding: .12rem .3rem
			}
			
			.toast-box_success[_v-452e13e2] {
				padding-top: .6rem;
				height: 2.4rem;
				width: 2.4rem;
				box-sizing: border-box
			}
			
			.toast-success-icon[_v-452e13e2] {
				width: .99rem;
				height: .72rem;
				margin-bottom: .3rem
			}
		</style>
		<style type="text/css">
			@-webkit-keyframes vueDatePicker {
				0% {
					opacity: 0;
					-webkit-transform: translate(-50%, -50%) scale(0);
					transform: translate(-50%, -50%) scale(0)
				}
				to {
					opacity: 1;
					-webkit-transform: translate(0) scale(1);
					transform: translate(0) scale(1)
				}
			}
			
			@keyframes vueDatePicker {
				0% {
					opacity: 0;
					-webkit-transform: translate(-50%, -50%) scale(0);
					transform: translate(-50%, -50%) scale(0)
				}
				to {
					opacity: 1;
					-webkit-transform: translate(0) scale(1);
					transform: translate(0) scale(1)
				}
			}
			
			.vue-datepicker {
				position: relative;
				font-family: verdana;
				font-size: 14px;
				color: #666
			}
			
			.vue-datepicker,
			.vue-datepicker * {
				margin: 0;
				padding: 0
			}
			
			.vue-datepicker input {
				display: block;
				width: 245px;
				height: 28px;
				padding-left: 6px;
				border: 1px solid #ddd;
				outline: none
			}
			
			.vue-datepicker .vue-datepicker-panels {
				position: absolute;
				z-index: 99999;
				left: 0;
				background-color: #fff;
				width: 245px;
				border: 1px solid #ddd;
				box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .18);
				padding: 10px 6px;
				-webkit-animation: vueDatePicker .1s ease-out;
				animation: vueDatePicker .1s ease-out
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-month {
				padding-bottom: 4px;
				height: 35px;
				line-height: 35px;
				overflow: hidden;
				text-align: center
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-month a {
				float: left;
				display: block;
				width: 35px;
				cursor: pointer;
				color: #999;
				font-size: 12px
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-month a:hover {
				background-color: #f5f6f7
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-month span {
				float: left;
				display: block;
				width: 175px
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-month span.vue-datepicker-btn:hover {
				background-color: #f5f6f7;
				cursor: pointer
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 {
				width: 245px;
				border-collapse: collapse;
				text-align: center
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 thead,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb thead {
				background-color: #f5f6f7;
				height: 35px;
				line-height: 35px;
				border-top: 1px solid #ddd;
				border-bottom: 1px solid #ddd
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 thead tr,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb thead tr {
				border: none
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 thead tr th,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb thead tr th {
				width: 35px;
				font-size: 12px;
				border: none;
				font-weight: 400
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr {
				border-top: 1px solid #eee
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr td {
				height: 31.5px
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr td.z-existed {
				cursor: pointer
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed span,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr td.z-existed span {
				display: block;
				height: 21.7px;
				line-height: 21.7px
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed:hover,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr td.z-existed:hover {
				background-color: #f5f6f7;
				color: #d0000e
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed.z-on span,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr td.z-existed.z-on span {
				color: #fff;
				background-color: #d0000e
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed.z-invalid,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr td.z-existed.z-invalid {
				cursor: default
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed.z-invalid span,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr td.z-existed.z-invalid span {
				color: #ccc
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed.z-invalid:hover,
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb tbody tr td.z-existed.z-invalid:hover {
				background-color: transparent
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr {
				border-top: 1px solid #eee
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td {
				height: 31.5px;
				padding: 4px 10px;
				font-size: 13px
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed {
				cursor: pointer
			}
			
			.vue-datepicker .vue-datepicker-panel .vue-datepicker-tb2 tbody tr td.z-existed span {
				display: block;
				height: 22.75px;
				line-height: 22.75px
			}
		</style>
		<style type="text/css"></style>
		<style type="text/css">
			body,
			html {
				height: 100%
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
			.site-mark-item {
				padding: .2rem 0;
				position: absolute;
				bottom: 0;
				text-align: center;
				width: 100%;
				line-height: .28rem
			}
			
			.site-mark-item,
			.toXiaoeWeb {
				text-decoration: none
			}
			
			.container {
				min-height: 100%;
				position: relative;
				padding-bottom: .96rem
			}
		</style>
	</head>
	<body>
		<div class="container edit_container" style="padding-bottom:50px;">
			<div class="userinfo_edit_box">
				<div id="birth_container" class="userinfo_edit_item" style="margin-top: 0px;padding-bottom:20px;">
					<p class="userinfo_edit_item_title t1 c3">姓名<span style="color: red;">*</span></p><input type="text" id="chiyouren_name"  maxlength="128" class="input_area t1 c2">
				</div>
			    <div id="phone_container" class="userinfo_edit_item" style="margin-top: 0px;">
					<p class="userinfo_edit_item_title t1 c3">手机号<span style="color: red;">*</span></p><input type="tel" id="chiyouren_phone"  maxlength="128" class="input_area t1 c2" style="margin-left: 20%;margin-top: -16%;">
				</div>
				 <?php if ($member['youhuiquan'] != 0) {  $return = array();$list_temp = $this->list_tag("action=sql sql='select jianmian from @#fanjuancelve where status=1'"); if ($list_temp) extract($list_temp); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
        				<div id="phone_container" class="userinfo_edit_item" style="margin-top: 0px;;height:30px">
        				    <input type="checkbox" style="margin-top:5px;width:20px;height:20px" id="youhuiquan" value="<?php echo $t['jianmian']; ?>"/>
        					<p class="userinfo_edit_item_title t1 c3" style="font-size: 16px;line-height: 100%;margin-top: 8px;" >是否使用减
        					     <?php echo $t['jianmian']; ?>
        					优惠券</p>
        				</div>
        			    <?php } }  } ?>
				<div class="userinfo_edit_item" style="position:  relative;">
					<ul class="btn-numbox" style="position:  absolute;left: 12px;top: 0;z-index: 998;">
                        <li style="margin-left:0%;margin-top:30px"><span class="number" style="font-size: 16px;height: 23px;">购买数量</span></li>
                        
                        <li style="margin-top: 15px;">
                            <ul class="count" style="margin-left: 10px;">
                                <li><span id="num-jian" class="num-jian" style="width:30px;height: 30px;"><span style="position:relative;top:-2px;">-</span></span></li>
                                <li><input type="number"  class="input-num" id="input-num" value="0" style="width: 30px;height: 30px;font-size：10px;position:relative;border:1px solid #f4f4f4;border-radius:0px;color:gray;box-shadow:none;"/></li>
                                <li><span id="num-jia"  class="num-jia"  style="width: 30px;height: 30px;"><span style="position:relative;top:-2px;">+</span></li>
                            </ul>
                        </li>
        　　      　  </ul>
        　　      </div>
                <span style="font-size:18px;color:gray;margin-left:12px;display:inline-block;">总价：</span>
        		<button _v-150229b2="" class="pay-btn t1 PressGreenBg " style="margin-top: 7px;width:100px;display:inline-block;" id="tijiao">0</button>
			</div>
			<div>
				<div class="site-mark-item t4 c6">
					<a href="https://www.xiaoe-tech.com" class="pressGreyBg clearfix toXiaoeWeb">
						<div class="t4 c6">慕涛网络科技有限公司提供技术支持</div>
						<div class="t4 c6">www.mutaoinc.com</div>
					</a>
				</div>
			</div>
		</div>
		
		<script>
    		    
    		    $(function(){
    		        $("#tijiao").click(function(){
    		            var name = $("#chiyouren_name").val();
    		            var phone = $("#chiyouren_phone").val();
    		            var shuliang = $("#input-num").val();
    		            var order_price = Number($("#tijiao").text().substring(1))
    		            var youhuiquan = Number($("#youhuiquan").val())
    		            
    		            window.location.href = '<?php echo SITE_URL; ?>?s=mall&c=buy&id=' + <?php echo $id; ?> + '&order_price=' + order_price + '&chiyouren_name=' + name + '&chiyouren_phone=' + phone + '&shuliang=' + shuliang + '&laiyuan=自己购买' + '&youhuiquan=' + youhuiquan;
    		    })
    		    
    		       if(<?php echo $status; ?> == 1){
        		        //这里是控制优惠的方法   打折
        		        var map = new Map();
                        <?php if (is_array($guizhe)) { $count=count($guizhe);foreach ($guizhe as $t) { ?>
                             var guizhe = '<?php echo $t["content"]; ?>';
                             var jian_num = guizhe.indexOf("件");
                             var da_num = guizhe.indexOf("打");
                             var zhe_num = guizhe.indexOf("折");
                             var jian = Number(guizhe.substring(1,jian_num));
        		             var zhe = Number(guizhe.substring(da_num+1,zhe_num));
        		             map.set(jian, zhe);
                        <?php } } ?>
                            console.log(map);
                            var keys = new Array();
                            for (var [key, value] of map) {
                              console.log(key + ' = ' + value);
                              keys.push(key);
                            }
                            var index_s = keys.sort(function(a,b){return a-b});
                        
        		        //重构
        		        $("#num-jia").bind('click',function(){
        		           var inputNum = Number($("#input-num").val());
        	               var jiage = Number($("#tijiao").text().substring(1));
        	               var orderPrice = Number('<?php echo $order_price; ?>');
        	               
        	               if(index_s != null){
            		           for(var i = 0;i < index_s.length; i++){
            		               if(i<index_s.length-1){
                		               if(index_s[i] <= inputNum && inputNum < index_s[i+1]){
                                         var zhekou = map.get(index_s[i])/10;
                                         $("#tijiao").text('￥'+orderPrice*zhekou*inputNum);
                                       }
            		               }else{
            		                   if(index_s[i] <= inputNum){
                                         var zhekou = map.get(index_s[i])/10;
                                         $("#tijiao").text('￥'+orderPrice*zhekou*inputNum);
                                       } 
            		               }
            		                if(index_s[0] > inputNum){
                                         var zhekou = Number(1);
                                         $("#tijiao").text('￥'+orderPrice*zhekou*inputNum);
                                    } 
            		           }
        	               }else{
        	                   $("#tijiao").text('￥'+orderPrice*inputNum);
        	               }
        		        });
        		        $("#num-jian").bind('click',function(){
        		           var inputNum = Number($("#input-num").val());
        	               var jiage = Number($("#tijiao").text().substring(1));
        	               var orderPrice = Number('<?php echo $order_price; ?>');
        	               if(index_s != null){
            		           for(var i = 0;i < index_s.length; i++){
            		               if(i<index_s.length-1){
                		               if(index_s[i] <= inputNum && inputNum < index_s[i+1]){
                                         var zhekou = map.get(index_s[i])/10;
                                         $("#tijiao").text('￥'+orderPrice*zhekou*inputNum);
                                      }
            		               }else{
            		                   if(index_s[i] <= inputNum){
                                         var zhekou = map.get(index_s[i])/10;
                                         $("#tijiao").text('￥'+orderPrice*zhekou*inputNum);
                                      } 
            		               }
            		                if(index_s[0] > inputNum){
                                         var zhekou = Number(1);
                                         $("#tijiao").text('￥'+orderPrice*zhekou*inputNum);
                                    } 
            		           }
        	               }else{
        	                   $("#tijiao").text('￥'+orderPrice*inputNum);
        	               }
        		        });
                    }else if(<?php echo $status; ?> == 0){
                        //这里是控制优惠的方法   满减
                        var map = new Map();
                        <?php if (is_array($guizhe)) { $count=count($guizhe);foreach ($guizhe as $t) { ?>
                             var guizhe = '<?php echo $t["content"]; ?>';
                             var jian_num = guizhe.indexOf("件");
                             var jianmian_num = guizhe.indexOf("减");
                             var yuan_num = guizhe.indexOf("元");
                             var jian = Number(guizhe.substring(1,jian_num));
        		             var yuan = Number(guizhe.substring(jianmian_num+1,yuan_num));
        		             map.set(jian, yuan);
                        <?php } } ?>
                            console.log(map);
                            var keys = new Array();
                            for (var [key, value] of map) {
                              console.log(key + ' = ' + value);
                              keys.push(key);
                            }
                            var index_s = keys.sort(function(a,b){return a-b});
                        
        		        //重构
        		        $("#num-jia").bind('click',function(){
        		           var inputNum = Number($("#input-num").val());
        	               var jiage = Number($("#tijiao").text().substring(1));
        	               var orderPrice = Number('<?php echo $order_price; ?>');
        	               
        	               if(index_s != null){
            		           for(var i = 0;i < index_s.length; i++){
            		               if(i<index_s.length-1){
                		               if(index_s[i] <= inputNum && inputNum < index_s[i+1]){
                                         var zhekou = map.get(index_s[i]);
                                         $("#tijiao").text('￥'+(orderPrice*inputNum-zhekou));
                                       }
            		               }else{
            		                   if(index_s[i] <= inputNum){
                                         var zhekou = map.get(index_s[i]);
                                         $("#tijiao").text('￥'+(orderPrice*inputNum-zhekou));
                                       } 
            		               }
            		                if(index_s[0] > inputNum){
                                         $("#tijiao").text('￥'+(orderPrice*inputNum));
                                    } 
            		           }
        	               }else{
        	                   $("#tijiao").text('￥'+orderPrice*inputNum);
        	               }
        		        });
        		        $("#num-jian").bind('click',function(){
        		           var inputNum = Number($("#input-num").val());
        	               var jiage = Number($("#tijiao").text().substring(1));
        	               var orderPrice = Number('<?php echo $order_price; ?>');
        	               if(index_s != null){
            		           for(var i = 0;i < index_s.length; i++){
            		               if(i<index_s.length-1){
                		               if(index_s[i] <= inputNum && inputNum < index_s[i+1]){
                                         var zhekou = map.get(index_s[1]);
                                         $("#tijiao").text('￥'+(orderPrice*inputNum-zhekou));
                                      }
            		               }else{
            		                   if(index_s[i] <= inputNum){
                                         var zhekou = map.get(index_s[i]);
                                         $("#tijiao").text('￥'+(orderPrice*inputNum-zhekou));
                                      } 
            		               }
            		                if(index_s[0] > inputNum){
                                         $("#tijiao").text('￥'+(orderPrice*inputNum));
                                    } 
            		           }
        	               }else{
        	                   $("#tijiao").text('￥'+orderPrice*inputNum);
        	               }
        		        });
                    }else{
                        //这里是控制优惠的方法   无优惠
                           $("#num-jia").bind('click',function(){
        		           var inputNum = Number($("#input-num").val());
        	               var orderPrice = Number('<?php echo $order_price; ?>');
        	               $("#tijiao").text('￥'+orderPrice*inputNum);
        	               
        		        });
        		        $("#num-jian").bind('click',function(){
        		           var inputNum = Number($("#input-num").val());
        	               var orderPrice = Number('<?php echo $order_price; ?>');
        	               $("#tijiao").text('￥'+orderPrice*inputNum);
        		        });
                    }
		        
		    });
		       
		    
		var num_jia = document.getElementById("num-jia");
        var num_jian = document.getElementById("num-jian");
        var input_num = document.getElementById("input-num");

        num_jia.onclick = function() {
            input_num.value = parseInt(input_num.value) + 1;
        }

        num_jian.onclick = function() {

            if(input_num.value <= 0) {
                input_num.value = 0;
            } else {
                input_num.value = parseInt(input_num.value) - 1;
            }
        }
		    
		</script>
	</body>

</html>
