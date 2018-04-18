<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

// Migrate theme options after switched theme
add_action( 'after_switch_theme', 'cosine_migrate_theme_options' );

// Override theme options for specific page
add_filter( 'op/prepare_options', 'cosine_override_theme_options' );

/**
 * Callback function to migrate theme options
 * 
 * @return  void
 */
function cosine_migrate_theme_options() {
	$default_options = cosine_customize_default_options();
	$options = get_theme_mods();
	
	foreach ( $default_options as $id => $value ) {
		if ( ! isset( $options[$id] ) )
			set_theme_mod( $id, $value );
	}
}



/**
 * Return an array that declare the default options
 * for the theme
 * 
 * @return  array
 */
function cosine_customize_default_options() {
	return array(
		'data_version' => '1.0',
		'gotop_enabed' => true,
		'social_links' => array(
			'twitter' => 'https://twitter.com/linethemes',
			'facebook' => 'https://facebook.com/thelinethemes',
			'google-plus' => '#',
			'__icons_ordering__' => array(
				0 => 'twitter',
				1 => 'facebook',
				2 => 'google-plus',
				3 => 'pinterest',
				4 => 'instagram',
				5 => 'youtube',
				6 => 'vimeo',
				7 => 'linkedin',
				8 => 'behance',
				9 => 'bitcoin',
				10 => 'bitbucket',
				11 => 'codepen',
				12 => 'delicious',
				13 => 'deviantart',
				14 => 'digg',
				15 => 'dribbble',
				16 => 'flickr',
				17 => 'foursquare',
				18 => 'github',
				19 => 'jsfiddle',
				20 => 'reddit',
				21 => 'skype',
				22 => 'slack',
				23 => 'soundcloud',
				24 => 'spotify',
				25 => 'stack-exchange',
				26 => 'stack-overflow',
				27 => 'steam',
				28 => 'stumbleupon',
				29 => 'tumblr',
				30 => 'rss',
				),
			),
		'body_font' => array(
			'family' => 'Hind+Siliguri',
			'size' => '15',
			'style' => 'regular',
			'color' => '#2f4862',
			),
		'heading_font' => array(
			'family' => 'Hind+Vadodara',
			'style' => '700',
			),
		'heading_fontsize' => array(
			0 => 48,
			1 => 36,
			2 => 30,
			3 => 24,
			4 => 18,
			5 => 14,
			),
		'menu_font' => array(
			'family' => 'Hind+Vadodara',
			'size' => '14',
			'style' => '700',
			'color' => '#174c81',
			),
		'cyrillic_subsets_enabled' => false,
		'cyrillic_ext_subsets_enabled' => false,
		'greek_subsets_enabled' => false,
		'greek_ext_subsets_enabled' => false,
		'vietnamese_subsets_enabled' => false,
		'latin_ext_subsets_enabled' => false,
		'devanagari_subsets_enabled' => false,
		'scheme_color' => '#15416e',
		'layout_mode' => 'layout-wide',
		'boxed_background' => array(
			'type' => 'none',
			'pattern' => 'none',
			'color' => '#fff',
			'image' => '',
			'repeat' => 'repeat',
			'position' => 'top-left',
			'style' => 'scroll',
			),
		'sidebar_layout' => 'no-sidebar',
		'sidebar_default' => 'sidebar-primary',
		'pagetitle_enabled' => false,
		'pagetitle_background' => array(
			'color' => '#d8e7ef',
			'type' => 'custom',
			'pattern' => 'none',
			'image' => '',
			'repeat' => 'no-repeat',
			'position' => 'top-left',
			'style' => 'scroll',
			),
		'pagetitle_textcolor' => '#fff',
		'breadcrumb_prefix' => 'You are here:',
		'breadcrumb_separator' => '→',
		'logo_image' => true,
		'show_tagline' => false,
		'logo_src' => '',
		'logo_margin' => array(
			0 => 0,
			1 => 0,
			),
		'header_sticky' => true,
		'header_searchbox' => true,
		'topbar_enabled' => true,
		'topbar_content' => '',
		'topbar_social_links_enabled' => true,
		'footer_widgets_enabled' => true,
		'footer_widgets_layout' => array(
			'active' => '2',
			'layout' => array(
				0 => array(
					0 => '12',
					),
				1 => array(
					0 => '6',
					1 => '6',
					),
				2 => array(
					0 => '4',
					1 => '4',
					2 => '4',
					),
				3 => array(
					0 => '6',
					1 => '2',
					2 => '2',
					3 => '2',
					),
				),
			),
		'footer_widgets_background' => array(
			'color' => '',
			'type' => 'none',
			'pattern' => 'none',
			'image' => '',
			'repeat' => 'repeat-x',
			'position' => 'center-center',
			'style' => 'scroll',
			),
		'footer_widgets_textcolor' => '',
		'footer_social_links_enabled' => true,
		'footer_copyright' => 'Copyright © 2016 Cosine.  ',
		'blog_archive_sidebar_layout' => 'sidebar-right',
		'blog_archive_sidebar' => 'sidebar-primary',
		'blog_archive_post_excepts' => true,
		'blog_archive_post_excepts_length' => '390',
		'blog_archive_show_post_meta' => true,
		'blog_archive_readmore' => true,
		'blog_archive_readmore_text' => 'Read more',
		'blog_archive_pagination_style' => 'numeric',
		'blog_posts_per_page' => '5',
		'blog_single_sidebar_layout' => 'sidebar-right',
		'blog_single_sidebar' => 'sidebar-primary',
		'blog_post_navigator_enabled' => true,
		'blog_author_box_enabled' => false,
		'blog_related_box_enabled' => false,
		'blog_related_posts_style' => 'grid',
		'blog_related_posts_count' => 3,
		'blog_related_posts_columns' => 3,
		'under_construction_enabled' => false,
		'under_construction_page_id' => 0,
		'under_construction_allowed' => array(
			0 => 'administrator',
			),
		'content_width' => '1110px',
		'pagetitle_parallax' => true,
		'members_archive_sidebar_layout' => 'no-sidebar',
		'members_archive_sidebar' => 0,
		'members_single_sidebar' => 'sidebar-0',
		'members_posts_per_page' => 10,
		'members_single_sidebar_layout' => 'sidebar-right',
		'nav_menu_locations' => array(
			'primary' => 6,
			'top' => 7,
			),
		'woocommerce_single_sidebar_layout' => 'no-sidebar',
		'woocommerce_single_sidebar' => 'sidebar-571dd3f76e6f9',
		'woocommerce_products_per_page' => '8',
		'woocommerce_related_products_count' => '4',
		'woocommerce_archive_sidebar_layout' => 'no-sidebar',
		'woocommerce_archive_sidebar' => 'sidebar-primary',
		'woocommerce_related_box_enabled' => true,
		'projects_permalink_base' => 'gallery',
		'projects_category_permalink_base' => 'gallery-category',
		'projects_tag_permalink_base' => 'gallery-tag',
		'projects_grid_columns' => 4,
		'projects_archive_sidebar_layout' => 'no-sidebar',
		'projects_single_content_position' => 'fullwidth',
		'projects_single_content_sticky' => false,
		'projects_related_type' => 'recent',
		'projects_related_columns_count' => 5,
		'projects_related_posts_count' => 10,
		'projects_single_sidebar_layout' => 'no-sidebar',
		'projects_single_sidebar' => 'sidebar-primary',
		'projects_single_gallery_type' => 'grid',
		'projects_posts_per_page' => 40,
		'projects_archive_layout' => 'grid',
		'projects_related_title' => 'Related Projects',
		'projects_single_gallery_columns' => '3',
		'header_cart_menu' => false,
		'header_style' => 'header-v1',
		'scheme2_color' => '#18ba60',
		'scheme3_color' => '',
		'logo_size' => array(
			0 => 0,
			1 => 0,
			),
		'logo_retina_src' => '',
		'content_bottom_widgets_layout' => array(
			'active' => '1',
			'layout' => array(
				0 => array(
					0 => '12',
					),
				1 => array(
					0 => '10',
					1 => '2',
					),
				2 => array(
					0 => '4',
					1 => '4',
					2 => '4',
					),
				3 => array(
					0 => '3',
					1 => '3',
					2 => '3',
					3 => '3',
					),
				),
			),
		'content_bottom_widgets_enabled' => true,
		'custom_css' => 'body.header-v4 #masthead #site-navigator {
			-webkit-backface-visibility: hidden !important;
			-moz-backface-visibility:    hidden !important;
			-ms-backface-visibility:     hidden !important;
			backface-visibility: hidden !important;
		}',
		'custom_js' => '',
		'projects_related_box_enabled' => false,
		);
}



