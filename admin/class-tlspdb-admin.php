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
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tlspdb-admin.css', array(), $this->version, 'all' );

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tlspdb-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the admin menus
	 *
	 * @since    1.0.0
	 */
	public function add_admin_menus() {
		$position   = 16;
		$capability = 'manage_options';
		$main_slug  = tlspdb_constants::main_menu_slug;


		/*		$page_title = __('TimeLapse Slider', 'tlspdb');
				$menu_title = $page_title;
				$function   = array($this, 'tlspdb_main_slug_callback');

				add_menu_page(
					$page_title,
					$menu_title,
					$capability,
					$main_slug,
					$function,
					'dashicons-location',
					$position
				);*/

		//---------------------------------

		$page_title = __("TimeLapse Slider", "tlspdb");
		$menu_title = $page_title;
		$slug       = $main_slug;
		$function   = array($this, 'tlspdb_main_slug_callback');

		add_submenu_page(
			$main_slug,
			$page_title,
			$menu_title,
			$capability,
			$slug,
			$function
		);

	}

	function tlspdb_main_slug_callback() {
		//handle data saving
		if (!empty($_POST)) {

			$msg = __('Data saved.', 'tlspdb');
		}
//		require_once plugin_dir_path(__FILE__) . 'partials/... .php';
	}

}
