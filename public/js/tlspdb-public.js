(function ($) {
    'use strict';
    $(document).ready(function () {

        var tlsParent = $(".tls-parent"),
            owl = tlsParent.find(".owl-carousel"),
            slider = tlsParent.find(".ui-slider"),
            items = tlsParent.find(".tls-images-item");

        owl.owlCarousel({
            items: 1,
            center: false,
            mouseDrag: false,
            touchDrag: false,
            lazyLoad: true,
            lazyLoadEager: 3,
            rtl: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
			singleItem: true,
        });

        slider.slider({
            max: items.length - 1,
            isRTL: true
        });

        owl.on('changed.owl.carousel', function (event) {
            console.log("owl change", event.item.index);
            slider.slider("option", "value", event.item.index);
        });

        slider.on("slide", function (event, ui) {
            console.log("slider", ui.value);
			owl.trigger('to.owl.carousel', [ui.value]);

        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    });

})(jQuery);
