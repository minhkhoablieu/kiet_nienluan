$(window).scroll(function(){
    var sticky = $('.main_nav'),
        scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fix_nav');
    else sticky.removeClass('fix_nav');
  });
