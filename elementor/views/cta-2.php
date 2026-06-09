<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;


?>
<div class="cta-default cta-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="action-box row">
		<div class="cta-content col-lg-7">
			<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
			<?php if ( !empty( $data['content'] ) ) { ?>
			<p><?php echo wp_kses_post( $data['content'] );?></p>
			<?php } ?>
		</div>
		<div class="col-lg-5">
			<div class="rtin-button">
				<?php if( !empty( $data['buttontext'] ) ) { ?>
				<div class="item1">
					<a class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?><?php echo radius_arrow_shape(); ?></a>
				</div>
				<?php } ?>
				<?php if( !empty( $data['buttontext'] ) ) { ?>
				<div class="item2">
					<a class="button-style-3 btn-common rt-animation-out" href="<?php echo esc_url( $data['buttonurl2']['url'] );?>"><?php echo esc_html( $data['buttontext2'] );?><?php echo radius_arrow_shape(); ?></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>