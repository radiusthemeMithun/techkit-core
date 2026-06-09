<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use Elementor\Utils;
extract($data);

$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="rt-counter rtin-counter-<?php echo esc_attr( $data['style'] );?> rtin-<?php echo esc_attr( $data['iconalign'] );?>">
	<div class="rtin-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
		<?php if ( $data['showhide'] == 'yes' ) { ?>
		<div class="rtin-media">
			<?php if ( $final_icon_image_url ): ?>
				<img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
			<?php elseif( !empty($final_icon_class) ) : ?>
				<i class="<?php echo esc_attr( $final_icon_class ); ?>"></i>
			<?php endif ?>
		</div>
		<?php } ?>
		<div class="rtin-content">
			<div class="rtin-counter"><span class="counter" data-num="<?php echo esc_attr( $data['number'] );?>" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo esc_html( $data['number'] );?></span></div>
			<h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
		</div>	
	</div>
</div>
