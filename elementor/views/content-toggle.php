<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;

extract($data);
$content_1_id = "content_1_id_" . uniqid();
$content_2_id = "content_2_id_" . uniqid();
$content_3_id = "content_3_id_" . uniqid();
$content_4_id = "content_4_id_" . uniqid();
$content_1 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_1_content ) ;
$content_2 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_2_content ) ;
$content_3 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_3_content ) ;
$content_4 = \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $section_4_content ) ;

/*icon 1*/
$final_icon_class1       = " fas fa-thumbs-up";
if ( is_string( $icon_class1['value'] ) && $dynamic_icon_class =  $icon_class1['value']  ) {
  $final_icon_class1     = $dynamic_icon_class;
}

/*icon 2*/
$final_icon_class2       = " fas fa-thumbs-up";
if ( is_string( $icon_class2['value'] ) && $dynamic_icon_class =  $icon_class2['value']  ) {
  $final_icon_class2     = $dynamic_icon_class;
}

/*icon 3*/
$final_icon_class3       = " fas fa-thumbs-up";
if ( is_string( $icon_class3['value'] ) && $dynamic_icon_class =  $icon_class3['value']  ) {
  $final_icon_class3     = $dynamic_icon_class;
}

/*icon 4*/
$final_icon_class4       = " fas fa-thumbs-up";
if ( is_string( $icon_class4['value'] ) && $dynamic_icon_class =  $icon_class4['value']  ) {
  $final_icon_class4     = $dynamic_icon_class;
}

?>
<div class="rtel-tab-toggle">
	<ul class="nav nav-tabs" id="myTab" data-id="myTab" role="tablist">
	  <li class="nav-item">
	    <button
			class="nav-link active"
			data-bs-toggle="tab"
			data-bs-target="#<?php echo esc_attr( $content_1_id ); ?>"
			type="button"
			role="tab"
			><i class="<?php  echo esc_attr( $final_icon_class1 ); ?>"></i><?php echo esc_html( $section_1_heading ); ?>
		</button>
	  </li>
	  <li class="nav-item">
	    	<button
			class="nav-link"
			data-bs-toggle="tab"
			data-bs-target="#<?php echo esc_attr( $content_2_id ); ?>"
			type="button"
			role="tab"
			><i class="<?php  echo esc_attr( $final_icon_class2 ); ?>"></i><?php echo esc_html( $section_2_heading ); ?>
		</button>
	  </li>
	  <li class="nav-item">
	    	<button
			class="nav-link"
			data-bs-toggle="tab"
			data-bs-target="#<?php echo esc_attr( $content_3_id ); ?>"
			type="button"
			role="tab"
			><i class="<?php  echo esc_attr( $final_icon_class3 ); ?>"></i><?php echo esc_html( $section_3_heading ); ?>
		</button>
	  </li>
	  <li class="nav-item">
	    	<button
			class="nav-link"
			data-bs-toggle="tab"
			data-bs-target="#<?php echo esc_attr( $content_4_id ); ?>"
			type="button"
			role="tab"
			><i class="<?php  echo esc_attr( $final_icon_class4 ); ?>"></i><?php echo esc_html( $section_4_heading ); ?>
		</button>
	  </li>
	</ul>


	<div class="tab-content" data-id="myTabContent">
	  <div class="tab-pane fade active show" id="<?php echo esc_attr( $content_1_id ); ?>" role="tabpanel">
	  	<?php print( $content_1 ); ?>
	  </div>
	  <div class="tab-pane fade" id="<?php echo esc_attr( $content_2_id ); ?>" role="tabpanel">
	  	<?php print( $content_2 ); ?>
	  </div>
	  <div class="tab-pane fade" id="<?php echo esc_attr( $content_3_id ); ?>" role="tabpanel">
	  	<?php print( $content_3 ); ?>
	  </div>
	  <div class="tab-pane fade" id="<?php echo esc_attr( $content_4_id ); ?>" role="tabpanel">
	  	<?php print( $content_4 ); ?>
	  </div>
	</div>
</div> 

