<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use TechkitTheme;
use TechkitTheme_Helper;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
extract($data);

$btn = $attr = '';

if ( !empty( $data['one_buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['one_buttonurl']['url'] . '"';
	$attr .= !empty( $data['one_buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['one_buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $data['button_style'] == 'techkit-button-1' ) {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-fill-dark" ' . $attr . '>' . $data['button_one'] . '<i class="fas fa-arrow-right"></i>' .'</a>';
	}
} else {
	if ( !empty( $data['button_one'] ) ) {
		$btn = '<a class="btn-fill-light" ' . $attr . '>' . $data['button_one'] . '<i class="fas fa-arrow-right"></i>' .'</a>';
	}
}
//image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'rt_image' );

?>
<div class="about-image-text about-layout-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="row">
		<div class="col-lg-7 d-flex align-items-center order-lg-2">
			<div class="about-content">
				<?php if ( !empty( $data['sub_title'] ) ) { ?>
				<span class="sub-rtin-title"><?php echo wp_kses_post( $data['sub_title'] );?></span>
				<?php } ?>
				<?php if ( !empty( $data['title'] ) ) { ?>
				<h2 class="rtin-title"><?php echo wp_kses_post( $data['title'] );?></h2>
				<?php } ?>
				<div class="rtin-content"><?php echo wp_kses_post( $data['content'] );?></div>
				<?php if ( $data['button_display']  == 'yes' ) { ?>
				<?php if ( $btn ) { ?>
				<div class="rtin-button"><?php echo wp_kses_post( $btn );?></div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
		<div class="col-lg-5 order-lg-1">
			<div class="about-image">
				<?php echo wp_kses_post($getimg);?>				
			</div>
		</div>
	</div>
</div>