<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
?>

<div class="<?php echo $cnt_wrp_cls; ?>" title="<?php the_title(); ?>">
	<div class="ccs-cls-fix-box-warp">
		<div class="ccs-cls-fix-box">
			<?php if ($logourl != '') { ?>
				<a href="<?php echo esc_url($logourl); ?>" target="<?php echo $link_target; ?>">
					<img class="wp-post-image" src="<?php echo $feat_image; ?>" alt="<?php _e('Logo Image', 'ccs-logo-showcase-creative'); ?>" />
				</a>
			<?php } else { ?>
				<img class="wp-post-image" src="<?php echo $feat_image; ?>" alt="<?php _e('Logo Image', 'ccs-logo-showcase-creative'); ?>" />
			<?php } ?>
		</div>
		<div class="ccs-cls-logo-title"><?php the_title(); ?></div>
	</div>
</div>