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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/www/wwwroot/www.l0il.com/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'wp' );

/** Database username */
define( 'DB_USER', 'wp' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'h62##9h&>#rBiO:VTi=PQ gI}C7n=zji#%zT8xJSplO4CA4(Ol <./{2U!(0*-:e' );
define( 'SECURE_AUTH_KEY',  'D-@p @=>0MZ9{lA?s,>Z84{gq1Rl?2.-?}R1I$91;tkiA(1s?FjvHC,8`Kjv9IJb' );
define( 'LOGGED_IN_KEY',    'b`d~YLgBS]6,*H:AvLH136S:P)g 1}z1WSt.2gl$.lmN~w*[gW3Td].),F(ogdk3' );
define( 'NONCE_KEY',        'fg>uH<HT:h{&TS{Clpm*UPQxBiYm?RM,e+!2qf$ d]GYFDP?RaVS$>{ox 8R7n*6' );
define( 'AUTH_SALT',        'sG9BJTwo0VL#wF%Q-$M|@eb2)[>}fTDT{p1XBToYpoMO(]+x)CSfk93[UFsF=~9~' );
define( 'SECURE_AUTH_SALT', 'JqY;su u+mAM1T(V9+4T9l}lqtTqF3d}u9G?K muiBm x`m|wb$1o8]iN^_T$#WA' );
define( 'LOGGED_IN_SALT',   'aB^0DHj(<x1hgQYy!D[e`<PJx7qtcWNGj*148Kn-!ta+,Y~7yjLX{$3ZDb=-#998' );
define( 'NONCE_SALT',       'Ov|m*Uozw9@jC_TrdY~]j66h]h(K^M(iS.WoOnMllSth3i+`Yw;OK?lG8mJ1HU{H' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
