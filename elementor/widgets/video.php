<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Video extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Video', 'techkit-core' );
		$this->rt_base = 'rt-video';
		parent::__construct( $data, $args );
	}
	
	private function rt_load_scripts(){
		wp_enqueue_script( 'magnific-popup' );
	}

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'techkit-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1', 'techkit-core' ),
					'style2' => esc_html__( 'Style 2', 'techkit-core' ),
					'style3' => esc_html__( 'Style 3', 'techkit-core' ),
					'style4' => esc_html__( 'Style 4', 'techkit-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bag_color',
				'label'   => esc_html__( 'Image Overlay Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .video-default .rtin-video .item-img:after' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'default' => esc_html__( 'WATCH VIDEO INTRO', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'videourl',
				'label'   => esc_html__( 'Video URL', 'techkit-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'video_image',
				'label'   => esc_html__( 'Image', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'video_image2',
				'label'   => esc_html__( 'Image', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'techkit-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
			),			
			array(
				'mode' => 'section_end',
			),
			/*title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'video_button_style',
	            'label'   => esc_html__( 'Video Button', 'techkit-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_icon_size',
				'label'   => esc_html__( 'Icon Size', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .video-default .rtin-video .item-icon .rtin-play' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => esc_html__( 'Background Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .video-default .rtin-video .item-icon .rtin-play:before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_icon_color',
				'label'   => esc_html__( 'Icon Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .video-default .rtin-video .item-icon .rtin-play' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_width',
				'label'   => esc_html__( 'Button Width', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .video-default .rtin-video .item-icon .rtin-play' => 'width: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_height',
				'label'   => esc_html__( 'Button Height', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .video-default .rtin-video .item-icon .rtin-play' => 'height: {{VALUE}}px',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'button_radius',
	            'label'   => __( 'Border Radius', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .video-default .rtin-video .item-icon .rtin-play:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$this->rt_load_scripts();

		switch ( $data['style'] ) {
			case 'style4':
			$template = 'video-4';
			break;
			case 'style3':
			$template = 'video-3';
			break;
			case 'style2':
			$template = 'video-2';
			break;
			default:
			$template = 'video-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}