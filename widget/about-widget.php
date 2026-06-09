<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class TechkitTheme_About_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'techkit_about_author', // Base ID
            esc_html__( 'Techkit : About Author', 'techkit-core' ), // Name
            array( 'description' => esc_html__( 'About Author Widget', 'techkit-core' ) ) // Args
            );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			echo $html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

		$img   = wp_get_attachment_image( $instance['ab_image'] );

		?>
		
		<div class="author-widget" style="background-image: url(<?php echo wp_get_attachment_image_url($instance['bg_image'],'full') ; ?>)">
			<?php	
			if( !empty( $instance['ab_image'] ) ){
				?><span><?php echo wp_kses( $img, 'alltext_allow' ); ?></span><?php
			} 
			if( !empty( $instance['subtitle'] ) ){
				?><h3><?php echo esc_html( $instance['subtitle'] ); ?></a></h3><?php
			}  
			if( !empty( $instance['phone'] ) ){
				?><span class="phone"><a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></span><?php
			}   
			if( !empty( $instance['email'] ) ){
				?><span class="email"><?php esc_html_e( 'Mail:' , 'techkit-core' ) ?> <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo esc_html( $instance['email'] ); ?></a></span><?php
			}

			?>

			<ul class="about-social">
				<?php
				if( !empty( $instance['facebook'] ) ){
					?><li><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li><?php
				}
				if( !empty( $instance['twitter'] ) ){
					?><li><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fab fa-x-twitter"></i></a></li><?php
				}
				if( !empty( $instance['linkedin'] ) ){
					?><li><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li><?php
				}
				if( !empty( $instance['instagram'] ) ){
					?><li><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li><?php
				}
				if( !empty( $instance['pinterest'] ) ){
					?><li><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li><?php
				}
				if( !empty( $instance['tiktok'] ) ){
					?><li><a href="<?php echo esc_url( $instance['tiktok'] ); ?>" target="_blank"><i class="fab fa-tiktok"></i></a></li><?php
				}
				?>
			</ul>

		</div>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['ab_image']      = ( ! empty( $new_instance['ab_image'] ) ) ? sanitize_text_field( $new_instance['ab_image'] ) : '';
		$instance['bg_image']      = ( ! empty( $new_instance['bg_image'] ) ) ? sanitize_text_field( $new_instance['bg_image'] ) : '';
		$instance['subtitle']   = ( ! empty( $new_instance['subtitle'] ) ) ? wp_kses_post( $new_instance['subtitle'] ) : '';
		$instance['phone']     = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		$instance['email']     = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';
		$instance['facebook']      = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']       = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['linkedin']      = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['instagram']     = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		$instance['pinterest']     = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['tiktok']         = ( ! empty( $new_instance['tiktok'] ) ) ? sanitize_text_field( $new_instance['tiktok'] ) : '';

		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   		=> esc_html__( 'About Author' , 'techkit-core' ),
			'subtitle'		=> '',
			'phone'   		=> '',
			'ab_image'    	=> '',
			'bg_image'    	=> '',
			'email'   		=> '',
			'facebook'   	 => '',
			'twitter'     	=> '',
			'linkedin'    	=> '',
			'pinterest'   	=> '',
			'instagram'   	=> '',
			'tiktok'   		=> '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'techkit-core' ),
				'type'  => 'text',
			),
			'ab_image'    => array(
				'label'   => esc_html__( 'Author', 'techkit-core' ),
				'type'    => 'image',
			),
			'bg_image'    => array(
				'label'   => esc_html__( 'background image', 'techkit-core' ),
				'type'    => 'image',
			),
			'subtitle' => array(
				'label'   => esc_html__( 'Sub Title', 'techkit-core' ),
				'type'    => 'text',
			),
			'phone'     => array(
				'label' => esc_html__( 'Phone Number', 'techkit-core' ),
				'type'  => 'text',
			),      
			'email'     => array(
				'label' => esc_html__( 'Email', 'techkit-core' ),
				'type'  => 'text',
			), 
			'facebook'     => array(
				'label'    => esc_html__( 'Facebook URL', 'techkit-core' ),
				'type'     => 'url',
			),
			'twitter'      => array(
				'label'    => esc_html__( 'Twitter URL', 'techkit-core' ),
				'type'     => 'url',
			),
			'linkedin'     => array(
				'label'    => esc_html__( 'LinkedIn URL', 'techkit-core' ),
				'type'     => 'url',
			),
			'instagram'    => array(
				'label'    => esc_html__( 'Instagram URL', 'techkit-core' ),
				'type'     => 'url',
			),
			'pinterest'    => array(
				'label'    => esc_html__( 'Pinterest URL', 'techkit-core' ),
				'type'     => 'url',
			),
			'tiktok'        => array(
				'label'    => esc_html__( 'TikTok URL', 'techkit-core' ),
				'type'     => 'url',
			),
			
		);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}