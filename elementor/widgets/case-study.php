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

class RT_Casestudy extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Case Study', 'techkit-core' );
		$this->rt_base = 'rt-case-study';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'techkit-core' ),
				'6'  => esc_html__( '2 Col', 'techkit-core' ),
				'4'  => esc_html__( '3 Col', 'techkit-core' ),
				'3'  => esc_html__( '4 Col', 'techkit-core' ),
				'2'  => esc_html__( '6 Col', 'techkit-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	public function rt_fields(){
		
		$terms  = get_terms( array( 'taxonomy' => 'techkit_case_category', 'fields' => 'id=>name' ) );
		$category_dropdown = array( '0' => __( 'Please Selecet category', 'techkit-core' ) );

		foreach ( $terms as $id => $name ) {
			$category_dropdown[$id] = $name;
		}
		
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
					'layout1' => esc_html__( 'Case layout 1', 'techkit-core' ),
					'layout2' => esc_html__( 'Case layout 2', 'techkit-core' ),
					'layout3' => esc_html__( 'Case layout 3', 'techkit-core' ),
					'layout4' => esc_html__( 'Case layout 4', 'techkit-core' ),
					'layout5' => esc_html__( 'Case layout 5', 'techkit-core' ),
					'layout6' => esc_html__( 'Case layout 6', 'techkit-core' ),
				),
				'default' => 'layout1',
			),
			array (
				'type'      => Controls_Manager::SELECT2,
				'id'        => 'cat_single',
				'label'     => esc_html__( 'Categories', 'zugan-core' ),
				'options'   => $category_dropdown,
				'default'   => '0',
				'multiple'  => false,
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'techkit-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'techkit-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'techkit-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Post Sorting', 'techkit-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'techkit-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'techkit-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'techkit-core' ),
					'title' 		=> esc_html__( 'By Name', 'techkit-core' ),
				),
				'default' => 'recent',
			),			
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => esc_html__( 'Enter Post ID that will not display', 'techkit-core' ),
				'fields'  => array(
					array(
						'type'    => Controls_Manager::NUMBER,
						'name'    => 'post_not_in',
						'label'   => esc_html__( 'Post ID', 'techkit-core' ),
						'default' => '0',
					),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'column_no_gutters',
				'label'   => esc_html__( 'Display column gap', 'techkit-core' ),
				'options' => array(
					'show'        => esc_html__( 'Gap', 'techkit-core' ),
					'hide'        => esc_html__( 'No Gap', 'techkit-core' ),
				),
				'default' => 'show',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemnumber',
				'label'   => esc_html__( 'Item Number', 'techkit-core' ),
				'default' => -1,
				'description' => esc_html__( 'Use -1 for showing all items( Showing items per category )', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title Word count', 'techkit-core' ),
				'default' => 5,
				'description' => esc_html__( 'Maximum number of words', 'techkit-core' ),				
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_more',
				'label'       => esc_html__( 'Post more', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
				'condition'   => array( 'layout' => array( 'layout6'  ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_display',
				'label'       => esc_html__( 'Category Name Display', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide Content. Default: off', 'techkit-core' ),
				'condition'   => array( 'layout' => array( 'layout4','layout5'  ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'contype',
				'label'   => esc_html__( 'Content Type', 'techkit-core' ),
				'options' => array(
					'content' => esc_html__( 'Conents', 'techkit-core' ),
					'excerpt' => esc_html__( 'Excerpts', 'techkit-core' ),
				),
				'default'     => 'content',
				'description' => esc_html__( 'Display contents from Editor or Excerpt field', 'techkit-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ), 'layout' => array( 'layout4','layout5'  ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'word_count',
				'label'   => esc_html__( 'Word count', 'techkit-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'techkit-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ), 'layout' => array( 'layout4','layout5'  ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__( 'More Button', 'techkit-core' ),
				'options' => array(
					'show'        => esc_html__( 'Show Read More', 'techkit-core' ),
					'hide'        => esc_html__( 'Show Pagination', 'techkit-core' ),
				),
				'default' => 'show',				
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__( 'Button Text', 'techkit-core' ),
				'default' => esc_html__( 'More Portfolios', 'techkit-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
			),
			array (
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__( 'Button Link', 'techkit-core' ),
				'condition'   => array( 'more_button' => array( 'show' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			/*Style section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_style',
	            'label'   => esc_html__( 'Case Style', 'techkit-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Item Title Typo', 'techkit-core' ),
				'selector' => '{{WRAPPER}} .case-default .rtin-item .rtin-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .case-default .rtin-item .rtin-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .case-default .rtin-item .rtin-content p' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout4', 'layout5' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__( 'Category Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .case-default .rtin-item .rtin-cat a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_bg_color',
				'label'   => esc_html__( 'Item Background Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .case-multi-layout-1 .rtin-item .rtin-content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .case-multi-layout-3 .rtin-item .rtin-content' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1', 'layout3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_bg_hov_color',
				'label'   => esc_html__( 'Item Background Hover Color', 'techkit-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .case-multi-layout-1 .rtin-item:hover .rtin-content' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'layout' => array( 'layout1' ) ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_padding',
	            'label'   => __( 'Content Padding', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .case-multi-layout-3 .rtin-item .rtin-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
				'condition'   => array( 'layout' => array( 'layout3' ) ),
	            'separator' => 'before',
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'icon_padding',
	            'label'   => __( 'Icon Padding', 'techkit-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .case-multi-layout-3 .rtin-item .link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
				'condition'   => array( 'layout' => array( 'layout3' ) ),
	            'separator' => 'before',
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

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__( 'Phones: < 576px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		switch ( $data['layout'] ) {
			case 'layout6':
			$template = 'case-6';
			break;						
			case 'layout5':
			$template = 'case-5';
			break;						
			case 'layout4':
			$template = 'case-4';
			break;	
			case 'layout3':
			$template = 'case-3';
			break;
			case 'layout2':
			$template = 'case-2';
			break;
			default:
			$template = 'case-1';
			break;
		}

		return $this->rt_template( $template, $data );
	}
}