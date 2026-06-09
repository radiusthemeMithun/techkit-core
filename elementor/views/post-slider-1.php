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

$techkit_has_entry_meta  = ($data['post_grid_author'] == 'yes' || $data['post_grid_comment'] == 'yes') ? true : false;

$thumb_size = 'techkit-size2';

$args = array(
	'posts_per_page' 	=> $data['itemlimit'],
	'cat'            	=> (int) $data['cat'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
);


$query = new WP_Query($args);
$slider_nav_class = $data['slider_nav'] == 'yes' ? 'slider-nav-enabled' : '';
$slider_dot_class = $data['slider_dots'] == 'yes' ? ' slider-dot-enabled' : '';
?>
<div class="post-default post-grid-style1 rt-owl-nav-2 owl-wrap <?php echo esc_attr($slider_nav_class); ?><?php echo esc_attr($slider_dot_class); ?>">
	<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr($data['owl_data']); ?>">
		<?php if ($query->have_posts()) : ?>
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<?php
				$content = TechkitTheme_Helper::get_current_post_content();
				$content = wp_trim_words(get_the_excerpt(), $data['count'], '');
				$content = "<p>$content</p>";
				$title = wp_trim_words(get_the_title(), $data['title_count'], '');

				$techkit_comments_number = number_format_i18n(get_comments_number());
				$techkit_comments_html = $techkit_comments_number == 1 ? esc_html__('Comment', 'techkit-core') : esc_html__('Comments', 'techkit-core');
				$techkit_comments_html = '<span class="comment-number">' . $techkit_comments_number . '</span> ' . $techkit_comments_html;

				$techkit_time_html = sprintf('<span><span>%s </span>%s %s</span>', get_the_time('d'), get_the_time('M'), get_the_time('Y'));

				?>
				<div class="rtin-item">
					<div class="rtin-item-post">
						<div class="rtin-img">
							<a href="<?php the_permalink(); ?>">
								<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail($thumb_size);
								} else {
									if (!empty(TechkitTheme::$options['no_preview_image']['id'])) {
										echo wp_get_attachment_image(TechkitTheme::$options['no_preview_image']['id'], $thumb_size);
									} else {
										echo '<img class="wp-post-image" src="' . TechkitTheme_Helper::get_img('noimage_370X435.jpg') . '" alt="' . get_the_title() . '">';
									}
								}
								?>
							</a>
							<?php if ($data['post_grid_category'] == 'yes') { ?>
								<span class="blog-cat"><?php echo the_category(', '); ?></span>
							<?php } ?>
						</div>
						<div class="rtin-content">
							<?php if ($data['post_grid_date'] == 'yes') { ?>
								<span class="blog-date"><i class="far fa-calendar"></i><?php echo get_the_date(); ?></span>
							<?php } ?>
							<h3 class="rtin-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h3>
							<?php if ($data['content_display'] == 'yes') { ?>
								<?php echo wp_kses_post($content); ?>
							<?php } ?>
							<?php if ($techkit_has_entry_meta) { ?>
								<ul class="post-grid-meta">
									<?php if ($data['post_grid_author'] == 'yes') { ?>
										<li class="item-author"><i class="far fa-user"></i><?php esc_html_e('by ', 'techkit-core'); ?><?php the_author_posts_link(); ?></li>
									<?php }
									if ($data['post_grid_comment'] == 'yes') { ?>
										<li class="item-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link(get_the_ID()); ?>"><?php echo wp_kses_post($techkit_comments_html); ?></a></li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>