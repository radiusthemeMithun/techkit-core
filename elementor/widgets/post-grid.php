<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_Grid extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Grid', 'techkit-core' );
		$this->rt_base = 'rt-post-grid';
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
		$categories = get_categories();
		$category_dropdown = array( '0' => esc_html__( 'All Categories', 'techkit-core' ) );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->term_id] = $category->name;
		}
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
					'style1' => esc_html__( 'Post Layout 1', 'techkit-core' ),
					'style2' => esc_html__( 'Post Layout 2', 'techkit-core' ),
					'style3' => esc_html__( 'Post Layout 3', 'techkit-core' ),
					'style4' => esc_html__( 'Post Layout 4', 'techkit-core' ),
				),
				'default' => 'style1',
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
				'id'      => 'post_orderby',
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => esc_html__( 'Categories', 'techkit-core' ),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'techkit-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'techkit-core' ),
				'default' => 3,
				'description' => esc_html__( 'Maximum number of words', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'techkit-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of words', 'techkit-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'small_title_count',
				'label'   => esc_html__( 'Small Title count', 'techkit-core' ),
				'default' => 6,
				'description' => esc_html__( 'Maximum number of words', 'techkit-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'read_display',
				'label'       => esc_html__( 'Read More Display', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style2', 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'buttontext',
				'label'   => esc_html__( 'Button Text', 'techkit-core' ),
				'default' => esc_html__( 'Read more', 'techkit-core' ),
				'condition'   => array( 'read_display' =>'yes', 'style' => array( 'style2', 'style3' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Option', 'techkit-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_author',
				'label'       => esc_html__( 'Show Author Name', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_date',
				'label'       => esc_html__( 'Show Date', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_category',
				'label'       => esc_html__( 'Show Categories', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_comment',
				'label'       => esc_html__( 'Show Comment', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
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
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4' ) ),
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
		
		switch ( $data['style'] ) {
			case 'style4':
			$template = 'post-grid-4';
			break;
			case 'style3':
			$template = 'post-grid-3';
			break;
			case 'style2':
			$template = 'post-grid-2';
			break;
			default:
			$template = 'post-grid-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}
}