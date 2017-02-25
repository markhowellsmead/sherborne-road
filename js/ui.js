(function($, undefined) {

    $('img[data-original]').lazyload({
        failure_limit: 100,
        skip_invisible: false
    });

    $(document).on('ready.fancybox', function() {
        if ($.fn.fancybox) {
            $('.fancybox').fancybox({
                beforeLoad: function() {
                    window.console.log('x');
                    $('html').addClass('fancybox-open');
                },
                afterClose: function() {
                    window.console.log('Y');
                    $('html').removeClass('fancybox-open');
                }
            });
        }
    });

    $(window).on('keyup', function(e) {
        if (!$('html').hasClass('fancybox-open')) {
            switch (e.which) {
                case 37:
                    if ((goto = $('.navigation.next-previous a[rel="prev"]').attr('href'))) {
                        window.location.href = goto;
                    }
                    break;
                case 39:
                    if ((goto = $('.navigation.next-previous a[rel="next"]').attr('href'))) {
                        window.location.href = goto;
                    }
                    break;
            }
        }
    });

})(jQuery);
