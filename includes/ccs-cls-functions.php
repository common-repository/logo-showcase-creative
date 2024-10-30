<?php
/**
 * Plugin generic functions file
 *
 * @package Logo Showcase Creative
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Function to unique number value
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_get_unique() {
	static $unique = 0;
	$unique++;

	return $unique;
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_esc_attr($data) {
	return esc_attr( stripslashes($data) );
}

/**
 * Strip Slashes From Array
 *
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_slashes_deep($data = array(), $flag = false) {
	
	if($flag != true) {
		$data = ccs_cls_nohtml_kses($data);
	}
	$data = stripslashes_deep($data);
	return $data;
}

/**
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_nohtml_kses($data = array()) {
	
	if ( is_array($data) ) {
		
		$data = array_map('ccs_cls_nohtml_kses', $data);
		
	} elseif ( is_string( $data ) ) {
		$data = trim( $data );
		$data = wp_filter_nohtml_kses($data);
	}
	
	return $data;
}

/**
 * Function to get featured content column
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_column( $row = '' ) {
	if($row == 2) {
		$per_row = 6;
	} else if($row == 3) {
		$per_row = 4;	
	} else if($row == 4) {
		$per_row = 3;
	} else if($row == 1) {
		$per_row = 12;
	} else{
        $per_row = 12;
    }

    return $per_row;
}

/**
 * Function to get post excerpt
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_get_post_excerpt( $post_id = null, $content = '', $word_length = '55', $more = '...' ) {

	$has_excerpt 	= false;
	$word_length 	= !empty($word_length) ? $word_length : '55';

	// If post id is passed
	if( !empty($post_id) ) {
		
		if (has_excerpt($post_id)) {

			$has_excerpt 	= true;
			$content 		= get_the_excerpt();
		} else {
			$content = !empty($content) ? $content : get_the_content();
		}
	}

	if( !empty($content) && (!$has_excerpt) ) {
		$content = strip_shortcodes( $content ); // Strip shortcodes
		$content = wp_trim_words( $content, $word_length, $more );
	}

	return $content;
}

/**
 * Function to get shortcode designs
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_designs() { 
	$design_arr = array(
		'design-1' 	=> array(
        						'file' 	=> 'design-1',
        						'name'	=> __('Design 1', 'ccs-logo-showcase-creative'),
        					),
		'design-2' 	=> array(
        						'file' 	=> 'design-1',
        						'name'	=> __('Design 2', 'ccs-logo-showcase-creative'),
        					),
		'design-3' 	=> array(
        						'file' 	=> 'design-1',
        						'name'	=> __('Design 3', 'ccs-logo-showcase-creative'),
        					),
		'design-4' 	=> array(
        						'file' 	=> 'design-1',
        						'name'	=> __('Design 4', 'ccs-logo-showcase-creative'),
        					),
	);
	return apply_filters('ccs_cls_designs', $design_arr );
}

/**
 * Function to get post external link or permalink
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_get_post_link( $post_id = '' ) {

	$post_link = '';

	if( !empty($post_id) ) {

		$prefix = CCS_CLS_META_PREFIX;
		
		$post_link = get_post_meta( $post_id, $prefix.'logo_link', true );
		
		if( empty($post_link) ) {
			$post_link = get_post_permalink( $post_id );	
		}
	}
	return $post_link;
}

/**
 * get featured image of logo post
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_get_logo_image( $post_id = '', $size = 'full' ) {
	
	// If external image is blank then take featured image
	if( empty($image) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
		
		if( !empty($image) ) {
			$image = isset($image[0]) ? $image[0] : '';
		}
	}
	
	return $image;
}

/**
 * Function to add array after specific key
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_add_array(&$array, $value, $index) {
	
	if( is_array($array) && is_array($value) ){
		$split_arr 	= array_splice($array, max(0, $index));
    	$array 		= array_merge( $array, $value, $split_arr);
	}

	return $array;
}

/**
 * Function to get plugin design file
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */
function ccs_cls_get_design( $design = '' ) {
		$shortcode_designs = ccs_cls_designs();
	$result = ( array_key_exists(trim($design), $shortcode_designs) && !empty($shortcode_designs[$design]['file']) ) ? trim($shortcode_designs[$design]['file']) : 'design-1';
	return $result;
}