(function ($) {
    'use strict';
    $(window).load(function () {

        // on upload button click
        $('body').on('click', '.upload-tlspdb', function (e) {

            e.preventDefault();

            var button = $(this),
                custom_uploader = wp.media({
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
                    var attachment = custom_uploader.state().get('selection').toJSON(),
                        attachmentSize = attachment.length;
                    // console.log("selection: ", attachment)

                    var imgHtml = '<img src="' + attachment[0].sizes.thumbnail.url + '">'
                    if (attachmentSize > 1) {
                        imgHtml += ' ... ... > ' +
                            '<img src="' + attachment[attachmentSize - 1].sizes.thumbnail.url + '">' +
                            'click to replace'
                    }

                    button.html(imgHtml).show();
                    $('input[name=img-tlspdb]').val(attachment.map(value => value.id));

                }).open();

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
            })

        });

    });
})(jQuery);
