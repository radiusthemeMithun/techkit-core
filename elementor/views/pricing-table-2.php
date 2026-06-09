<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
extract($data);

if( !empty( $data['price'] )){
	$price_html  = '<span class="price-symbol">' . $data['price_symbol'] . '</span>' . $data['price'] . '<span class="price-unit"> / '. $data['unit'] . '</span>';
} else {
	$price_html = '';
}

$attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
	
}

// icon , image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}

$price_icon_class       = " ";
$price_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class2 =  $icon_class['value']  ) {
  $price_icon_class     = $dynamic_icon_class2;
}
if ( is_array( $icon_class['value'] ) ) {
  $price_icon_image_url = $icon_class['value']['url'];
}

?>

<div class="default-pricing rtin-pricing-<?php echo esc_attr( $data['layout'] );?> <?php echo esc_attr( $data['display_active'] );?> <?php echo esc_attr( $data['offer_active'] );?>">		
	<div class="rt-price-table-box <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
		<?php if ( $data['offer_active'] == 'offer-active' ){ ?>
		<div class="popular-offer">
		<div class="offer"><?php echo esc_html( $data['offertext'] );?></div>
		<div class="popular-shape"></div>
		</div>
		<?php } ?>
		<?php if ($data['icon_display'] == 'yes') { ?>
		<div class="item-icon">			
			<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>		            
				<span class="rtin-img"><?php echo wp_kses_post($getimg);?></span>  
			<?php }else{?> 	
			<?php if ( $price_icon_image_url ): ?>
				<span class="rtin-icon"><img src="<?php echo esc_url( $price_icon_image_url ); ?>" alt="SVG Icon"></span>
			<?php else: ?>
				<span class="rtin-icon"><i class="<?php echo esc_attr( $price_icon_class ); ?>"></i></span>
			<?php endif ?>
			<?php }  ?>	
		</div>
		<?php } ?>
		<div class="price-header">
			<?php if ( !empty( $data['title'] )) { ?>
			<h3 class="rtin-title"><?php echo esc_html( $data['title'] );?></h3>
			<?php } ?>
		</div>
		<div class="rtin-pricing-price">
			<span class="rtin-price"><?php echo wp_kses_post( $price_html );?></span>
		</div>
		<ul class="rtin-features">
		  <?php foreach ($data['list_feature'] as $feature): ?>
			<li>
			  <?php
			  extract($feature);					  
			  
				$final_icon_class       = "";
				$final_icon_image_url   = '';
				if ( is_string( $list_icon_class['value'] ) && $dynamic_icon_class =  $list_icon_class['value']  ) {
				  $final_icon_class     = $dynamic_icon_class;
				}
				if ( is_array( $list_icon_class['value'] ) ) {
				  $final_icon_image_url = $list_icon_class['value']['url'];
				}

			  ?>
			  <?php if ($data['has_icon'] == 'yes'): ?>
				<?php if ( $final_icon_image_url ): ?>
				  <img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
				<?php else: ?>
				  <i style="color: <?php echo esc_attr( $list_icon_color ); ?>"  class="<?php echo esc_attr( $final_icon_class ); ?>"></i>
				<?php endif ?>
			  <?php endif ?>
			  <span class="rtin-features-text"><?php echo esc_html( $feature['text'] ); ?></span>
			</li>
		  <?php endforeach ?>
		</ul>		
		<?php if ( !empty( $data['buttontext'] ) ){ ?>
			<div class="rtin-price-button">
				<a class="button-style-3 btn-common rt-animation-out" href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?></a>
			</div>		
		<?php } ?>
	</div>			
</div>