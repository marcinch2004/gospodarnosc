(function ($) {
    $(".page-scroll").click(function () {
        var section = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(section).offset().top
        }, 1000, "swing");
    });
})(jQuery);

(function ($) {
    $(".page-scroll-okregi").click(function () {
        var section = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(section).offset().top - 150
        }, 750, "swing");
    });
})(jQuery);


// (function ($) {
//     var distance = $('#page').offset().top - 300;

//     $(window).scroll(function () {

//         if ($(window).scrollTop() >= distance) {
//             $('#gototop').addClass("affix");
//         } else {
//             $('#gototop').removeClass("affix");
//         }
//     });
// })(jQuery);

(function ($) {
    $(document).scroll(function () {
        var y = $(this).scrollTop();
        if (y > 800) {
            $('.go-to-page-top').fadeIn();
        } else {
            $('.go-to-page-top').fadeOut();
        }
    });
})(jQuery);