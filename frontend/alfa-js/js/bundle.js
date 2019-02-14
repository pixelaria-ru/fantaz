/**
 * Copyright (c) 2007-2015 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 2.1.2
 */
;(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);case "object":if(e.length===0)return;if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});

/**
 * @name jQuery showPopup plugin
 * @author Vlad Kozelsky
 * @description Show modal window
 * @version 1.0
 */

(function($) {
    $.showYtVideo = function(options) {

        options = $.extend({
            modalSize: 'm',
            shadowOpacity: 0.5,
            shadowColor: '#000',
            clickOutside: 1,
            closeButton: 1,
            videoId: ''
        }, options);

        var modal = $('<div class="modal size-' + options.modalSize + '"></div>');
        var closeButton = $('<div class="modal-close popup__closer closer"><b></b><b></b><b></b><b></b></div>');
        

        if (options.closeButton) {
            closeButton.appendTo(modal);   
        }
        
        var modalBg = $('<div class="modal-bg"></div>');
        
        modal.appendTo('body');
        modalBg.appendTo('body');

        var videoWidth = modal.width();
        var videoHeight = modal.height();
        var modalWidth = modal.outerWidth();
        var modalHeight = modal.outerHeight();


        if (options.videoId) {
            var iframe = $('<iframe width="'
                + videoWidth
                + '" height="'
                + videoHeight
                + '" src="https://www.youtube.com/embed/'
                + options.videoId
                + '" frameborder="0" allowfullscreen></iframe>');

            iframe.appendTo(modal);      
        } else {
            console.error('showYtVideo plugin error: videoId not specified');
        }

        modal.css({
            marginLeft: -modalWidth/2,
            marginTop: -modalHeight/2
        });

        modalBg.css({
            opacity: options.shadowOpacity,
            backgroundColor: options.shadowColor
        });


        closeButton.on('click', function() {
            $(this).parent().fadeOut(350, function() {
                $(this).detach();
                modalBg.detach();
            })
        });
        

        if (options.clickOutside) {
            $(document).mouseup(function(e) {
                if (!modal.is(e.target) && modal.has(e.target).length === 0) {
                    modal.fadeOut(350, function() {
                        $(this).detach();
                        modalBg.detach();
                    });
                }
            });
        }
    }   
})(jQuery);

function remove_from_compare(id) {
    console.log("remove_from_compare " + id);
    console.log("/ajax/compare.php?action=DELETE_FROM_COMPARE_LIST&id=" + id);
    $.ajax({
        url: "/ajax/compare.php?action=DELETE_FROM_COMPARE_LIST&id=" + id,
        success: function(result) {
            location.reload();
        }
    });
}

function add_to_compare(id) {
    console.log("add_to_compare " + id);
    var chek = document.getElementById('compare_' + id);
    var chek = $('#compare_' + id);
    var count = 0;
    if (!chek.prop("checked")) {
        console.log('выбрали');
        count = $('#compareCount').html() * 1 + 1;
        $('#compareCount').html(count);
        console.log("/ajax/compare.php?action=ADD_TO_COMPARE_LIST&id=" + id);
        $.ajax({
            url: "/ajax/compare.php?action=ADD_TO_COMPARE_LIST&id=" + id,
            success: function(result) {
                console.log(result);
                if ($('.js-compare-products-carousel').length) {
                    $('.js-compare-products-carousel .block-line').slick({
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                        infinite: true,
                        responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3
                            }
                        }, {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                    });
                }
            }
        });
    } else {
        console.log('сняли');
        count = $('#compareCount').html() * 1 - 1;
        $('#compareCount').html(count);
        console.log("/ajax/compare.php?action=DELETE_FROM_COMPARE_LIST&id=" + id);
        $.ajax({
            url: "/ajax/compare.php?action=DELETE_FROM_COMPARE_LIST&id=" + id,
            success: function(result) {
                if ($('.js-compare-products-carousel').length) {
                    $('.js-compare-products-carousel .block-line').slick({
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                        infinite: true,
                        responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3
                            }
                        }, {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                    });
                }
            }
        });
    }
    if (count) {
        $('.footer-compare').addClass('footer-compare--active');    
    } else {
        $('.footer-compare').removeClass('footer-compare--active');    
    }
    
}

