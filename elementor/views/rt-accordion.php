<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Techkit_Core;
use Elementor\Icons_Manager;

global $techkit_id;

$techkit_id = empty($techkit_id) ? 1 : $techkit_id + 1;
$accordian_id = 'rtaccordion-'.$techkit_id;

?>
<div id="<?php echo esc_attr( $accordian_id ) ?>" class="rt-accordion rt-accordion-<?php echo esc_attr( $data['style'] );?>" >
    <?php $i = 1;
      foreach ( $data['accordion_repeat'] as $accordion ) {
      $show =  $i == 1 ? 'show' : '';
      $collapse=$i!==1 ? 'collapsed':'';
      $t = $accordion['title'];
      $uid = strtolower(str_replace(array(':', '\\', '/', '*', '?', '.', ';', ' '), '', $t));
    ?>
   <div class="accordion-item">
       <h2 class="accordion-header <?php if ( $i == 1 ) { ?>active<?php } ?>" id="rtaccordion-<?php echo esc_attr($uid); ?>" >
        <button class="accordion-button <?php echo esc_attr( $collapse ); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#rtaccordion-collapse-<?php echo esc_attr( $uid ); ?>" aria-expanded="true">
            <?php echo wp_kses_post( $accordion['title'] ); ?>
            </button>
       </h2>
       <div id="rtaccordion-collapse-<?php echo esc_attr( $uid ); ?>" class="accordion-collapse collapse <?php echo esc_attr( $show ); ?>" aria-labelledby="rtaccordion-<?php echo esc_attr($uid); ?>" data-bs-parent="#<?php echo esc_attr( $accordian_id ) ?>">
            <div class="accordion-body">
              <?php echo wp_kses_post( $accordion['accodion_text'] ) ?>
            </div>
        </div>
   </div>
    <?php $i++; } ?>
</div>
