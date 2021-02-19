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
                        type: 'image'
                    },
                    button: {
                        text: 'Use image(s)' // button label text
                    },
                    multiple: true
                }).on('select', function () { // it also has "open" and "close" events
                    var attachment = custom_uploader.state().get('selection').toJSON(),
                        attachmentSize = attachment.length;

                    attachment = attachment.sort(function (a, b) {
                        return (Number((a.title.match(/(\d+)/g)[0])) - Number(b.title.match(/(\d+)/g)[0]));
                    });

                    var div = $(".select_image_tlspdb"),
                        imageRow = div.find("#img_row_tlspdb"),
                        img1 = imageRow.find("#img_1_tlspdb"),
                        img2 = imageRow.find("#img_2_tlspdb"),
                        imgCount = imageRow.find("#img_count_tlspdb"),
                        input = div.find('input[name=img-ids-tlspdb]');

                    imageRow.show();
                    img1.attr("src", attachment[0].sizes.thumbnail.url);
                    img2.attr("src", attachment[attachmentSize - 1].sizes.thumbnail.url);
                    imgCount.html(attachmentSize);
                    input.val(attachment.map(value => value.id));

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
