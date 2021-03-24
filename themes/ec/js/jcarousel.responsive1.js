(function($) {
    jQuery(function() {
        var jcarousel = $('.jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function() {
                var width = jcarousel.innerWidth();

                if (width >= 1024) {
                    width = width / 6;
                } else if (width >= 640) {
                    width = width / 4;
                }

                jcarousel.jcarousel('items').css('width', width + 'px');
            })
            .jcarousel({
                wrap: 'circular'
            });

        jQuery('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        jQuery('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        jQuery('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                jQuery(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                jQuery(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 4,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
})(jQuery);