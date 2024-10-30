<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Logo Showcase Creative
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class cLs_Script {
	
	function __construct() {

		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array( $this, 'ccs_cls_front_style') );

		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array( $this, 'ccs_cls_front_script') );
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package Logo Showcase Creative
 	 * @since 1.0.0
	 */
	function ccs_cls_front_style() {
		
		// Registring and enqueing slick css
		if( !wp_style_is( 'ccs-slick-style', 'registered' ) ) {
			wp_register_style( 'ccs-slick-style', CCS_CLS_URL.'assets/css/slick.css', null, CCS_CLS_VERSION );
			wp_enqueue_style('ccs-slick-style');
		}
		
		// Registring public style
		wp_register_style( 'ccs-cls-public-style', CCS_CLS_URL.'assets/css/ccs-cls-public-style.css', null, CCS_CLS_VERSION );
		wp_enqueue_style('ccs-cls-public-style');
	}
	
	/**
	 * Function to add script at front side
	 * 
	 * @package Logo Showcase Creative
 	 * @since 1.0.0
	 */
	function ccs_cls_front_script() {
		
		// Registring slick slider script
		if( !wp_script_is( 'ccs-slick-jquery', 'registered' ) ) {
			wp_register_script( 'ccs-slick-jquery', CCS_CLS_URL . 'assets/js/slick.min.js', array('jquery'), CCS_CLS_VERSION, true );
		}
		
		// Registring and enqueing public script
		wp_register_script( 'ccs-cls-public-script', CCS_CLS_URL.'assets/js/ccs-cls-public-script.js', array('jquery'), CCS_CLS_VERSION, true );
		wp_localize_script( 'ccs-cls-public-script', 'Cls', array(
																		'is_mobile' => (wp_is_mobile()) ? 1 : 0,
																		'is_rtl' 	=> (is_rtl()) 		? 1 : 0
																	));
	}
}

$cls_script = new cLs_Script();