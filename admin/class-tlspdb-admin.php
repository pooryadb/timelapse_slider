<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://romroid.ir
 * @since      1.0.0
 *
 * @package    Tlspdb
 * @subpackage Tlspdb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tlspdb
 * @subpackage Tlspdb/admin
 * @author     poorya dehghan berenji <dev.poorya.db@gmail.com>
 */
class Tlspdb_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct($plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tlspdb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tlspdb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_style(
			$this->plugin_name,
			plugin_dir_url(__FILE__) . 'css/tlspdb-admin.css',
			array(),
			$this->version,
			'all'
		);

		if (is_rtl()) {
			wp_register_style(
				$this->plugin_name . '_admin_bootstrap_css',
				plugin_dir_url(__FILE__) . 'css/bootstrap/bootstrap-rtl.min.css'
			);
		} else {
			wp_register_style(
				$this->plugin_name . '_admin_bootstrap_css',
				plugin_dir_url(__FILE__) . 'css/bootstrap/bootstrap.min.css'
			);
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tlspdb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tlspdb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_script(
			$this->plugin_name,
			plugin_dir_url(__FILE__) . 'js/tlspdb-admin.js',
			array('jquery'),
			$this->version,
			false
		);

		wp_register_script(
			$this->plugin_name . '_admin_bootstrap_js',
			plugin_dir_url(__FILE__) . 'js/bootstrap.js',
			array('bootstrap'),
			$this->version,
			false
		);

		wp_register_script(
			$this->plugin_name . "-admin-jquery.zoom",
			plugin_dir_url(dirname(__FILE__)) . 'public/js/jquery.zoom.min.js',
			array('jquery'),
			$this->version,
			false
		);
	}

	/**
	 * Register the timeLapse post_type
	 *
	 * @since    1.0.0
	 */
	public function tlspdb_timeLapse_post_type() {

		$labels = array(
			'name'               => _x('TimeLapse', 'post type general name', 'tlspdb'),
			'singular_name'      => _x('TimeLapse', 'post type singular name', 'tlspdb'),
			'add_new'            => _x('Add New', 'book', 'tlspdb'),
			'add_new_item'       => __('Add New TimeLapse', 'tlspdb'),
			'edit_item'          => __('Edit TimeLapse', 'tlspdb'),
			'new_item'           => __('New TimeLapse', 'tlspdb'),
			'all_items'          => __('All TimeLapse', 'tlspdb'),
			'view_item'          => __('View TimeLapse', 'tlspdb'),
			'search_items'       => __('Search TimeLapse', 'tlspdb'),
			'not_found'          => __('No TimeLapse found', 'tlspdb'),
			'not_found_in_trash' => __('No TimeLapse found in the Trash', 'tlspdb'),
			'parent_item_colon'  => '’',
		);
		$args   = array(
			'labels'        => $labels,
			'description'   => __('Holds our TimeLapse slider data', 'tlspdb'),
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array('title', tlspdb_constants::box_select_images_id),
			'menu_icon'     => 'dashicons-slides',
			'has_archive'   => false,
		);

		register_post_type(tlspdb_constants::timelapse_post_type, $args);
	}

	public function tlspdb_timeLapse_messages($messages) {
		global $post, $post_ID;
		$messages[tlspdb_constants::timelapse_post_type] = array(
			0  => '’',
			1  => sprintf(__('TimeLapse updated. <a href="%s">View TimeLapse</a>'), esc_url(get_permalink($post_ID))),
			2  => __('Custom field updated.', 'tlspdb'),
			3  => __('Custom field deleted.', 'tlspdb'),
			4  => __('TimeLapse updated.', 'tlspdb'),
			5  => isset($_GET['revision']) ? sprintf(
				__('TimeLapse restored to revision from %s', 'tlspdb'),
				wp_post_revision_title((int)$_GET['revision'], false)
			) : false,
			6  => sprintf(__('TimeLapse published. <a href="%s">View TimeLapse</a>', 'tlspdb'), esc_url(get_permalink($post_ID))),
			7  => __('TimeLapse saved.', 'tlspdb'),
			8  => sprintf(
				__('TimeLapse submitted. <a target="_blank" href="%s">Preview TimeLapse</a>', 'tlspdb'),
				esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))
			),
			9  => sprintf(
				__('TimeLapse scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview TimeLapse</a>', 'tlspdb'),
				date_i18n(__('M j, Y @ G:i'), strtotime($post->post_date)),
				esc_url(get_permalink($post_ID))
			),
			10 => sprintf(
				__('TimeLapse draft updated. <a target="_blank" href="%s">Preview TimeLapse</a>', 'tlspdb'),
				esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))
			),
		);
		return $messages;
	}

	public function tlspdb_timeLapse_box() {
		add_meta_box(
			tlspdb_constants::box_select_images_id,
			__('Select Images', 'tlspdb'),
			'select_images_box_content',
			tlspdb_constants::timelapse_post_type,
			'normal',
			'core'
		);

		function select_images_box_content($post) {
			require plugin_dir_path(dirname(__FILE__)) . 'admin/partials/tlspdb-admin-select_images_box_content.php';
		}

	}

	public function tlspdb_timeLapse_box_save($post_id) {
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (isset($_POST[tlspdb_constants::timelapse_box_nounce]) && wp_verify_nonce(
				$_POST[tlspdb_constants::timelapse_box_nounce],
				plugin_basename(__FILE__)
			) !== false) {
			return;
		}

		if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return;
			}
		} else {
			if (!current_user_can('edit_post', $post_id)) {
				return;
			}
		}

		$sortBy = isset($_POST['img-sort-tlspdb']) ? $_POST['img-sort-tlspdb'] : 'asc';
		update_post_meta($post_id, tlspdb_constants::timelapse_box_image_sort_option, $sortBy);

		$imgIds = isset($_POST['img-tlspdb']) ? $_POST['img-tlspdb'] : '';
		update_post_meta($post_id, tlspdb_constants::timelapse_box_image_ids_option, $imgIds);
	}

	public function tlspdb_slider_shortcode_box() {
		add_meta_box(
			tlspdb_constants::box_slider_shortCode_id,
			__('Slider ShortCode', 'tlspdb'),
			'slider_shortcode_box_content',
			tlspdb_constants::timelapse_post_type,
			'side',
			'high'
		);

		function slider_shortcode_box_content($post) {
			$msg           = __('To use this TimeLapseSlider copy & paste below shortCode where ever you need', 'tlspdb');
			$shortCodeName = tlspdb_constants::slider_shortCode_name;
			$id            = $post->ID;

			echo "<p>$msg</p>";
			echo "<code>[$shortCodeName id=$id]</code>";

		}// slider_shortcode_box_content()

	}
}
