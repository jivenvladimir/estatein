<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'D+LU1=5Nw!2dbe>OE&?xVABP5@=ajHd7@2N}}J2CT9ulwmdAD>JV&QUV9&%[}PL4' );
define( 'SECURE_AUTH_KEY',   '$82d@FzwIlFF,i[y<1WxEq3,[%VlSja{2e31?pK>1=5->4LONdIcc%([KQyr_vw4' );
define( 'LOGGED_IN_KEY',     'dzFvfsac_k59,I7;f>SW)]Bj^CZEXtmMSoEc3mL~v8z5~5]cg9ePLpelC]l~c!H+' );
define( 'NONCE_KEY',         'Y=iZ~I/mhK?gt@BzH^#W YL:5 As5f4x%Snu?-+VmW^^M4Yn/b4%C{D?8O@(A1ib' );
define( 'AUTH_SALT',         'R`i,^##Zqrt^wiJEyT-rK4|g[r>=_SC6AKk4`#C(ea63K_N&!Y%4&$]]0w0!&Fg6' );
define( 'SECURE_AUTH_SALT',  '^ZM]A?A_$YQor/*$Y]I,uxL&54FNVyqZ=AtSm~Q9K^U(;p=W5M_Y}DdfAFt*%I6q' );
define( 'LOGGED_IN_SALT',    '7S{ &X+m36nr6R|p;B&,xZo(+iW2]Rn9A]htG2VPXrQnaM_)!@;3~Vn}Z{bpC@JA' );
define( 'NONCE_SALT',        '~MyPrp(rV-GF~MoY5zNmt`@Zit:%!3hv?T63_xn_n-b.`l0(*Sr5_qoR(XZ4mm_V' );
define( 'WP_CACHE_KEY_SALT', ':5EhAwuS9HEi{?JqIE~B*2#Yz,8Vkb4GsE&yIpW=$q[aW`chH2aZzSRHOJQ<.}d*' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
