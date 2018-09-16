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
//     var distance = $('#okregi').offset().top - 90;

//     $(window).scroll(function () {

//         if ($(window).scrollTop() >= distance) {
//             $('#okregi').addClass("affix");
//             $('#okregi-spacer').addClass("show-okregi-spacer");

//         } else {
//             $('#okregi').removeClass("affix");
//             $('#okregi-spacer').removeClass("show-okregi-spacer");
//         }
//     });
// })(jQuery);