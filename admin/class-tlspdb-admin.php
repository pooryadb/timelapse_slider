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
	public function enqueue_styles() {

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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/tlspdb-admin.css', array(), $this->version, 'all');

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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/tlspdb-admin.js', array('jquery'), $this->version, false);

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
			'parent_item_colon'  => ’,
		);
		$args   = array(
			'labels'        => $labels,
			'description'   => __('Holds our TimeLapse slider data', 'tlspdb'),
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array('title'),
			'menu_icon'     => 'dashicons-slides',
			'has_archive'   => false,
		);

		register_post_type('TimeLapse', $args);
	}

}
