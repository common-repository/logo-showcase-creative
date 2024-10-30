<?php 
/**
 * 'ccs-logoshowcase' Shortcode
 * 
 * @package Logo Showcase Creative
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

function ccs_cls_get_logo_showcase( $atts, $content = null ) {
	
	// Shortcode Parameters
	extract(shortcode_atts(array(
		'limit'					=> 10,
		'category' 				=> '',
		'design'	 			=> 'design-1',
		'grid' 					=> 3,
		'order'					=> 'DESC',
		'orderby'				=> 'post_date',
		'link_target'			=> 'self',
		'exclude_post'			=> array(),
		'posts'					=> array(),
		'image_size' 			=> 'full',
		'type' 					=> 'grid',
		'dots' 					=> 'true',
		'arrows' 				=> 'true',
		'loop' 					=> 'true',
		'autoplay' 				=> 'true',
		'slides_column' 		=> 4,
		'slides_scroll' 		=> 1,
		), $atts));
	
	$shortcode_designs 	= ccs_cls_designs();
	$posts_per_page		= (!empty($limit)) 						? $limit 						: 10;
	$cat 				= (!empty($category))					? explode(',',$category) 		: '';
	$grid				= (!empty($grid) && $grid <= 12) 		? $grid 						: '4';
	$grid_class			= ($grid <= 12 ) 						? ('ccs-cls-col-'.($grid)) 		: 'ccs-cls-col-4';
	$order 				= ( strtolower($order) == 'asc' ) 		? 'ASC' 						: 'DESC';
	$orderby 			= (!empty($orderby))					? $orderby						: 'post_date';
	$link_target 		= ($link_target == 'blank') 			? '_blank' 						: '_self';
	$exclude_post 		= !empty($exclude_post)					? explode(',', $exclude_post) 	: array();
	$posts 				= !empty($posts)						? explode(',', $posts) 			: array();
	$grid_clmn       	= ccs_cls_column($grid);
	$grid_cls       	= 'ccs-medium-'.$grid_clmn.' ccs-column';
	$type 				= ( $type == 'grid' ) 					? 'grid' 						: 'slider';
	$design 			= ($design && (array_key_exists(trim($design), $shortcode_designs))) ? trim($design) : 'design-1';

	$design_file 		= ccs_cls_get_design( $design );
	$design_file_path 	= CCS_CLS_DIR . '/templates/' . $design_file . '.php';
	$design_file 		= (file_exists($design_file_path)) 		? $design_file_path : '';

	if( $type == 'slider' ){

		$dots 				= ($dots == 'false') 					? 'false' 						: 'true';
		$arrows 			= ($arrows == 'false') 					? 'false' 						: 'true';
		$autoplay 			= ($autoplay == 'false') 				? 'false' 						: 'true';
		$loop 				= ($loop == 'false') 					? 'false' 						: 'true';
		$slides_column 		= !empty($slides_column) 				? $slides_column 				: 4;
		$slides_scroll 		= !empty($slides_scroll) 				? $slides_scroll 				: 1;
		$logo_conf = compact('slides_column', 'slides_scroll', 'dots', 'arrows', 'autoplay', 'loop');
	}
	
	if( $type == 'slider' ){
		wp_enqueue_script('ccs-slick-jquery');
		wp_enqueue_script('ccs-cls-public-script');
	}

	global $post;

	$unique = ccs_cls_get_unique();

	$args = array (
		'post_type'      	=> CCS_CLS_POST_TYPE,
		'orderby'        	=> $orderby,
		'order'          	=> $order,
		'posts_per_page' 	=> $posts_per_page,
		'post__not_in'		=> $exclude_post,
		'post__in'			=> $posts,
		);

	if($cat != "") {
		$args['tax_query'] = array( 
			array( 
				'taxonomy' => CCS_CLS_TAXONOMIES, 
				'field' => 'id', 
				'terms' => $cat
			) 
		);
	}

	// Taking some defaults
	$unique 			= ccs_cls_get_unique();
	$count 				= 0;
	$logo_main_wrp_cls 	= ( $type == 'grid' ) ? 'ccs-cls-logo-showcase-grid-wrp' : 'ccs-cls-showcase-slider-wrp';
	$logo_main_cls 		= ( $type == 'grid' ) ? 'ccs-cls-logo-showcase ccs-cls-logo-grid ccs-cls-logo-grid-'.$grid .' ccs-cls-'.$design : 'ccs-cls-logo-showcase ccs-cls-logo-slider ccs-cls-logo-slider-'.$unique .' ccs-cls-'.$design;
	
	// WP Query
	$query 			= new WP_Query($args);
	$post_count 	= $query->post_count;

	ob_start();

	// If post is there
	if( $query->have_posts() ) { ?>
		<div class="<?php echo $logo_main_wrp_cls; ?> ccs-cls-clearfix">
			<div id="ccs-cls-slider-<?php echo $unique; ?>" class="<?php echo $logo_main_cls; ?>">

				<?php while ($query->have_posts()) : $query->the_post();
						
					$first_last_cls = '';
					$feat_image 	= ccs_cls_get_logo_image($post->ID,$image_size);
					$logourl 		= ccs_cls_get_post_link($post->ID);

					if( $count == 0 ){
						$first_last_cls = 'ccs-cls-first';
					} elseif ( $count == $grid ) {
						$count = 0;
						$first_last_cls = 'ccs-cls-last';
					}
					
					$cnt_wrp_cls = ( $type == 'grid' ) ? "ccs-cls-logo-cnt {$grid_class} ccs-cls-columns {$first_last_cls}" : 'ccs-cls-logo-cnt';

					// Include shortcode html file
					if( $design_file_path ) {
						include( $design_file_path );
					}

					$count++;
				endwhile;

				wp_reset_query(); // reset wp query ?>		
			</div><!-- end .ccs-cls-logo-grid -->
			<?php if( $type == 'slider' ){ ?>
				<div class="ccs-cls-slider-conf"><?php echo json_encode( $logo_conf ); ?></div>
			<?php } ?>
		</div>
	<?php
		$content .= ob_get_clean();
		return $content;
	}
}
// 'ccs-logoshowcase' shortcode
add_shortcode('ccs-logoshowcase', 'ccs_cls_get_logo_showcase');