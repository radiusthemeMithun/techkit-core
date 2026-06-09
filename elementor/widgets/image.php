<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Image', 'techkit-core' );
		$this->rt_base = 'rt-image';
		parent::__construct( $data, $args );
	}
	
	private function rt_load_scripts(){
		wp_enqueue_script( 'parallax-scroll' );
	}	
	private function rt_wow_load_scripts(){
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'vanilla-tilt' );
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
				'label'   => esc_html__( 'Image Style', 'techkit-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'techkit-core' ),
					'style2' => esc_html__( 'Style 2', 'techkit-core' ),
					'style3' => esc_html__( 'Style 3', 'techkit-core' ),
				),
				'default' => 'style1',
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
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_image2',
				'label'   => esc_html__( 'Animate Image ', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 165 X 147', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),
			/*banner image list*/
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'img_list1',
				'label'   => esc_html__( 'Image 1', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 162 X 309', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'img_list2',
				'label'   => esc_html__( 'Image 2', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 261 X 244', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'img_list3',
				'label'   => esc_html__( 'Image 3', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 225 X 223', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'img_list4',
				'label'   => esc_html__( 'Image 4', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 113 X 126', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'img_list5',
				'label'   => esc_html__( 'Image 5', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 241 X 131', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'img_list6',
				'label'   => esc_html__( 'Image 6', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 51 X 77', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),		
			
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'techkit-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'default' => esc_html__( 'YEAR’S EXPERIENCE IN IT', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'year',
				'label'   => esc_html__( 'Year', 'techkit-core' ),
				'default' => '27',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_color',
				'label'   => esc_html__( 'Box Background Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .image-default .image-content' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),	
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'url',
				'label' => esc_html__( 'Link (Optional)', 'techkit-core' ),
				'placeholder' => 'https://your-link.com',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'border_radius',
				'label'   => esc_html__( 'Border Radius', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rtin-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			/*title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title', 'techkit-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1' ) ),
	        ),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .image-default .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .image-default .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			/*Year section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_year_style',
	            'label'   => esc_html__( 'Year', 'techkit-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( 'style1' ) ),
	        ),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'year_typo',
				'label'   => esc_html__( 'Year Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .image-default .rtin-years',				
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'year_color',
				'label'   => esc_html__( 'Year Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .image-default .rtin-years' => 'color: {{VALUE}}',
				),
			),			
			array(
				'mode' => 'section_end',
			),
			/*Animation section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'techkit-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'techkit-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'techkit-core' ),
					'hide'        => esc_html__( 'Off', 'techkit-core' ),
				),
				'default' => 'wow',
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
			$this->rt_wow_load_scripts();
			$template = 'image-3';
			break;
			case 'style2':
			$this->rt_wow_load_scripts();
			$template = 'image-2';
			break;
			default:
			$template = 'image-1';
			break;
		}
	
		return $this->rt_template( $template, $data );
	}
}