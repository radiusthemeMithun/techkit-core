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

$thumb_size			= 'techkit-size2';
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
$cat_single_grid = $data['cat_single'];
$args = array(
	'post_type' => 'techkit_case',
	'post_status' => 'publish',
	'orderby' => $post_sorting,
	'order' => $post_ordering,
	'posts_per_page' => $number_of_post,
	'paged'          => $paged,
);

if ( $cat_single_grid != 0 ) {
	$args['tax_query'] = array (
		array (
			'taxonomy' => 'techkit_case_category',
			'field'    => 'ID',
			'terms'    => $cat_single_grid,
		)
	);
}

$query = new WP_Query( $args );
$temp = TechkitTheme_Helper::wp_set_temp_query( $query );

$gap_class = '';
if ( $data['column_no_gutters'] == 'hide' ) {
   $gap_class  = 'no-gutters';
}

$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

?>
<div class="case-default case-multi-layout-5 case-<?php echo esc_attr( $data['layout'] );?>">
	<div class="row <?php echo esc_attr( $gap_class ); ?>">	
		<?php $j = $data['delay']; $k = $data['duration'];
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
				$query->the_post();	
				$id 				= get_the_ID();
				$trim_title 		= wp_trim_words( get_the_title(), $title_count, '' );

				if ( $data['contype'] == 'content' ) {
					$content = apply_filters( 'the_content', get_the_content() );
				}
				else {
					$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
				}
				$content = wp_trim_words( $content, $data['word_count'], '' );
				$content = "<p>$content</p>";
		?>
		<div class="<?php echo esc_attr( $col_class ) ?>">
			<div class="rtin-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $j );?>s" data-wow-duration="<?php echo esc_attr( $k );?>s">
				<div class="rtin-figure">
					<a href="<?php the_permalink(); ?>">
						<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
							} else {
								if ( !empty( TechkitTheme::$options['no_preview_image']['id'] ) ) {
									echo wp_get_attachment_image( TechkitTheme::$options['no_preview_image']['id'], $thumb_size );
								} else {
									echo '<img class="wp-post-image" src="' . TechkitTheme_Helper::get_img( 'noimage_370X328.jpg' ) . '" alt="'.get_the_title().'">';
								}
							}
						?>
					</a>
				</div>
				<div class="rtin-content">		
					<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo wp_kses( $trim_title , 'alltext_allow' ); ?></a></h3>			
					<?php if ( $data['cat_display'] ) { ?>
					<div class="rtin-cat"><?php
						$i = 1;
						$term_lists = get_the_terms( get_the_ID(), 'techkit_case_category' );
						foreach ( $term_lists as $term_list ){ 
						$link = get_term_link( $term_list->term_id, 'techkit_case_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ' / ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } ?></div>
					<?php } ?>
					<?php if ( $data['content_display']  == 'yes' ) { ?>
						<?php echo wp_kses( $content , 'alltext_allow' ); ?>
					<?php } ?>
					<span><a class="link" href="<?php the_permalink();?>"><?php echo esc_html_e('View Case Study','techkit-core') ?></a></span>
				</div>
			</div>
		</div>
		<?php $j = $j + 0.2; $k = $k + 0.2; } ?>
	<?php } ?>
	</div>
	<?php if ( $data['more_button'] == 'show' ) { ?>
		<?php if ( !empty( $data['see_button_text'] ) ) { ?>
		<div class="case-button">
			<a class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><?php echo radius_arrow_shape(); ?></a>
      </div>
		<?php } ?>
	<?php } else { ?>
		<?php TechkitTheme_Helper::pagination(); ?>
	<?php } ?>
	<?php TechkitTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>