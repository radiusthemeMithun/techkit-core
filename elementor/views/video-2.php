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
$getimg2 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'video_image2' );

?>
<div class="video-default video-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-video">
		<div class="item-img">
		<span class="image-big wow fadeInDown" data-wow-delay=".2s"><?php echo wp_kses_post($getimg);?></span>
		<span class="image-small wow fadeInUp" data-wow-delay=".4s"><?php echo wp_kses_post($getimg2);?></span>
		</div>
		<div class="item-icon">
			<a class="rtin-play rt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fas fa-play"></i></a>
		</div>
	</div>
</div>