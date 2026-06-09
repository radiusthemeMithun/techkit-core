<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use TechkitTheme;
use TechkitTheme_Helper;
use Elementor\Utils;
use \WP_Query;

?>

<!-- MultiScroll Area End Here -->


<div id="radiustheme-multiscroll" class="multiscroll-wrapper">
	<div class="ms-left">
	<?php
		foreach ( $data['split_item_lists'] as $i => $split_item_list ) {
		if( $i % 2 == 0 ) { ?>
		<div class="ms-section">
			<div class="ms-content">
				<span class="sub-title"><?php echo wp_kses_post( $split_item_list['item_sub_title'] ); ?></span>
				<h2 class="item-title"><?php echo wp_kses_post( $split_item_list['item_title'] ); ?></h2>
				<span class="item-text"><?php echo wp_kses_post( $split_item_list['item_text'] ); ?></span>
				<a class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( $split_item_list['button_url']['url'] );?>"><?php echo esc_html( $split_item_list['button_text'] );?><?php echo radius_arrow_shape(); ?></a>
			</div>
			<?php if ( $data['small_img'] == 'yes' ) { ?>
			<div class="small-image-left">
				<?php if ( !empty( $split_item_list['image_small']['id'] ) ) { 
					echo wp_get_attachment_image( $split_item_list['image_small']['id'], 'full' ); 
				 } else { 
					echo '<img class="wp-post-image" src="' . TechkitTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
				} ?>
			</div>
			<?php } ?>
		</div>
		<?php }  else { ?>
		<div class="ms-section">
			<div class="full d-none d-xl-block d-lg-block">
				<?php if ( !empty( $split_item_list['image']['id'] ) ) { 
					echo wp_get_attachment_image( $split_item_list['image']['id'], 'full' ); 
				 } else { 
					echo '<img class="wp-post-image" src="' . TechkitTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
				} ?>
				<?php if ( $data['feature'] == 'yes' ) { ?>
				<div class="img-content-left">
					<i class="flaticon flaticon-link icon"></i>
					<h4 class="title-small"><?php echo wp_kses_post( $split_item_list['item_work'] ); ?></h4>
					<h3 class="title-big"><?php echo wp_kses_post( $split_item_list['item_feature'] ); ?></h3>
				</div>
				<?php } ?>
				<?php if ( $data['copyright'] == 'yes' ) { ?>
				<div class="ms-copyright"><?php echo wp_kses_post( TechkitTheme::$options['copyright_text'] );?></div>
				<?php } ?>
			</div>			
			<div class="full d-block d-xl-none d-lg-none">
				<?php if ( !empty( $split_item_list['image']['id'] ) ) { 
					echo wp_get_attachment_image( $split_item_list['image']['id'], 'full' ); 
				 } else { 
					echo '<img class="wp-post-image" src="' . TechkitTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
				} ?>
				<?php if ( $data['feature'] == 'yes' ) { ?>
				<div class="img-content-left">
					<i class="flaticon flaticon-link icon"></i>
					<h4 class="title-small"><?php echo wp_kses_post( $split_item_list['item_work'] ); ?></h4>
					<h3 class="title-big"><?php echo wp_kses_post( $split_item_list['item_feature'] ); ?></h3>
				</div>
				<?php } ?>
				<?php if ( $data['copyright'] == 'yes' ) { ?>
				<div class="ms-copyright"><?php echo wp_kses_post( TechkitTheme::$options['copyright_text'] );?></div>
				<?php } ?>
			</div>
			
		</div>
		<?php }
		}
	?>
    </div>
    <div class="ms-right">
	<?php
		foreach ( $data['split_item_lists'] as $i => $split_item_list ) {
		if( $i % 2 == 0 ) { ?>
		<div class="ms-section">
			<div class="full d-none d-xl-block d-lg-block">
				<?php if ( !empty( $split_item_list['image']['id'] ) ) { 
					echo wp_get_attachment_image( $split_item_list['image']['id'], 'full' ); 
				 } else { 
					echo '<img class="wp-post-image" src="' . TechkitTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
				} ?>
				<?php if ( $data['feature'] == 'yes' ) { ?>
				<div class="img-content-right">
					<i class="flaticon flaticon-link icon"></i>
					<h4 class="title-small"><?php echo wp_kses_post( $split_item_list['item_work'] ); ?></h4>
					<h3 class="title-big"><?php echo wp_kses_post( $split_item_list['item_feature'] ); ?></h3>
				</div>
				<?php } ?>
				<?php if ( $data['copyright'] == 'yes' ) { ?>
				<div class="ms-copyright"><?php echo wp_kses_post( TechkitTheme::$options['copyright_text'] );?></div>
				<?php } ?>
			</div>			
			<div class="full d-block d-xl-none d-lg-none">
				<?php if ( !empty( $split_item_list['image']['id'] ) ) { 
					echo wp_get_attachment_image( $split_item_list['image']['id'], 'full' ); 
				 } else { 
					echo '<img class="wp-post-image" src="' . TechkitTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
				} ?>
				<?php if ( $data['feature'] == 'yes' ) { ?>
				<div class="img-content-right">
					<i class="flaticon flaticon-link icon"></i>
					<h4 class="title-small"><?php echo wp_kses_post( $split_item_list['item_work'] ); ?></h4>
					<h3 class="title-big"><?php echo wp_kses_post( $split_item_list['item_feature'] ); ?></h3>
				</div>
				<?php } ?>
				<?php if ( $data['copyright'] == 'yes' ) { ?>
				<div class="ms-copyright"><?php echo wp_kses_post( TechkitTheme::$options['copyright_text'] );?></div>
				<?php } ?>
			</div>
			
		</div>
		<?php } else { ?>
		<div class="ms-section">
			<div class="ms-content">
				<span class="sub-title"><?php echo wp_kses_post( $split_item_list['item_sub_title'] ); ?></span>
				<h2 class="item-title"><?php echo wp_kses_post( $split_item_list['item_title'] ); ?></h2>
				<span class="item-text"><?php echo wp_kses_post( $split_item_list['item_text'] ); ?></span>
				<a class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( $split_item_list['button_url']['url'] );?>"><?php echo esc_html( $split_item_list['button_text'] );?><?php echo radius_arrow_shape(); ?></a>
			</div>
			<?php if ( $data['small_img'] == 'yes' ) { ?>
			<div class="small-image-right">
				<?php if ( !empty( $split_item_list['image_small']['id'] ) ) { 
					echo wp_get_attachment_image( $split_item_list['image_small']['id'], 'full' ); 
				 } else { 
					echo '<img class="wp-post-image" src="' . TechkitTheme_Helper::get_img( 'noimage.jpg' ) . '" alt="'.get_the_title().'">';
				} ?>
			</div>
			<?php } ?>
		</div>
		<?php }
		}
	?>
    </div>
</div>



















