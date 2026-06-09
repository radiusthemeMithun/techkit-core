<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use TechkitTheme;
use TechkitTheme_Helper;
use \WP_Query;

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$number_of_post = $data['itemnumber'];
$post_sorting = $data['orderby'];
$post_ordering = $data['post_ordering'];
$title_count = $data['title_count'];
$excerpt_count = $data['excerpt_count'];	
$cat_single_grid = $data['cat_single'];
$args = array(
	'post_type' 		=> 'techkit_service',
	'post_status' 		=> 'publish',
	'orderby' 			=> $post_sorting,
	'order' 			=> $post_ordering,
	'posts_per_page' 	=> $number_of_post,
	'paged'          	=> $paged,
);

if ( $cat_single_grid != 0 ) {
	$args['tax_query'] = array (
		array (
			'taxonomy' => 'techkit_service_category',
			'field'    => 'ID',
			'terms'    => $cat_single_grid,
		)
	);
}
$thumb_size = 'techkit-size1';

$query = new WP_Query( $args );
$temp = TechkitTheme_Helper::wp_set_temp_query( $query );

$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="service-default service-<?php echo esc_attr( $data['layout'] );?>">
	<div class="row <?php echo esc_attr( $data['column_gutters'] );?>">	
		<?php $i = $data['delay']; $j = $data['duration'];
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();			
				$excerpt 				= wp_trim_words( get_the_excerpt(), $excerpt_count, '' );
				$trim_title 			= wp_trim_words( get_the_title(), $title_count, '' );
				$techkit_service_icon   = get_post_meta( get_the_ID(), 'techkit_service_icon', true );
		?>
		<div class="<?php echo esc_attr( $col_class ) ?>">
			<div class="rtin-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
				<div class="services-item-overlay"></div>
				<div class="rtin-header">
					<?php if ( $data['icon_display'] == 'yes' ) { ?>
					<i class="<?php echo wp_kses_post( $techkit_service_icon );?>"></i>
					<?php } ?>
					<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo wp_kses( $trim_title , 'alltext_allow' ); ?></a></h3>
				</div>
				<div class="rtin-content">	
					<?php if ( $data['excerpt_display'] == 'yes' ) { ?>		
					<div class="service-text"><?php echo wp_kses( $excerpt , 'alltext_allow' ); ?></div>	
					<?php } ?>
					<?php if ( $data['read_more'] == 'yes' ) { ?>
						<div class="service-more-button">
							<a href="<?php the_permalink(); ?>" class="button-style-1 btn-common rt-animation-out" >
								<?php esc_html_e( 'Discover Now', 'techkit' );?><?php echo radius_arrow_shape(); ?></a>
						</div>
					<?php } ?>			
				</div>
			</div>
		</div>
		<?php $i = $i + 0.2; $j = $j + 0.2; } ?>
	<?php } ?>
	</div>
		<?php if ( $data['more_button'] == 'show' ) { ?>
			<?php if ( !empty( $data['see_button_text'] ) ) { ?>
			<div class="service-button">
					<a href="<?php echo esc_url( $data['see_button_link'] );?>" class="button-style-2 btn-common rt-animation-out" >
						<?php echo esc_html( $data['see_button_text'] );?><?php echo radius_arrow_shape(); ?></a>
				</div>
			<?php } ?>
		<?php } else { ?>
			<?php TechkitTheme_Helper::pagination(); ?>
		<?php } ?>
		<?php TechkitTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>