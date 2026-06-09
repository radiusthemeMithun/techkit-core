<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Post Slider', 'techkit-core' );
		$this->rt_base = 'rt-post-slider';
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

	private function rt_load_scripts(){
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );		
		wp_enqueue_script( 'owl-carousel' );
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
				'default' => 30,
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
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'no',
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
				'id'          => 'post_grid_date',
				'label'       => esc_html__( 'Show Date', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'yes',
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
				'id'          => 'post_grid_comment',
				'label'       => esc_html__( 'Show Comment Number', 'techkit-core' ),
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
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_view',
				'label'       => esc_html__( 'Show Views', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_grid_read',
				'label'       => esc_html__( 'Show Reading Length', 'techkit-core' ),
				'label_on'    => esc_html__( 'Show', 'techkit-core' ),
				'label_off'   => esc_html__( 'Hide', 'techkit-core' ),
				'default'     => 'no',
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
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 1199px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Desktops: > 991px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Tablets: > 767px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Phones: < 768px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__( 'Small Phones: < 480px', 'techkit-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
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
				'id'          => 'slider_nav',
				'label'       => esc_html__( 'Navigation Arrow', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable navigation arrow. Default: On', 'techkit-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_dots',
				'label'       => esc_html__( 'Navigation Dots', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => '',
				'description' => esc_html__( 'Enable or disable navigation dots. Default: Off', 'techkit-core' ),
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
				'id'          => 'slider_stop_on_hover',
				'label'       => esc_html__( 'Stop on Hover', 'techkit-core' ),
				'label_on'    => esc_html__( 'On', 'techkit-core' ),
				'label_off'   => esc_html__( 'Off', 'techkit-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Stop autoplay on mouse hover. Default: On', 'techkit-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'slider_interval',
				'label'   => esc_html__( 'Autoplay Interval', 'techkit-core' ),
				'options' => array(
					'5000' => esc_html__( '5 Seconds', 'techkit-core' ),
					'4000' => esc_html__( '4 Seconds', 'techkit-core' ),
					'3000' => esc_html__( '3 Seconds', 'techkit-core' ),
					'2000' => esc_html__( '2 Seconds', 'techkit-core' ),
					'1000' => esc_html__( '1 Second',  'techkit-core' ),
				),
				'default' => '5000',
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'techkit-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'techkit-core' ),
				'default' => 200,
				'description' => esc_html__( 'Slide speed in milliseconds. Default: 200', 'techkit-core' ),
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
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		$owl_data = array( 
			'nav'                => $data['slider_nav'] == 'yes' ? true : false,
			'dots'               => $data['slider_dots'] == 'yes' ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'autoplay'           => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplayTimeout'    => $data['slider_interval'],
			'autoplaySpeed'      => $data['slider_autoplay_speed'],
			'autoplayHoverPause' => $data['slider_stop_on_hover'] == 'yes' ? true : false,
			'loop'               => $data['slider_loop'] == 'yes' ? true : false,
			'margin'             => 30,
			'responsive'         => array(
				'0'    => array( 'items' => 12 / $data['col_mobile'] ),
				'480'  => array( 'items' => 12 / $data['col_xs'] ),
				'768'  => array( 'items' => 12 / $data['col_sm'] ),
				'992'  => array( 'items' => 12 / $data['col_md'] ),
				'1200' => array( 'items' => 12 / $data['col_lg'] ),
			)
		);

		$template = 'post-slider-1';
		
		$data['owl_data'] = json_encode( $owl_data );
		$this->rt_load_scripts();
		
		return $this->rt_template( $template, $data );
	}
}