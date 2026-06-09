<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use TechkitTheme_Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
//image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_image' );
$getimg1 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'img_list1' );
$getimg2 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'img_list2' );
$getimg3 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'img_list3' );
$getimg4 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'img_list4' );
$getimg5 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'img_list5' );
$getimg6 = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'img_list6' );

?>

<div class="image-default image-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-image">
		<div class="<?php echo esc_attr( $data['animation'] );?> zoomIn" data-wow-delay="0.1s" data-wow-duration="1s">
		<?php echo wp_kses_post($getimg);?>
		</div>		
		<ul class="hero-img-animation-list js-tilt">
		  <li class="item item-1 <?php echo esc_attr( $data['animation'] );?> fadeInLeft animated" data-wow-delay=".3s">
			<?php echo wp_kses_post($getimg1);?>
		  </li>
		  <li class="item item-2 <?php echo esc_attr( $data['animation'] );?> fadeInUp animated" data-wow-delay=".5s">
			<?php echo wp_kses_post($getimg2);?>
		  </li>
		  <li class="item item-3 <?php echo esc_attr( $data['animation'] );?> zoomIn animated" data-wow-delay=".7s">
			<?php echo wp_kses_post($getimg3);?>
		  </li>
		  <li class="item item-4 <?php echo esc_attr( $data['animation'] );?> fadeInRight animated" data-wow-delay=".9s">
			<?php echo wp_kses_post($getimg4);?>
		  </li>
		  <li class="item item-5 <?php echo esc_attr( $data['animation'] );?> fadeInDown animated" data-wow-delay="1.1s">
			<?php echo wp_kses_post($getimg5);?>
		  </li>
		  <li class="item item-6 <?php echo esc_attr( $data['animation'] );?> zoomIn animated" data-wow-delay="1.3s">
			<?php echo wp_kses_post($getimg6);?>
		  </li>
		</ul>
	</div>
</div>