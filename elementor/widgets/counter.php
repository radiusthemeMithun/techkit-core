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
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Counter', 'techkit-core' );
		$this->rt_base = 'rt-Counter';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_style( 'animate' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'rt-waypoints' );
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
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'iconalign',
				'label'   => esc_html__( 'Icon Align', 'techkit-core' ),
				'options' => array(
					'left' => esc_html__( 'left', 'techkit-core' ),
					'center' => esc_html__( 'Center', 'techkit-core' ),
					'right' => esc_html__( 'Right', 'techkit-core' ),
				),
				'default' => 'center',
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Icon/image', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			/*Icon Start*/
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'techkit-core' ),
				'default' => array(
			      'value' => 'flaticon-heart',
			      'library' => 'far fa-map',
				),
				'condition'   => array( 'showhide' =>'yes', 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'default' => esc_html__( 'Happy Clients', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'techkit-core' ),
				'default' => 243,
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'techkit-core' ),
				'default' => 2000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'techkit-core' ),
				'default' => 50,
				'description' => esc_html__( 'Counter steps eg. 10', 'techkit-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_colors',
				'label'   => esc_html__( 'Style', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'counter_color',
				'label'   => esc_html__( 'Counter Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-counter' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-media i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-media i:before' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_bg_color',
				'label'   => esc_html__( 'Item Bag Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter.rtin-counter-style2 .rtin-item' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style2' ) ),
			),

			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .rt-counter .rtin-item .rtin-title',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'counter_size',
				'label'   => esc_html__( 'Counter Font Size', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .rt-counter .rtin-item .rtin-counter',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Icon Font Size', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-media i' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .rt-counter .rtin-item .rtin-media i:before' => 'font-size: {{VALUE}}px',
				),
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'counter_padding',
	            'label'   => __( 'Padding', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-counter .rtin-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	            'condition'   => array( 'style' => array( 'style2' ) ),
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

	protected function render() {
		$data = $this->get_settings();
		$this->rt_load_scripts();
		
		switch ( $data['style'] ) {
			case 'style3':
			$template = 'counter-3';
			break;
			case 'style2':
			$template = 'counter-2';
			break;
			default:
			$template = 'counter-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}