function onLoadjqm(hash) {
    var name = $(hash.t).data('name');
    if ($(hash.t).data('autohide')) {
        $(hash.w).data('autohide', $(hash.t).data('autohide'));
    }

    var w_width = $(window).width();
    var scroll = $(window).scrollTop()+50;
    if (w_width<767) {
        console.log(scroll+"px !important");
        //$('.scroll-to-top').trigger('click');
        $('.jqmWindow').css("top", scroll+"px");
    }

    if (name == 'callprice') {
        console.log('callprice');
        if ($(hash.t).data('product')) {
            var product = $(hash.t).data('product');
            console.log(product);
            var type = $(hash.t).data('product-type');
            if (type) {
                product = product + ' (' + type + ')';
                console.log(product);
            }
            $('input[name="PRODUCT"]').val(product);
            $('input[name="PRODUCT"]').parent().hide();
            console.log($('input[name="PRODUCT"]').val());
        }
        if ($(hash.t).data('title')) {
            $('span.title').html($(hash.t).data('title'));
            $('.popup .popup__close').html($(hash.t).data('title'));
        }
        if ($(hash.t).data('product-type')) {
            $('.popup__body').prepend('<hr style="margin-bottom:30px;"/>');
            $('.popup__body').prepend('<p class="popup__info">Исполнение: <span>' + $(hash.t).data('product-type') + '</span></p>');
            $('.popup__body').prepend('<p class="popup__info popup__info--full">' + $(hash.t).data('product') + '</p>');
        }

        if ($(hash.t).data('service')) {
            var service = $(hash.t).data('service');
            $('.popup__body').prepend('<hr style="margin-bottom:30px;"/>');
            $('.popup__body').prepend('<p class="popup__info">Услуга: <span>' + $(hash.t).data('service') + '</span></p>');

            $('input[name="PRODUCT"]').val(service);
            $('input[name="PRODUCT"]').parent().hide();
            console.log($('input[name="PRODUCT"]').val());
        }
    } 
}