/**
 * This action will be used to override global theme
 * options as a specific options from page
 * 
 * @param   array  $options  Global options
 * @return  array
 */
function cosine_override_theme_options( $options ) {
	global $post;

	if ( is_admin() ) return $options;

	// Blog options
	if ( is_search() || ( current_post_type_is( 'post' ) && ( is_home() || is_archive() || is_single() ) ) ) {
		if ( is_single() ) {
			$options['sidebar_layout'] = $options['blog_single_sidebar_layout'];
			$options['sidebar_default'] = $options['blog_single_sidebar'];
		}
		else {
			$options['sidebar_layout'] = $options['blog_archive_sidebar_layout'];
			$options['sidebar_default'] = $options['blog_archive_sidebar'];
		}
	}

	// Page options
	elseif ( is_page() ) {
		$page_options_defaults = array(
			'sidebar_layout'            => 'default',
			'enable_custom_page_header' => false,
			'breadcrumb_enabled'        => 'default',
			'topbar_enabled'            => 'default'
		);
		$page_options = array_merge( $page_options_defaults, (array) get_post_meta( get_the_ID(), '_page_options', true ) );

		// Override layout option
		if ( $page_options['sidebar_layout'] !== 'default' ) {
			$options['sidebar_layout'] = $page_options['sidebar_layout'];
			$options['sidebar_default'] = $page_options['sidebar_default'];
		}

		// Override custom page title option
		if ( isset( $page_options['enable_custom_page_header'] ) && $page_options['enable_custom_page_header'] == true ) {
			$options['pagetitle_enabled'] = $page_options['pagetitle_enabled'];
			$options['pagetitle_background'] = $page_options['pagetitle_background'];
		}

		// Override breadcrumbs options
		if ( $page_options['breadcrumb_enabled'] != 'default' ) {
			$options['breadcrumb_enabled'] = $page_options['breadcrumb_enabled'] == 'enable';
		}

		// Override topbar options
		if ( $page_options['topbar_enabled'] != 'default' ) {
			$options['topbar_enabled'] = $page_options['topbar_enabled'] == 'enable';
		}

		// Override options from custom fields
		foreach ( get_post_custom( get_queried_object_id() ) as $name => $value ) {
			if ( isset( $options[ $name ] ) ) {
				$options[ $name ] = is_array( $value ) ? array_shift( $value ) : $value;;
			}
		}
	}
	
	return $options;
}

