$(function (){
    if ($('.product-page').length) $('body,html').scrollTop(0);

    if ($('.product__image').length) {
      var slider_images = $('.product__image--main').slick({
        arrows:false,
        dots:false,
        
        autoplay: false,
        variableWidth: true,
        centerMode: true,
        speed: 500
      });

      $('.product__image').click(function(e){
        console.log('product__image');
        var target = $(this).index();
        let slickObj = slider_images.slick('getSlick');
        slickObj.slickGoTo( parseInt(target) );
      });
    }
    if ($('.baron').length) {
      baron({
        root: '.baron',
        scroller: '.baron__scroller',
        bar: '.baron__bar',
        scrollingCls: '_scrolling',
        draggingCls: '_dragging'
      }).controls({
        track: '.baron__track',
        forward: '.baron__down',
        backward: '.baron__up'
      });
    } else {
        console.log('nobaron');
    }


});