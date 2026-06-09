<?php
// Security check
defined('ABSPATH') || die();

class RTRedux extends RTOptimizerHooks implements RTOptionFramework{

    public $config;
    protected $redux_opt_name;

    public function __construct($config){

        $this->config = $config;
        
        add_action( 'rt_after_redux_options_loaded', [&$this, 'register'] );

    }

    public function get_option($id){
        
        global $techkit;
        
        $options = &$techkit;

        if( isset($options[$id]) && !empty($options[$id]) )
            return $options[$id];
        else return '';

    }

    public function register($opt_name){

        $this->config['ReduxOptionName'] = $opt_name;

        // Section
        foreach($this->config['sections'] as $section){
            
            Redux::setSection( $this->config['ReduxOptionName'], [
                'id' => $section['id'],
                // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText -- title is provided dynamically from config.
                'title' => __($section['title'], 'techkit-core'),
                'icon' => $section['icon'] ?? 'el el-cogs',
            ] );

            // Sub Section
            foreach($section['sub_sections'] as $sub_section){

                Redux::setSection( $this->config['ReduxOptionName'], [
                    'id' => $sub_section['id'],
                    // phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText -- title is provided dynamically from config.
                    'title' => __($sub_section['title'], 'techkit-core'),
                    'icon' => $sub_section['icon'] ?? 'el el-cog',
                    'subsection' => true,
                    'fields' => $sub_section['fields']
                ] );

            }

        }

    }

}