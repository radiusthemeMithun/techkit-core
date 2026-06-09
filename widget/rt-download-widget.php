<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class TechkitTheme_Download extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'techkit_download', // Base ID
            esc_html__( 'Techkit: Download', 'techkit-core' ), // Name
            array( 'description' => esc_html__( 'Techkit: Download Widget', 'techkit-core' )) );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			$html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

		echo wp_kses_post( $html );
		?>
		<div class="download-list">
			<div class="item">
				<div class="item-icon">
				<i class="flaticon flaticon-pdf-file"></i>
				</div>
				<div class="item-text">
				<h5 class="heading"><?php echo esc_html( $instance['sub_title1'] ); ?></h5>
				<a class="link" download href="<?php echo esc_url( $instance['download_url1'] ); ?>"><?php esc_html_e('DOWNLOAD','techkit-core'); ?></a>
				</div>
			</div>
			<div class="item">
				<div class="item-icon">
				<i class="flaticon flaticon-file"></i>
				</div>
				<div class="item-text">
				<h5 class="heading"><?php echo esc_html( $instance['sub_title2'] ); ?></h5>
				<a class="link" download href="<?php echo esc_url( $instance['download_url2'] ); ?>"><?php esc_html_e('DOWNLOAD','techkit-core'); ?></a>
				</div>
			</div>
		</div>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['sub_title1']   = ( ! empty( $new_instance['sub_title1'] ) ) ? wp_kses_post( $new_instance['sub_title1'] ) : '';
		$instance['sub_title2']   = ( ! empty( $new_instance['sub_title2'] ) ) ? wp_kses_post( $new_instance['sub_title2'] ) : '';
		$instance['download_url1']   = ( ! empty( $new_instance['download_url1'] ) ) ? wp_kses_post( $new_instance['download_url1'] ) : '';
		$instance['download_url2']   = ( ! empty( $new_instance['download_url2'] ) ) ? wp_kses_post( $new_instance['download_url2'] ) : '';

		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       	=> '',
			'sub_title1' 	=> '',
			'sub_title2' 	=> '',
			'download_url1' 	=> '',
			'download_url2' 	=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'techkit-core' ),
				'type'    => 'text',
			),
			'sub_title1'       => array(
				'label'   => esc_html__( 'Sub Title', 'techkit-core' ),
				'type'    => 'text',
			),
			'download_url1'    => array(
				'label'    => esc_html__( 'Download URL', 'techkit-core' ),
				'type'     => 'url',
			),
			'sub_title2'       => array(
				'label'   => esc_html__( 'Sub Title', 'techkit-core' ),
				'type'    => 'text',
			),
			'download_url2'    => array(
				'label'    => esc_html__( 'Download URL', 'techkit-core' ),
				'type'     => 'url',
			),
		);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}