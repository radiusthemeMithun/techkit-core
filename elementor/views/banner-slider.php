<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Techkit_Core;
use Elementor\Group_Control_Image_Size;
extract( $data );

$banners = array();
foreach ( $data['banner_lists'] as $banner_list ) {
    $banners[] = array(
        'slider_sub_title'  => $banner_list['slider_sub_title'],
        'slider_title'      => $banner_list['slider_title'],
        'slider_text'       => $banner_list['slider_text'],     
        'button_text'       => $banner_list['button_text'],
        'button_url'        => $banner_list['button_url']['url'],
        'img'      => $banner_list['banner_image']['url'] ? $banner_list['banner_image']['url'] : "", 
        'shape1'      => $banner_list['shape1']['id'] ? $banner_list['shape1']['id'] : "",
        'shape2'      => $banner_list['shape2']['id'] ? $banner_list['shape2']['id'] : "",
    );
}
?>

<div class="banner-slider">
    <div class="swiper-container rt-banner-slider" data-options ="<?php echo esc_attr( $data['swiper_data'] );?>">
        <div class="swiper-wrapper <?php echo esc_attr( $data['animation'] );?>">
            <?php $i = 1;
                foreach ($banners as $banner){ 
                    $banner_shape1 = wp_get_attachment_image( $banner['shape1'], 'full', false );
                    $banner_shape2 = wp_get_attachment_image( $banner['shape2'], 'full', false );
                    ?>
                   
                <div class="swiper-slide single-slide slide-<?php echo esc_attr( $i ); ?>">
                    <?php if ( $data['shape_display']  == 'yes' ) { ?>
                    <div class="shape-item">            
                        <span class="shape shape1"><?php echo wp_kses_post( $banner_shape1 ); ?></span>
                        <span class="shape shape2"><?php echo wp_kses_post( $banner_shape2 ); ?></span>  
                    </div>
                    <?php } ?>
                    <div class="single-slider" data-bg-image="<?php echo esc_attr($banner['img']); ?>">
                        <div class="container-fluid">
                            <div class="slider-content">
                                <div class="sub-title"><?php echo $banner['slider_sub_title']; ?></div>
                                <h2 class="slider-title <?php echo esc_attr( $data['title_align'] );?>"><?php echo $banner['slider_title']; ?></h2>
                                <div class="slider-text <?php echo esc_attr( $data['text_align'] );?>"><?php echo $banner['slider_text']; ?></div>
                                <?php if ( $data['button_display']  == 'yes' ) { ?>
                                <div class="slider-btn-area">
                                    <a class="button-style-2 btn-common rt-animation-out" href="<?php echo esc_url( $banner['button_url'] ); ?>"><?php echo wp_kses( $banner['button_text'], 'alltext_allow' ); ?><?php echo radius_arrow_shape(); ?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; } ?>            
        </div>
        <?php if($data['display_arrow']=='yes'){  ?>
        <div class="swiper-navigation">
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <?php } if($data['display_buttet']=='yes') { ?>
        <div class="swiper-pagination"></div>
        <?php } ?>
    </div>    
</div>

<?php


