<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use radiustheme\Lib\WP_SVG;

?>
<div class="title-text-button <?php echo esc_attr( $data['showhide'] ); ?> text-<?php echo esc_attr( $data['style'] ); ?>">
	<?php if ( !empty( $data['sub_title'] ) ) { ?>
		<div class="subtitle <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1s" data-wow-duration="1s"><?php echo wp_kses_post( $data['sub_title'] );?></div>
	<?php } ?>
	<?php if ( !empty( $data['title'] ) ) { ?>
		<h2 class="rtin-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.2s" data-wow-duration="1s"><?php echo wp_kses_post( $data['title'] );?>
			<?php if ( $data['showhide'] == 'barshow' ) { ?><span class="title-bar"></span><?php } ?>
		</h2>		
	<?php } ?>	
	<div class="rtin-content <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.4s" data-wow-duration="1s"><?php echo wp_kses_post( $data['content'] );?></div>
	<?php if ( $data['button_display']  == 'yes' ) { ?>
    <div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.6s" data-wow-duration="1s">
		<a class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?><?php echo radius_arrow_shape(); ?></a>
          </div>
	<?php } ?>
</div>