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

class RT_Apply extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Apply', 'techkit-core' );
		$this->rt_base = 'rt-apply';
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'title', [
				'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'default' => esc_html__( 'UX/UI Designer', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'content', [
				'type'    => Controls_Manager::WYSIWYG,
				'label'   => esc_html__( 'Content', 'techkit-core' ),
				'default' => esc_html__( 'Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur elit. Vesti at bulum nec odio aea the dumm ipsumm ipsum that dolocons rsus mal suada and fadolorit to the consectetur elit. Grursus mal suada faci lisis Lorem the ipsum dolarorit more ametion consectetur elit.', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'location', [
				'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Location', 'techkit-core' ),
				'default' => esc_html__( 'New York, USA ', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'job_type', [
				'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Type', 'techkit-core' ),
				'default' => esc_html__( 'Full Time', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'buttontext', [
				'type'    => Controls_Manager::TEXT,
				'label'   => esc_html__( 'Button Text', 'techkit-core' ),
				'default' => esc_html__( 'Apply Now', 'techkit-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'buttonurl', [
				'type'    => Controls_Manager::URL,
				'label'   => esc_html__( 'Button URL', 'techkit-core' ),
				'placeholder' => 'https://your-link.com',
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
			array (
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'apply_info',
				'label'   => esc_html__( 'Apply List', 'techkit-core' ),
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'UX/UI Designer', ],
					['title' => 'Project Manager', ],
					['title' => 'Sr. Software Engineer (PHP/Laravel/VueJS)', ],
				),
			),
			array(
				'mode' => 'section_end',
			),
			
			/*Title Style Option*/
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
				'selector' => '{{WRAPPER}} .apply-item .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .apply-item .rtin-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .apply-item .apply-content' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'content_margin',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Content Space', 'techkit-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .apply-item .apply-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),			
			array(
				'mode' => 'section_end',
			),
			/*Title Style Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button',
				'label'   => esc_html__( 'Button', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_window',
				'label'   => esc_html__( 'Display', 'techkit-core' ),
				'options' => array(
					'self'      => esc_html__( 'Same Window', 'techkit-core' ),
					'blink'     => esc_html__( 'New Window', 'techkit-core' ),
				),
				'default' => 'self',
			),
			
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		
		$data = $this->get_settings();

		$template = 'rt-apply';

		return $this->rt_template( $template, $data );
	}
}