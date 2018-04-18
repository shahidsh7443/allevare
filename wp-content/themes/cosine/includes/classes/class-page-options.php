<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

/**
 * @package  Cosine
 * @author   Binh Pham Thanh <binhpham@linethemes.com>
 */
class Cosine_PageOptions extends Cosine_Base
{
	protected function __construct() {
		add_action( 'admin_init', array( $this, 'register' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	public function admin_enqueue_scripts( $hook ) {
		if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) && current_post_type_is( 'page' ) ) {
			wp_enqueue_script( 'theme-page-options' );
		}
	}

	/**
	 * Register page options controls
	 * 
	 * @return  void
	 */
	public function register() {
		global $wp_registered_sidebars;

		$patterns = predefined_background_patterns();
		$options  = array();
		$sidebars = array();

		// Retrieve all registered sidebars
		foreach( $wp_registered_sidebars as $params )
			$sidebars[$params['id']] = $params['name'];

		/**
		 * General
		 */
		$options['layout_heading'] = array(
			'type' => 'heading',
			'section' => 'all',
			'title' => esc_html__( 'Sidebar Position', 'cosine' ),
			'description' => esc_html__( 'Select the position of sidebar that you wish to display.', 'cosine' )
		);

		$options['sidebar_layout'] = array(
			'type' => 'dropdown',
			'section' => 'all',
			'default' => 'default',
			'choices' => array(
				'default' => esc_html__( 'Default Option', 'cosine' ),
				'no-sidebar'   => esc_html__( 'No Sidebar', 'cosine' ),
				'sidebar-left'  => esc_html__( 'Left Sidebar', 'cosine' ),
				'sidebar-right'  => esc_html__( 'Right Sidebar', 'cosine' ),
			)
		);

		$options['sidebar_default'] = array(
			'type'    => 'dropdown-sidebars',
			'label'   => esc_html__( 'Custom Sidebar', 'cosine' ),
			'section' => 'all',
			'default' => op_option( 'sidebar_default' )
		);
		
		/**
		 * Page Title
		 */
		$options['pagetitle_heading'] = array(
			'type'        => 'heading',
			'section'     => 'all',
			'title'       => esc_html__( 'Page Title', 'cosine' ),
			'description' => esc_html__( 'In this section you can turn on/off or modify style for the Page Title.', 'cosine' )
		);

		$options['enable_custom_page_header'] = array(
			'type'    => 'switcher',
			'label'   => esc_html__( 'Enable Custom Page Title', 'cosine' ),
			'section' => 'all',
			'default' => false
		);

		$options['pagetitle_enabled'] = array(
			'type'    => 'switcher',
			'label'   => esc_html__( 'Display Title Bar On This Page', 'cosine' ),
			'section' => 'all',
			'default' => op_option( 'pagetitle_enabled' )
		);

		$options['pagetitle_background'] = array(
			'type'     => 'background',
			'label'    => esc_html__( 'Page Header Background', 'cosine' ),
			'section'  => 'all',
			'patterns' => $patterns,
			'default'  => op_option( 'pagetitle_background' )
		);

		/**
		 * Breadcrumbs
		 */
		$options['breadcrumb_heading'] = array(
			'type'        => 'heading',
			'section'     => 'all',
			'title'       => esc_html__( 'Breadcrumbs', 'cosine' ),
			'description' => esc_html__( 'In this section you can turn on/off or modify style for the Breadcrumbs.', 'cosine' )
		);

		$options['breadcrumb_enabled'] = array(
			'type' => 'dropdown',
			'section' => 'all',
			'default' => 'default',
			'choices' => array(
				'default' => esc_html__( 'Default Option', 'cosine' ),
				'enable'   => esc_html__( 'Enabled', 'cosine' ),
				'disable'  => esc_html__( 'Disabled', 'cosine' ),
			)
		);

		/**
		 * Header
		 */
		$options['topbar_heading'] = array(
			'type' => 'heading',
			'section' => 'all',
			'title' => esc_html__( 'Top Bar', 'cosine' ),
			'description' => esc_html__( 'Turn on/off the top bar and change it styles.', 'cosine' )
		);

		$options['topbar_enabled'] = array(
			'type' => 'dropdown',
			'section' => 'all',
			'default' => 'default',
			'choices' => array(
				'default' => esc_html__( 'Default Option', 'cosine' ),
				'enable'   => esc_html__( 'Enabled', 'cosine' ),
				'disable'  => esc_html__( 'Disabled', 'cosine' ),
			)
		);

		$options['navigator_heading'] = array(
			'type'        => 'heading',
			'section'     => 'all',
			'title'       => esc_html__( 'Navigator', 'cosine' ),
			'description' => esc_html__( 'Just select your menu that you wish assign it to the location on the theme.', 'cosine' )
		);

		// Navigator
		$menus     = wp_get_nav_menus();
		$locations = get_registered_nav_menus();

		if ( $menus ) {
			$choices = array( 'default' => esc_html__( 'Default Option', 'cosine' ) );
			foreach ( $menus as $menu ) {
				$choices[ $menu->term_id ] = wp_html_excerpt( $menu->name, 40, '&hellip;' );
			}

			$asigned_locations = op_option( 'nav_menu_locations' );

			foreach ( $locations as $location => $description ) {
				$menu_setting_id = "nav_menu_locations[{$location}]";

				$options["menu_location_{$location}"] = array(
					'label'   => $description,
					'section' => 'all',
					'type'    => 'dropdown',
					'choices' => $choices,
					'default' => 'default'
				);
			}
		}

		$options['onepage_nav_script'] = array(
			'type'    => 'switcher',
			'label'   => esc_html__( 'Load One Page Navigator Script', 'cosine' ),
			'section' => 'all',
			'default' => false
		);

		new \OptionsPlus\Metabox\Properties( 'page-options', array(
			'label'       => esc_html__( 'Page Options', 'cosine' ),
			'post_types'  => 'page',
			'context'     => 'normal',
			'priority'    => 'high',
			'storage_key' => '_page_options',
			'show_tabs'   => false,
			'sections'    => array(
				'all'     => array( 'title' => esc_html__( 'General', 'cosine' ) )
			),
			'options'     => $options
		) );
	}
}
