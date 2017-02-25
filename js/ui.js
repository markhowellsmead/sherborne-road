(function($, undefined){

    $('img[data-original]').lazyload({
        failure_limit : 100,
        skip_invisible: false
    });

})(jQuery);
