(function ($) {
    $(".page-scroll").click(function () {
        var section = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(section).offset().top - 50
        }, 1000, "swing");
    });
})(jQuery);
