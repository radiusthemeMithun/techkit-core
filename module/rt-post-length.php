<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Post reading time */
if( !function_exists( 'techkit_reading_time' )){

	function techkit_reading_time(){
		$post_content = get_post()->post_content;
		$post_content = strip_shortcodes( $post_content );
		$post_content = wp_strip_all_tags( $post_content );
		$word_count   = str_word_count( $post_content );
		$reading_time = floor( $word_count / 200 );

		if( $reading_time < 1){
			$result = esc_html__ ( 'Less than a minute', 'techkit-core' );
		}
		elseif( $reading_time > 60 ){
			/* translators: %s: number of hours it takes to read the post. */
			$result = sprintf( esc_html__( '%s hours read', 'techkit-core' ), floor( $reading_time / 60 ) );
		}
		else if ( $reading_time == 1 ){
			$result = esc_html__( '1min read', 'techkit-core' );
		} else {
			/* translators: %s: number of minutes it takes to read the post. */
			$result = sprintf( esc_html__( '%smins read', 'techkit-core' ), $reading_time );
		}

		return '<span class="meta-reading-time meta-item">'. $result .'</span> ';
	}
	
}