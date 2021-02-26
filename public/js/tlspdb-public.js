(function ($) {
    'use strict';
    $(document).ready(function () {

        var tlsParent = $(".tls-parent"),
            owl = tlsParent.find(".owl-carousel"),
            slider = tlsParent.find(".ui-slider"),
            items = tlsParent.find(".tls-images-item"),
            sliderHandle = tlsParent.find(".ui-slider-handle");

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
            var title = tlsParent.find(".owl-item.active").find('.tls-images-item').attr('data-date-time');
            sliderHandle.attr('title', title);
            slider.slider("option", "value", event.item.index);
        });

        slider.on("slide", function (event, ui) {
            owl.trigger('to.owl.carousel', [ui.value]);
        });

        sliderHandle.tooltip({
            classes: {
                // 'ui-tooltip':"",
                // 'ui-tooltip-content':"",
            },
            position: {
                my: "center bottom-20", // the "anchor point" in the tooltip element
                at: "center top", // the position of that anchor point relative to selected element
            }
        });

        items.zoom({
            on: 'click',
            onZoomIn: function () {
                $(this).addClass('zoomedIn')
            },
            onZoomOut: function () {
                $(this).removeClass('zoomedIn')
            },
        });

    });

})(jQuery);
