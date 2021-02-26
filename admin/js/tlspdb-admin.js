(function ($) {
    'use strict';
    $(window).load(function () {

        var custom_uploader = wp.media({
            title: 'Insert image',
            library: {
                // uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
                uploadedTo: 'timelapse',
                type: 'image'
            },
            button: {
                text: 'Use image(s)' // button label text
            },
            multiple: true
        }).on('select', function () { // it also has "open" and "close" events
            var attachments = custom_uploader.state().get('selection').toJSON(),
                tableBody = $('.tls-table tbody');

            tableBody.html("");
            attachments.forEach(function (value) {
                tableBody.append(
                    '<tr>' +
                    '<td class="tls-image-td"><img class="tls-thumbnail" alt="" data-src-retina="' + value.sizes.full.url + '" src="' + value.sizes.thumbnail.url + '"/></td>' +
                    '<td>' + value.filename + '</td>' +
                    '<td>' + value.title + '</td>' +
                    '</tr>'
                );
            });
            $('input[name=img-tlspdb]').val(attachments.map(value => value.id));

            setupZoom();

        });

        custom_uploader.on('open', function () {
            var selection = custom_uploader.state().get('selection');
            var ids_value = jQuery('input[name=img-tlspdb]').val();

            if (ids_value.length > 0) {
                var ids = ids_value.split(',');

                ids.forEach(function (id) {
                    var attachment = wp.media.attachment(id);
                    attachment.fetch();
                    selection.add(attachment ? [attachment] : []);
                });
            }
        });

        // on upload button click
        $('.upload-tlspdb').on('click', function (e) {

            e.preventDefault();

            custom_uploader.open();
        });

        setupZoom();

    });

    function setupZoom() {
        $('.tls-table .tls-image-td').each(function () {
            var imgEl = $(this).find('img'),
                urlRetina = imgEl.attr('data-src-retina');
            $(this).zoom({
                // on: 'click',
                url: urlRetina,
            });
        })
    }
})(jQuery);
