<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Logo Showcase Creative
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Ccs_cLs_Admin {
	
	function __construct() {

		// Action to add metabox
		add_action( 'add_meta_boxes', array($this, 'ccs_cls_metabox') );

		// Action to save metabox
		add_action( 'save_post', array($this,'ccs_cls_save_metabox_value') );

		// Filter to add extra column in `news-category` table
		add_filter( 'manage_'.CCS_CLS_TAXONOMIES.'_custom_column', array($this, 'ccs_cls_category_data'), 10, 3 );
		add_filter( 'manage_edit-'.CCS_CLS_TAXONOMIES.'_columns', array($this, 'ccs_cls_manage_category_columns') ); 
	}

	/**
	 * News Post Settings Metabox
	 * 
	 * @package Logo Showcase Creative
	 * @since 1.0.0
	 */
	function ccs_cls_metabox() {
		add_meta_box( 'ccs-cls-post-sett', __( 'Logo Other Details', 'ccs-logo-showcase-creative' ), array($this, 'ccs_cls_mb_content'), CCS_CLS_POST_TYPE, 'normal', 'high' );
	}

	/**
	 * News Post Settings Metabox HTML
	 * 
	 * @package Logo Showcase Creative
	 * @since 1.0.0
	 */
	function ccs_cls_mb_content() {
		include_once( CCS_CLS_DIR .'/includes/admin/metabox/ccs-cls-post-sett-metabox.php');
	}

	/**
	 * Function to save metabox values
	 * 
	 * @package Logo Showcase Creative
	 * @since 1.0.0
	 */
	function ccs_cls_save_metabox_value( $post_id ) {

		global $post_type;
		
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )                	// Check Autosave
		|| ( ! isset( $_POST['post_ID'] ) || $post_id != $_POST['post_ID'] )  	// Check Revision
		|| ( $post_type !=  CCS_CLS_POST_TYPE ) )              				// Check if current post type is supported.
		{
		  return $post_id;
		}

		$prefix = CCS_CLS_META_PREFIX; // Taking metabox prefix

		// Taking variables
		$read_more_link = isset($_POST[$prefix.'logo_link']) ? ccs_cls_slashes_deep(trim($_POST[$prefix.'logo_link'])) : '';

		update_post_meta($post_id, $prefix.'logo_link', $read_more_link);
	}

	/**
	 * Add extra column to news category
	 * 
	 * @package Logo Showcase Creative
	 * @since 1.0.0
	 */
	function ccs_cls_manage_category_columns($columns) {

		$new_columns['logo_shortcode'] = __( 'Logo Category Shortcode', 'ccs-logo-showcase-creative' );

		$columns = ccs_cls_add_array( $columns, $new_columns, 2 );

		return $columns;
	}

	/**
	 * Add data to extra column to news category
	 * 
	 * @package Logo Showcase Creative
	 * @since 1.0.0
	 */
	function ccs_cls_category_data($ouput, $column_name, $tax_id) {
		
		if( $column_name == 'logo_shortcode' ){
			$ouput .= '[ccs-logoshowcase type="grid" category="' . $tax_id. '"]<br/>';
			$ouput .= '[ccs-logoshowcase type="slider" category="' . $tax_id. '"]<br/>';
	    }
		
	    return $ouput;
	}
}

$ccs_cls_admin = new Ccs_cLs_Admin();