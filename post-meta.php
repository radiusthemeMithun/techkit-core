<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

use TechkitTheme;
use TechkitTheme_Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = TECHKIT_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'techkit-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'techkit-core' ) ) + TechkitTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'techkit-core' ), array( 'page', 'post', 'techkit_team', 'techkit_service', 'techkit_case', 'techkit_testim' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'techkit-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'techkit-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'techkit-core' ),
						'full-width'    => __( 'Full Width', 'techkit-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'techkit-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'techkit-core' ),
					),
					'default'  => 'default',
				),		
				'techkit_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'techkit-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'techkit-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_tr_header" => array(
					'label'    	  => __( 'Transparent Header', 'techkit-core' ),
					'type'     	  => 'select',
					'options'  	  => array(
						'default' => __( 'Default', 'techkit-core' ),
						'on'      => __( 'Enabled', 'techkit-core' ),
						'off'     => __( 'Disabled', 'techkit-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'techkit-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'on'      => __( 'Enabled', 'techkit-core' ),
						'off'     => __( 'Disabled', 'techkit-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'techkit-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'techkit-core' ),
						'1'       => __( 'Layout 1', 'techkit-core' ),
						'2'       => __( 'Layout 2', 'techkit-core' ),
						'3'       => __( 'Layout 3', 'techkit-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'techkit-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'on'      => __( 'Enabled', 'techkit-core' ),
						'off'     => __( 'Disabled', 'techkit-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'techkit-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'1'       => __( 'Layout 1', 'techkit-core' ),
						'2'       => __( 'Layout 2', 'techkit-core' ),
						'3'       => __( 'Layout 3', 'techkit-core' ),
						'4'       => __( 'Layout 4', 'techkit-core' ),
						'5'       => __( 'Layout 5', 'techkit-core' ),
						'6'       => __( 'Layout 6', 'techkit-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'techkit-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'1'       => __( 'Layout 1', 'techkit-core' ),
						'2'       => __( 'Layout 2', 'techkit-core' ),
						'3'       => __( 'Layout 3', 'techkit-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'techkit-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'on'      => __( 'Enabled', 'techkit-core' ),
						'off'     => __( 'Disabled', 'techkit-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'techkit-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'on'      => __( 'Enabled', 'techkit-core' ),
						'off'     => __( 'Disabled', 'techkit-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'techkit-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'0px'     => __( '0px', 'techkit-core' ),
						'10px'    => __( '10px', 'techkit-core' ),
						'20px'    => __( '20px', 'techkit-core' ),
						'30px'    => __( '30px', 'techkit-core' ),
						'40px'    => __( '40px', 'techkit-core' ),
						'50px'    => __( '50px', 'techkit-core' ),
						'60px'    => __( '60px', 'techkit-core' ),
						'70px'    => __( '70px', 'techkit-core' ),
						'80px'    => __( '80px', 'techkit-core' ),
						'90px'    => __( '90px', 'techkit-core' ),
						'100px'   => __( '100px', 'techkit-core' ),
						'110px'   => __( '110px', 'techkit-core' ),
						'120px'   => __( '120px', 'techkit-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'techkit-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'0px'     => __( '0px', 'techkit-core' ),
						'10px'    => __( '10px', 'techkit-core' ),
						'20px'    => __( '20px', 'techkit-core' ),
						'30px'    => __( '30px', 'techkit-core' ),
						'40px'    => __( '40px', 'techkit-core' ),
						'50px'    => __( '50px', 'techkit-core' ),
						'60px'    => __( '60px', 'techkit-core' ),
						'70px'    => __( '70px', 'techkit-core' ),
						'80px'    => __( '80px', 'techkit-core' ),
						'90px'    => __( '90px', 'techkit-core' ),
						'100px'   => __( '100px', 'techkit-core' ),
						'110px'   => __( '110px', 'techkit-core' ),
						'120px'   => __( '120px', 'techkit-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'techkit-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'on'	  => __( 'Enable', 'techkit-core' ),
						'off'	  => __( 'Disable', 'techkit-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'techkit-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'on'      => __( 'Enable', 'techkit-core' ),
						'off'	  => __( 'Disable', 'techkit-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'techkit-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'techkit-core' ),
						'bgimg'   => __( 'Background Image', 'techkit-core' ),
						'bgcolor' => __( 'Background Color', 'techkit-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'techkit-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'techkit-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'techkit-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'techkit-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'techkit-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'techkit-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'techkit-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'techkit-core' ),
				),
			)
		)
	),
) );

/*-------------------------------------
#. Single Post Gallery
---------------------------------------*/

$Postmeta->add_meta_box( 'techkit_post_info', __( 'Post Info', 'techkit-core' ), array( 'post' ), '', '', 'high', array(
	'fields' => array(	
		'techkit_post_gallery' => array(
			'label' => __( 'Post Gallery', 'techkit-core' ),
			'type'  => 'gallery',
		),
		"techkit_post_layout" => array(
			'label'   => __( 'Post Template', 'techkit-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => __( 'Default', 'techkit-core' ),
				'post-detail-style1'  => __( 'Layout 1', 'techkit-core' ),
				'post-detail-style2'  => __( 'Layout 2', 'techkit-core' ),
			),
			'default'  => 'default',
		),	
	),
) );

/*-------------------------------------
#. Team
---------------------------------------*/

$Postmeta->add_meta_box( 'techkit_team_settings', __( 'Team Member Settings', 'techkit-core' ), array( 'techkit_team' ), '', '', 'high', array(
	'fields' => array(
		'techkit_team_position' => array(
			'label' => __( 'Position', 'techkit-core' ),
			'type'  => 'text',
		),
		'techkit_team_website' => array(
			'label' => __( 'Experience', 'techkit-core' ),
			'type'  => 'text',
		),
		'techkit_team_email' => array(
			'label' => __( 'Email', 'techkit-core' ),
			'type'  => 'text',
		),
		'techkit_team_phone' => array(
			'label' => __( 'Phone', 'techkit-core' ),
			'type'  => 'text',
		),
		'techkit_team_address' => array(
			'label' => __( 'Address', 'techkit-core' ),
			'type'  => 'text',
		),
		'techkit_team_socials_header' => array(
			'label' => __( 'Socials', 'techkit-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'techkit-core' ),
		),
		'techkit_team_socials' => array(
			'type'  => 'group',
			'value'  => TechkitTheme_Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'techkit_team_skills', __( 'Team Member Skills', 'techkit-core' ), array( 'techkit_team' ), '', '', 'high', array(
	'fields' => array(
		'techkit_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'techkit-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'techkit-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'techkit-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'techkit-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'techkit-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'techkit-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'techkit-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'techkit_team_contact', __( 'Team Member Contact', 'techkit-core' ), array( 'techkit_team' ), '', '', 'high', array(
	'fields' => array(
		'techkit_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'techkit-core' ),
			'type'  => 'text',
		),
	)
) );

/*-------------------------------------
#. Service
---------------------------------------*/

$Postmeta->add_meta_box( 'techkit_service_style_box', __( 'Service style', 'techkit-core' ), array( 'techkit_service' ), '', '', 'high', array(
	'fields' => array(
		"techkit_service_style" => array(
			'label'   => __( 'Service Template', 'techkit-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => __( 'Default', 'techkit-core' ),
				'style1'  => __( 'Style 1', 'techkit-core' ),
				'style2'  => __( 'Style 2', 'techkit-core' ),
			),
			'default'  => 'default',
		),
	),
) );
$Postmeta->add_meta_box( 'techkit_service_media', __( 'Service Icon image', 'techkit-core' ),array( "techkit_service" ),'',
		'side',
		'default', array(
		'fields' => array(
			"techkit_service_icon" => array(
			  'label' => __( 'Service Icon', 'techkit-core' ),
			  'type'  => 'icon_select',
			  'desc'  => __( "Choose a Icon for your service", 'techkit-core' ),
			  'options' => TechkitTheme_Helper::get_icons(),
			),
		)
) );

/*-------------------------------------
#. Case
---------------------------------------*/
$Postmeta->add_meta_box( 'techkit_case_info', __( 'Case Info', 'techkit-core' ), array( 'techkit_case' ), '', '', 'high', array(
	'fields' => array(
		'case_video_link' => array(
			'label' => __( 'Case video link', 'techkit-core' ),
			'type'  => 'text',
		),
	),
) );

/*-------------------------------------
#. Testimonial
---------------------------------------*/
$Postmeta->add_meta_box( 'techkit_testimonial_info', __( 'Testimonial Info', 'techkit-core' ), array( 'techkit_testim' ), '', '', 'high', array(
	'fields' => array(
		'techkit_tes_name' => array(
			'label' => __( 'Name', 'techkit-core' ),
			'type'  => 'text',
		),
		'techkit_tes_designation' => array(
			'label' => __( 'Designation', 'techkit-core' ),
			'type'  => 'text',
		),		
		'techkit_tes_rating' => array(
			'label' => __( 'Select the Rating', 'techkit-core' ),
			'type'  => 'select',
			'options' => array(
				'default' => __( 'Default', 'techkit-core' ),
				'1'    => '1',
				'2'    => '2',
				'3'    => '3',
				'4'    => '4',
				'5'    => '5'
				),
			'default'  => 'default',
		),
	)
) );