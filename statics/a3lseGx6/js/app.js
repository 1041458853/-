var popup;
(function() {
    var msgTimeout;
    popup = {
        load: function(content) {
            content = content || '加载中';
            $('.vux-loading').show().find('.weui-toast__content').text(String(content));
        },
        msg: function(content, time, callback) {
            time = time || 1500;
            $('.vux-message > .weui-toast').stop().css({ bottom:'-28px', opacity:0, display:'block' }).animate({
                bottom: '100px',
                opacity: 1
            }, 150).children('.weui-toast__content').text(content);
            msgTimeout && clearInterval(msgTimeout);
            msgTimeout = setTimeout(function() {
                $('.vux-message > .weui-toast').fadeOut(100);
                'function' == typeof callback && callback();
            }, time);
        },
        success: function(content, time) {
            time = time || 1500;
            
        },
        alert: function(content, callback, title) {
            var domObj = $('.vux-alert');
            domObj.find('.weui-dialog .weui-dialog__title').text(title || '信息');
            domObj.find('.weui-dialog .weui-toast__content').text(content);
            domObj.find('.weui-dialog .weui-dialog__ft > .weui-dialog__btn').one('click', function() {
                $(this).siblings('.weui-dialog__btn').unbind('click', arguments.callee);
                'function' == typeof callback && callback();
                domObj.fadeOut(150);
            });
            domObj.show(150);
        },
        confirm: function(content, callback, title, btns) {
            var domObj = $('.vux-confirm');
            domObj.find('.weui-dialog .weui-dialog__title').text(title || '提示');
            domObj.find('.weui-dialog .weui-toast__content').text(content);
            var btnsObj = domObj.find('.weui-dialog .weui-dialog__ft > .weui-dialog__btn').one('click', function() {
                $(this).siblings('.weui-dialog__btn').unbind('click', arguments.callee);
                'function' == typeof callback && callback(this.dataset.value);
                domObj.fadeOut(150);
            });
            if ($.isArray(btns)) {
                if (btns[0]) {
                    btnsObj.eq(0).text(btns[0]);
                }
                if (btns[1]) {
                    btnsObj.eq(1).text(btns[1]);
                }
            }
            domObj.show(150);
        },
        number: function(callback, title, btns) {
            var domObj = $('.vux-number');
            var input = domObj.find('input.number-input').val(1);
            domObj.find('.weui-dialog .weui-dialog__title').text(title || '提示');
            var btnsObj = domObj.find('.weui-dialog .weui-dialog__ft > .weui-dialog__btn').one('click', function() {
                $(this).siblings('.weui-dialog__btn').unbind('click', arguments.callee);
                if (
                    this.dataset.value == 'n'
                    || 'function' != typeof callback
                    || callback(input.val()) !== false
                ){
                    domObj.fadeOut(150);
                }
            });
            if ($.isArray(btns)) {
                if (btns[0]) {
                    btnsObj.eq(0).text(btns[0]);
                }
                if (btns[1]) {
                    btnsObj.eq(1).text(btns[1]);
                }
            }
            domObj.show(150);
        },
        prompt: function(callback, title, placeholder, btns) {
            var domObj = $('.vux-prompt');
            var input = domObj.find('input.prompt-input').val('').attr('placeholder', placeholder);
            domObj.find('.weui-dialog .weui-dialog__title').text(title || '提示');
            var btnsObj = domObj.find('.weui-dialog .weui-dialog__ft > .weui-dialog__btn').one('click', function() {
                $(this).siblings('.weui-dialog__btn').unbind('click', arguments.callee);
                if (
                    this.dataset.value == 'n'
                    || 'function' != typeof callback
                    || callback(input.val()) !== false
                ){
                    domObj.fadeOut(150);
                }
            });
            if ($.isArray(btns)) {
                if (btns[0]) {
                    btnsObj.eq(0).text(btns[0]);
                }
                if (btns[1]) {
                    btnsObj.eq(1).text(btns[1]);
                }
            }
            domObj.show(150);
        },
        payinfo: function() {
            $('.payinfo-popup').stop().animate({ bottom:0 }, 200)
                .prev('.weui-mask').fadeIn(200).parent().show()
                .find('.weui-mask,.payinfo-title-close').one('click', function() {
                    $('.payinfo-popup').animate({
                        bottom:-$('.payinfo-popup').height() + 'px'
                    }, 200, function() {
                        $(this).parent().hide();
                    }).prev('.weui-mask').fadeOut(200);
                });
        },
        phone: function(phone, onlineHours) {
            popup.confirm('在线时间：' + onlineHours, function(v) { 'y' == v && window.open('tel:' + phone); }, phone, ['', '呼叫']);
        },
        close: function(type) {
            if (type) {
                switch (type) {
                    case 'load':
                        $('.vux-loading').hide();
                        break;
                }
            } else {
                $('.vux-loading,.dialog-demo,.telalert,.vux-confirm,.vux-toast,.vux-alert').hide();
            }
        }
    };
})();

