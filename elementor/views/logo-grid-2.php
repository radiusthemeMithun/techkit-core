<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

$lg_item = ( 12 / $data['col_lg']);
$md_item = ( 12 / $data['col_md']);
$sm_item = ( 12 / $data['col_sm']);
$xs_item = ( 12 / $data['col_xs']);

$col_class = "col-lg-{$lg_item} col-md-{$md_item} col-sm-{$sm_item} col-{$xs_item}";

?>
<div class="logo-grid-<?php echo esc_attr( $data['layout'] );?>">
	<div class="row <?php echo esc_attr( $data['column_gutters'] ); ?>">
		<?php $i = $data['delay']; $j = $data['duration']; foreach ( $data['logos'] as $logo ): ?>
			<?php if ( empty( $logo['image']['id'] ) ) continue; ?>
			<div class="<?php echo esc_attr( $col_class );?>">
				<div class="rtin-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<figure>
				<?php if ( !empty( $logo['url'] ) ): ?>
					<a href="<?php echo esc_url( $logo['url'] );?>" target="_blank"><?php echo wp_get_attachment_image( $logo['image']['id'], 'full' )?></a>
				<?php else: ?>
					<?php echo wp_get_attachment_image( $logo['image']['id'], 'full' )?>
				<?php endif; ?>
				</figure>
				<?php if ( !empty($logo['title']) ) { ?>
				<h3 class="rtin-title"><?php echo wp_kses_post( $logo['title'] ); ?></h3>				<?php } ?>
				</div>
			</div>
		<?php $i = $i + 0.2; $j = $j + 0.2; endforeach; ?> 
	</div>
</div>