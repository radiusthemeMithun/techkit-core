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
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Accordion extends Custom_Widget_Base{
    public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Accordion', 'techkit-core' );
		$this->rt_base = 'rt-accordion';
		parent::__construct( $data, $args );
	}
    public function rt_fields(){
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'title', array(
				'label' => __( 'Title', 'techkit-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'techkit-core' ),
				'label_block' => true,
            )
		);
        $repeater->add_control(
			'accodion_text', array(
				'label' => __( 'Content', 'techkit-core' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'techkit-core' ),
				'show_label' => false,
            )
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
				'label'   => esc_html__( 'Accordion Style', 'techkit-core' ),
				'options' => array(
					'style-1' => esc_html__( 'Style 1' , 'techkit-core' ),
					'style-2' => esc_html__( 'Style 2', 'techkit-core' ),
				),
				'default' => 'style-1',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'accordion_repeat',
				'label'   => esc_html__( 'Address', 'techkit-core' ),
				//'prevent_empty' => false,
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'How can we help your business?', ],
					['title' => 'What are the advantages of Techkit?', ],
					['title' => 'How working process is simplified?', ],
				),
			),
			array(
				'id'      => 'space_bottom',
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__( 'Space Bottom', 'techkit-core' ),
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-accordion .accordion-item' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Title
			array(
				'id'      => 'title_style',
				'mode'    => 'section_start',
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .accordion-button.collapsed' => 'color: {{VALUE}}',
				),
			),
			array(
				'name'     => 'title_typo',
				'mode'     => 'group',
				'type'     => Group_Control_Typography::get_type(),
				'label'    => __( 'Typography', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .rt-accordion .accordion-header button',
			),
            array(
				'id'      => 'heading',
				'type' => Controls_Manager::HEADING,
				'label'   => __( 'Title Active', 'techkit-core' ),
				'separator' => 'before',
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_active_color',
				'label'   => esc_html__( 'Title Active Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .accordion-header button' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_padding',
	            'label'   => __( 'Padding', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-accordion .accordion-header .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
            
			array(
				'mode' => 'section_end',
			),
			// Description
			array(
				'id'      => 'desc_style',
				'mode'    => 'section_start',
				'label'   => esc_html__( 'Description', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'desc_color',
				'label'   => esc_html__( 'Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .accordion-body p' => 'color: {{VALUE}}',
				),
			),
			array(
				'name'     => 'desc_typo',
				'mode'     => 'group',
				'type'     => Group_Control_Typography::get_type(),
				'label'    => __( 'Typography', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .rt-accordion .accordion-body p',
			),
			array(
				'mode' => 'section_end',
			),
			// Icon
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Icon', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon  Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .accordion-button.collapsed:before' => 'color: {{VALUE}}',
				),
			),
            array(
				'id'      => 'heading2',
				'type' => Controls_Manager::HEADING,
				'label'   => __( 'Icon  Active', 'techkit-core' ),
				'separator' => 'before',
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_active_color',
				'label'   => esc_html__( 'Icon  Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .accordion-button:before' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),

		);
		return $fields;
    }
    protected function render() {
		$data = $this->get_settings();

		$template = 'rt-accordion';

		return $this->rt_template( $template, $data );
	}

}