<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use TechkitTheme_Helper;
use Elementor\Group_Control_Image_Size;


?>
<div class="video-default video-<?php echo esc_attr( $data['style'] );?>">
	<div class="rtin-video">		
		<div class="item-icon">
			<a class="rtin-play rt-video-popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="fas fa-play"></i></a>
		</div>
		<?php if(!empty($data['title'])) { ?>		
		<h3 class="rtin-title"><?php echo wp_kses_post( $data['title'] ); ?></h3>
		<?php } ?>
	</div>
</div>