(function($, undefined) {

    $('img[data-original]').lazyload({
        failure_limit: 100,
        skip_invisible: false
    });

    $(window).on('keyup', function(e) {
        switch (e.which) {
            case 37:
                if((goto = $('.navigation.next-previous a[rel="prev"]').attr('href'))){
                    window.location.href = goto;
                }
                break;
            case 39:
                if((goto = $('.navigation.next-previous a[rel="next"]').attr('href'))){
                    window.location.href = goto;
                }
                break;
        }
    });

})(jQuery);
