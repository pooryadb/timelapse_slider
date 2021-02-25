<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://romroid.ir
 * @since      1.0.0
 *
 * @package    Tlspdb
 * @subpackage Tlspdb/public/partials
 */

$image_ids      = get_post_meta($attr['id'], tlspdb_constants::timelapse_box_image_ids_option, true);
$image_ids      = explode(',', $image_ids);
$image_ids_size = sizeof($image_ids);

error_log("post id: ${attr['id']}, image ids: " . var_export($image_ids, true));
?>

<div class="tls-parent">
    <div class="tls-loading">
        <span class="tls-loading-text">Loading</span>
    </div>
    <div class="tls-images-parent owl-carousel">
		<?php
		foreach ($image_ids as $id) {
			$title = get_post($id)->post_title;
			$img   = wp_get_attachment_image_src($id, 'full');
			?>
            <div class="tls-images-item" data-date-time="$<?php echo $title; ?>">
                <img role="presentation" alt="" data-src="<?php echo $img[0]; ?>" class="tls-img owl-lazy animate__animated animate__fadeIn">
            </div>
		<?php } ?>
        <!--<div class="timelapse-item" data-date-time="31-Dec-2016 12:38 PM" style="position: absolute; overflow: hidden;">
            <img
                    role="presentation" alt=""
                    src="https://www.eaglehills.com/wp-content/uploads/timelapse/eh-10001/zoom/20161231123852.jpeg"
                    class="zoomImg"
                    style="position: absolute; top: 0; left: 0; opacity: 0; width: 1798.8px; height: 1200; border: none; max-width: none; max-height: none;">
            <img
					class="image-zoom timelapse-img-lazy-load lazy-load loaded-img"
					src="https://www.eaglehills.com/wp-content/uploads/timelapse/eh-10001/20161231123852.jpeg"
					data-src="https://www.eaglehills.com/wp-content/uploads/timelapse/eh-10001/20161231123852.jpeg"
					alt="20161231123852.jpeg"
					data-zoom-image="https://www.eaglehills.com/wp-content/uploads/timelapse/eh-10001/zoom/20161231123852.jpeg">
        </div>-->
    </div>
    <div class="tls-slider-parent">
        <div class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                  title="<?php echo get_post($image_ids[0])->post_title; ?>"></span>
        </div>
    </div>
</div>