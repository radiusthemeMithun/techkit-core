<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use Elementor\Utils;
extract($data);

?>
<div class="apply-block">
	<?php foreach ( $data['apply_info'] as $rtapply ) { ?>
	<div class="apply-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.7s" data-wow-duration="1.3s">
		<div class="apply-content">
			<?php if ( !empty($rtapply['title']) ) { ?>
				<h3 class="rtin-title"><?php echo wp_kses_post( $rtapply['title'] ); ?></h3>
			<?php } if ( !empty($rtapply['content']) ) { ?>
				<div class="rtin-text"><?php echo wp_kses_post( $rtapply['content'] ); ?></div>
			<?php } ?>
		</div>
		<div class="apply-footer">
			<div class="job-meta">
				<span class="item">Location:<span class="primary-text-color"><?php echo wp_kses_post( $rtapply['location'] ); ?></span></span>
				<span class="item">Type:<span class="primary-text-color"><?php echo wp_kses_post( $rtapply['job_type'] ); ?></span></span>
			</div>
			<div class="job-button">
				<a target="_<?php echo esc_attr( $data['button_window'] ); ?>" class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( $rtapply['buttonurl']['url'] );?>"><?php echo esc_html( $rtapply['buttontext'] );?><?php echo radius_arrow_shape(); ?></a>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