function onHide(hash) {
    if ($(hash.w).data('autohide')) {
        eval($(hash.w).data('autohide'));
    }
    hash.w.empty();
    hash.o.remove();
    hash.w.removeClass('show');
}
$.fn.jqmEx = function() {
    $(this).each(function() {
        var _this = $(this);
        var name = _this.data('name');
        if (name.length) {
            var script = '/bitrix/components/pixelaria/form/ajax/form.php';
            var paramsStr = '';
            var trigger = '';
            var arTriggerAttrs = {};
            $.each(_this.get(0).attributes, function(index, attr) {
                var attrName = attr.nodeName;
                var attrValue = _this.attr(attrName);
                trigger += '[' + attrName + '=\"' + attrValue + '\"]';
                arTriggerAttrs[attrName] = attrValue;
                if (/^data\-param\-(.+)$/.test(attrName)) {
                    var key = attrName.match(/^data\-param\-(.+)$/)[1];
                    paramsStr += key + '=' + attrValue + '&';
                }
            });
            var triggerAttrs = JSON.stringify(arTriggerAttrs);
            var encTriggerAttrs = encodeURIComponent(triggerAttrs);
            script += '?' + paramsStr + 'data-trigger=' + encTriggerAttrs;
            if (!$('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').length) {
                if (_this.attr('disabled') != 'disabled') {
                    $('body').find('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').remove();
                    $('body').append('<div class="' + name + '_frame jqmWindow" style="width:500px" data-trigger="' + encTriggerAttrs + '"></div>');
                    $('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').jqm({
                        trigger: trigger,
                        onLoad: function(hash) {
                            onLoadjqm(hash);
                        },
                        onHide: function(hash) {
                            onHide(hash);
                        },
                        ajax: script,
                    });
                }
            }
        }
    })
}
$(function() {
    var loading = false;
    console.log('init');

    $('.parallax-layer').parallax({   
        mouseport: $(".main-slider"),
        xparallax: '25px',
        yparallax: '25px',
        xorigin: 0,
        yorigin: 0
    });
    
    /*$('.parallax-layer img').parallax({
        mouseport: $(".main-slider__slider"),
        xparallax: '25px',
        yparallax: '25px',
        xorigin: 0.5,
        yorigin: 0.5

    });*/

    $('main').append('<div class="scroll-to-top"></div>');
    $('body').delegate('*[data-event="jqm"]', 'click', function(e) {
        console.log('jqmEx');
        e.preventDefault();
        $(this).jqmEx();
        $(this).trigger('click');
    });
    
    $(window).scroll(function() {
        var header = $('.header'),
            main = $('main'),
            scroll = $(window).scrollTop();
        if (scroll >= 145) {
            header.addClass('header--fixed');
            main.addClass('main--fixed');
        } else {
            header.removeClass('header--fixed');
            main.removeClass('main--fixed');
        }
        if (scroll >= 245) header.addClass('header--top');
        else header.removeClass('header--top');
        if (scroll >= 300) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }



    });
    
    $('body').delegate('#infinity-next-page', 'click', function(e) {
        console.log('qweqweqw');
        $.get($('#infinity-next-page').attr('href'), {is_ajax: 'y'}, function(data){
            $('.table__result').remove();
            $('#infinity-next-page').parent().after(data);
            $('#infinity-next-page').parent().remove();
            loading = false;
        });
        return false;
    }); 

    $('.scroll-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });

    $('body').delegate('.scroll-to-target', 'click', function(e) {
        console.log('scroll-to-target');
        var target = $(this).attr('href');
        var offset = 0;
        if ($(this).data('offset') != undefined) offset = $(this).data('offset');
        
        $.scrollTo(target, 400, { offset: -offset });
        return false;
    });

    $('body').delegate('.remove_from_compare', 'click', function(e) {
        var target = $(this).data('target');
        e.preventDefault();
        console.log(target);
        remove_from_compare(target);
        return false;
    });

    
    $('.link--youtube').on('click', function () {
        var video = $(this).data('video');
        var w_width = $(window).width();
        
        if (w_width>750) {
            if (video) {

                $.showYtVideo({
                    videoId: video,
                    modalSize: 'l'
                });
                return false;
            }
        }
    });

    if ($('.main__clipper').length) {
        baron({
            root: '.clipper-1',
            scroller: '.scroller-1',
            bar: '.bar-1',
            scrollingCls: '_scrolling',
            draggingCls: '_dragging',
            direction: 'h'
        });
        baron({
            root: '.clipper-2',
            scroller: '.scroller-2',
            bar: '.bar-2',
            scrollingCls: '_scrolling',
            draggingCls: '_dragging',
            direction: 'h'
        });
        $(".scroller-1").scroll(function() {
            $(".scroller-2").scrollLeft($(".scroller-1").scrollLeft());
        });
        $(".scroller-2").scroll(function() {
            $(".scroller-1").scrollLeft($(".scroller-2").scrollLeft());
        });
    }
    $('.nav__toggler').click(function(e) {
        var target = $(this).data('target');
        $(this).toggleClass('navbar-toggler--active');
        $('#' + target).toggleClass('nav--active');
    });
    $('.nav__item--parent').click(function(e) {
        console.log('clicked');
        $(this).toggleClass('nav__item--active');
    });
    $('.search__toggler').click(function(e) {
        console.log('search toggler');
        var target = $(this).data('target');
        $('#' + target).toggleClass('search--active');
        $('#' + target).find('.search__input').focus();
        return false;
    });
    $('.search__submit').click(function(e) {
        var form = $(this).closest('form');
        form.submit();
    });
    $('html').click(function() {
        $('.search--active').removeClass('search--active');
    });
    $('.search').click(function(e) {
        return false;
    });
    $('.accordeon__preview').click(function(e) {
        $(this).closest('.accordeon').toggleClass('accordeon--active');
    });
    $('.checkbox__label').click(function(e) {
        $(this).closest('.accordeon').toggleClass('accordeon--active');
    });
    $('.im--phone').mask('+7 (000) 000-00-00');
    $('.input-group__input').change(function(e) {
        $(this).toggleClass('used', $(this).val() != '');
    });
    $('.tabs__link').click(function(e) {
        var w_width = $(window).width();
        var target = $(this).data('target');
        $('.tabs__link').removeClass('tabs__link--active');
        $(this).addClass('tabs__link--active');
        $('.tabs__body').removeClass('tabs__body--active');
        var body = $('.tabs__body[data-name="' + target + '"]');
        body.addClass('tabs__body--active');

        if (w_width<788) {
            var offset = 150;
            $.scrollTo(body, 400, { offset: -offset });
        }
    });
    $('.product-types__type').click(function(e) {
        var type = $(this).data('type');
        $('.product-types__type').removeClass('product-types__type--active');
        $(this).addClass('product-types__type--active');
        $('#product__btn').data('product-type', type);
        console.log($('#product__btn').data('product-type'));
    });

    



    if ($('.slider--images').length) {
        var slider_images = $('.slider--images .slider__list').slick({
            arrows: false,
            dots: true,
            dotsClass: 'slider__nav',
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 500
        });
        if ($('.slider-desc').length) {
            $('.slider--images').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                $('.slider-desc__item[data-id="' + currentSlide + '"]').removeClass('slider-desc__item--active');
                $('.slider-desc__item[data-id="' + nextSlide + '"]').addClass('slider-desc__item--active');
            });
        }
        if ($('.slider-nav').length) {
            $('.slider-nav__item').click(function(e) {
                var target = $(this).data('target');
                let slickObj = slider_images.slick('getSlick');
                slickObj.slickGoTo(parseInt(target));
                $('.slider-nav__item').removeClass('slider-nav__item--active');
                $(this).addClass('slider-nav__item--active');
            });
            $('.slider--images').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                $('.slider-nav__item').removeClass('slider-nav__item--active');
                $('.slider-nav__item[data-target="' + nextSlide + '"]').addClass('slider-nav__item--active');
            });
        }
    }
    if ($('.slider--projects').length) {
        $('.slider--projects .projects').slick({
            arrows: true,
            prevArrow: '<span class="slider__arrow slider__arrow--big slider__arrow--prev"></span>',
            nextArrow: '<span class="slider__arrow slider__arrow--big slider__arrow--next"></span>',
            dotsClass: 'slider__nav slider__nav--dark',
            slidesToShow: 3,
            autoplaySpeed: 2500,
            infinite: true,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: true,
                    prevArrow: '<span class="slider__arrow slider__arrow--big slider__arrow--prev"></span>',
                    nextArrow: '<span class="slider__arrow slider__arrow--big slider__arrow--next"></span>',
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false,
                }
            }, ]
        });
    }
    if ($('.slider--clients').length) {
        $('.slider--clients .slider__list').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            prevArrow: '<span class="slider__arrow slider__arrow--prev"></span>',
            nextArrow: '<span class="slider__arrow slider__arrow--next"></span>',
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    }
    if ($('.slider--news').length) {
        $('.slider--news').slick({
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2500,
            dots: true,
            arrows: false,
            dotsClass: 'slider__nav',
            responsive: [{
                breakpoint: 99999,
                settings: "unslick"
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    }
    if ($('.main-slider').length) {
        var current = 0;
        var slN = $('.main-slider-nav__item').length;

        function auto() {
            intv = setInterval(function() {
                $('.main-slider-nav__item').eq(current++ % slN).click();
            }, 5000);
        }
        auto();
        $('.main-slider').on('mouseenter mouseleave', function(e) {
            //var onMouEnt = e.type == 'mouseenter' ? clearInterval(intv) : auto();
        });
        $('.main-slider-nav__item').click(function(e) {
            var target = $(this).data('target');
            $('.main-slider-nav__item').removeClass('main-slider-nav__item--active');
            $('.main-slider-nav__item[data-target="' + target + '"]').addClass('main-slider-nav__item--active');
            $('.main-slider__slide').removeClass('main-slider__slide--active');
            $('.main-slider__slide[data-id="' + target + '"]').addClass('main-slider__slide--active');
        });
    }
    $('.link--readmore').click(function(e) {
        console.log('readmore');
        var target = $(this).data('target');
        $('#' + target).toggleClass('section__readmore--active');
        $(this).hide();
        return false;
    });
    $('.link--less').click(function(e) {
        console.log('less');
        var target = $(this).data('target');
        $('#' + target).removeClass('section__readmore--active');
        $('.link--readmore').show();
        return false;
    });
    if ($('.product__image').length) {
        $('.product__image--main').slick({
            arrows: false,
            dots: false,
            autoplay: false,
            variableWidth: true,
            centerMode: true,
            speed: 500
        });
        $('.product__image').click(function(e) {
            console.log('product__image');
            var target = $(this).data('target');
            if (target) {
                $('.product__img--active').removeClass('product__img--active');
                $('.product__img[data-id="' + target + '"]').addClass('product__img--active');
            }
        });
    }
    if ($('.slider--projects-single').length) {
        $('.slider--projects-single .projects').slick({
            arrows: true,
            prevArrow: '<span class="slider__arrow slider__arrow--big slider__arrow--prev"></span>',
            nextArrow: '<span class="slider__arrow slider__arrow--big slider__arrow--next"></span>',
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true
        });
    }
});


$(document).on('copy', function(){
    console.log('copy');
    var bodyElement = document.body; 
    var selection = window.getSelection(); 
    var href = document.location.href; 
    var copyright = "<br><br>Источник: <a href='"+ href +"'>" + href + "</a><br>© ООО &laquo;Альфа Балт Инжиниринг&raquo;."; 
    var text = selection + copyright; 
    var divElement = document.createElement('div'); 
    divElement.style.position = 'absolute'; 
    divElement.style.left = '-99999px'; 
    divElement.innerHTML = text; 
    bodyElement.appendChild(divElement);
    selection.selectAllChildren(divElement); 
    setTimeout(function() { bodyElement.removeChild(divElement); }, 0); 
});