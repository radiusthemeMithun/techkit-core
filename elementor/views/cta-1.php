<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

?>
<div class="cta-default cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="action-box">
		<?php if ( !empty( $data['sub_title'] ) ) { ?>
		<h5 class="rtin-subtitle"><?php echo wp_kses_post( $data['sub_title'] );?></h5>
		<?php } ?>
		<?php if ( !empty( $data['title'] ) ) { ?>
		<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
		<?php } ?>		
		<?php if ( !empty( $data['content'] ) ) { ?>
		<p><?php echo wp_kses_post( $data['content'] );?></p>
		<?php } ?>			
		<div class="rtin-button">
			<a class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?><?php echo radius_arrow_shape(); ?></a>
	        </div>		
	</div>
</div>