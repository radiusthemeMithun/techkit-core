<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use TechkitTheme_Helper;
?>
<div class="rt-animate-image animate-image-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="figure-holder">	
		<div class="left-holder wow <?php echo esc_attr( $data['left_animation'] ); ?>" data-wow-delay="<?php echo esc_attr( $data['delay'] ); ?>" data-wow-duration="<?php echo esc_attr( $data['duration'] ); ?>">			
			<img width="204px" height="173px" src="<?php echo TECHKIT_ASSETS_URL . 'element/shape12.png'; ?>" alt="shape12">
		</div>
		<div class="right-holder wow <?php echo esc_attr( $data['right_animation'] ); ?>" data-wow-delay="<?php echo esc_attr( $data['delay'] ); ?>" data-wow-duration="<?php echo esc_attr( $data['duration'] ); ?>" >			
			<img width="219px" height="265px" src="<?php echo TECHKIT_ASSETS_URL . 'element/shape11.png'; ?>" alt="shape11">
		</div>
	</div>
</div>