<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

?>
<div class="rtin-progress-bar">
	<h3 class="rtin-name"><?php echo esc_html( $data['title'] );?></h3>
	<div class="progress">
		<div class="progress-bar wow slideInLeft" data-wow-delay="0s" data-wow-duration="3s" data-progress="<?php echo esc_attr( $data['number']['size'] );?>%" style="height:<?php echo esc_html( $data['number_height'] );?>px; width: <?php echo esc_attr( $data['number']['size'] );?>%; animation-name: slideInLeft;"> <span><?php echo esc_html( $data['number']['size'] );?>%</span></div>
	</div>
</div>