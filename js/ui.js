/*
    jQuery function to set targets of external links to “_blank”
*/
(function($, undefined){
    $.extend($.fn, {
        get_hostname: function(){
            var url = $(this).attr('href');
            if(url){
                url = url.toString();
                if(url.indexOf('http://')!==0 && url.indexOf('https://')!==0 && url.indexOf('//')!==0){
                    return false;
                }else{
                    return url.replace('http://','').replace('https://','').replace('//','').split(/[/?#]/)[0] + ''; // plus nothing to force string
                }
            }
        },
        setAsExternalLink: function(){
            $(this).each(function(){
                var $link = $(this), linkobject = this;
                var hostname = $link.get_hostname() + '';
                if(
                    hostname &&
                    (hostname.indexOf(window.location.hostname)<0) &&
                    (hostname.indexOf(window.location.hostname.replace('www.',''))<0) && // same domain without www
                    (hostname!=='') &&
                    (hostname!==null) &&
                    (hostname!==undefined) && (hostname!=='undefined') &&
                    (hostname!==false) && (hostname!=='false') &&
                    ((linkobject.hash==='')||(linkobject.hash===null)||(linkobject.hash===undefined)) &&
                    (hostname.indexOf('javascript')!==0) &&
                    (hostname.indexOf('mailto:')<0) &&
                    (!$link.hasClass('anchor')) &&
                    (!$link.hasClass('fancybox')) &&
                    (!$link.hasClass('toggle'))
                ){
                    this.target="_blank";
                    if(this.className.indexOf("tooltip")<0){this.title=hostname;}
                }
            });
            return this;
        }
    });

    $('img[data-original]').lazyload({
        failure_limit: 100,
        skip_invisible: false
    });

    $(document).on('ready.fancybox', function() {
        try {
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
        } catch(e){}

        try {
            $('a').setAsExternalLink();
        } catch(e){}
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
