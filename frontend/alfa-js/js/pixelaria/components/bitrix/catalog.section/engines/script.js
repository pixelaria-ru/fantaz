$(function (){
    console.log("qweqwew");
    if ($('.product__image').length) {
        $('.product__image--main').slick({
          arrows:false,
          dots:false,
          
          autoplay: false,
          variableWidth: true,
          centerMode: true,
          speed: 500
        });

        $('.product__image').click(function(e){
          console.log('product__image');
          var target = $(this).data('target');
          if (target) {
            console.log(target);
            $('.product__img--active').removeClass('product__img--active');
            $('.product__img[data-id="'+target+'"]').addClass('product__img--active');  
          } else {
            console.log("qweqwe");
          }
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