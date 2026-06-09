<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

?>

<div class="rtin-address-default address-<?php echo esc_attr( $data['style'] ); ?>">
	<div class="rtin-address-info">
		<?php if ( !empty( $data['address_title'] ) ) { ?>
			<h3 class="rtin-title"><?php echo wp_kses_post( $data['address_title'] );?></h3>
		<?php } if ( !empty( $data['address_content'] ) ) { ?>
			<div class="rtin-content"><?php echo wp_kses_post( $data['address_content'] );?></div>
		<?php } ?>
		<?php if ( !empty( $data['address_info'] )  ) { ?>
			<div class="rtin-address">
				<?php foreach ( $data['address_info'] as $address ) { ?>
					<div class="rtin-item">
					<?php if ( !empty($address['address_label']) || !empty( $address['address_infos']) ) { ?>
					<?php if ( !empty( $address['icon_class'] ) ) { ?>
					<div class="rtin-icon">
					<?php extract($address);
						$final_icon_class       = "";
						if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
						  $final_icon_class     = $dynamic_icon_class;
						} ?>
						<?php if ( !empty( $final_icon_class )  ) { ?>
						<i class="<?php echo esc_attr( $final_icon_class ); ?>"></i><?php } ?></div>
					<?php } ?>
					<div class="rtin-info"><?php if ( !empty( $address['address_label'] ) ) { ?><h3><?php echo esc_html( $address['address_label'] ); ?></h3><?php } ?><?php echo wp_kses_post( $address['address_infos'] ); ?></div>
					<?php } ?>
					</div>
				<?php } ?>

				<?php if ( !empty( $data['buttontext'] ) ){ ?>
					<div class="rtin-button">
						<a class="button-style-3 btn-common rt-animation-out" href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?><?php echo radius_arrow_shape(); ?></a>
					</div>		
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>