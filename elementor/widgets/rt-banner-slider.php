<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use Elementor\Group_Control_Image_Size;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Banner_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Banner Slider', 'techkit-core' );
		$this->rt_base = 'rt-banner-slider';
		parent::__construct( $data, $args );
	}

    private function rt_load_scripts(){
		wp_enqueue_script( 'swiper-slider' );	
	}

	public function rt_fields(){
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'banner_image', [
                'type' => Controls_Manager::MEDIA,
                'label' =>   esc_html__('Image', 'techkit-core'),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],                
            ]
        );
		$repeater->add_control(
            'slider_sub_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Sub title', 'techkit-core'),
                'label_block' => true, 
                'default' => esc_html__('BEST IT SOLUTION PROVIDER', 'techkit-core' ),
            ]
        );
		$repeater->add_control(
            'slider_title', [
                'type' => Controls_Manager::TEXT,
                'label' =>   esc_html__('Title', 'techkit-core'),
                'label_block' => true,
                'default' => esc_html__('Web Development & Custom Solutions', 'techkit-core' ),
            ]
        );
		$repeater->add_control(
            'slider_text', [
                'type' => Controls_Manager::TEXTAREA,
                'label' =>   esc_html__('Description', 'techkit-core'),
                'default' => esc_html__( 'Grursus suada faci Lorem ipsum dolarorit ametion consectetur elit. Vesti at bulum nec odio aea the dumm ipsumm and fadolorit to the consectetur dummy text elit.', 'techkit-core' ),
				'label_block' => true, 
            ]
        );
		$repeater->add_control(
            'button_text', [
                'type' => Controls_Manager::TEXT,
                'label'   => esc_html__( 'Button Text', 'techkit-core' ),
				'default' => esc_html__( 'Get Details', 'techkit-core' ),
                'label_block' => true,
            ]
        );
		$repeater->add_control(
            'button_url', [
                'type' => Controls_Manager::URL,
                'label'   => esc_html__( 'Button URL', 'techkit-core' ),
				'placeholder' => esc_url('https://your-link.com' ),
                'label_block' => true, 
            ]
        );
        $repeater->add_control(
			'shape1', [
				'type'    => Controls_Manager::MEDIA,
				'label'   => esc_html__( 'Banner Shape 1', 'techkit-core' ),
				'description' => esc_html__( 'Recommended image size is full', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'shape2', [
				'type'    => Controls_Manager::MEDIA,
				'label'   => esc_html__( 'Banner Shape 2', 'techkit-core' ),
				'description' => esc_html__( 'Recommended image size is full', 'techkit-core' ),
				'label_block' => true,
			]
		);
		
		$fields=array(
            array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Banner Slider', 'techkit-core' ),
			),
            array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Alignment', 'techkit-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .slider-content' => 'text-align: {{VALUE}}',
				),
			),
            array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'banner_lists',
				'label'   => esc_html__( 'Slider Items', 'techkit-core' ),
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'Web Development & Custom Solutions', ],
					['title' => 'Web Development & Custom Solutions', ],
					['title' => 'Web Development & Custom Solutions', ],
				),
			),
            
            array(
				'mode' => 'section_end',
			),
            // Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'techkit-core' ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'techkit-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_arrow',
				'label'       => esc_html__( 'Navigation Arrow', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'techkit-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_buttet',
				'label'       => esc_html__( 'Pagination', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'techkit-core' ),
			),		
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_delay',
				'label'   => esc_html__( 'Autoplay Slide Delay', 'techkit-core' ),
				'default' => 5000,
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'techkit-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'techkit-core' ),
				'default' => 1000,
				'description' => esc_html__( 'Set any value for example .8 seconds to play it in every 2 seconds. Default: .8 Seconds', 'techkit-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'techkit-core' ),
			),
			array(
				'mode' => 'section_end',
			),

            // Title style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style',
				'label'   => esc_html__( 'Title Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .banner-slider .slider-content .slider-title',
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .slider-content .slider-title' => 'color: {{VALUE}}',
				),
			),
            array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'title_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Title Space', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .banner-slider .slider-content .slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'title_align',
				'label'   => esc_html__( 'Alignment', 'techkit-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
			),
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'title_width',
				'label'   		=> esc_html__( 'Title Width', 'techkit-core' ),						
				'size_units' => array( 'px', '%', 'em' ),
				'default' => array(
				'unit' => '%',
				'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .slider-content .slider-title' => 'max-width: {{SIZE}}{{UNIT}};',
				)
			),
            array(
				'mode' => 'section_end',
			),
            // SubTitle style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_subtitle_style',
				'label'   => esc_html__( 'Subtitle Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'subtitle_typo',
				'label'   => esc_html__( 'Subtitle Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .banner-slider .slider-content .sub-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'subtitle_color',
				'label'   => esc_html__( 'Subtitle Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .slider-content .sub-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'subtitle_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Subtitle Space', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .banner-slider .slider-content .sub-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
            // Content style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_content_style',
				'label'   => esc_html__( 'Content Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .banner-slider .slider-content .slider-text',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .slider-content .slider-text' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'content_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Content Space', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .banner-slider .slider-content .slider-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'text_align',
				'label'   => esc_html__( 'Alignment', 'techkit-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
			),
			array(
				'type' 			=> Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      		=> 'text_width',
				'label'   		=> esc_html__( 'Text Width', 'techkit-core' ),						
				'size_units' => array( 'px', '%', 'em' ),
				'default' => array(
				'unit' => '%',
				'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .slider-content .slider-text' => 'max-width: {{SIZE}}{{UNIT}};',
				)
			),
			array(
				'mode' => 'section_end',
			),
			// Button style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button',
				'label'   => esc_html__( 'Button Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_size',
				'label'   => esc_html__( 'Button Size', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .btn-common' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => esc_html__( 'Button Bg Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .btn-common' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_color',
				'label'   => esc_html__( 'Button Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .btn-common' => 'color: {{VALUE}}',
					'{{WRAPPER}} .banner-slider .btn-common path.rt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_hover_color',
				'label'   => esc_html__( 'Button Hover Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .banner-slider .btn-common:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .banner-slider .btn-common:hover path.rt-button-cap' => 'stroke: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'button_padding',
	            'label'   => __( 'Padding', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .banner-slider .btn-common' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Shape style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_animation',
				'label'   => esc_html__( 'Animation', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),

			array(
				'type'    => Controls_Manager::SELECT2,
				'id'          => 'animation',
				'label'       => esc_html__( 'Animation', 'techkit-core' ),
				'description' => esc_html__( 'Show or Hide animation. Default: true', 'techkit-core' ),
				'options' => array(
					'animation' => esc_html__( 'On', 'techkit-core' ),
					'animation-off' => esc_html__( 'Off', 'techkit-core' ),
				),
				'default' => 'animation',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'shape_display',
				'label'       => esc_html__( 'Shape Display', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Shape. Default: On', 'techkit-core' ),
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
        if($data['slider_autoplay']=='yes'){
			$data['slider_autoplay']=true;
		}
		else{
			$data['slider_autoplay']=false;
		}
		$swiper_data=array(
			'slidesPerView' 	=>1,
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'slideToClickedSlide' =>true,
			'autoplay'				=>array(
				'delay'  => $data['slider_autoplay_delay'],
			),
			'speed'      =>$data['slider_autoplay_speed'],
			'auto'   =>$data['slider_autoplay']
		);
		$template = 'banner-slider';
        $data['swiper_data'] = json_encode( $swiper_data );   
		return $this->rt_template( $template, $data );
	}
}