<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Split_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'Split Slider', 'techkit-core' );
		$this->rt_base = 'rt-split-slider';
		parent::__construct( $data, $args );
	}
		
	private function rt_load_scripts(){
		wp_enqueue_style( 'multiscroll' );
		wp_enqueue_script( 'multiscroll' );
		wp_enqueue_script( 'rt-easings' );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'item_title', [
				'type' => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'default' => esc_html__( 'Discover New Tech', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'item_sub_title', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Sub Title', 'techkit-core' ),
				'default' => esc_html__( 'Technology Designed for You', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'item_text', [
				'type' => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Text', 'techkit-core' ),
				'default' => esc_html__( 'Welcome to TechLink, a contemporary place for all technology lifestyle enthusiasts and modern tech business.', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'button_text', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Button Text', 'techkit-core' ),
				'default' => esc_html__( 'Read More', 'techkit-core' ),
				'label_block' => true,
			]
		);		
		$repeater->add_control(
			'button_url', [
				'type' => Controls_Manager::URL,
				'label' => esc_html__( 'Link (Optional)', 'techkit-core' ),
				'placeholder' => 'https://your-link.com',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'image', [
				'type' => Controls_Manager::MEDIA,
				'label'   => esc_html__( 'Image', 'techkit-core' ),
				'description' => esc_html__( 'Recommended image size full', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'image_small', [
				'type' => Controls_Manager::MEDIA,
				'label'   => esc_html__( 'Small Image', 'techkit-core' ),
				'description' => esc_html__( 'Recommended image size 240 X 210px', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'item_work', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Work', 'techkit-core' ),
				'default' => esc_html__( 'Explore Works', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'item_feature', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Features', 'techkit-core' ),
				'default' => esc_html__( 'The Features', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'techkit-core' ),
			),
			/*Split Slider( tab Multi )*/
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'split_item_lists',
				'label'   => esc_html__( 'Add as many item as you want', 'techkit-core' ),
				'fields' => $repeater->get_controls(),
				'default' => [
					['title' => esc_html__('THE CRISPY TASTE OF PIZZA', 'techkit-core' ) ],
					['title' => esc_html__('THE CRISPY TASTE OF PIZZA', 'techkit-core' ) ],
					['title' => esc_html__('THE CRISPY TASTE OF PIZZA', 'techkit-core' ) ],
		       ],
			),
			array(
				'mode' => 'section_end',
			),
			/*Style*/
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
				'label'   => esc_html__( 'Title Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .multiscroll-wrapper .ms-content .item-title',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'copyright',
				'mode'        => 'responsive',
				'label'       => esc_html__( 'Copyright', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'feature',
				'mode'    	  => 'responsive',
				'label'       => esc_html__( 'Feature Box', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_img',
				'mode'        => 'responsive',
				'label'       => esc_html__( 'Small Image', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
			),
			array(
				'mode' => 'section_end',
			),
			// Text style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_text_title',
				'label'   => esc_html__( 'Text Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'text_typo',
				'label'   => esc_html__( 'Text Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .multiscroll-wrapper .ms-content .item-text',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__( 'Content Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .multiscroll-wrapper .ms-content .item-text' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'text_margin',
	            'label'   => __( 'Margin', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .multiscroll-wrapper .ms-content .item-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),			
			array(
				'mode' => 'section_end',
			),
			// Button style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style',
				'label'   => esc_html__( 'Button Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .multiscroll-wrapper .btn-common',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag_color',
				'label'   => esc_html__( 'Button Background Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .multiscroll-wrapper .button-style-2' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag_hover_color',
				'label'   => esc_html__( 'Button Background Hover Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .multiscroll-wrapper .button-style-2:hover' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text2_color',
				'label'   => esc_html__( 'Button Text Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .multiscroll-wrapper .button-style-2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .multiscroll-wrapper .button-style-2 path.rt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text2_hover_color',
				'label'   => esc_html__( 'Button Text Hover Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .multiscroll-wrapper .button-style-2:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .multiscroll-wrapper .button-style-2:hover path.rt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Padding', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .multiscroll-wrapper .button-style-2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		
		$this->rt_load_scripts();
		$template = 'split-slider';

		return $this->rt_template( $template, $data );
	}
}