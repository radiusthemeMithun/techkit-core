<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use Elementor\Utils;
extract($data);

?>
<div class="rtin-story">
	<ul class="story-layout">
		<?php foreach ( $data['story_info'] as $rtstory ) { 
		$img = wp_get_attachment_image( $rtstory['rt_image']['id'], 'full' );
		?>		
		<li class="story-box-layout">
			<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.7s" data-wow-duration="1.3s">
			<div class="timeline-circle"></div>
			<?php if ( !empty($rtstory['story_year']) ) { ?>
			<h2 class="rtin-year"><?php echo wp_kses_post( $rtstory['story_year'] ); ?></h2>
			<?php } ?>			
			<?php if ( !empty($rtstory['rt_image']) ) { ?>
			<div class="rtin-img"><?php echo wp_kses_post($img);?></div>
			<?php } ?>
			</div>
			<div class="<?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1s" data-wow-duration="1.9s">
			<div class="rtin-content">
				<?php if ( !empty($rtstory['title']) ) { ?>
				<h3 class="rtin-title"><?php echo wp_kses_post( $rtstory['title'] ); ?></h3>
				<?php } if ( !empty($rtstory['content']) ) { ?>
				<div class="rtin-text"><?php echo wp_kses_post( $rtstory['content'] ); ?></div>
				<?php } ?>
			</div>
			</div>
		</li>
		<?php } ?>
	</ul>
</div>

