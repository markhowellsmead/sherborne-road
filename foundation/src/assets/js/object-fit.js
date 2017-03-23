(function($, undefined) {

    if (!Modernizr || !Modernizr.objectfit) {

        var objectFit = function() {
            $('.mod.banner-image').each(function() {
                var $container = $(this),
                    src = $container.find('img').prop('currentSrc') ? $container.find('img').prop('currentSrc') : $container.find('img').prop('src'),
                    imgUrl = src;
                if (imgUrl) {
                    $container
                        .css('backgroundImage', 'url(' + imgUrl + ')')
                        .addClass('compat-object-fit');
                }
                if (window.console && window.console.info) {
                    window.console.info('objectFit: ' + imgUrl);
                }
            });
        };

        objectFit();
        $(window).on('resize.objectfit', objectFit);

    }

})(jQuery);
