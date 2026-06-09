<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'techkit_widgets_init' );
function techkit_widgets_init() {

	// Register Custom Widgets
	register_widget( 'TechkitTheme_About_Widget' );
	register_widget( 'TechkitTheme_Address_Widget' );
	register_widget( 'TechkitTheme_Social_Widget' );
	register_widget( 'TechkitTheme_Recent_Posts_With_Image_Widget' );
	register_widget( 'TechkitTheme_Post_Box' );
	register_widget( 'TechkitTheme_Post_Tab' );
	register_widget( 'TechkitTheme_Feature_Post' );
	register_widget( 'TechkitTheme_Open_Hour_Widget' );
	register_widget( 'TechkitTheme_Product_Box' );
	register_widget( 'TechkitTheme_Download' );
	
}