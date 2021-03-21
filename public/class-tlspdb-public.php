<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://romroid.ir
 * @since      1.0.0
 *
 * @package    Tlspdb
 * @subpackage Tlspdb/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tlspdb
 * @subpackage Tlspdb/public
 * @author     poorya dehghan berenji <dev.poorya.db@gmail.com>
 */
class Tlspdb_Public {

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
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version     The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct($plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_register_style(
			$this->plugin_name,
			plugin_dir_url(__FILE__) . 'css/tlspdb-public.css',
			array(),
			$this->version,
			'all'
		);
		wp_register_style(
			$this->plugin_name . "-owl.carousel",
			plugin_dir_url(__FILE__) . 'css/owlCarousel/owl.carousel.css',
			array(),
			$this->version,
			'all'
		);

		wp_register_style(
			$this->plugin_name . "-jquery-ui.theme",
			plugin_dir_url(__FILE__) . 'css/jquery-ui/jquery-ui.theme.css',
			array(),
			$this->version,
			'all'
		);
		wp_register_style(
			$this->plugin_name . "-jquery.ui.slider-rtl",
			plugin_dir_url(__FILE__) . 'css/jquery-ui/jquery.ui.slider-rtl.css',
			array(),
			$this->version,
			'all'
		);

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
			plugin_dir_url(__FILE__) . 'js/tlspdb-public.js',
			array('jquery'),
			$this->version,
			false
		);
		wp_register_script(
			$this->plugin_name . "-owl.carousel",
			plugin_dir_url(__FILE__) . 'js/owlCarousel/owl.carousel.js',
			array('jquery'),
			$this->version,
			false
		);
		wp_register_script(
			$this->plugin_name . "-owl.lazyload",
			plugin_dir_url(__FILE__) . 'js/owlCarousel/owl.lazyload.js',
			array('jquery'),
			$this->version,
			false
		);

		wp_register_script(
			$this->plugin_name . "-jquery-ui",
			plugin_dir_url(__FILE__) . 'js/jquery-ui/jquery-ui.js',
			array('jquery'),
			$this->version,
			false
		);

		wp_register_script(
			$this->plugin_name . "-jquery.ui.touch-punch.min",
			plugin_dir_url(__FILE__) . 'js/jquery-ui/jquery.ui.touch-punch.min.js',
			array('jquery'),
			$this->version,
			false
		);

		wp_register_script(
			$this->plugin_name . "-jquery.zoom",
			plugin_dir_url(__FILE__) . 'js/jquery.zoom.min.js',
			array('jquery'),
			$this->version,
			false
		);

	}

}
