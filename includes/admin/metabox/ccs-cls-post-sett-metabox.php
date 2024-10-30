<?php
/**
 * Handles 'Logo' post settings metabox HTML
 *
 * @package Logo Showcase Creative
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = CCS_CLS_META_PREFIX; // Metabox prefix

// Getting saved values
$logo_link = get_post_meta( $post->ID, $prefix.'logo_link', true );
?>

<table class="form-table unpw-post-sett-table">
	<tbody>

		<tr valign="top">
			<th scope="row">
				<label for="unpw-more-link"><?php _e('Logo URL', 'ccs-logo-showcase-creative'); ?></label>
			</th>
			<td>
				<input type="url" value="<?php echo ccs_cls_esc_attr($logo_link); ?>" class="large-text unpw-more-link" id="unpw-more-link" name="<?php echo $prefix; ?>logo_link" /><br/>
				<span class="description"><?php _e('Redirect to a custom link URL. e.g http://conceptcorners.com', 'ccs-logo-showcase-creative'); ?></span>
			</td>
		</tr>

	</tbody>
</table><!-- end .wtwp-tstmnl-table -->