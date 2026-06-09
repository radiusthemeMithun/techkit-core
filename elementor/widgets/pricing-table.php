<?php
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

class Pricing_Table extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Pricing Table', 'techkit-core' );
		$this->rt_base = 'rt-pricing-table';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'text', [
				'type' => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Text', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_icon_class', [
				'type' => Controls_Manager::ICONS,
				'label'   => esc_html__( 'List Icon', 'techkit-core' ),
				'Description'  => esc_html__( 'Icon will place before features text', 'techkit-core' ),
				'label_block' => true,
				'default' => array(
			      'value' => 'fas fa-check',
			      'library' => 'fa-solid',
				),
			]
		);
		$repeater->add_control(
			'list_icon_color', [
				'type' => Controls_Manager::COLOR,
				'label'   => esc_html__( 'Icon Color', 'techkit-core' ),
				'default'  => '#b7b7b7',
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
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'techkit-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Layout 1', 'techkit-core' ),
					'layout2' => esc_html__( 'Layout 2', 'techkit-core' ),
				),
				'default' => 'layout1',
			),
			/*Icon Start*/
			array(					 
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => array(
			     'icon' => array(
			       'title' => esc_html__( 'Left', 'techkit-core' ),
			       'icon' => 'fa fa-smile',
			     ),
			     'image' => array(
			       'title' => esc_html__( 'Center', 'techkit-core' ),
			       'icon' => 'fa fa-image',
			     ),		     
			   ),
			   'id'      => 'icontype',
			   'label'   => esc_html__( 'Media Type', 'techkit-core' ),
			   'default' => 'icon',
			   'label_block' => false,
			   'toggle' => false,
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'techkit-core' ),
				'default' => array(
			      'value' => 'flaticon-medal',
			      'library' => 'fa-solid',
				),	
				'condition'   => array('icontype' => array( 'icon' ) ),
			),	
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'techkit-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'techkit-core' ),
				'condition'   => array('icontype' => array( 'image' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'techkit-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',	
				'condition'   => array('icontype' => array( 'image' ) ),
			),			
			/*Icon end*/
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'default' => esc_html__( 'Basic', 'techkit-core' ),
			),			
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price',
				'label'   => esc_html__( 'Price', 'techkit-core' ),
				'default' => '39',
				'description' => esc_html__( "Including currency sign eg. $59", 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'price_symbol',
				'label'   => esc_html__( 'Price Symbol', 'techkit-core' ),
				'default' => '$',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'unit',
				'label'   => esc_html__( 'Unit Name', 'techkit-core' ),
				'default' => esc_html__( 'month', 'techkit-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'has_icon',
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'label'       => esc_html__( 'Features prefix icon', 'techkit-core' ),
				'default'     => "yes",
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'list_feature',
				'label'   => esc_html__( 'Features ', 'techkit-core' ),
				'fields' => $repeater->get_controls(),
				'default' => array(
					['text' => 'Speed(1AM-8PM) : 20mbps', ],
					['text' => 'Normal Speed (8PM-1AM) : 10mbps', ],
					['text' => 'Youtube Speed : 100mbps', ],
					['text' => 'Ftp Speed : 100mbps', ],
					['text' => 'Live TV : 0', ],
					['text' => 'Local Speed :Youtube, Facebook', ],
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
				'default' => esc_html__( 'Order Now', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'display_active',
				'label'   => esc_html__( 'Display Active', 'techkit-core' ),
				'options' => array(
					'common-class' => esc_html__( 'Common Price Table', 'techkit-core' ),
					'active-class'  => esc_html__( 'Active Price Table', 'techkit-core' ),
				),
				'default' => 'common-class',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'offer_active',
				'label'   => esc_html__( 'Display Offer', 'techkit-core' ),
				'options' => array(
					'offer-active' 		=> esc_html__( 'Offer Active', 'techkit-core' ),
					'offer-inactive'  	=> esc_html__( 'Offer Inactive', 'techkit-core' ),
				),
				'default' => 'offer-inactive',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'offertext',
				'label'   => esc_html__( 'Button Text', 'techkit-core' ),
				'default' => esc_html__( 'Popular Sale!', 'techkit-core' ),
				'condition'   => array( 'offer_active' => array( 'offer-active' ) ),
			),
			
			array(
				'mode' => 'section_end',
			),
			// Item style
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_style',
				'label'       => esc_html__( 'Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor',
				'label'   => esc_html__( 'Background Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box::before' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box::after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box' => 'background: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bg_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box:hover:before' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box:hover:after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box:hover' => 'background-color: {{VALUE}}',
				),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .default-pricing .price-header .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .price-header .rtin-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .price-header .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box ul li' => 'color: {{VALUE}}',
					
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'price_color',
				'label'   => esc_html__( 'Price Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rtin-pricing-price .rtin-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rtin-pricing-price .rtin-price' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'border_radius',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Radius', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'border_hov_radius',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Hover Radius', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Icon style
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_icon_style',
				'label'       => esc_html__( 'Icon', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'icon_display',
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'label'       => esc_html__( 'Icon Display', 'techkit-core' ),
				'default'     => "yes",
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .item-icon .rtin-icon' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .rtin-pricing-layout2 .item-icon .rtin-icon' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box .item-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box .item-icon' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_bg_color',
				'label'   => esc_html__( 'Icon Bg Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rtin-pricing-layout1 .rt-price-table-box .item-icon' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rtin-pricing-layout2 .rt-price-table-box .item-icon' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Animation style
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__( 'Entrance Animation', 'techkit-core' ),
				'options' => array(
                    'none' => esc_html__( 'none', 'techkit-core' ),
					'bounce' => esc_html__( 'bounce', 'techkit-core' ),
					'flash' => esc_html__( 'flash', 'techkit-core' ),
					'pulse' => esc_html__( 'pulse', 'techkit-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'techkit-core' ),
					'shakeX' => esc_html__( 'shakeX', 'techkit-core' ),
					'shakeY' => esc_html__( 'shakeY', 'techkit-core' ),
					'headShake' => esc_html__( 'headShake', 'techkit-core' ),
					'swing' => esc_html__( 'swing', 'techkit-core' ),					
					'fadeIn' => esc_html__( 'fadeIn', 'techkit-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'techkit-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'techkit-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'techkit-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'techkit-core' ),					
					'bounceIn' => esc_html__( 'bounceIn', 'techkit-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'techkit-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'techkit-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'techkit-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'techkit-core' ),			
					'slideInDown' => esc_html__( 'slideInDown', 'techkit-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'techkit-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'techkit-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'techkit-core' ), 
                ),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Delay', 'techkit-core' ),
				'default' => '0.2',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'techkit-core' ),
				'default' => '0.4',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}
	
	private function validate( $str ){
			$str = trim( $str );
			// replace BLANK keyword
			if ( strtolower( $str ) == 'blank'  ) {
				return '&nbsp;';
			}
			return $str;
		}

	protected function render() {
		
		$data = $this->get_settings();
			
		
		
		$template = 'pricing-table';
		
		switch ( $data['layout'] ) {
			case 'layout2':
			$template = 'pricing-table-2';
			break;
			default:
			$template = 'pricing-table-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}