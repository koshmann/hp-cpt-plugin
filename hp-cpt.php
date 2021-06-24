<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/koshmann
 * @since             1.0.0
 * @package           Hp_Cpt
 *
 * @wordpress-plugin
 * Plugin Name:       HappyProperty CPT
 * Plugin URI:        https://github.com/koshmann
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            koshmann
 * Author URI:        https://github.com/koshmann
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hp-cpt
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'HP_CPT_VERSION', '1.0.0' );


require plugin_dir_path( __FILE__ ) . 'inc/estate-cpt.php';
require plugin_dir_path( __FILE__ ) . 'inc/taxonomys.php';
require plugin_dir_path( __FILE__ ) . 'inc/filters.php';
require plugin_dir_path( __FILE__ ) . 'inc/callback.php';
require plugin_dir_path( __FILE__ ) . 'inc/widget.php';