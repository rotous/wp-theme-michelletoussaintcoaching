<?php
/**
 * Class zerif_clients_widget
 */
if ( ! class_exists( 'mtc_clients_widget' ) ) {

	class mtc_clients_widget extends zerif_clients_widget {

		/**
		 * zerif_clients_widget constructor.
		 */
		public function __construct() {
			parent::__construct(
				'mtc_clients_widget',
				__( 'MTC - Clients widget', 'michelletoussaintcoaching' ),
				array(
					'description' => __( 'Clients widget', 'michelletoussaintcoaching' ),
					'customize_selective_refresh' => true,
				)
			);
		}

		/**
		 * Display Widget
		 *
		 * @param $args
		 * @param $instance
		 */
		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			?>

			<a href="<?php if ( ! empty( $instance['link'] ) ) :  echo apply_filters( 'widget_title', $instance['link'] );
endif; ?>" target="_blank">
				<?php
				if ( ! empty( $instance['image_uri'] ) && ( $instance['image_uri'] != 'Upload Image' ) ) {

					echo '<img src="' . esc_url( $instance['image_uri'] ) . '" alt="' . __( 'Client', 'zerif-lite' ) . '">';

				} elseif ( ! empty( $instance['custom_media_id'] ) ) {

					$zerif_clients_custom_media_id = wp_get_attachment_image_src( $instance['custom_media_id'] );
					if ( ! empty( $zerif_clients_custom_media_id ) && ! empty( $zerif_clients_custom_media_id[0] ) ) {

						echo '<img src="' . esc_url( $zerif_clients_custom_media_id[0] ) . '" alt="' . __( 'Client', 'zerif-lite' ) . '">';

					}
				}
				?>
			</a>

			<?php

			echo $after_widget;

		}

	}

	function myplugin_register_widgets() {
		register_widget( 'mtc_clients_widget' );
	}

	add_action( 'widgets_init', 'myplugin_register_widgets' );
//	register_widget( 'mtc_clients_widget' );

}// End if().
