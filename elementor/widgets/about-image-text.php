<?php
//phpcs:disable
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class About_Image_Text extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT About Image Text', 'techkit-core' );
		$this->rt_base = 'rt-About-image-text';
		parent::__construct( $data, $args );
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
				'label'   => esc_html__( 'About Style', 'techkit-core' ),
				'options' => array(
					'style1' => esc_html__( 'About Style 1' , 'techkit-core' ),
					'style2' => esc_html__( 'About Style 2 ( Content Fulied )', 'techkit-core' ),
					'style3' => esc_html__( 'About Style 3 ( Content Fulied )', 'techkit-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'default' => esc_html__( 'About Us', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'sub_title',
				'label'   => esc_html__( 'Sub Title', 'techkit-core' ),
				'default' => esc_html__('About Techkit', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_image',
				'label'   => esc_html__( 'Image', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'techkit-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'techkit-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),	
			array(
				'type'    => Controls_Manager::WYSIWYG,
				'id'      => 'content',
				'label'   => esc_html__( 'Content', 'techkit-core' ),
				'default' => esc_html__('Lorem Ipsum has been the industrys standard dummy text ever since printer took a galley. Rimply dummy text of the printing and typesetting industry', 'techkit-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => false,
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'techkit-core' ),
				'options' => array(
					'techkit-button-1' => esc_html__( 'Button 1', 'techkit-core' ),
					'techkit-button-2' => esc_html__( 'Button 2', 'techkit-core' ),
				),
				'default' => 'techkit-button-1',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'button_one',
				'label'       => esc_html__( 'Button Text', 'techkit-core' ),
				'default' 	  => esc_html__('FIND AN AGENT', 'techkit-core' ),
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'one_buttonurl',
				'label'       => esc_html__( 'Button URL', 'techkit-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'button_display' => array( 'yes' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .about-image-text .about-content .rtin-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__( 'Sub Title Style', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .about-image-text .about-content .sub-rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .about-image-text .about-content .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__( 'Sub Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .about-image-text .about-content .sub-rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .about-image-text .about-content .rtin-content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .about-image-text ul li' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'title_space',
				'label'   => esc_html__( 'Title Space', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .about-image-text .about-content .rtin-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['style'] ) {
			case 'style3':
			$template = 'about-image-text-3';
			break;
			case 'style2':
			$template = 'about-image-text-2';
			break;
			default:
			$template = 'about-image-text-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}