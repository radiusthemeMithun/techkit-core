<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use TechkitTheme_Helper;
use Elementor\Group_Control_Image_Size;

// image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'video_image' );

?>
<div class="video-default video-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-video">
		<div class="shape wow fadeInRight animated" data-wow-delay="0.7s" data-wow-duration="1.4s" style="visibility: visible; animation-duration: 1.2s; animation-delay: 1s; animation-name: fadeInRight;"></div>
		<div class="item-img">
		<?php echo wp_kses_post($getimg);?>
		</div>
		<div class="item-icon">			
			<a class="rtin-play rt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fas fa-play"></i></a>
		</div>
	</div>
</div>