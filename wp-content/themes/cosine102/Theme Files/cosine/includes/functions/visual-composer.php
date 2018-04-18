<?php
/**
 * @package     WordPress
 * @subpackage  Themes
 * @author      Binh Pham Thanh <binhpham@linethemes.com>
 */
if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'Vc_Manager' ) )
	return;

add_action( 'wp_enqueue_scripts', 'cosine_vc_scripts', 999 );
add_action( 'vc_before_init', 'cosine_map_shortcodes' );

/**
 * Register an action to wrap the image comparison
 * shortcode
 */
add_action( 'wp', 'cosine_image_compare_wrapper' );

if ( ! function_exists( 'cosine_vc_scripts' ) ) {
	/**
	 * Unregister visual composer styles and scripts
	 * 
	 * @return  void
	 */
	function cosine_vc_scripts() {
		wp_deregister_script( 'prettyphoto' );
		wp_deregister_style( 'prettyphoto' );
		wp_deregister_style( 'isotope' );
		wp_deregister_style( 'flexslider' );
		wp_deregister_style( 'waypoints' );
	}
}


if ( ! function_exists( 'cosine_map_shortcodes' ) ) {
	function cosine_map_shortcodes() {
		if ( shortcode_exists( 'sciba' ) ):

			vc_map( array(
				'base'        => 'sciba',
				'name'        => esc_html__( 'Cosine: Image Comparison', 'cosine' ),
				'icon'        => 'linethemes-shortcode',
				'category'    => esc_html__( 'Cosine', 'cosine' ),
				'params'      => array(
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__( 'Image Left', 'cosine' ),
						'param_name' => 'leftsrc'
					),
					array(
						'type'             => 'textfield',
						'heading'          => esc_html__( 'Label For Image Left', 'cosine' ),
						'param_name'       => 'leftlabel',
					),

					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__( 'Image Right', 'cosine' ),
						'param_name' => 'rightsrc'
					),
					array(
						'type'             => 'textfield',
						'heading'          => esc_html__( 'Label For Image Right', 'cosine' ),
						'param_name'       => 'rightlabel',
					),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Mode', 'cosine' ),
						'param_name' => 'mode',
						'value' => array(
							esc_html__( 'Horizontal', 'cosine' ) => 'horizontal',
							esc_html__( 'Vertical', 'cosine' ) => 'vertical'
						),
					)
				)
			) );

		endif;
	}
}


if ( ! function_exists( 'cosine_image_compare_wrapper' ) ) {
	function cosine_image_compare_wrapper( $atts, $content = '' ) {
		global $shortcode_tags;

		if ( isset( $shortcode_tags['sciba'] ) ) {
			$callback = $shortcode_tags['sciba'];
			$shortcode_tags['sciba'] = function( $atts, $content = '' ) use ( $callback ) {
				$atts = shortcode_atts( array(
						'leftsrc'    => '',
						'leftlabel'  => '',
						'rightsrc'   => '',
						'rightlabel' => '',
						'mode'       => 'horizontal'
					), $atts );

				if ( is_numeric( $atts['leftsrc'] ) && $image = wp_get_attachment_image_src( $atts['leftsrc'], 'full' ) ) {
					$atts['leftsrc'] = $image[0];
				}

				if ( is_numeric( $atts['rightsrc'] ) && $image = wp_get_attachment_image_src( $atts['rightsrc'], 'full' ) ) {
					$atts['rightsrc'] = $image[0];
				}

				return call_user_func_array( $callback, array( $atts, $content ) );
			};
		}
	}
}
