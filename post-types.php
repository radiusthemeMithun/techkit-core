<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use \RT_Posts;
use TechkitTheme;


if ( !class_exists( 'RT_Posts' ) ) {
	return;
}

$post_types = array(
	'techkit_team'       => array(
		'title'           => __( 'Team Member', 'techkit-core' ),
		'plural_title'    => __( 'Team', 'techkit-core' ),
		'menu_icon'       => 'dashicons-businessman',
		'labels_override' => array(
			'menu_name'   => __( 'Team', 'techkit-core' ),
		),
		'rewrite'         => TechkitTheme::$options['team_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' )
	),
	'techkit_service' => array(
		'title'           => __( 'Service', 'techkit-core' ),
		'plural_title'    => __( 'Service', 'techkit-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => TechkitTheme::$options['service_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
	),
	'techkit_case'  => array(
		'title'           => __( 'Case Study', 'techkit-core' ),
		'plural_title'    => __( 'Case Study', 'techkit-core' ),
		'menu_icon'       => 'dashicons-book',
		'rewrite'         => TechkitTheme::$options['case_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'excerpt', 'page-attributes' ),
	),
	'techkit_testim'     => array(
		'title'           => __( 'Testimonial', 'techkit-core' ),
		'plural_title'    => __( 'Testimonials', 'techkit-core' ),
		'menu_icon'       => 'dashicons-awards',
		'rewrite'         => TechkitTheme::$options['testimonial_slug'],
		'supports'        => array( 'title', 'thumbnail', 'editor', 'page-attributes' )
	),
);

$taxonomies = array(
	'techkit_team_category' => array(
		'title'        => __( 'Team Category', 'techkit-core' ),
		'plural_title' => __( 'Team Categories', 'techkit-core' ),
		'post_types'   => 'techkit_team',
		'rewrite'      => array( 'slug' => TechkitTheme::$options['team_cat_slug'] ),
	),
	'techkit_service_category' => array(
		'title'        => __( 'Service Category', 'techkit-core' ),
		'plural_title' => __( 'Service Categories', 'techkit-core' ),
		'post_types'   => 'techkit_service',
		'rewrite'      => array( 'slug' => TechkitTheme::$options['service_cat_slug'] ),
	),
	'techkit_case_category' => array(
		'title'        => __( 'Case Category', 'techkit-core' ),
		'plural_title' => __( 'Case Categories', 'techkit-core' ),
		'post_types'   => 'techkit_case',
		'rewrite'      => array( 'slug' => TechkitTheme::$options['case_cat_slug'] ),
	),
	'techkit_testimonial_category' => array(
		'title'        => __( 'Testimonial Category', 'techkit-core' ),
		'plural_title' => __( 'Testimonial Categories', 'techkit-core' ),
		'post_types'   => 'techkit_testim',
		'rewrite'      => array( 'slug' => TechkitTheme::$options['testim_cat_slug'] ),
	),
);

$Posts = RT_Posts::getInstance();
$Posts->add_post_types( $post_types );
$Posts->add_taxonomies( $taxonomies );