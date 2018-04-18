<?php
/**
 * WARNING: This file is part of the theme. DO NOT edit
 * this file under any circumstances.
 */

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

if ( ! get_next_post_link() && ! get_previous_post_link() ) return;

// $next_post_thumb = sprintf( '<span class="post-thumbnail">%s</span>', get_the_post_thumbnail( get_next_post(), 'thumbnail' ) );
// $prev_post_thumb = sprintf( '<span class="post-thumbnail">%s</span>', get_the_post_thumbnail( get_previous_post(), 'thumbnail' ) );
// 
$next_post_thumb = '';
$prev_post_thumb = '';
?>

<nav class="navigation post-navigation" role="navigation">
	<ul class="nav-links">
		<?php
		if ( is_attachment() ) :
			previous_post_link( '<li>%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Published In', 'cosine' ) ) );
		else :
			previous_post_link( '<li class="previous-post">%link</li>', sprintf( '<span class="meta-nav">%s</span>%s %%title', esc_html__( 'Previous Post', 'cosine' ), $prev_post_thumb ) );
			next_post_link( '<li class="next-post">%link</li>', sprintf( '<span class="meta-nav">%s</span>%s %%title', esc_html__( 'Next Post', 'cosine' ), $next_post_thumb ) );
		endif;
		?>
	</ul><!-- .nav-links -->
</nav><!-- .navigation -->
