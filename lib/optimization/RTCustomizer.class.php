<?php 
// Security check
defined('ABSPATH') || die();

class RTCustomizer extends RTOptimizerHooks implements RTOptionFramework{

    public $config; 

    public function __construct($config){

        $this->config = $config;
        
        add_action('customize_register', [&$this, 'register']);


    }

    public function get_option($id){
        
        return get_theme_mod( $id, '' );

    }

    public function register( $wp_customize = [] ){

        // Panel
        foreach($this->config['sections'] as $section){

            $wp_customize->add_panel($section['id'], array(
                'priority'       => 160,
                // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText -- title is provided dynamically from config.
                'title'          => __($section['title'], 'techkit-core'),
                // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText -- description is provided dynamically from config.
                'description'    => __($section['description'], 'techkit-core'),
            ));

            // Section
            foreach($section['sub_sections'] as $sub_sections){

                $wp_customize->add_section($sub_sections['id'], [
                    // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText -- title is provided dynamically from config.
                    'title' => __($sub_sections['title'], 'techkit-core'),
                    // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText -- description is provided dynamically from config.
                    'description' => __($sub_sections['description'], 'techkit-core'),
                    'description_hidden' => true,
                    'panel' => $section['id'],
                ]);

                // Fields
                foreach($sub_sections['fields'] as $field){

                    $wp_customize->add_setting($field['id'], [
                        'default' => $field['default'],
                        'sanitize_callback' => $field['sanitize_callback']
                    ]);

                    $wp_customize->add_control(
                        new WP_Customize_Control(
                            $wp_customize,
                            $field['id'],
                            array(
                                // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText -- label is provided dynamically from config.
                                'label'    => __($field['label'], 'techkit-core'),
                                'section'  => $sub_sections['id'],
                                'settings' => $field['id'],
                                'type'     => $field['type'],
                                // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText -- description is provided dynamically from config.
                                'description' => __($field['description'], 'techkit-core'),
                            )
                        )
                    );


                }

            }

        }


    }

}