<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://romroid.ir
 * @since      1.0.0
 *
 * @package    Tlspdb
 * @subpackage Tlspdb/admin/partials
 */
// $post

wp_enqueue_style(TLSPDB_PLUGIN_SLUG);
wp_enqueue_style(TLSPDB_PLUGIN_SLUG . '_admin_bootstrap_css');

if (!did_action('wp_enqueue_media')) {
	wp_enqueue_media();
}
wp_enqueue_script(TLSPDB_PLUGIN_SLUG);
wp_enqueue_script(TLSPDB_PLUGIN_SLUG . '_admin_bootstrap_js');
wp_enqueue_script(TLSPDB_PLUGIN_SLUG . "-admin-jquery.zoom");


$image_ids = get_post_meta($post->ID, tlspdb_constants::timelapse_box_image_ids_option, true);
$image_ids = explode(',', $image_ids);

wp_nonce_field('somerandomstr', tlspdb_constants::timelapse_box_nounce);

?>

<table class="tls-table table table-bordered">
    <div class="form-inline">
        <div class="upload-tlspdb btn btn-primary"><?php _e('Select/Upload image', 'tlspdb'); ?></div>
        <hr>
        <label for="tlspdb-sort-image"><?php _e('Sort by:', 'tlspdb'); ?></label>
        <select class="custom-select" id="tlspdb-sort-image" name="img-sort-tlspdb">
            <option value="asc"
                <?php selected(get_post_meta($post->ID, tlspdb_constants::timelapse_box_image_sort_option, true), 'asc'); ?>>
                <?php _e('ascending', 'tlspdb'); ?></option>
            <option value="dsc"
                <?php selected(get_post_meta($post->ID, tlspdb_constants::timelapse_box_image_sort_option, true), 'dsc'); ?> >
                <?php _e('descending', 'tlspdb'); ?></option>
        </select>
    </div>

    <thead>
    <tr>
        <th><?php _e('image', 'tlspdb'); ?></th>
        <th><?php _e('file name', 'tlspdb'); ?></th>
        <th><?php _e('title (used as date-tooltip)', 'tlspdb'); ?></th>
    </tr>
    </thead>
    <tbody>
	<?php
	if (empty($image_ids[0])) {
		echo '<tr class="table-info"><td>';
		echo __('Empty list', 'tlspdb');
		echo '</tr></td>';
	} else {
		foreach ($image_ids as $id) {
			$imageUrl = wp_get_attachment_image_src($id, 'thumbnail', true);
			$imageBigUrl = wp_get_attachment_image_src($id, 'full', true);

			$imagePost = get_post($id);
			?>
            <tr>
                <td class="tls-image-td"><img alt="" class="tls-thumbnail" data-src-retina="<?php echo $imageBigUrl[0]; ?>"
                                              src="<?php echo $imageUrl[0]; ?>"/></td>
                <td class="text-left" style="direction: ltr"><?php echo basename($imagePost->guid); ?></td>
                <td class="text-left"><?php echo $imagePost->post_title; ?></td>
            </tr>
		<?php }
	} ?>
    </tbody>
    <input type="hidden" name="img-tlspdb" value="<?php echo implode(',', $image_ids); ?>">
</table>