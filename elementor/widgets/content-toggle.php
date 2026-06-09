<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit;

class Content_Toggle extends Custom_Widget_Base {
  public function __construct( $data = [], $args = null ){
    $this->rt_name = esc_html__( 'Content toggle', 'techkit-core' );
    $this->rt_base = 'rt-content-toggle';
    parent::__construct( $data, $args );
  }
  public function get_post_template( $type = 'page' ) {
    $posts = get_posts(
      array(
        'post_type'      => 'elementor_library',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'posts_per_page' => '-1',
        'tax_query'      => array(
          array(
            'taxonomy' => 'elementor_library_type',
            'field'    => 'slug',
            'terms'    => $type,
          ),
        ),
      )
    );
    $templates = array();
    foreach ( $posts as $post ) {
      $templates[] = array(
        'id'   => $post->ID,
        'name' => $post->post_title,
      );
    }

    return $templates;
  }
  public function get_saved_data( $type = 'section' ) {
    $saved_widgets = $this->get_post_template( $type );
    $options[-1]   = __( 'Select', 'techkit-core' );
    if ( count( $saved_widgets ) ) {
      foreach ( $saved_widgets as $saved_row ) {
        $options[ $saved_row['id'] ] = $saved_row['name'];
      }
    } else {
      $options['no_template'] = __( 'It seems that, you have not saved any template yet.', 'techkit-core' );
    }
    return $options;
  }
  public function get_content_type() {
    $content_type = array(
      'content'              => __( 'Content', 'techkit-core' ),
      'saved_rows'           => __( 'Saved Section', 'techkit-core' ),
      'saved_page_templates' => __( 'Saved Page', 'techkit-core' ),
    );
    return $content_type;
  }
  public function rt_fields(){
    $fields = array(
        /*Tab 1*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tabl',
            'label'   => esc_html__( 'Tab 1', 'techkit-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_1_heading',
            'label'   => esc_html__( 'Heading', 'techkit-core' ),
            'default' => 'Heading 1',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_1_content',
            'label'   => esc_html__( 'Select Template', 'techkit-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class1',
            'label'   => esc_html__( 'Icon', 'techkit-core' ),
            'default' => array(
                'value' => 'fas fa-smile-wink',
                'library' => 'fa-solid',
            ),  
        ),    
        array(
            'mode' => 'section_end',
        ),
        /*Tab 2*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tab2',
            'label'   => esc_html__( 'Tab 2', 'techkit-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_2_heading',
            'label'   => esc_html__( 'Heading', 'techkit-core' ),
            'default' => 'Heading 2',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_2_content',
            'label'   => esc_html__( 'Select Template', 'techkit-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class2',
            'label'   => esc_html__( 'Icon', 'techkit-core' ),
            'default' => array(
                'value' => 'fas fa-smile-wink',
                'library' => 'fa-solid',
            ),  
        ),    
        array(
            'mode' => 'section_end',
        ),
        /*Tab 3*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tab3',
            'label'   => esc_html__( 'Tab 3', 'techkit-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_3_heading',
            'label'   => esc_html__( 'Heading', 'techkit-core' ),
            'default' => 'Heading 3',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_3_content',
            'label'   => esc_html__( 'Select Template', 'techkit-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class3',
            'label'   => esc_html__( 'Icon', 'techkit-core' ),
            'default' => array(
                'value' => 'fas fa-smile-wink',
                'library' => 'fa-solid',
            ),  
        ),    
        array(
            'mode' => 'section_end',
        ),
        /*Tab 3*/
        array(
            'mode'    => 'section_start',
            'id'      => 'sec_tab4',
            'label'   => esc_html__( 'Tab 4', 'techkit-core' ),
        ),
        array(
            'type'    => Controls_Manager::TEXT,
            'id'      => 'section_4_heading',
            'label'   => esc_html__( 'Heading', 'techkit-core' ),
            'default' => 'Heading 4',
        ),
        array(
            'type'    => Controls_Manager::SELECT2,
            'id'      => 'section_4_content',
            'label'   => esc_html__( 'Select Template', 'techkit-core' ),
            'options' => $this->get_saved_data('section'),
            'default' => 'key',
        ),     
        array(
            'type'    => Controls_Manager::ICONS,
            'id'      => 'icon_class4',
            'label'   => esc_html__( 'Icon', 'techkit-core' ),
            'default' => array(
                'value' => 'fas fa-smile-wink',
                'library' => 'fa-solid',
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
    $template = 'content-toggle';
    return $this->rt_template( $template, $data );
  }
}
