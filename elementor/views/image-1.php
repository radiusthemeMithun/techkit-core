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
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'rt_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_image' );
}

?>

<div class="image-default image-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-image <?php echo esc_attr( $data['animation'] );?> fadeInRight" data-wow-delay="1s" data-wow-duration="1.2s">
		<?php echo wp_kses_post($getimg);?>
		<div class="image-content">
		<?php if( !empty( $data['year'] ) ) { ?>
			<div class="rtin-years"><?php echo wp_kses_post( $data['year'] ); ?></div><?php } ?>
		<?php if( !empty( $data['title'] ) ) { ?>
			<div class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?></div><?php } ?>
		</div>
	</div>
</div>