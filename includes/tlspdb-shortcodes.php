<?php

add_shortcode(tlspdb_constants::slider_shortCode_name, 'tlspdb_slider_shortcode');
function tlspdb_slider_shortcode($attrs) {
	$attr = shortcode_atts(
		array(
			'id' => '-1'
		),
		$attrs,
		tlspdb_constants::slider_shortCode_name
	);

	if ($attr['id'] == -1) {
		return __('Please insert TimeLapseSlide "id" to shortCode usage', 'tlspdb');
	}

	$file_path = plugin_dir_path(dirname(__FILE__)) . 'public/partials/tlspdb-public-shortcode-slider.php'; // adjust your path here
	if (!file_exists($file_path)) {
		return __('Error, file not found!', 'tlspdb');
	}
	ob_start();
	include($file_path);
	$html = ob_get_contents();
	ob_end_clean();

	return $html;
}