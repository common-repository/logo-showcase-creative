<?php
/**
 * Plugin Name: Logo Showcase Creative
 * Description: Add logoshowcase as a grid and slider in your website.
 * Author: Concept Corners
 * Text Domain: ccs-logo-showcase-and-carousel-slider
 * Domain Path: /languages/
 * Version: 1.0.0
 * Author URI: http://www.conceptcorners.com/
 *
 * @package WordPress
 * @author Concept Corners
 */

if( !defined( 'CCS_CLS_VERSION' ) ) {
    define( 'CCS_CLS_VERSION', '1.0.0' ); // Version of plugin
}
if( !defined( 'CCS_CLS_DIR' ) ) {
    define( 'CCS_CLS_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'CCS_CLS_URL' ) ) {
    define( 'CCS_CLS_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'CCS_CLS_POST_TYPE' ) ) {
    define( 'CCS_CLS_POST_TYPE', 'ccs-logoshowcase' ); // Plugin Post Type
}
if( !defined( 'CCS_CLS_TAXONOMIES' ) ) {
    define( 'CCS_CLS_TAXONOMIES', 'css-logo-showcase-cat' ); // Plugin Post Type
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_textdomain() {
	load_plugin_textdomain( 'ccs-creative-logo-showcase', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'ccs_cls_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'ccs_cls_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'ccs_cls_uninstall');

/**
 * Plugin Activation Function
 * Does the initial setup, sets the default values for the plugin options
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_install() {

	// Register post type function
	ccs_cls_logo_showcase_post_types();
	ccs_cls_logo_showcase_taxonomies();

	// IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}

/**
 * Plugin Deactivation Function
 * Delete  plugin options
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_uninstall() {
	
	// IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}

// Include files

// Functions File
require_once( CCS_CLS_DIR . '/includes/ccs-cls-functions.php' );

// Scripts File
require_once( CCS_CLS_DIR . '/includes/ccs-cls-scripts.php' );

// Plugin Post Type File
require_once( CCS_CLS_DIR . '/includes/ccs-cls-post-type.php' );

// Shortcode File
require_once( CCS_CLS_DIR . '/includes/shortcodes/ccs-cls-logo-showcase.php' );