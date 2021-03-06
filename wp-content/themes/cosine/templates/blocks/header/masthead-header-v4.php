<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();
?>
<div id="masthead">
	<div id="site-brand">
		<div class="wrapper">
			<?php get_template_part( 'templates/blocks/header/brand' ) ?>
			<?php get_template_part( 'templates/blocks/header/widgets' ) ?>
		</div>
	</div>
	<nav id="site-navigator" data-placeholder="#site-navigator-placeholder" class="navigator" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		<div class="wrapper">

			<?php
			/**
			 * Call actions before display primary menu
			 */
			do_action( 'theme/before_primary_menu', array( 'env' => 'desktop' ) );

			/**
			 * Display the primary menu
			 */
			wp_nav_menu( array(
				'theme_location'  => 'primary',
				'container'       => false,
				'menu_class'      => 'menu',
				'fallback_cb'     => false,
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0
			) );

			/**
			 * Call actions after display primary menu
			 */
			do_action( 'theme/after_primary_menu', array( 'env' => 'desktop' ) );
			?>
		</div>
	</nav>
	<div id="site-navigator-placeholder"></div>

	<?php get_template_part( 'templates/blocks/header/navigator', 'mobile' ) ?>
</div>
