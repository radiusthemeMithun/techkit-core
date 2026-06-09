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

$args = array(
	'post_type'      => 'techkit_testim',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'techkit_testimonial_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$query = new WP_Query( $args );
$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="default-testimonial rtin-testimonial-3 rtin-testimonial-grid">
	<div class="row auto-clear">
		<?php $j = $data['delay']; $k = $data['duration']; 
			if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
				$id 			= get_the_id();
				$designation 	= get_post_meta( $id, 'techkit_tes_designation', true );
				$test_name 		= get_post_meta( $id, 'techkit_tes_name', true );
				$content 		= TechkitTheme_Helper::get_current_post_content();
				$content 		= wp_trim_words( $content, $data['count'], '' );
				$content 		= "<p>$content</p>";
				$ratting	 	= get_post_meta( $id, 'techkit_tes_rating', true );
				$rest_testimonial_rating = 5- intval( $ratting ) ;
				?>
				<div class="<?php echo esc_attr( $col_class );?>">
					<div class="rtin-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $j );?>s" data-wow-duration="<?php echo esc_attr( $k );?>s">
						<div class="rtin-content">
							<div class="item-icon">
								<i class="flaticon flaticon-right-quote quote"></i>
							</div>
							<?php echo wp_kses_post( $content ); ?>
							<div class="rtin-author">
								<?php if ( $data['thumbs_display']  == 'yes' ) { ?>
								<div class="rtin-figure">
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="rtin-thumb"><?php the_post_thumbnail( 'thumbnail' );?></div>
									<?php } ?>
								</div>
								<?php } ?>
								<div class="author-info">
								<?php if ( $data['name_display']  == 'yes' ) { ?><h4 class="rtin-name"> <?php echo esc_html( $test_name );?></h4><?php } ?>
								<?php if ( $data['ratting_display']  == 'yes' ) { ?>
									<ul class="rating">
										<?php for ($i=0; $i < $ratting; $i++) { ?>
											<li class="star-rate"><i class="fa fa-star" aria-hidden="true"></i></li>
										<?php } ?>			
										<?php for ($i=0; $i < $rest_testimonial_rating; $i++) { ?>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
										<?php } ?>
									</ul>
								<?php } ?>						
								<?php if ( $data['designation_display']  == 'yes' && $designation ) { ?><span class="rtin-designation"> <?php echo esc_html( $designation );?></span><?php } ?>
								</div>
							</div>
						</div>					
					</div>
				</div>
			<?php $j = $j + 0.2; $k = $k + 0.2; endwhile;?>
		<?php endif;?>
		<?php wp_reset_query();?>
	</div>
</div>