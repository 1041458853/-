define(['jquery', 'bootstrap'], function($, bs) {
    var system = {
        uri: {
            admin_home: 'admin/home/main'
        }
    };
	$.fn.animationEnd = function(callback) {
		_bindCssEvent.call(this, ['webkitAnimationEnd', 'animationend'], callback);
		return this
	};
	$.fn.transitionEnd = function(callback) {
		_bindCssEvent.call(this, ['webkitTransitionEnd', 'transitionend'], callback);
		return this
	};
	$.fn.transition = function(duration) {
		if (typeof duration !== 'string') {
			duration = duration + 'ms'
		}
		for (var i = 0; i < this.length; i++) {
			var elStyle = this[i].style;
			elStyle.webkitTransitionDuration = elStyle.MozTransitionDuration = elStyle.transitionDuration = duration
		}
		return this
	};
	$.fn.transform = function(transform) {
		for (var i = 0; i < this.length; i++) {
			var elStyle = this[i].style;
			elStyle.webkitTransform = elStyle.MozTransform = elStyle.transform = transform
		}
		return this
	};
    if (navigator.appName == 'Microsoft Internet Explorer') {
		if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	$('.wb-nav-fold').click(function() {
		var nav = $(this).closest(".wb-nav");
		if (nav.hasClass('fold')) {
			nav.removeClass('fold');
			$(".wb-header .logo").removeClass('small');
			$(".fast-nav").removeClass('indent');
		} else {
			nav.addClass('fold');
			$(".wb-header .logo").addClass('small');
			$(".fast-nav").addClass('indent');
		}
	});
	$('.wb-subnav-fold').click(function() {
		var subnav = $(this).closest(".wb-subnav");
		if (subnav.hasClass('fold')) {
			subnav.removeClass('fold')
		} else {
			subnav.addClass('fold')
		}
	});
	$('.menu-header').click(function() {
		if ($(this).hasClass('active')) {
			$(this).next('ul').eq(0).hide();
			$(this).find('.menu-icon').removeClass('fa-caret-down').addClass('fa-caret-right');
			$(this).removeClass('active')
		} else {
			$(this).next('ul').eq(0).show();
			$(this).find('.menu-icon').removeClass('fa-caret-right').addClass('fa-caret-down');
			$(this).addClass('active')
		}
	});
	$('.wb-header-btn').click(function() {
		if ($('.wb-topbar-search').hasClass('expand-search')) {
			$('.wb-search-box').focus();
			var keyword = $.trim($(".wb-search-box").val());
			if (keyword != '') {
				location.href = '' + keyword;
				return
			}
		} else {}
	});
	$(document).click(function(e) {
		var btn = $(e.target).closest('.wb-shortcut').length;
		if (!btn) {
			var fastNav = $(e.target).closest('.fast-nav').length;
			if (!fastNav) {
				$(".wb-shortcut").removeClass('active');
				$(".fast-nav").removeClass('in')
			}
		}
	});
	$('.nav-go').click(function(e){
	    e.preventDefault();
	    $(this).addClass('active').siblings('.nav-go').removeClass('active');
	    $('.nav-item').hide();
	    var t = $('.nav-item-'+$(this).data('nav'));
	    t.show();
	    location.hash = t.find('.iframe-go a').attr('href');
	})
	$('.iframe-go').click(function(){
	    $('.iframe-go').removeClass('active');
	    $(this).addClass('active');
	})
	function url_admin(uri){
	    var url = '/admin.php?', uri_array  = uri.replace("#", "").split("/");
	    if(uri_array[0]=='admin'){
	        url += 'c='+uri_array[1]+'&m='+uri_array[2]+url_admin_query(uri_array)
	    } else {
	        url += 's='+uri_array[0]+'&c='+uri_array[2]+'&m='+uri_array[3]+url_admin_query(uri_array)
	    }
	    return url;
	}
	function url_admin_query(uri_array){
	    switch (uri_array.length) {
	        case 5:
	            return '&'+uri_array[3]+'='+uri_array[4];
	            break;
	       case 6:
	            return '&'+uri_array[4]+'='+uri_array[5];
	            break;	           
	        case 7:
	            return '&'+uri_array[3]+'='+uri_array[4]+'&'+uri_array[5]+'='+uri_array[6];
	        default:
	            return '';
	    }
	}
	function iframe_show(uri){
	    $('#page-loading').show();
	    $("#iframe").attr("src", url_admin(uri));
	}
	function iframe_init(){
	    if(location.hash.length>0){
	        iframe_show(location.hash);
	    } else {
	        iframe_show(system.uri.admin_home);
	    }
	}
	window.onhashchange = function(){
        iframe_init();
	}
	window.onload = function(){
	    iframe_init();
	}
});