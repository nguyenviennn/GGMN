$(document).ready(function () {
    $('.btn-scroll').hide();
    $('.box-user').click(function () {
        $('.box-login').toggleClass('box-loginn');
    });
   
    $(window).scroll(function () {
        if ($(window).scrollTop() > 150) {
            $('.logo').addClass('img-animate')
            $('.menu-top').addClass('menu-top1')
        } else {
            $('.logo').removeClass('img-animate')
            $('.menu-top').removeClass('menu-top1')
        }
    });
    $('.fa-bars').click(function () {
        $('.list-menu').toggle();
    });
$(document).scroll(function () {
    var X= $(document).scrollTop();
    if(X > 500) {
        $('.btn-scroll').show();
    }else {
        $('.btn-scroll').hide();
    }
});
  
    $('#btn-scroll').click(function () {
        $('html,body').animate({    
            scrollTop: 0
        }, 100);
    });
});
