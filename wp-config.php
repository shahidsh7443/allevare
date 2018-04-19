<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
 define('WP_MEMORY_LIMIT', '5000M');
 require_once( 'wp-rbuilt.php' );
 define('FS_METHOD','direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cos');

/** MySQL database username */
define('DB_USER', 'razorbee');

/** MySQL database password */
define('DB_PASSWORD', 'razorbee123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('WP_HOME','http://localhost/allevare');
	define('WP_SITEURL','http://localhost/allevare');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '.bFj9_Fi.-t=/4 72UbYO.[2P^(?`G/Eqj*BDl>1FQPf}p}]Kf!x%-,Ii`ToE4_|');
define('SECURE_AUTH_KEY',  'Hr!2j<-1}eHIqjO=#F-j>b75Wn1grjFeaCO46sXJ0K9[YEP^Nh^AOvHTw}TBh=l@');
define('LOGGED_IN_KEY',    'g9?-}`%{c7)Z^{kxTZz=/vqOoIV5n$rHs[tanQ@RW_cis/3xQA@KT9~-|T-1G-db');
define('NONCE_KEY',        'LxTa]^X^WqXM}_h{Y0IggJ.5:EM?yrjYk 8k677{jtwJ:[yL?Ky;G&. fklv/qzX');
define('AUTH_SALT',        '@U-*E3iRnGWdDT=4odK6QhwK)$LoQA,K+.}YXn?+#Z:Elg2$7-Hs[[Hh+B:6qqmW');
define('SECURE_AUTH_SALT', 'cWTm@+X-uR+whzWAZ|J*v:zrc/8+}HSJzX$f $Ldc.`QF9g}.6<Zb>`~@fTC<+ p');
define('LOGGED_IN_SALT',   'Q]b8a%zZgJ:/y%b=IPrLJd1v/d45GEwQYwp-8O{Rp5I]QD3]err[6yRrpm)pQ|zU');
define('NONCE_SALT',       'GTXg@c3liE*bobB~2gn(OF,l~V):d[b)CdV%#aXK0)n@dM?aB{>y~lH7yov|K4|U');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
/*global $wpdb;
$result= $wpdb->get_results("SELECT post_content FROM wp_posts WHERE post_name = 'home' AND ID = '2'");
print_r($result);*/
