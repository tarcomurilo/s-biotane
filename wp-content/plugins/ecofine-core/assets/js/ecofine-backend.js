;(function($) {
    'use strict';

    $(window).on( 'elementor/frontend/init', function() {


        var GlobalJSLoad = function() {
        
            $(".skillbar").each(function() {
                $(this).appear(function() {
                    $(this).find(".count-bar").animate({
                        width:$(this).attr("data-percent")
                    },3000);
                });
            });

            $(".skill-percent-count").counterUp({
                delay: 10,
                time: 3000
            });
        };
        elementorFrontend.hooks.addAction('frontend/element_ready/global', GlobalJSLoad);


    });
})(jQuery);