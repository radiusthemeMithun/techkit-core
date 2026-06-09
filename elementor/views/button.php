<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
$attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
    $attr  = 'href="' . esc_url( $data['buttonurl']['url'] ) . '"';
    $attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

?>
<div class="rtin-button <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
	<?php if( !empty( $data['buttontext'] ) ) { ?>
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $attr URL is escaped via esc_url above; radius_arrow_shape() returns trusted static SVG markup. ?>
		<a class="button-<?php echo esc_attr( $data['style'] ); ?> btn-common rt-animation-out" <?php echo $attr; ?>><?php echo esc_html( $data['buttontext'] );?><?php echo radius_arrow_shape(); ?></a>
	<?php } ?>
</div>