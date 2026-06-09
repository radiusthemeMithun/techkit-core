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
if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}
else {
	$title = $data['title'];
}

//Icon, image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}

$final_icon_class       = " fas fa-thumbs-up";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="info-box info-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
	<div class="info-overlay"></div>
	<div class="rtin-item media-<?php echo esc_attr( $data['icontype'] );?>">
		<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>		            
			<span class="rtin-img"><?php echo wp_kses_post($getimg);?></span>  
		<?php }else{?> 	
		<?php if ( $final_icon_image_url ): ?>
			<span class="rtin-icon"><img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon"></span>
		<?php else: ?>
			<span class="rtin-icon"><i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i></span>
		<?php endif ?>
		<?php }  ?>
		<?php if ( !empty( $data['title'] ) ) { ?>
		<h3 class="rtin-title"><?php echo wp_kses_post( $title );?></h3>
		<?php } if ( !empty( $data['content'] ) ) { ?>
		<div class="rtin-text"><?php echo wp_kses_post( $data['content'] ); ?></div>		
		<?php } ?>		
		<?php if ( $data['button_display']  == 'yes' && $data['buttontext'] ) { ?>
			<div class="rtin-button">
				<a href="<?php echo esc_url( $data['buttonurl']['url'] );?>" class="button-style-1 btn-common rt-animation-out" >
						<?php echo esc_html( $data['buttontext'] );?><?php echo radius_arrow_shape(); ?></a>
	        </div>		
		<?php } ?>
	</div>
</div>