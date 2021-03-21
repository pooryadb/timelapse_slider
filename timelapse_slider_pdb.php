<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://romroid.ir
 * @since             1.0.0
 * @package           Tlspdb
 *
 * @wordpress-plugin
 * Plugin Name:       Time-lapse slider
 * Plugin URI:        Shows bunch of pictures like time lapse in slider style
 * Description:       With this plugin, admin can select bunch of images (time-lapse) and show them as carousel in website with the help of short-codes.
 * Version:           1.0.8
 * Author:            poorya dehghan berenji
 * Author URI:        http://romroid.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tlspdb
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('TLSPDB_VERSION', '1.0.8');
define('TLSPDB_PLUGIN_SLUG', 'tlspdb');
define('TLSPDB_PLUGIN_NAME', __('Time Lapse', 'tlspdb'));

require plugin_dir_path(__FILE__) . 'includes/tlspdb_constants.php';
require plugin_dir_path(__FILE__) . 'includes/tlspdb-shortcodes.php';
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tlspdb-activator.php
 */
function activate_tlspdb() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-tlspdb-activator.php';
	Tlspdb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tlspdb-deactivator.php
 */
function deactivate_tlspdb() {
	require_once plugin_dir_path(__FILE__) . 'includes/class-tlspdb-deactivator.php';
	Tlspdb_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_tlspdb');
register_deactivation_hook(__FILE__, 'deactivate_tlspdb');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-tlspdb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tlspdb() {

	$plugin = new Tlspdb();
	$plugin->run();

}

run_tlspdb();

