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
<div id="masthead" data-placeholder="#masthead-placeholder">
	<div class="wrapper">
		<div id="site-brand">
			<?php get_template_part( 'templates/blocks/header/brand' ) ?>
		</div>

		<nav id="site-navigator" class="navigator" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
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
		</nav>

		<?php
			if (is_user_logged_in()){
			?>
			<div class="master">
			<div class="logbtn">
			<button type="submit" class="ui" id="uif" name="uin"/><i class="fa fa-user"></i>
			<?php
    $current_user = wp_get_current_user();
    echo 'Hello '.$current_user->user_login;
		?>
	</button>
			</div>
			<div class="applybs">
			<div class="row userdata">
				<div class="col-lg-6"><img src="http://localhost/allevare/wp-content/uploads/2018/04/user.png" title="shahid"></div>
        <div class="col-lg-6">
			<p><?php
    $current_user = wp_get_current_user();
    echo $current_user->user_login;
		?></p>
							<p> My Interest</p>
							<p> My Profile</p>
							<div class="exp">
				<a href="<?php echo wp_logout_url( home_url() ); ?>" class="lout">Logout</a></div>
			</div>
			</div>
		</div>
			<style>
	     .logbtn1
			 {
				 display: none;
			 }
			</style>
	<?php
	}
	else
	{?>
		<style>
     .logbtn
		 {
			 display: none;
		 }
		</style>
	<div class="logbtn1">
		<input type="submit" class="log" id="login" name="lgin" value="Login"/>
		</div>
	<?php }?>
	 </div>
	<?php get_template_part( 'templates/blocks/header/navigator', 'mobile' ) ?>
</div>
<div id="masthead-placeholder"></div>
