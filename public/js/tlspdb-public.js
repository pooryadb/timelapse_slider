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
        var owlItems = tlsParent.find(".owl-item");

        var tooltip = $('<div id="tooltip" class="ui-tooltip"><div class="ui-tooltip-content" /> </div>').hide();

        var canHide = false,
            isShown = false;
        slider.slider({
            max: items.length - 1,
            slide: function (event, ui) {
                var title = owlItems.eq(ui.value).find('.tls-images-item').attr('data-date-time');
                sliderHandle.find(".ui-tooltip-content").html(title);

                $(tooltip).css({
                    left: $(tooltip).width() / -2
                });

                owl.trigger('to.owl.carousel', [ui.value]);
            }
        }).find(".ui-slider-handle")
            .append(tooltip)
            .hover(function () {
                if (!$(this).find('div').is(':visible')) {
                    isShown = true;
                    canHide = true;
                    $(this).find('div').show("fade");
                }
            }, function () {
                if (canHide && isShown) {
                    isShown = false;
                    $(this).find('div').hide("fade");
                }
            })
            .on({
                mouseup: function () {
                    canHide = true;
                    isShown = false;
                    $(this).find('div').hide("fade");
                },
                mousedown: function () {
                    canHide = false;
                    isShown = true;
                    $(this).find('div').show("fade");
                },
            });
        slider.draggable();

        $(".ui-slider-handle").find('div').hide();

        $(window).click(function () {
            slider.find('div').hide("fade");
        });

        var title = owlItems.eq(0).find('.tls-images-item').attr('data-date-time');
        sliderHandle.find(".ui-tooltip-content").html(title);
        /*$(tooltip).css({
            left: $(tooltip).width() / -2
        });*/

        owl.on('changed.owl.carousel', function (event) {
            slider.slider("option", "value", event.item.index);
        });

        //zoom      ---------------------
        items.each(function (index, el) {
            var srcFull = $(el).find(".tls-img").attr('data-src-full');
            $(el).zoom({
                url: srcFull,
                on: 'click',
                onZoomIn: function () {
                    $(this).addClass('zoomedIn')
                },
                onZoomOut: function () {
                    $(this).removeClass('zoomedIn')
                },
            });
        });

    });

})(jQuery);
