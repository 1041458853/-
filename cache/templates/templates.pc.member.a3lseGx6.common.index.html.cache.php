<html lang="zh-cmn-Hans" style="height: 100%; font-size: 50px;">
    
    <head>
        <title>我的</title>
        <!--<link rel="icon" href="/xiaoe-logo.ico" type="image/x-ico">-->
        <meta charset="UTF-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="format-detection" content="telephone=no">
        <script type="text/javascript">
        var memberpath = "<?php echo MEMBER_PATH; ?>";
        </script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/<?php echo SITE_LANGUAGE; ?>.js"></script>
        <script src="<?php echo THEME_PATH; ?>admin/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="<?php echo THEME_PATH; ?>js/ui-dialog.css">
        <script type="text/javascript" t src="<?php echo THEME_PATH; ?>js/dialog-plus.js"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/jquery.artDialog.js?skin=default"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/dayrui.js"></script>
        <script src="https://hm.baidu.com/hm.js?17bc0e24e08f56c0c13a512a76c458fb"></script>
        <script>
            $(function(){
                $(".operation_item.user_info_item.pressGreyBg").bind('click',function(){
                    window.location.href='<?php echo SITE_URL; ?>?s=member&c=account';
                })
                $(".operation_item.pressGreyBg.wodeshouyi").bind('click',function(){
                    window.location.href='<?php echo SITE_URL; ?>?s=member&c=account&m=wodeshouyi';
                })
                $(".operation_item.pressGreyBg.yaoqingma").bind('click',function(){
                    window.location.href='<?php echo SITE_URL; ?>index.php/?s=mall&c=home&m=yaoqingma';
                })
                $(".operation_item.pressGreyBg.wodeyigou").bind("click",function(){
                    window.location.href='<?php echo SITE_URL; ?>?s=member&c=home&m=wodeyigou';
                });
            })
        </script>
        <style type="text/css">
        /**
 * Swiper 3.4.2
 * Most modern mobile touch slider and framework with hardware accelerated transitions
 * 
 * http://www.idangero.us/swiper/
 * 
 * Copyright 2017, Vladimir Kharlampidi
 * The iDangero.us
 * http://www.idangero.us/
 * 
 * Licensed under MIT
 * 
 * Released on: March 10, 2017
 */
        .swiper-container {
            margin-left: auto;
            margin-right: auto;
            position: relative;
            overflow: hidden;
            /* Fix of Webkit flickering */
            z-index: 1;
        }
        .swiper-container-no-flexbox .swiper-slide {
            float: left;
        }
        .swiper-container-vertical>.swiper-wrapper {
            -webkit-box-orient: vertical;
            -ms-flex-direction: column;
            flex-direction: column;
        }
        .swiper-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-transition-property: -webkit-transform;
            transition-property: -webkit-transform;
            transition-property: transform;
            transition-property: transform, -webkit-transform;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
        }
        .swiper-container-android .swiper-slide, .swiper-wrapper {
            -webkit-transform: translate3d(0px, 0, 0);
            transform: translate3d(0px, 0, 0);
        }
        .swiper-container-multirow>.swiper-wrapper {
            -webkit-box-lines: multiple;
            -moz-box-lines: multiple;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .swiper-container-free-mode>.swiper-wrapper {
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
            margin: 0 auto;
        }
        .swiper-slide {
            -webkit-flex-shrink: 0;
            -ms-flex: 0 0 auto;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .swiper-container-autoheight, .swiper-container-autoheight .swiper-slide {
            height: auto;
        }
        .swiper-container-autoheight .swiper-wrapper {
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-transition-property: -webkit-transform, height;
            -webkit-transition-property: height, -webkit-transform;
            transition-property: height, -webkit-transform;
            transition-property: transform, height;
            transition-property: transform, height, -webkit-transform;
        }
        .swiper-container .swiper-notification {
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
            opacity: 0;
            z-index: -1000;
        }
        .swiper-wp8-horizontal {
            -ms-touch-action: pan-y;
            touch-action: pan-y;
        }
        .swiper-wp8-vertical {
            -ms-touch-action: pan-x;
            touch-action: pan-x;
        }
        .swiper-button-prev, .swiper-button-next {
            position: absolute;
            top: 50%;
            width: 27px;
            height: 44px;
            margin-top: -22px;
            z-index: 10;
            cursor: pointer;
            background-size: 27px 44px;
            background-position: center;
            background-repeat: no-repeat;
        }
        .swiper-button-prev.swiper-button-disabled, .swiper-button-next.swiper-button-disabled {
            opacity: 0.35;
            cursor: auto;
            pointer-events: none;
        }
        .swiper-button-prev, .swiper-container-rtl .swiper-button-next {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23007aff'%2F%3E%3C%2Fsvg%3E");
            left: 10px;
            right: auto;
        }
        .swiper-button-prev.swiper-button-black, .swiper-container-rtl .swiper-button-next.swiper-button-black {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23000000'%2F%3E%3C%2Fsvg%3E");
        }
        .swiper-button-prev.swiper-button-white, .swiper-container-rtl .swiper-button-next.swiper-button-white {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M0%2C22L22%2C0l2.1%2C2.1L4.2%2C22l19.9%2C19.9L22%2C44L0%2C22L0%2C22L0%2C22z'%20fill%3D'%23ffffff'%2F%3E%3C%2Fsvg%3E");
        }
        .swiper-button-next, .swiper-container-rtl .swiper-button-prev {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%23007aff'%2F%3E%3C%2Fsvg%3E");
            right: 10px;
            left: auto;
        }
        .swiper-button-next.swiper-button-black, .swiper-container-rtl .swiper-button-prev.swiper-button-black {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%23000000'%2F%3E%3C%2Fsvg%3E");
        }
        .swiper-button-next.swiper-button-white, .swiper-container-rtl .swiper-button-prev.swiper-button-white {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20viewBox%3D'0%200%2027%2044'%3E%3Cpath%20d%3D'M27%2C22L27%2C22L5%2C44l-2.1-2.1L22.8%2C22L2.9%2C2.1L5%2C0L27%2C22L27%2C22z'%20fill%3D'%23ffffff'%2F%3E%3C%2Fsvg%3E");
        }
        /* Pagination Styles */
        .swiper-pagination {
            position: absolute;
            text-align: center;
            -webkit-transition: 300ms;
            transition: 300ms;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            z-index: 10;
        }
        .swiper-pagination.swiper-pagination-hidden {
            opacity: 0;
        }
        /* Common Styles */
        .swiper-pagination-fraction, .swiper-pagination-custom, .swiper-container-horizontal>.swiper-pagination-bullets {
            bottom: 10px;
            left: 0;
            width: 100%;
        }
        /* Bullets */
        .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
            display: inline-block;
            border-radius: 100%;
            background: #000;
            opacity: 0.2;
        }
        button.swiper-pagination-bullet {
            border: none;
            margin: 0;
            padding: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -webkit-appearance: none;
            appearance: none;
        }
        .swiper-pagination-clickable .swiper-pagination-bullet {
            cursor: pointer;
        }
        .swiper-pagination-white .swiper-pagination-bullet {
            background: #fff;
        }
        .swiper-pagination-bullet-active {
            opacity: 1;
            background: #007aff;
        }
        .swiper-pagination-white .swiper-pagination-bullet-active {
            background: #fff;
        }
        .swiper-pagination-black .swiper-pagination-bullet-active {
            background: #000;
        }
        .swiper-container-vertical>.swiper-pagination-bullets {
            right: 10px;
            top: 50%;
            -webkit-transform: translate3d(0px, -50%, 0);
            transform: translate3d(0px, -50%, 0);
        }
        .swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 5px 0;
            display: block;
        }
        .swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 0 5px;
        }
        /* Progress */
        .swiper-pagination-progress {
            background: rgba(0, 0, 0, 0.25);
            position: absolute;
        }
        .swiper-pagination-progress .swiper-pagination-progressbar {
            background: #007aff;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            -webkit-transform: scale(0);
            transform: scale(0);
            -webkit-transform-origin: left top;
            transform-origin: left top;
        }
        .swiper-container-rtl .swiper-pagination-progress .swiper-pagination-progressbar {
            -webkit-transform-origin: right top;
            transform-origin: right top;
        }
        .swiper-container-horizontal>.swiper-pagination-progress {
            width: 100%;
            height: 4px;
            left: 0;
            top: 0;
        }
        .swiper-container-vertical>.swiper-pagination-progress {
            width: 4px;
            height: 100%;
            left: 0;
            top: 0;
        }
        .swiper-pagination-progress.swiper-pagination-white {
            background: rgba(255, 255, 255, 0.5);
        }
        .swiper-pagination-progress.swiper-pagination-white .swiper-pagination-progressbar {
            background: #fff;
        }
        .swiper-pagination-progress.swiper-pagination-black .swiper-pagination-progressbar {
            background: #000;
        }
        /* 3D Container */
        .swiper-container-3d {
            -webkit-perspective: 1200px;
            -o-perspective: 1200px;
            perspective: 1200px;
        }
        .swiper-container-3d .swiper-wrapper, .swiper-container-3d .swiper-slide, .swiper-container-3d .swiper-slide-shadow-left, .swiper-container-3d .swiper-slide-shadow-right, .swiper-container-3d .swiper-slide-shadow-top, .swiper-container-3d .swiper-slide-shadow-bottom, .swiper-container-3d .swiper-cube-shadow {
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }
        .swiper-container-3d .swiper-slide-shadow-left, .swiper-container-3d .swiper-slide-shadow-right, .swiper-container-3d .swiper-slide-shadow-top, .swiper-container-3d .swiper-slide-shadow-bottom {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 10;
        }
        .swiper-container-3d .swiper-slide-shadow-left {
            /* Safari 4+, Chrome */
            /* Chrome 10+, Safari 5.1+, iOS 5+ */
            /* Firefox 3.6-15 */
            /* Opera 11.10-12.00 */
            background-image: -webkit-gradient(linear, right top, left top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
            background-image: linear-gradient(to left, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
            /* Firefox 16+, IE10, Opera 12.50+ */
        }
        .swiper-container-3d .swiper-slide-shadow-right {
            /* Safari 4+, Chrome */
            /* Chrome 10+, Safari 5.1+, iOS 5+ */
            /* Firefox 3.6-15 */
            /* Opera 11.10-12.00 */
            background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
            /* Firefox 16+, IE10, Opera 12.50+ */
        }
        .swiper-container-3d .swiper-slide-shadow-top {
            /* Safari 4+, Chrome */
            /* Chrome 10+, Safari 5.1+, iOS 5+ */
            /* Firefox 3.6-15 */
            /* Opera 11.10-12.00 */
            background-image: -webkit-gradient(linear, left bottom, left top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
            /* Firefox 16+, IE10, Opera 12.50+ */
        }
        .swiper-container-3d .swiper-slide-shadow-bottom {
            /* Safari 4+, Chrome */
            /* Chrome 10+, Safari 5.1+, iOS 5+ */
            /* Firefox 3.6-15 */
            /* Opera 11.10-12.00 */
            background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
            /* Firefox 16+, IE10, Opera 12.50+ */
        }
        /* Coverflow */
        .swiper-container-coverflow .swiper-wrapper, .swiper-container-flip .swiper-wrapper {
            /* Windows 8 IE 10 fix */
            -ms-perspective: 1200px;
        }
        /* Cube + Flip */
        .swiper-container-cube, .swiper-container-flip {
            overflow: visible;
        }
        .swiper-container-cube .swiper-slide, .swiper-container-flip .swiper-slide {
            pointer-events: none;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            z-index: 1;
        }
        .swiper-container-cube .swiper-slide .swiper-slide, .swiper-container-flip .swiper-slide .swiper-slide {
            pointer-events: none;
        }
        .swiper-container-cube .swiper-slide-active, .swiper-container-flip .swiper-slide-active, .swiper-container-cube .swiper-slide-active .swiper-slide-active, .swiper-container-flip .swiper-slide-active .swiper-slide-active {
            pointer-events: auto;
        }
        .swiper-container-cube .swiper-slide-shadow-top, .swiper-container-flip .swiper-slide-shadow-top, .swiper-container-cube .swiper-slide-shadow-bottom, .swiper-container-flip .swiper-slide-shadow-bottom, .swiper-container-cube .swiper-slide-shadow-left, .swiper-container-flip .swiper-slide-shadow-left, .swiper-container-cube .swiper-slide-shadow-right, .swiper-container-flip .swiper-slide-shadow-right {
            z-index: 0;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        /* Cube */
        .swiper-container-cube .swiper-slide {
            visibility: hidden;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            width: 100%;
            height: 100%;
        }
        .swiper-container-cube.swiper-container-rtl .swiper-slide {
            -webkit-transform-origin: 100% 0;
            transform-origin: 100% 0;
        }
        .swiper-container-cube .swiper-slide-active, .swiper-container-cube .swiper-slide-next, .swiper-container-cube .swiper-slide-prev, .swiper-container-cube .swiper-slide-next+.swiper-slide {
            pointer-events: auto;
            visibility: visible;
        }
        .swiper-container-cube .swiper-cube-shadow {
            position: absolute;
            left: 0;
            bottom: 0px;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: 0.6;
            -webkit-filter: blur(50px);
            filter: blur(50px);
            z-index: 0;
        }
        /* Fade */
        .swiper-container-fade.swiper-container-free-mode .swiper-slide {
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }
        .swiper-container-fade .swiper-slide {
            pointer-events: none;
            -webkit-transition-property: opacity;
            transition-property: opacity;
        }
        .swiper-container-fade .swiper-slide .swiper-slide {
            pointer-events: none;
        }
        .swiper-container-fade .swiper-slide-active, .swiper-container-fade .swiper-slide-active .swiper-slide-active {
            pointer-events: auto;
        }
        .swiper-zoom-container {
            width: 100%;
            height: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            text-align: center;
        }
        .swiper-zoom-container>img, .swiper-zoom-container>svg, .swiper-zoom-container>canvas {
            max-width: 100%;
            max-height: 100%;
            -o-object-fit: contain;
            object-fit: contain;
        }
        /* Scrollbar */
        .swiper-scrollbar {
            border-radius: 10px;
            position: relative;
            -ms-touch-action: none;
            background: rgba(0, 0, 0, 0.1);
        }
        .swiper-container-horizontal>.swiper-scrollbar {
            position: absolute;
            left: 1%;
            bottom: 3px;
            z-index: 50;
            height: 5px;
            width: 98%;
        }
        .swiper-container-vertical>.swiper-scrollbar {
            position: absolute;
            right: 3px;
            top: 1%;
            z-index: 50;
            width: 5px;
            height: 98%;
        }
        .swiper-scrollbar-drag {
            height: 100%;
            width: 100%;
            position: relative;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            left: 0;
            top: 0;
        }
        .swiper-scrollbar-cursor-drag {
            cursor: move;
        }
        /* Preloader */
        .swiper-lazy-preloader {
            width: 42px;
            height: 42px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -21px;
            margin-top: -21px;
            z-index: 10;
            -webkit-transform-origin: 50%;
            transform-origin: 50%;
            -webkit-animation: swiper-preloader-spin 1s steps(12, end) infinite;
            animation: swiper-preloader-spin 1s steps(12, end) infinite;
        }
        .swiper-lazy-preloader:after {
            display: block;
            content:"";
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20viewBox%3D'0%200%20120%20120'%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20xmlns%3Axlink%3D'http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink'%3E%3Cdefs%3E%3Cline%20id%3D'l'%20x1%3D'60'%20x2%3D'60'%20y1%3D'7'%20y2%3D'27'%20stroke%3D'%236c6c6c'%20stroke-width%3D'11'%20stroke-linecap%3D'round'%2F%3E%3C%2Fdefs%3E%3Cg%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(30%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(60%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(90%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(120%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(150%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.37'%20transform%3D'rotate(180%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.46'%20transform%3D'rotate(210%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.56'%20transform%3D'rotate(240%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.66'%20transform%3D'rotate(270%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.75'%20transform%3D'rotate(300%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.85'%20transform%3D'rotate(330%2060%2C60)'%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E");
            background-position: 50%;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .swiper-lazy-preloader-white:after {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg%20viewBox%3D'0%200%20120%20120'%20xmlns%3D'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg'%20xmlns%3Axlink%3D'http%3A%2F%2Fwww.w3.org%2F1999%2Fxlink'%3E%3Cdefs%3E%3Cline%20id%3D'l'%20x1%3D'60'%20x2%3D'60'%20y1%3D'7'%20y2%3D'27'%20stroke%3D'%23fff'%20stroke-width%3D'11'%20stroke-linecap%3D'round'%2F%3E%3C%2Fdefs%3E%3Cg%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(30%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(60%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(90%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(120%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.27'%20transform%3D'rotate(150%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.37'%20transform%3D'rotate(180%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.46'%20transform%3D'rotate(210%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.56'%20transform%3D'rotate(240%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.66'%20transform%3D'rotate(270%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.75'%20transform%3D'rotate(300%2060%2C60)'%2F%3E%3Cuse%20xlink%3Ahref%3D'%23l'%20opacity%3D'.85'%20transform%3D'rotate(330%2060%2C60)'%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E");
        }
        @-webkit-keyframes swiper-preloader-spin {
            100% {
                -webkit-transform: rotate(360deg);
            }
        }
        @keyframes swiper-preloader-spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        </style>
        <style type="text/css">
        /*H5设计规范样式*/
        /*颜色*/
        .EC1 {
            color: #09BB07;
        }
        .EC1_BG {
            background-color: #09BB07;
        }
        .EC2 {
            color: #FF6B67;
        }
        .EC2_BG {
            background-color: #FF6B67;
        }
        .EC3 {
            color: #576B95;
        }
        .EC3_BG {
            background-color: #576B95;
        }
        .EC4 {
            color: #FF9B2C;
        }
        .EC4_BG {
            background-color: #FF9B2C;
        }
        .EC5 {
            color: #353535;
        }
        .EC5_BG {
            background-color: #353535;
        }
        .EC6 {
            color: #888888;
        }
        .EC6_BG {
            background-color: #888888;
        }
        .EC7 {
            color: #B2B2B2;
        }
        .EC7_BG {
            background-color: #B2B2B2;
        }
        .EC8 {
            color: #E5E5E5;
        }
        .EC8_BG {
            background-color: #E5E5E5;
        }
        .EC9 {
            color: #EFEFF4;
        }
        .EC9_BG {
            background-color: #EFEFF4;
        }
        .EC10 {
            color: #FFFFFF;
        }
        .EC10_BG {
            background-color: #FFFFFF;
        }
        /*字号*/
        .ET1 {
            font-size: 0.4rem;
        }
        .ET2 {
            font-size: 0.36rem;
        }
        .ET3 {
            font-size: 0.32rem;
        }
        .ET4 {
            font-size: 0.3rem;
        }
        .ET5 {
            font-size: 0.28rem;
        }
        .ET6 {
            font-size: 0.24rem;
        }
        .ET7 {
            font-size: 0.2rem;
        }
        /*H5设计规范样式 */
        /*全局样式重置*/
        * {
            margin: 0;
            border: 0;
            padding: 0;
        }
        body {
            background-color: #efeff4;
        }
        .vue_common {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .vue_common * {
            -webkit-box-sizing: inherit;
            box-sizing: inherit;
            word-wrap: break-word;
            word-break: break-all;
        }
        /*禁止手机端长按菜单*/
        a {
            -webkit-touch-callout: none;
        }
        /*清除浮动*/
        .clearfix:after {
            content:"";
            display: table;
            clear: both;
        }
        .clearfix {
            zoom: 1;
        }
        /*文本不能被选择*/
        button {
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-user-select: none;
        }
        /*去除ios自带的点击态*/
        a, button, input, textarea, div {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }
        /**
文字样式
 */
        /*列表标题主内容*/
        .t1 {
            font-size: 0.32rem;
        }
        /*副标题、次要描述*/
        .t2 {
            font-size: 0.28rem;
        }
        /*辅助信息、弱化内容*/
        .t3 {
            font-size: 0.24rem;
        }
        /*tab底部等描述信息*/
        .t4 {
            font-size: 0.22rem;
        }
        /*界面主要描述*/
        .t5 {
            font-size: 0.32rem;
        }
        /*按钮字号*/
        .t6 {
            font-size: 0.36rem;
        }
        /*大标题*/
        .t7 {
            font-size: 0.4rem;
        }
        /*小图标*/
        .t8 {
            font-size: 0.2rem;
        }
        .c0_white {
            color: white;
        }
        .c1 {
            color: #09BB07;
        }
        .c2 {
            color: #353535;
        }
        .c3 {
            color: #888888;
        }
        .c4 {
            color: #576B95;
        }
        .c5 {
            color: #E64340;
        }
        .c6 {
            color: #b2b2b2;
        }
        .c7 {
            color: #2f96e6;
        }
        .c8 {
            color: #757575;
        }
        .c9 {
            color: #32cc6e;
        }
        .c10 {
            color: #3cca72;
        }
        .c11 {
            color: #6bd06a;
        }
        .c12 {
            color: #546a94;
        }
        .c13 {
            color: #1bc570;
        }
        .c14 {
            color: #00c674;
        }
        .c15 {
            color: #ff7d2a;
        }
        .c_green_normal {
            background-color: #09bb07;
        }
        /*清除浮动*/
        .clearfix:after {
            content:"";
            display: table;
            clear: both;
        }
        .clearfix {
            zoom: 1;
        }
        /*点击态*/
        /*绿色的点击态*/
        .PressGreenBg:active {
            background-color: rgba(9, 187, 7, 0.2) !important;
            border-color: rgba(9, 187, 7, 0.2) !important;
        }
        /*灰色的点击态*/
        .pressGreyBg:active {
            background-color: rgba(125, 125, 125, 0.2) !important;
            border-color: rgba(125, 125, 125, 0.2) !important;
        }
        /*蓝色的点击态*/
        .pressBlueBg:active {
            background-color: rgba(43, 143, 247, 0.2) !important;
            border-color: rgba(43, 143, 247, 0.2) !important;
        }
        /*通用点击态*/
        .pressActive:active {
            opacity: 0.5;
        }
        .navi_href {
            height: 100%;
            width: 0.64rem;
            position: absolute;
        }
        .navi_hrefIcon {
            width: 0.3rem;
            height: 0.3rem;
            position: absolute;
            left: 50%;
            margin-left: -0.15rem;
            top: 0.2rem;
        }
        .navi_hrefWord {
            font-size: 0.18rem;
            color: #fff;
            text-align: center;
            margin-top: 0.6rem;
        }
        .navi_href:nth-child(1) {
            left: 0.3rem;
        }
        .navi_href:nth-child(2) {
            left: 1rem;
        }
        .navi_href:nth-child(3) {
            left: 1.7rem;
        }
        .navi_href:nth-child(4) {
            left: 2.6rem;
        }
        .naviControl_icon {
            width: 0.3rem;
            height: 0.3rem;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-left: -0.15rem;
            margin-top: -0.15rem;
        }
        .navi_close {
            animation: naviClose 0.2s 1;
            -webkit-animation: naviClose 0.2s 1;
            /* Safari 和 Chrome */
        }
        .navi_open {
            animation: naviOpen 0.2s 1;
            -webkit-animation: naviOpen 0.2s 1;
            /* Safari 和 Chrome */
        }
        @-webkit-keyframes naviClose {
            0% {
                width: 3.4rem;
            }
            100% {
                width: 1rem;
            }
        }
        @keyframes naviClose {
            0% {
                width: 3.4rem;
            }
            100% {
                width: 1rem;
            }
        }
        @-webkit-keyframes naviOpen {
            0% {
                width: 1rem;
            }
            100% {
                width: 3.4rem;
            }
        }
        @keyframes naviOpen {
            0% {
                width: 1rem;
            }
            100% {
                width: 3.4rem;
            }
        }
        .navi_openIcon {
            background: url("<?php echo HOME_THEME_PATH;  echo HOME_THEME_PATH; ?>images/navi/nav_open.png") center center;
            background-repeat: no-repeat;
            background-size: 100%;
        }
        .navi_closeIcon {
            background: url("<?php echo HOME_THEME_PATH;  echo HOME_THEME_PATH; ?>images/navi/nav_close.png") center center;
            background-repeat: no-repeat;
            background-size: 100%;
        }
        /*图文可选中*/
        .select {
            -webkit-touch-callout: initial;
            -webkit-user-select: initial;
            -moz-user-select: initial;
            -ms-user-select: initial;
            user-select: initial;
        }
        /*不可选中*/
        .un_select {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        /*禁止图片保存的蒙版*/
        .desc-mb {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
        }
        img {
            -webkit-touch-callout: none;
            /* iOS Safari */
            -webkit-user-select: none;
            /* Chrome/Safari/Opera */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
            user-select: none;
        }
        </style>
        <style type="text/css">
        body {
            width: 100%;
            height: 100%;
        }
        .homeWrapper {
            width: 100%;
            height: 100%;
        }
        .page_wrapper {
            min-height: 100%;
            padding-bottom: 3.46rem;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .footer_logo_wrapper {
            margin-top: -3.46rem;
            height: 2.46rem;
        }

        </style>
        <style type="text/css">
        .first_no_margin_top {
            margin-top: 0 !important;
        }
        .teambuy_tip {
            min-width: 0.9rem;
            height: 0.32rem;
            line-height: 0.32rem;
            border: 1px solid #ff6b67;
            color: #e64340;
            margin-top: 0.12rem;
            margin-right: -0.07rem;
            border-radius: 0.02rem;
            text-align: center;
            display: inline-block;
            float: right;
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
            font-size: 0.2rem;
            -webkit-transform-origin: left;
            transform-origin: left;
        }

        </style>
        <style type="text/css">
        .search_wrapper[data-v-2477b5de] {
            height: 0.9rem;
            position: relative;
            background: #fff;
        }
        .search_text[data-v-2477b5de] {
            width: 6.9rem;
            height: 0.6rem;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -0.3rem 0 0 -3.45rem;
            background: #f7f7f7;
            border-radius: 0.08rem;
            text-align: center;
            line-height: 0.6rem;
            color: #B2B2B2;
            font-size: 0.28rem;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            display: -webkit-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-justify-content: center;
        }
        .search_icon[data-v-2477b5de] {
            width: 0.24rem;
            height: 0.24rem;
            margin-right: 0.1rem;
        }
 
        </style>
        <style type="text/css">
        .activityPart {
            padding: 0 0.3rem;
            background-color: #fff;
            margin-top: 0.2rem;
            overflow: hidden;
        }

        </style>
        <style type="text/css">
        .contentList-title {
            line-height: 0.8rem;
            height: 0.8rem;
        }
        .partTitle {
            float: left;
            max-width: 5rem;
            line-height: 0.8rem;
            height: 0.8rem;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .selectAll {
            display: inline-block;
            float: right;
            padding: 0 0.3rem;
            margin-right: -0.3rem;
        }
  
        </style>
        <style type="text/css">
        .listWrapper[data-v-25593c85] {
            position: relative;
            background-color: #fff;
        }
        .content-wrapper[data-v-25593c85] {
            margin-left: -0.3rem;
            margin-right: -0.3rem;
            padding: 0 0.3rem;
            display: block;
            text-decoration: none;
            overflow: hidden;
            border: 0;
        }
        .contentMain[data-v-25593c85] {
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0.3rem 0;
            border-bottom: 1px solid #f3f3f3;
            overflow: hidden;
            display: table;
            -webkit-tap-highlight-color: transparent;
        }
        .no_border_bottom[data-v-25593c85] {
            border-bottom: none;
        }
        .content-pic-wrapper[data-v-25593c85] {
            overflow: hidden;
            position: relative;
            width: 1.6rem;
            height: 1.2rem;
            margin-right: 0.2rem;
        }
        .content-pic[data-v-25593c85] {
            float: left;
            width: 1.6rem;
            height: 1.2rem;
            border-radius: .08rem;
        }
        .content-info[data-v-25593c85] {
            overflow: hidden;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            display: table-cell;
            vertical-align: middle;
            width: 5rem;
        }
        .content-title[data-v-25593c85] {
            height: .8rem;
            line-height: 0.4rem;
            margin-bottom: .16rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            word-break: break-all;
            max-width: 5rem;
        }
        .content-status[data-v-25593c85] {
            width: 5.0rem;
            height: 0.3rem;
        }
        .activity_text[data-v-25593c85] {
            position: absolute;
            right: 0;
            top: 0;
            z-index: 9;
            color: #fff;
            padding: 0 0.03rem;
            border-top-right-radius: .08rem;
        }
        .c_green_normal[data-v-25593c85] {
            background-color: rgba(9, 187, 7, 1);
        }

        <style type="text/css">
        .recommend-part[data-v-20ffbaa0] {
            padding: 0 0.3rem;
            background-color: #fff;
            margin-top: 0.2rem;
            overflow: hidden;
        }

        </style>
        <style type="text/css">
        .resource-item {
            font-size: 0;
        }
        .listWrapper {
            position: relative;
            /*padding: 0 .3rem;*/
            background-color: #fff;
        }
        .content-wrapper {
            margin-left: -0.3rem;
            margin-right: -0.3rem;
            padding: 0 0.3rem;
            display: block;
            text-decoration: none;
            overflow: hidden;
            border: 0;
        }
        .content_main {
            width: 100%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0.3rem 0;
            border-bottom: 1px solid #f3f3f3;
            overflow: hidden;
            display: table;
            -webkit-tap-highlight-color: transparent;
        }
        .no_border_bottom_resource {
            border-bottom: none;
        }
        .content-pic-wrapper {
            overflow: hidden;
            position: relative;
            width: 1.6rem;
            height: 1.2rem;
            margin-right: 0.2rem;
        }
        .srcType {
            position: absolute;
            right: 0.1rem;
            top: 0.7rem;
            width: 0.42rem;
            height: 0.42rem;
            z-index: 9;
        }
        .content-pic {
            float: left;
            width: 1.6rem;
            height: 1.2rem;
            border-radius: .08rem;
        }
        .content-info {
            overflow: hidden;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            display: table-cell;
            vertical-align: middle;
        }
        .content-title {
            display: block;
            max-height: 0.72rem;
            line-height: 0.36rem;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            word-break: break-all;
            max-width: 5rem;
            text-overflow: ellipsis;
        }
        .productName {
            float: left;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
            max-width: 3.2rem;
            height: 0.4rem;
            line-height: 0.4rem;
            white-space: nowrap;
            margin: 0.1rem 0;
        }
        .productNameLong {
            width: 5rem;
        }
        .newContentType {
            height: 0.4rem;
            line-height: 0.4rem;
            padding-top: 0.02rem;
            float: right;
            margin: 0.1rem 0;
        }
        .productTitleWrapper {
            width: 5rem;
        }
        .contontType {
            height: 0.4rem;
            line-height: 0.4rem;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 5rem;
            margin-bottom: 0.2rem;
            float: right;
        }
        .content-status {
            width: 5.0rem;
            height: 0.3rem;
        }
        .content-littleIcon {
            float: left;
            height: 0.24rem;
            width: 0.24rem;
            margin-right: 0.06rem;
            margin-top: 0.03rem;
        }
        .content-num {
            float: left;
            height: 0.3rem;
            line-height: 0.3rem;
        }
        .content-count {
            float: left;
            margin-right: 0.2rem;
            height: 100%;
            overflow: hidden;
        }
        .content-time {
            float: right;
            height: 0.3rem;
            line-height: 0.3rem;
        }
        .activity_text {
            position: absolute;
            right: 0;
            top: 0;
            z-index: 9;
            color: #fff;
            padding: 0 0.03rem;
            border-top-right-radius: .08rem;
        }
        .c_green_normal {
            background-color: rgba(9, 187, 7, 1);
        }
        .free-tips {
            color: #65c131;
            border: 1px solid #65c131;
            border-radius: .02rem;
            height: 0.3rem;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-align: center;
            padding: 0 .02rem;
        }
     
        </style>
        <style type="text/css">
        .font-size-32>.money[data-v-7536231f] {
            font-size: 0.32rem;
        }
        .font-size-32>.sign[data-v-7536231f] {
            font-size: 0.16rem;
        }
        .font-size-32>.sign>span[data-v-7536231f] {
            display: inline-block;
            line-height: 1;
            -webkit-transform: translateY(33.3%);
            transform: translateY(33.3%);
        }
        .font-size-36>.money[data-v-7536231f] {
            font-size: 0.36rem;
        }
        .font-size-36>.sign[data-v-7536231f] {
            font-size: 0.18rem;
        }
        .font-size-36>.sign>span[data-v-7536231f] {
            display: inline-block;
            line-height: 1;
            -webkit-transform: translateY(33.3%);
            transform: translateY(33.3%);
        }
        .font-size-48>.money[data-v-7536231f] {
            font-size: 0.48rem;
        }
        .font-size-48>.sign[data-v-7536231f] {
            font-size: 0.24rem;
        }
        .font-size-48>.sign>span[data-v-7536231f] {
            display: inline-block;
            line-height: 1;
            -webkit-transform: translateY(33.3%);
            transform: translateY(33.3%);
        }
        .font-size-54>.money[data-v-7536231f] {
            font-size: 0.54rem;
        }
        .font-size-54>.sign[data-v-7536231f] {
            font-size: 0.27rem;
        }
        .font-size-54>.sign>span[data-v-7536231f] {
            display: inline-block;
            line-height: 1;
            -webkit-transform: translateY(33.3%);
            transform: translateY(33.3%);
        }
        .font-size-64>.money[data-v-7536231f] {
            font-size: 0.64rem;
        }
        .font-size-64>.sign[data-v-7536231f] {
            font-size: 0.32rem;
        }
        .font-size-64>.sign>span[data-v-7536231f] {
            display: inline-block;
            line-height: 1;
            -webkit-transform: translateY(33.3%);
            transform: translateY(33.3%);
        }
        .margin-sub-patch[data-v-7536231f] {
            margin-bottom: 0 !important;
        }
        /*粉红色背景*/
        .pink-bg[data-v-7536231f] {
            background-color: #fff4e7 !important;
        }
        /*橙色背景*/
        .orange-bg[data-v-7536231f] {
            background-color: #f7a807 !important;
        }
        .info-title[data-v-7536231f] {
            display: -webkit-box;
            width: 3.4rem;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .user-detail-time>span[data-v-7536231f] {
            display: block;
        }
        .info>.user-detail-time[data-v-7536231f] {
            position: absolute;
            left: 0.2rem;
            bottom: 0.06rem;
            font-size: 0.2rem;
        }
        .info[data-v-7536231f] {
            display: inline-block;
            width: 3.4rem;
            height: 1.52rem;
            padding: 0.12rem 0.1rem 0.06rem 0.2rem;
            position: absolute;
            background-color: #fff;
            font-size: 0;
            -webkit-box-shadow: 0 1px 3px 0 rgba(166, 170, 177, 0.1);
            box-shadow: 0 1px 3px 0 rgba(166, 170, 177, 0.1);
        }
        .price>.sign[data-v-7536231f] {
            position: absolute;
            top: 0.2rem;
            left: 0.31rem;
            height: 0.9rem;
            line-height: 0.9rem;
        }
        .price>.limit[data-v-7536231f] {
            display: block;
            width: 1.89rem;
            padding-left: 0.11rem;
            position: absolute;
            bottom: 0.2rem;
            left: 0;
            text-align: center;
        }
        .price>.money[data-v-7536231f] {
            display: block;
            width: 1.03rem;
            height: 0.9rem;
            line-height: 0.9rem;
            padding-left: 0.53rem;
            position: absolute;
            left: 0;
            top: 0.2rem;
            text-align: center;
            white-space: nowrap;
        }
        .price[data-v-7536231f] {
            display: inline-block;
            width: 2rem;
            height: 1.7rem;
            position: relative;
            font-size: 0.28rem;
            vertical-align: top;
            background: url(<?php echo HOME_THEME_PATH;  echo HOME_THEME_PATH; ?>images/coupon/pic-coupon-bg.png);
            background-size: 100% 100%;
            color: #fff;
        }
        .coupon-more-item[data-v-7536231f] {
            margin-bottom: 0.2rem;
            position: relative;
            font-size: 0;
        }
        .coupon-win-more[data-v-7536231f] {
            width: 5.7rem;
            max-height: 3.2rem;
            padding-right: 0.2rem;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
        }
        .coupon-win-wrapper-more[data-v-7536231f] {
            width: 5.7rem;
            margin: 0.4rem auto 0;
            overflow: hidden;
        }
        .use-time[data-v-7536231f] {
            font-size: 0.2rem;
            color: #fff;
            text-align: center;
            margin-top: 0.2rem;
        }
        .coupon-item>div[data-v-7536231f] {
            display: inline-block;
            width: 3.24rem;
            vertical-align: top;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .coupon-item>span[data-v-7536231f] {
            position: absolute;
            bottom: 0.2rem;
            left: 1.76rem;
            color: #ff6b67;
        }
        .coupon-item>img[data-v-7536231f] {
            width: 1.36rem;
            height: 1rem;
            margin-right: 0.2rem;
            vertical-align: top;
        }
        .show-coupon-btn[data-v-7536231f]:active {
            opacity: 0.5;
        }
        .show-coupon-btn[data-v-7536231f] {
            width: 2.8rem;
            height: 0.7rem;
            line-height: 0.7rem;
            color: #fff;
            background-color: #f66d29;
            text-align: center;
            border-radius: 0.08rem;
            margin: 0.4rem auto 0;
        }
        .coupon-item[data-v-7536231f] {
            display: block;
            height: 1rem;
            position: relative;
            margin: 0 0.2rem 0.2rem;
            padding: 0.2rem;
            background-color: #fff;
            font-size: 0;
        }
        .coupon-win-hint[data-v-7536231f] {
            width: 100%;
            height: 0.52rem;
            line-height: 0.52rem;
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
            background-color: #fff7ee;
            border-top-left-radius: 0.05rem;
            border-top-right-radius: 0.05rem;
        }
        .coupon-win[data-v-7536231f] {
            width: 5.6rem;
            max-height: 3.6rem;
            padding-top: 0.52rem;
            padding-right: 0.2rem;
            overflow: auto;
            border-radius: 0.04rem;
            background-color: #fff7ee;
            -webkit-overflow-scrolling: touch;
        }
        .coupon-win-wrapper[data-v-7536231f] {
            position: relative;
            width: 5.6rem;
            margin: 0.32rem auto 0;
            overflow: hidden;
            border-radius: 0.05rem;
        }
        .coupon-hint[data-v-7536231f] {
            width: 100%;
            position: absolute;
            top: 1.4rem;
            left: 0;
            text-align: center;
            font-size: 0.36rem;
            color: #fff;
        }
        .head-img[data-v-7536231f] {
            width: 100%;
            position: absolute;
            top: -0.23rem;
            left: 0;
            border-radius: 0.08rem 0 0 0.08rem;
        }
        .coupon-close[data-v-7536231f] {
            width: 0.86rem;
            height: 0.7rem;
            position: absolute;
            right: 0;
            top: 0;
        }
        .coupon-container[data-v-7536231f] {
            width: 6.1rem;
            /*height: 4.32rem;*/
            padding-top: 2.1rem;
            padding-bottom: 0.4rem;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            border-radius: 0.08rem;
            background-color: #fff;
        }
        .coupon-bg[data-v-7536231f] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .coupon-alert-wrapper[data-v-7536231f] {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1001;
        }
   
        </style>
        <style type="text/css">
        .message_list {
            background-color: #ffffff;
        }
        .dropload-container .hint {
            color: #b2b2b2 !important;
        }
        .noMessageTips {
            text-align: center;
        }
        .noMessageTips>img {
            width: 2rem;
            height: 2rem;
            margin-top: 40%
        }
        .noMessageTips>p {
            font-size: 0.4rem;
            margin-top: 0.1rem
        }
     
        </style>
        <style type="text/css">
        .dropload-container[data-v-50d89e3e] {
            width: 100%;
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
            -webkit-transform: translate3d(0, 0, 0);
        }
        .hint[data-v-50d89e3e] {
            width: 100%;
            height: 0.5rem;
            line-height: 0.5rem;
            text-align: center;
        }
        
        </style>
        <style type="text/css">
        .loading[data-v-50d89e3e] {
            display: inline-block;
            height: 0.2rem;
            width: 0.2rem;
            border-radius: 100%;
            margin: 0.04rem;
            border: 0.01rem solid #666;
            border-bottom-color: transparent;
            vertical-align: middle;
            -webkit-animation: rotate 0.75s linear infinite;
            animation: rotate 0.75s linear infinite;
        }
        
        </style>
        <style type="text/css">
        .navigation_wrapper {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-justify-content: center;
            height: 0.33rem;
            padding: 0.6rem 0 0.6rem 0;
            -webkit-box-sizing: content-box !important;
            box-sizing: content-box !important;
        }
        .navigation_item {
            padding: 0 0.15rem;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border-right: solid 1px #b2b2b2;
        }
        .navigation_item:last-child {
            border-right: none;
        }
        .logo_wrapper {
            text-align: center;
            background-color: transparent;
            padding-bottom: 0.3rem;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            height: 0.93rem;
        }
        .logo_img {
            display: block;
            width: 2.51rem;
            height: 0.63rem;
            margin: 0 auto;
        }
     
        </style>
        <style type="text/css">
        .dec-4[data-v-4031cc43] {
            border-bottom: 1px solid #dadada;
            border-right: 1px solid #dadada;
            bottom: 0;
            right: 0;
            -webkit-transform-origin: bottom right;
            transform-origin: bottom right;
        }
        .dec-3[data-v-4031cc43] {
            border-bottom: 1px solid #dadada;
            border-left: 1px solid #dadada;
            bottom: 0;
            left: 0;
            -webkit-transform-origin: bottom left;
            transform-origin: bottom left;
        }
        .dec-2[data-v-4031cc43] {
            border-top: 1px solid #dadada;
            border-right: 1px solid #dadada;
            top: 0;
            right: 0;
            -webkit-transform-origin: top right;
            transform-origin: top right;
        }
        .dec-1[data-v-4031cc43] {
            border-top: 1px solid #dadada;
            border-left: 1px solid #dadada;
            top: 0;
            left: 0;
            -webkit-transform-origin: top left;
            transform-origin: top left;
        }
        .dec[data-v-4031cc43] {
            display: block;
            width: 0.8rem;
            height: 0.8rem;
            position: absolute;
            -webkit-transform: scale(0.5);
            transform: scale(0.5);
        }
        .img-code[data-v-4031cc43] {
            margin: 0.4rem auto;
            position: relative;
            width: 2.3rem;
            height: 2.3rem;
        }
        .account-code-container[data-v-4031cc43] {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100000000;
        }
        .account-code-bg[data-v-4031cc43] {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .content-main[data-v-4031cc43] {
            position: absolute;
            top: 2.6rem;
            left: 50%;
            transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
            width: 5rem;
            height: 5.4rem;
            border-radius: 0.14rem;
            background-color: #fff;
        }
        .content-main .close[data-v-4031cc43] {
            width: 0.24rem;
            height: 0.24rem;
            position: absolute;
            top: 0.1rem;
            right: 0.1rem;
            padding: 0.2rem;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
        }
        .content-main>.title[data-v-4031cc43] {
            margin-top: 0.7rem;
            text-align: center;
            color: #fdab46;
        }
        .content-main>.hint-sentence[data-v-4031cc43] {
            margin-top: 0.2rem;
            text-align: center;
        }
        .code[data-v-4031cc43] {
            display: block;
            width: 1.9rem;
            height: 1.9rem;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);

        </style>
        <style type="text/css">
        /*底部tab*/
        .tab_selector {
            z-index: 100;
            position: fixed;
            left: 0;
            bottom: 0;
            height: 1rem;
            width: 100%;
            border-top: 0.3rem solid transparent;
        }
        /*内部包裹*/
        .tab_selector_inner {
            border-top: 1px solid #eee;
            position: relative;
            width: 100%;
            height: 100%;
            background-color: #fff;
        }
        .tab_item {
            float: left;
            height: 100%;
            width: 50%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            position: relative;
            color: #b2b2b2;
        }
        .tab_item.activeTab {
            color: #09BB07;
        }
        .tab_hint {
            text-align: center;
            width: 100%;
            margin-top: 0.1rem;
        }
        .tab_hint_text {
        }
        .tab_icon_box {
            width: 100%;
            height: 0.42rem;
            text-align: center;
            margin-top: 0.1rem;
        }
        .tab_icon {
            width: 0.42rem;
            height: 0.42rem;
            padding: 0;
        }
        .tabImgWrapper {
            width: 0.42rem;
            height: 0.42rem;
            padding: 0;
            display: inline-block;
        }
        /*tabIcon*/
        .homeIcon .tabIcon {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAABGdBTUEAALGPC/xhBQAABN9JREFUWAntmE1oHGUYx7sfSbUkUKVQ40UFIa1eLF3opVRXCV2z2UDRfghpDIJUCETahuIHiIeKVaqiFy0BP9tDD6Im2WRDrGulPRSExkurp9JbD9KWJqTtppv19x9mlpnpzO7M7iStkBeG9+t5/s9vnnn3fWc2tiqiMjY29gJSQ5VKJSXJWCz2J9UXuVzulPrNllizAoDFxsfHj6KzX227HrAV+p/19PQMm237dKh2PJS1h3E+n/8SwANM3QbmYGtr66O61NaY5mTj4RpqyJGBUJ4Yk8lPFxcX99O8CVg3j/l3uwbL4TlAJxh7MB6PK7O6oYZKwxkdHR39wIQsAbHDDSkajWmOZkm28mmIEqeGQAn4Lr7vkMU7iURiF5ma8gPQnGxkKx/T18/cdzw0KIH0qA9zLXL1ZbPZX3zVzQnTps/0OWxq1HNzzIdaowTYh/dXZKfCI30NgG8danU6/KgGWAJfm7vDG729vcfquFSnA2eUH0Y/gMavl3owLKQiyke+aktLmmoHKYFA+XXvJAtGJsjkMOuu4e1GvtJQVqUp7UhAuescgicQSxDgPQJ9EkS4lo00pCVNaStGLXvN1VyjrKku1tQYYqt5VEfYbt6uJxhmHsAP0X4L7duA51ga037+vqBAbgNyEqE1COnMftNPpJlxYD8nxhAx5oF9Edg/vPQ8QYHcUi6XdXftCIzwqPZR69yOvACpd4Vj1K8jPsue2wXsOXegu0CBfAbIIoZruY6TyVeB1J65ZAXIOJn9jgDaa68DmwZ2xh7QAToxMfEUkKdxXAfcj2RyN3XZ7rBUbWImyOxJ6peI+S+wz3Z3d1+w4lW3p0Kh8CSQv5qQ+Y6OjleWC1IwimXGzItBLGJygPK4HyuVSr9h0IHDqba2tpdTqdSCZbRctWIqthjEIiaxKX6sWCy2zc7O6m28E4Mz1NtZl/OavFeF9bqG2FPAbqX+p729PRWfm5vTq1cn13nWRfZeQ8Kh18N5sYiJq1OMcaj3aDKZTPaxeG+ofT8UsfClsFcsYkxSJ9Rh8e5kPVxW21YKbBNXbP0laxL7EcQz9gALCwvG+mQskWRdHoVYR9n7wNrt9EtMM7AsoJyCG2D4xgFgdsSYZD0c4T3zL46vLgwf1hy17my9abesFVBKjPHFQPsqNzAN46Qe/SpeYCepdBmFX10R2ECgPLIMYj3Yb0TYWEaWDmNlxi6ShHGWUMEar1P/DdiA28YAdQ8G7fMk9rJcvrfsAbOa1Zqx57EZxLafhPxQnQjZ8AN1HK01NIc1R9Y+ZjuZAsjxTsBYnLHtwB7CTLaRg96dGhG5CoCPK4stLS0fZTKZq65po8sxOMMJc0i2XvNBx6pnfVAHl51xQ2TOuV3YjGxzgW7e5upoNgtqiHFY+C6VWnMOkjqdSEDrxIhkegU0kjTaRFYyaktGJM3/d0bZxG8pDZzRD0SSjgAiViwrttvFM6OcIsbXH05Pux2Wqm/FsmK74/iBnpUhb0WDfEKvdjtF3VcMxTJ1z3jpe4LySvYTd6Z/K57gpWIaoU3csaetl2jQMWlKWzEUSzH5L+FnL3/fo48/AzZyl3kJeDnax/hKfCidTl+3j1ltvnLX8pV7zerXqC+xTrOAXvSy8c2SHHDczF2OcF3hauqlwiu4NE3tEcXyg5Tvf6etLp7U9ugZAAAAAElFTkSuQmCC") no-repeat;
            background-size: 100% 100%;
        }
        .homeIcon.activeTab .tabIcon {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAMAAADyHTlpAAAAaVBMVEUAAAAQvxAJvAgKvQcJvAcKvAcKvAgJuwgMvAgJvAcJvAcKvAgKvAgKvQgJvQkKvQgLvggOvgcOxQ7///8KuwgKvAgKuwcJvAcKvAgKuwkKvAcLuwgKvQoJvgkLvwsMvAwMwQwVvxUJuwfKW/RhAAAAInRSTlMAD7+O+u3o5T/026CZe1NHQiERAci3sYmFdGdeTTcwKikMX+P4LgAAANxJREFUOMvt0skOgjAUheGrVwoyCyrzdN//ITVAY6GlbcLWf/0lZ3NALn277jsFcznSHOZGGtJaaJJIxEO9LEmo1MmINkXHsqJd1ZGsSapWy4YUNSoZ31T0FsuyXaRs271MuJRtspXenQ67e6LsuFTb7id7h7Q5PZeDJCU7LPLhkjH3waWdnXyyyp8AyTIEZksZOLbUgciWRgAJBgEzbAcB8idc9fQ6o1O0SL1vaWFBM5jLLOgF5i5/ep6+9PQlUNRTFGisp7FA86eOPnMQGv1j6o+wKQuZmrIwW8kHfYCI2UdhzwUAAAAASUVORK5CYII=") no-repeat;
            background-size: 100% 100%;
        }
        .messageIcon .tabIcon {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAABGdBTUEAALGPC/xhBQAABjRJREFUWAnNmGtsVEUUx9ntA/tAaKuFViGk8d1+MKYkigQhKaQtLfgBLPFBFEPaEhIDRjESSQwxxhcxRkSEiKAfAA2S1r5oQ7WpTZRKMNogoI2vAKUvte/n+vvf3rtsd/d2d7HtOsnszJyZc85vz52ZO3MdM64zlZaWxjqdzqWjo6NZLpfrNszMVXY4HMkyiewqRYsysp8ZW8PYuvz8/F71h5ocoSiUl5fPHBkZ2QDEepw/SDkzFH10BtD5mvJIRETE4dzc3IFg9YMCra2tje/p6SkkItswnGoaH6E8jdNqciO5JTIyUlFUVkoeHh5OBmwuOZO8AtkicoQ6SZeI8u64uLh9y5cv7x4T2f8GBOURP4z6fhzdJDMAnaF4Kz4+vhwHf0kWbOIPz+nu7s5l/LPYu0962Guj2MSUOKG2XbIFbWhoiGlvb9+NwSJTuQ6jr2DwpJ2xUOQEYCW2d6CzVHrYfj8pKWnb4sWL+/zZ8QtaWVmZMjg4WI1COgb6KZ8D8F1/Bv6rDOAt2HgD6Bsom6Kjo1dkZ2df9rbrA1pTU5PU29v7FQPTTcUCFJu8FSezTWDSCcxRy2dsbOxDWVlZ7Z4+nJ6N+vr6WX19fRVSIJI/8O+WTjWk/MuHfMmnfItBLOqz0jjQjo6OAzyCRShciImJ0SPosAZOdSlf8infYujs7Nzv6dP96MvKyrLZIysY2MM2k5GTk/Or58DpqldUVCxkW/sR2Dj22pxVq1ZVyrcRUa1w9sg9EjDgpXBByr98i0F1MYlNdQO0ra2tiM40onmG1f2OOsKZxCAWMYlNLAYowsdNsF3U9cYJazIZdgnCYnOwj90F+TkEnWlpafPS09MHw0ppOm9qaopubm6+AlsCbHcrogXqo3Hs/wIpHrGISXVSQSQ/GaohPKXSX9KexnZxe0JCwsUlS5Z0+Rtjydg97mARuJhnFy2ZvzIYmyZTIfoZiuh8GUL4u0rvxNTIBfJPHsF3KtX2HqO2HhV9ZWxx5xl7QXXJ/I0N1qYH03yBLpAx9k4fUBw6yAfJN2qMSrPt3n8lV2I+baLP/SdUl2ys99ov8qBtejAtEKhxfEtMTGy9Zm6sVlVVlUDNOLF79CWbcg+R8SfuHCegAZSPLBSbUVFR1psx0Ymxf+SA/Wrcu1UyvdYI//eqW4n2WX+vVuQ+c9yfzLR51rKn0s4mB5UU9cN4SRHVwXUGc+sWld6Jf7UWQ7XIu1XSXuc9Rm0Wzwn6t5Mvm3m7ZP7GyoZs0TehzYGBAWNaMu4PR0lJiY5Xj3AteDIvL++QP8PhkrHoniKaH+L/E/ic3woEQV64gOz8wrRGfUT/G4Faj2cNe+A8O6XplnOYTsRnDpDDnKKOOrmy/iJi6KPIG6cbyM4fC2k9fdqHq2Fs1WJSaF9XCWixrsaqhzPptor/nSaD5ujY6YnD6efUGwG9leuscS41B4Wl6Orqeg3H+upSy87xmSCsiLoQPkq7G9gNrDbVw5LwvRIWvdEGeTMVWxAGqBo6RLCwtpgde1lY91qDpqsE8gF8HSdYsDp2cdo/b/n2eWezr35Mpw7SXYCvY2+tsgZPZQmkvpycAnI2kAcI3LhzgjuiFkRqaupGBh6mPQulL0hPW31TVeJjI7brTMijBEdHu3HJJ6JWL8ovc660Vt7bq1ev3mr1TVapvXJoaGgfgGtlkwAdTElJKczMzBzy9mELqoHAFgP7HgZ+41Es9Fa+3jYnqGTe48+gv5k8B/t/k4uI5BE7mzrh2ybeCBWA2vaH0qH9mU9Fyzj85AP5BLrGNRjAKlZ3UaAr+oSggUCqq6tn9/f3v8A4vUGusPha+WNXpUfd+DZK1fg+yv58P484Sn3AUXUdJxCvsoc3ShYoXTcoq/QxIN/Eoft8QLTc/jzrEgI3TK4nn0TnU+b8T+7BQVRCBuXz+D1A7MHZMtmXc4oS8s1k3QZUKrUwRtE1vuFzMfwy0MXQ0LL5CRqUBRDHQWEnkFsBiAKwlcf7PAeGQ9RdNvYnTRwUKGCJLIBzeNWNdRSwveQdzK/OSSMJYCgoUGzoPjULuNNEcXOwCyCA75C6gwIFUJF7kX3uA+qTs1+FhMl1fqLxfKcU1EdsI5qLPtfpiXQnu+9f5GP8S+4qy/EAAAAASUVORK5CYII=") no-repeat;
            background-size: 100% 100%;
        }
        .messageIcon.activeTab .tabIcon {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAMAAADyHTlpAAAAhFBMVEUAAAAUxRQKvAgPvwcKuwcizCIJvAcJuwcJvAgKvQgJuwcJvAgKvAgJvAcJvAgMxAwKuwgNvw0KuwgKvAcKvAcKvAgKvAcJvAgLvAkKvQcJvQkMvAgLvwsKwgoJvAcJuwgNvg0JvAgKvAcKvQgKvAgLvQgKvwoKuwcKvAgMvAkRuwkJuwcuaANqAAAAK3RSTlMADO0gtgfz26BJ+cCXim8VyCfm1M3LsKlzZ1FBMBn73hLdq398XzStgVgelm/NrwAAATZJREFUOMuN1dmOgkAQQNELArILroDirrP0///fINgTiCx1niqVG5LuQKDL8KJtcnKcU7KNPINBdh74qsUPcps+RrZUH5ZZz6MLU/UyC7rsUA0KbVrKlRqxKvl3rsrR9qxLY6MmbPThdmrSrik9JeDVh79I0osNxEokBtaydA2pEkq5SdMbVz06a0eP83nP8kryniwDw6on3wPPby0bCfrNWwCLegqphK1lY8mxGUxeTH0txN1lxdeDOgCHetpS2baWjRNzfZS9sX/PUVlGH0sVsFNCLpk0jZkJy+MCEllqAYUsLahsJGXAS+pMl35K7TGd3nlzp8oQzXYF36v2PVa6Nm35YGj+0DUbvPoZsvTrCYL0GNxTGEmDLHIty43i5lcwnJoPJug0PCNLN08QpWaOzK+7YMIfvefBHwZGGQUAAAAASUVORK5CYII=") no-repeat;
            background-size: 100% 100%;
        }
        .mineIcon .tabIcon {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAABGdBTUEAALGPC/xhBQAABOBJREFUWAntmF1oHFUUxzO7m8TNxiC1iFoFQ6QUl1Yf9EEUNHRL0myyiB/1paIPJTQV9aFp2qhg9aGaQPtgUx8CrUh98ZOy2ewmEIkoDehbLaG0pUlr/QJNsMVNyGY//J3hjg2TcebOJl0rdOByZu4953f/c+bOvTPXqFrhMT4+ftvc3NxThUJhq2EYD5VKpbsFyfkvmFOBQCBdV1d3orm5+c+VdGWUGzw2Nnb7/Px8L8I6YdzqwfkL4YPhcPhALBab8fB1bC5L6NDQ0LMIPALxDqEiYgzzRTAY/KahoeHy4uJiKZvN3ovPE9Q/g40pv9+xuzo6Oj6Xaz+Hb6GI3E/Hb0knCPwKs5uOT7l1mslkNuXz+UPEbVZxbxOz3y3G3uZLqCUSgXk6fS2RSHxgB7pdp1KpLuLep4QYu++0t7ebN+wWY7VpCx0eHm4tFotpAgt0hMZExoL4sclkUl66JDFBOHFdTkCnE4AGIvvFcuzRhTuxVWy3YvWJdfKz12kJZYzJtLMRkZcikciAHeL3ur6+Xl7Ei8IUtk68llDmyAcU7CTzYV4H7OYjDG56Qnx4UlE3X6tNSyjOYRUwZwWugs0Kg6xabFekrlBXSCUabwpd7SzfzOh/klGWO3NK4g0NraIAi6U13ek++t9EIHPfXasllJs2WSThVx2mllCgPwkMe48OVMeHmzZZFtsrRksod/0joCLwpomJCa0J2q1jxbgfXkmx3dzNNi2hbW1tV/H+nru/ZXZ2dosn1cNhZmYmJizKd4rtEVFVpSVUKNy9fJrJ4+8Qu8IjIfEWU4flR+gJASL0eT6g1+rAnXwkVhjShlCT6eRnr9MWytf4GYJTFPmR22cH6V4jbq9ipBRTK1RbqND4eXsdUyQju8jMBq0eljhJDJ91LwtDsZa0up/6EhqPx0+TkeMgw4jN8Htypzv+Wqv4SozECkNY11q9z3wJFRyZeJWOznF6H9lJTk5O1nh1Iz58fA9JDOWsMLxi7O2+hcp0QkebEXueDD0yPT39hh1qv56amnqTuoflBkOhUEx3SlrK8S1UgulIVqouOSerj4r1OEwfbrBLxXq4L28uS+jIyIis0zsFR5YuL8cuqzF9ePxdKnaZg1eF1q+qBUmn003sePQg7kUeey32j+rq6idbW1snLR8ni7go2zxfE7OWmAXsRwyBfrJ7wcnfqU5LKNPKgwTvo4PnsEGKrPtf1tTU9LS0tEw7ge11o6OjjblcTvYGnqZNnmQBxmfY97y2hITlKhSBj+MjO3Zt4syRA/4xHxJ9TC/y5vs+mKbWM673wtxOsDljwMxQ3mUB+PbfgI5C2SOKA+sl6DEJBJKlDCLwULkvg10ASVgHczeCOykR1X6SPkTwsN3/H6E4BxmD2xjwsjxuEkdAs5jD7GseLndfUzhuB+N3DeNX5tVX0LBG+f5A330I/gRbkDpTKI9jGxk8gGOTWWkYP3N+sLa2dpAxaG4UKMB1M4zhyMLCQqfK8jqlY4oM9zLMPjV4BAOIkvVXMniO0t/Y2Hg8Go3mrpsqF7CsYiwiL6Cph7Je6Row2AYsyQXKd6D8Q4QWXTgVa0JkgCf9Ek/6qKnP6pnxcPRGESmaRAuajln6ylqZrOBK2v+NUHmZrjAeGiqZHb99MQyuSka75cRvcKX8lbbuvwFcRwzNZ+w0PQAAAABJRU5ErkJggg==") no-repeat;
            background-size: 100% 100%;
        }
        .mineIcon.activeTab .tabIcon {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAMAAADyHTlpAAAAbFBMVEUAAAAKuwgVyxUKvAgJvAcLvAgLvQsMwAwJvAcKuwcKvAcLvAcJvAcKvQgMvAgKvAgJuwgKvAcKuwgKvAcKvAcJvAgKvAgJvAkJvAkKvQoLvQcJvwkr1SsJvAgJvAgLvQkLvAkKvAgKuwgJuwfLj2fZAAAAI3RSTlMA6gzu2l0uFPTx0ZCMgD3l4M3HsK2ohXBUTEU3Br++d3ZjYpVrNBgAAADSSURBVDjL7dPJEsIgEEVRDBAgZp4nx/7/f3ShVZjkgVlY5ca7PpumabYukI0wWjQyYP6ChNMrnnhxKuitPHVLSaukSw60acBSmS01CtKYQDGkEaIRpAdED38KaY5oDmmJaAlpjWgN6RXRC6QhoiGDZegBcO2Wtg6q9FpqxRzF6GPjArGUwnPeIV/MZMdHVluprYQdLT2yb9HUWGpSD5wqWlRNDjieadNpBLAvCFb0SzffBTkTt9kuqcvIW9Y916YSTh/jiWJMAgixZLS739Nor4weHI98/ZJ1oDYAAAAASUVORK5CYII=") no-repeat;
            background-size: 100% 100%;
        }
        /*消息未读数提醒*/
        .message_remind {
            position: absolute;
            width: 0.36rem;
            height: 0.36rem;
            line-height: 0.36rem;
            border-radius: 50%;
            background-color: #e64340;
            left: 54%;
            top: 0.03rem;
            text-align: center;
        }
        .unread_num {
            color: #fff;
        }
       
        </style>
        <style type="text/css">
        .alert-component[data-v-0a01e5f6] {
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            overflow: hidden;
            background: transparent;
            z-index: 999999;
        }
        /*蒙版*/
        .box-mb[data-v-0a01e5f6] {
            width: 100%;
            height: 100%;
            background-color: #000;
            opacity: .5;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 9998;
        }
        /*提示盒子*/
        .alert-box[data-v-0a01e5f6] {
            width: 5.6rem;
            border-radius: .08rem;
            overflow: hidden;
            padding-top: .5rem;
            margin: auto;
            top: 50%;
            -webkit-transform: translate(0, -50%);
            transform: translate(0, -50%);
            background-color: #fff;
            position: absolute;
            left: 0;
            right: 0;
            z-index: 9999;
        }
        /*盒子标题*/
        .box-title[data-v-0a01e5f6] {
            text-align: center;
            font-size: .36rem;
            color: #000000;
            margin-bottom: .18rem;
        }
        /*提示描述*/
        .box-desc[data-v-0a01e5f6] {
            padding: 0.52rem;
            padding-bottom: .6rem;
            color: #888888;
            font-size: .3rem;
            line-height: 1.5;
            text-align: center;
            overflow: hidden;
        }
        /*底部按钮块*/
        .box-btn-item[data-v-0a01e5f6] {
            border-top: 1px solid #e5e5e5;
            height: 1rem;
        }
        /*底部按钮通用样式*/
        .box-btn[data-v-0a01e5f6] {
            height: 100%;
            font-size: .36rem;
            background-color: #fff;
            vertical-align: top;
            cursor: pointer;
            outline: none;
        }
        .btn-confirm[data-v-0a01e5f6] {
            color: #02bb00;
            width: 100%;
        }
        .btn-cancel[data-v-0a01e5f6] {
            color: #888888;
            border-right: 1px solid #e5e5e5;
        }
        .confirm-btn-item button[data-v-0a01e5f6] {
            width: 50%;
            float: left;
        }
        /*灰色的点击态*/
        .pressGreyBg[data-v-0a01e5f6]:active {
            background-color: rgba(125, 125, 125, 0.2);
        }
        .toast-box[data-v-0a01e5f6] {
            font-size: .26rem;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: auto;
            background: rgba(0, 0, 0, .7);
            color: #fff;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: 200;
            transition: 200;
            z-index: 1000000;
            border-radius: .1rem;
            white-space: nowrap;
            max-width: 6rem;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .toast-box-bottom[data-v-0a01e5f6] {
            top: 65%;
        }
        .toast-box-fat[data-v-0a01e5f6] {
            font-size: .28rem;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: auto;
            background: rgba(0, 0, 0, .7);
            color: #fff;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: 200;
            transition: 200;
            z-index: 1000000;
            border-radius: 0.08rem;
            width: 5.3rem;
            text-align: center;
            padding: 0.4rem 0.22rem;
        }
        .toast-box_text[data-v-0a01e5f6] {
            padding: .12rem .3rem;
        }
        .toast-box_success[data-v-0a01e5f6] {
            padding-top: .6rem;
            height: 2.4rem;
            width: 2.4rem;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .toast-success-icon[data-v-0a01e5f6] {
            width: .99rem;
            height: .72rem;
            margin-bottom: .3rem;
        }
        </style>
        <style type="text/css">
        .page_mine[data-v-51a89b6c] {
            width: 100%;
            height: 100%;
        }
        /* 页面顶部提醒关注的提示 */
        .subscribe_hint_container[data-v-51a89b6c] {
            position: absolute;
            top: 0;
            right: 0;
            height: 1.6rem;
            width: 1.6rem;
            z-index: 90;
            /*overflow: hidden;*/
            text-align: center;
        }
        .subscribe_hint_second_line[data-v-51a89b6c] {
            position: absolute;
            top: 0.85rem;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            height: 0.28rem;
            width: 1.6rem;
            line-height: 0.28rem;
            text-align: center;
            /*overflow: hidden;*/
        }
        .subscribe_hint_button[data-v-51a89b6c] {
            position: absolute;
            top: 0.3rem;
            width: 0.48rem;
            height: 0.48rem;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            /*overflow: hidden;*/
        }
        /* 点击关注提示弹出的浮层*/
        .subscribe_qr_layer[data-v-51a89b6c] {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /*overflow: hidden;*/
            z-index: 1000;
        }
        .subscribe_qr_container[data-v-51a89b6c] {
            position: absolute;
            top: 3.08rem;
            left: 1.25rem;
            width: 5rem;
            height: 5rem;
            background-color: white;
            /*overflow: hidden;*/
            border-radius: 0.14rem;
        }
        .subscribe_qr_close_wrapper[data-v-51a89b6c] {
            position: absolute;
            top: 0;
            right: 0;
            width: 0.64rem;
            height: 0.64rem;
        }
        .subscribe_qr_close[data-v-51a89b6c] {
            position: absolute;
            top: 0;
            right: 0;
            width: 0.24rem;
            height: 0.24rem;
            padding: .2rem;
        }
        .subscribe_qr_title[data-v-51a89b6c] {
            position: absolute;
            top: 0.7rem;
            left: 0;
            width: 100%;
            height: 0.35rem;
            text-align: center;
        }
        .subscribe_qr_hint[data-v-51a89b6c] {
            position: absolute;
            top: 1.2rem;
            left: 0;
            width: 100%;
            height: 0.35rem;
            text-align: center;
            color: #ffa643;
        }
        .subscribe_qr_url[data-v-51a89b6c] {
            position: absolute;
            top: 1.85rem;
            left: 1.3rem;
            width: 2.4rem;
            height: 2.4rem;
            overflow: hidden;
            border-radius: 0.1rem;
        }
        /*用户信息部分*/
        .user_info_top_box[data-v-51a89b6c] {
            height: 4rem;
            position: relative;
        }
        .user_info_top_box_bg[data-v-51a89b6c] {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .user_info_top_box_content[data-v-51a89b6c] {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
        }
        /*用户头像*/
        .user_info_avatar[data-v-51a89b6c] {
            width: 1.41rem;
            height: 1.41rem;
            border: solid 2px rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            padding-top: -0.1rem !important;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            top: 1.1rem;
            position: absolute;
            left: 50%;
            margin-left: -0.705rem;
            overflow: hidden;
        }
        .user_info_img[data-v-51a89b6c] {
            height: 100%;
            width: 100%;
            background-color: #eee;
        }
        /*用户名字和昵称*/
        .user_info_nickname_and_gender[data-v-51a89b6c] {
            height: 0.34rem;
            text-align: center;
            line-height: 0.34rem;
            margin-top: 2.7rem;
            font-size: 0;
        }
        .user_info_nickname[data-v-51a89b6c] {
            display: inline-block;
            color: white;
            font-size: 0.34rem;
            margin-right: 4px;
        }
        .user_info_gender[data-v-51a89b6c] {
            border: none;
            display: inline-block;
            width: 0.28rem;
            height: 0.28rem;
            margin-top: 0.03rem;
        }
        /*功能列表*/
        .operation_item[data-v-51a89b6c] {
            background: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            height: 1rem;
            padding: 0 0.2rem;
            border-bottom: 1px solid #eeeeee;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .operation_item_icon[data-v-51a89b6c] {
            width: 0.5rem;
            height: 0.5rem;
            margin-right: 0.2rem;
        }
        .operation_item_text[data-v-51a89b6c] {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-flex: 1;
        }
        .operation_item_arrow[data-v-51a89b6c] {
            width: 0.2rem;
            height: 0.3rem;
        }
        .user_info_item[data-v-51a89b6c] {
            margin-bottom: 0.1rem;
        }
        .advice_item[data-v-51a89b6c] {
            margin-top: 0.1rem;
        }
        .distribute_item[data-v-51a89b6c] {
            margin-bottom: 0.1rem;
        }
      
        </style>
    </head>
    
    <body>
   
        <div class="homeWrapper">
                <div style="display: none;">
                    <div>
                        <div class="message_list " style="display: none;">
                            <div data-v-50d89e3e="" id="lShouldLoadMore" class="dropload-container">
                                <div data-v-50d89e3e="" class="hint c3 t2">
                                    <!----><span data-v-50d89e3e="">已加载全部</span>
                                </div>
                            </div>
                        </div>
                        <div class="noMessageTips">
                            <img src="<?php echo HOME_THEME_PATH; ?>images/pic_kong.png">
                            <p class="c3">暂无消息</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div data-v-51a89b6c="" class="page_mine ">
                            <!---->
                            <div data-v-51a89b6c="" class="user_info_top_box">
                                <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/pic_probg.jpg" class="user_info_top_box_bg">
                                <div data-v-51a89b6c="" class="user_info_top_box_content">
                                    <div data-v-51a89b6c="" class="user_info_avatar">
                                        <img data-v-51a89b6c="" src="<?php echo $member['avatar']; ?>" class="user_info_img">
                                    </div>
                                    <div data-v-51a89b6c="" class="user_info_nickname_and_gender">
                                        <p data-v-51a89b6c="" class="user_info_nickname t1"><?php echo $member['name']; ?></p><br>
                                        <p data-v-51a89b6c="" class="user_info_nickname t1" style="font-size:12px;margin-top:5px">我的ID：<?php echo $member['uid']; ?></p><br>
                                        <p data-v-51a89b6c="" class="user_info_nickname t1" style="font-size:12px">剩余优惠券：<?php echo $member['youhuiquan']; ?>张</p>
                                        <!--<img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_male.png" class="user_info_gender">-->
                                        <!--<img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_female.png" class="user_info_gender">-->
                                    </div>
                                </div>
                            </div>
                            <div data-v-51a89b6c="" class="operation_wrapper">
                                <div data-v-51a89b6c="" class="operation_item user_info_item pressGreyBg">
                                    <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_Profile_Edit.png" class="operation_item_icon">
                                    <div data-v-51a89b6c="" class="operation_item_text t1 c2">个人信息</div>
                                    <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_Chevron.png" class="operation_item_arrow">
                                </div>
                                <div data-v-51a89b6c="" class="operation_item pressGreyBg wodeshouyi">
                                    <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_profile.png" class="operation_item_icon">
                                    <div data-v-51a89b6c="" class="operation_item_text t1 c2">我的收益</div>
                                    <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_Chevron.png" class="operation_item_arrow">
                                </div>
            
                              
                            
                                <div data-v-51a89b6c="" class="operation_item pressGreyBg wodeyigou">
                                    <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_goumaijil.png" class="operation_item_icon">
                                    <div data-v-51a89b6c="" class="operation_item_text t1 c2">我的课程</div>
                                    <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_Chevron.png" class="operation_item_arrow">
                                </div>
                               
                                <div data-v-51a89b6c="" class="operation_item pressGreyBg yaoqingma">
                                    <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_invitationcode.svg" class="operation_item_icon">
                                    <div data-v-51a89b6c="" class="operation_item_text t1 c2">邀请返劵</div>
                                    <img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_Chevron.png" class="operation_item_arrow">
                                </div>
                                 <div data-v-51a89b6c="" class="operation_item pressGreyBg">
                                    <!--<img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_coupon.svg" class="operation_item_icon">-->
                                    <!--<div data-v-51a89b6c="" class="operation_item_text t1 c2">优惠券</div>-->
                                    <!--<img data-v-51a89b6c="" src="<?php echo HOME_THEME_PATH; ?>images/icon_Chevron.png" class="operation_item_arrow">-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>