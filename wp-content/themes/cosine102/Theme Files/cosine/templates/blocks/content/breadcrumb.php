<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

if ( op_option( 'breadcrumb_enabled', true ) == true && function_exists( 'breadcrumb_trail' ) ): ?>
<div id="page-breadcrumbs">
	<div class="wrapper">
			
			<?php

				breadcrumb_trail( array(
					'separator'   => op_option( 'breadcrumb_separator', '/' ),
					'show_browse' => true,
					'labels'      => array(
						'browse'         => op_option( 'breadcrumb_prefix', esc_html__( 'You are here:', 'cosine' ) ),
						'home'           => esc_html__( 'Home',                                'cosine' ),
						'error_404'      => esc_html__( '404 Not Found',                       'cosine' ),
						'archives'       => esc_html__( 'Archives',                            'cosine' ),
						'search'         => esc_html__( 'Search results for &#8220;%s&#8221;', 'cosine' ),
						'paged'          => esc_html__( 'Page %s',                             'cosine' ),
						'archive_minute' => esc_html__( 'Minute %s',                           'cosine' ),
						'archive_week'   => esc_html__( 'Week %s',                             'cosine' ),
					)
				) );

			?>
			
	</div>
</div>
<?php endif ?>
