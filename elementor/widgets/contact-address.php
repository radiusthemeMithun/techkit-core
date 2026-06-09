<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class Contact_Address extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Contact Address', 'techkit-core' );
		$this->rt_base = 'rt-contact-address';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'icon_class', [
				'type'    => Controls_Manager::ICONS,
				'label'   => esc_html__( 'Icon', 'techkit-core' ),
					'default' => array(
				      'value' => 'fas fa-smile-wink',
				      'library' => 'fa-solid',
					),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'address_label', [
				'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Address Label', 'techkit-core' ),
				'default' => 'Office Name',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'address_infos', [
				'type'    => Controls_Manager::TEXTAREA,
				'label'   => esc_html__( 'Add Address', 'techkit-core' ),
				'default' => 'City Hall<br>The Queen\'s Walk<br>London<br>SE1 2AA<br><a href="tel:01234564">0123456</a> ',
				'label_block' => true,
			]
		);

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Address Style', 'techkit-core' ),
				'options' => array(
					'style1' => esc_html__( 'Style 1' , 'techkit-core' ),
					'style2' => esc_html__( 'Style 2', 'techkit-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'    => 'address_title',
				'label'   => esc_html__( 'Address Tile', 'techkit-core' ),
				'default' => esc_html__( 'Our Office Address', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'    => 'address_content',
				'label'   => esc_html__( 'Address Content', 'techkit-core' ),
				'default' => esc_html__( 'Worem Ipsum Nam nec tellus a odio tincidunt auctor. Proin gravida nibh vel velit auctor aliquet. Bendum auctor, nisi elit conseq aeuat ipsum, nec sagittis sem nibhety.', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'address_info',
				'label'   => esc_html__( 'Address', 'techkit-core' ),
				'fields' => $repeater->get_controls(),
				'default' => array(
					['address_label' => 'Address Label', ],
					['address_label' => 'Address Label', ],
					['address_label' => 'Address Label', ],
				),
			),
			array(
				'type'  => Controls_Manager::URL,
				'id'    => 'buttonurl',
				'label' => esc_html__( 'Link (Optional)', 'techkit-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'techkit-core' ),
				'default' => esc_html__( 'Find Your Solution', 'techkit-core' ),
			),
					
			array(
				'mode' => 'section_end',
			),		
			/*Style Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style',
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .rtin-address-default .rtin-title',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'label_typo',
				'label'   => esc_html__( 'Label Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .rtin-address-default .rtin-item .rtin-info h3',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'label_color',
				'label'   => esc_html__( 'Label Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-address h3' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rtin-address-default .rtin-item .rtin-info h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-content' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),			
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'info_typo',
				'label'   => esc_html__( 'Info Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .rtin-address-default .rtin-address .rtin-info',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'info_color',
				'label'   => esc_html__( 'Info Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-address .rtin-info' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-address-default .rtin-address .rtin-info a' => 'color: {{VALUE}}',
				),
			),	
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'phone_size',
				'label'   => esc_html__( 'Phone Size', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-item .rtin-info .phone-no' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'mode' => 'section_end',
			),
			
			/*Icon Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_icon_style',
				'label'   => esc_html__( 'Icon', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-item .rtin-icon' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .rtin-item .rtin-icon' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'icon_margin',
	            'label'   => __( 'Icon Margin', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rtin-address-default .rtin-item .rtin-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			
			array(
				'mode' => 'section_end',
			),

			/*Style Button*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button',
				'label'   => esc_html__( 'Button Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_color',
				'label'   => esc_html__( 'Button Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .button-style-3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-address-default .button-style-3.btn-common path.rt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_hover_color',
				'label'   => esc_html__( 'Button Hover Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default .button-style-3:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-address-default .button-style-3:hover.btn-common path.rt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_border_color',
				'label'   => esc_html__( 'Button Border Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default a.button-style-3' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_hover_color',
				'label'   => esc_html__( 'Button Border Hover Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default a.button-style-3:hover' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => esc_html__( 'Button Hover Bg Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-address-default a.button-style-3:hover' => 'background-color: {{VALUE}}',
				),
			),			
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Margin', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rtin-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Padding', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rtin-button .button-style-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			case 'style2':
			$template = 'contact-address-2';
			break;
			default:
			$template = 'contact-address-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}