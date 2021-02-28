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

wp_enqueue_style(TLSPDB_PLUGIN_SLUG);
wp_enqueue_style(TLSPDB_PLUGIN_SLUG . "-owl.carousel");
wp_enqueue_style(TLSPDB_PLUGIN_SLUG . "-jquery-ui.theme");
wp_enqueue_style(TLSPDB_PLUGIN_SLUG . "-jquery.ui.slider-rtl");
wp_enqueue_script(TLSPDB_PLUGIN_SLUG);
wp_enqueue_script(TLSPDB_PLUGIN_SLUG . "-owl.carousel");
wp_enqueue_script(TLSPDB_PLUGIN_SLUG . "-owl.lazyload");
wp_enqueue_script(TLSPDB_PLUGIN_SLUG . "-jquery-ui");
wp_enqueue_script(TLSPDB_PLUGIN_SLUG . "-jquery.ui.touch-punch.min");
wp_enqueue_script(TLSPDB_PLUGIN_SLUG . "-jquery.ui.slider-rtl");
wp_enqueue_script(TLSPDB_PLUGIN_SLUG . "-jquery.zoom");

$image_ids      = get_post_meta($attr['id'], tlspdb_constants::timelapse_box_image_ids_option, true);
$image_ids      = explode(',', $image_ids);
$image_ids_size = sizeof($image_ids);

?>

<div class="tls-parent">
    <div class="tls-loading">
        <span class="tls-loading-text">Loading</span>
    </div>
    <div class="tls-images-parent owl-carousel">
		<?php
		foreach ($image_ids as $id) {
			$title      = get_post($id)->post_title;
			$img        = wp_get_attachment_image_src($id, [1400, 1000]);
			$imgFullUrl = $img[0];
			if ($img[3] == true) {
				$imgFullUrl = wp_get_attachment_image_src($id, 'full')[0];
			}
			?>
            <div class="tls-images-item" data-date-time="<?php echo $title; ?>">
                <img role="presentation" alt="" data-src-full="<?php echo $imgFullUrl; ?>" data-src="<?php echo $img[0]; ?>"
                     width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" class="tls-img owl-lazy">
            </div>
		<?php } ?>
    </div>
    <div class="tls-slider-parent">
        <div class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                  ></span>
        </div>
    </div>
</div>