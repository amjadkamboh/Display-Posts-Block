<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Display_Posts
 *
 * @wordpress-plugin
 * Plugin Name:       Display Posts Block
 * Plugin URI:        #
 * Description:       Display Posts – Easy lists, grids, and more.
 * Version:           1.0.0
 * Author:            Amjad Kamboh
 * Author URI:        #
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       display-posts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DISPLAY_POSTS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-display-posts-activator.php
 */
function activate_display_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-display-posts-activator.php';
	Display_Posts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-display-posts-deactivator.php
 */
function deactivate_display_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-display-posts-deactivator.php';
	Display_Posts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_display_posts' );
register_deactivation_hook( __FILE__, 'deactivate_display_posts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-display-posts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_display_posts() {

	$plugin = new Display_Posts();
	$plugin->run();

}
run_display_posts();