jQuery.extend({
    getJSONP: function(url, data, callback) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'jsonp',
            data: data,
            success: callback,
            error: function() {
                popup.msg('网络不稳定');
            }
        });
    }
});
jQuery.fn.extend({
    slide: function(options) {
        var slideIntervalCode, touchStartPoint, newPosition;
        var slide = $(this);
        slide.children('ul').html(slide.children('ul').html().replace(/>[\s\r\n]+</g, '><'));
        var slideNum = slide.children('ul').children('li').length;
        var slidePosition = 0;
        var slidePositionList = $((function(){
            var html = '';
            for (var i = 0; i < slideNum; i++) {
                html += '<span></span>';
            }
            return html;
        })());
        var slideChange = function(right){
            slidePositionList.eq(slidePosition).width(4);
            slidePosition += right ? 1 : -1;
            if (right ? (slidePosition >= slideNum) : (slidePosition < 0)) {
                slidePosition = right ? 0 : slideNum - 1;
            }
            slidePositionList.eq(slidePosition).width(8);
            slide.children('ul').css('margin-left', -slide.width() * slidePosition + 'px');
        };
        $(window).resize(function() {
            slide.children('ul').height(slide.width() / (options.ratio || 2.2));
            slide.children('ul').children('li').width(slide.width());
        }).resize();
        slide.children('.slide-position').append(slidePositionList);
        slidePositionList.eq(0).width(8);

        slide.on('touchstart', function(){
            try {
                touchStartPoint = event.touches[0].clientX;
            } catch(e) {}
            newPosition = slidePosition;
            clearInterval(slideIntervalCode);
            slide.children('ul').css('transition', 'none');
        }).on('touchmove', function() {
            if (touchStartPoint) {
                var touchMove = event.touches[0].clientX - touchStartPoint;
                if (touchMove >= 0 ? slidePosition == 0 : slidePosition == slideNum - 1) {
                    var q = 4; // 弹性减速
                    touchMove = Math.log((q / 100 + 1) * Math.abs(touchMove) - Math.abs(touchMove) + 1)
                        / Math.log((q / 100 + 1)) * (touchMove >= 0 ? 1 : -1);
                } else if (Math.abs(touchMove) > slide.width() / 4) {
                    newPosition = slidePosition - touchMove;
                }
                slide.children('ul').css('margin-left', -slide.width() * slidePosition + touchMove + 'px');
            }
        }).on('touchend touchcancel', function() {
            slideIntervalCode = setInterval(function() { slideChange(true); }, 3000);
            slide.children('ul').css('transition', 'margin .5s');
            if (newPosition == slidePosition) {
                slide.children('ul').css('margin-left', -slide.width() * slidePosition + 'px');
            } else {
                slideChange(newPosition > slidePosition);
            }
            touchStartPoint = 0;
        }).triggerHandler('touchend');
        /*为翻页按钮添加事件*/
        slide.children('.slide-left').click(function() { slideChange(false); });
        slide.children('.slide-right').click(function() { slideChange(true); });
    },
    selectBind: function(subObj, subCallback){
        var obj = $(this);
        subObj = $(subObj);
        //tag用于标记是否为自身调用，防止递归死循环
        obj.change(function(event, tag) {
            if (tag != 's') {
                subObj.prop('checked', this.checked);
                subObj.trigger('change', [tag ? tag : 'o']);
            }
        });
        subObj.change(function(event, tag) {
            if (tag != 'o') {
                obj.prop('checked', this.checked && subObj.filter('[checked]').length == subObj.length);
                obj.trigger('change', [tag ? tag : 's']);
            }
            if (subCallback) {
                subCallback(this);
            }
        });
    }
});

$(function() {
	//加的效果
	$('body').delegate('.vux-number-selector-plus', 'click', function() {
		var n = Number($(this).prev().val());
		var num = parseInt(n) + 1;
		if(num > 99) {
			return;
		}
		$(this).prev().val(num).change();
		try {
			setorgprice(this);
		} catch(e) {}
	});
	//减的效果
	$("body").delegate(".vux-number-selector-sub", 'click', function() {
		var n = Number($(this).next().val());
		var num = parseInt(n) - 1;
		if(num < 0) {
			return;
		}
		$(this).next().val(num).change();
		try {
			setorgprice(this);
		} catch(e) {}
	});
	$('.num').bind('keyup', function() {
		try {
			setorgprice(this);
		} catch(e) {}
	});
	$('.weui-textarea').on('input', function() {
	    $(this).next('.weui-textarea-counter').text(this.value.length + (this.maxLength >= 0 ? '/' + this.maxLength : '') + '字');
	}).triggerHandler('input');
});

// 领取优惠券
function couponReceive(id, group, callback) {
    $.ajax({
        url: '/?s=member&mod=coupon&c=home&m=receive&group=' + group + '&id=' + id,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            if (1 == res.code) {
                'function' == typeof callback && callback();
                popup.msg(res.msg);
            } else if (2 == res.code) {
                switch (res.type) {
                    case 'mobile':
                        popup.confirm('完善个人信息后可领取优惠券', function(value) {
                            if ('y' == value) {
                                location.href = '/?s=member&c=account';
                            }
                        }, '完善个人资料', ['不用了', '现在完善']);
                        break;
                    case 'recharge':
                        location.href = '/?s=member&c=pay&m=add';
                        break;
                    default:
                        popup.msg(res.msg);
                }
            } else {
                popup.msg(res.msg);
            }
        },
        error: function() {
            popup.msg('网络出错');
        }
    });
}
