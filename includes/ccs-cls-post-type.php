<?php
/**
 * Register Post type functionality
 *
 * @package Logo Showcase Creative
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Function to register post type
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */

function ccs_cls_logo_showcase_post_types() {

	$ccs_cls_logos_labels =  apply_filters( 'ccs_cls_logo_showcase_labels', array(
		'name'                => 'Logo Showcase',
		'singular_name'       => 'Logo Showcase',
		'add_new'             => __('Add New', 'ccs-logo-showcase-creative'),
		'add_new_item'        => __('Add New Logo Showcase', 'ccs-logo-showcase-creative'),
		'edit_item'           => __('Edit Logo Showcase', 'ccs-logo-showcase-creative'),
		'new_item'            => __('New Logo Showcase', 'ccs-logo-showcase-creative'),
		'all_items'           => __('All Logo Showcase', 'ccs-logo-showcase-creative'),
		'view_item'           => __('View Logo Showcase', 'ccs-logo-showcase-creative'),
		'search_items'        => __('Search Logo Showcase', 'ccs-logo-showcase-creative'),
		'not_found'           => __('No Logo Showcase found', 'ccs-logo-showcase-creative'),
		'not_found_in_trash'  => __('No Logo Showcase found in Trash', 'ccs-logo-showcase-creative'),
		'parent_item_colon'   => '',
		'menu_name'           => __('Logo Showcase', 'ccs-logo-showcase-creative'),
		'exclude_from_search' => true
	));

	$ccs_cls_logos_args = array(
		'labels' 				=> $ccs_cls_logos_labels,
		'public' 				=> true,
		'menu_icon'   			=> 'dashicons-images-alt2',
		'show_ui' 				=> true,
		'show_in_menu' 			=> true,
		'query_var' 			=> false,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'supports' 				=> array('title','thumbnail')
	);
	register_post_type( CCS_CLS_POST_TYPE, apply_filters( 'ccs_cls_logo_showcase_post_type_args', $ccs_cls_logos_args ) );
}
add_action('init', 'ccs_cls_logo_showcase_post_types');

/**
 * Function to register taxonomy
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
add_action( 'init', 'ccs_cls_logo_showcase_taxonomies');
function ccs_cls_logo_showcase_taxonomies() {
    $ccs_cls_logo_cat_labels = array(
        'name'              => _x( 'Logo Categories', 'ccs-logo-showcase-creative' ),
        'singular_name'     => _x( 'Logo Category', 'ccs-logo-showcase-creative' ),
        'search_items'      => __( 'Search Logo Category', 'ccs-logo-showcase-creative' ),
        'all_items'         => __( 'All Logo Category', 'ccs-logo-showcase-creative' ),
        'parent_item'       => __( 'Parent Logo Category', 'ccs-logo-showcase-creative' ),
        'parent_item_colon' => __( 'Parent Logo Category:', 'ccs-logo-showcase-creative' ),
        'edit_item'         => __( 'Edit Logo Category', 'ccs-logo-showcase-creative' ),
        'update_item'       => __( 'Update Logo Category', 'ccs-logo-showcase-creative' ),
        'add_new_item'      => __( 'Add New Logo Category', 'ccs-logo-showcase-creative' ),
        'new_item_name'     => __( 'New Logo Category Name', 'ccs-logo-showcase-creative' ),
        'menu_name'         => __( 'Logo Categories', 'ccs-logo-showcase-creative' ),

    );
    $ccs_cls_logo_cat_args = array(
    	'public'			=> false,
        'hierarchical'      => true,
        'labels'            => $ccs_cls_logo_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => false,
    );
    register_taxonomy( CCS_CLS_TAXONOMIES, array( CCS_CLS_POST_TYPE ), $ccs_cls_logo_cat_args );
}