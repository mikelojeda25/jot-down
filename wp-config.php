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
define( 'AUTH_KEY',          '9IHn[&`?kCPjPtoRUy[RH%LjKhCwa+GO`&W+hjyfv%%^ZU&zzmdhidh84M}>#UVA' );
define( 'SECURE_AUTH_KEY',   'q,ka(])`2<W*QYCM0Mpiy<TWw?/C;Y}Er~J8NLMo1Xo;}{9fpPO&Sma%Wp`:]|qQ' );
define( 'LOGGED_IN_KEY',     'PzUzAr!0S|-3,RB$l(bC%rr8;%^)85<V=n^UF|XD.,!v&cHY!n@k3C:t~Y@pWCzM' );
define( 'NONCE_KEY',         'XngsL_>:+O+3l#Y6Mqo}C;%BzQOZv!St3*ePOur;5.fz?kCx)8JlXgF`oaT4jAaA' );
define( 'AUTH_SALT',         'h^IO5M,8Qj#S`w)TTMvgI8iy@1Zj*/m9la)m]NOiR262Po.Pcd;Y~iuq+--xf;=!' );
define( 'SECURE_AUTH_SALT',  '4wK$]57q>VI]_>Zt/u%c6?jxd67|v:4&B&F(t>IZe,>p<UYEO;5Ucb,Rv^xLi07q' );
define( 'LOGGED_IN_SALT',    'O|Sm{Sqe~0,V{vyID@Xp?PY~Sy!;|h#>5RtPR[1qM[G$2x9~mj7En9$I#>$:PeEJ' );
define( 'NONCE_SALT',        'ne>cfA4!?ILQ^yCfSyr-8aeO~8f_AnJp^i/4xA:LP0M*~yP};zGY:56}vL#6{X8p' );
define( 'WP_CACHE_KEY_SALT', 'Bx8]C@%LQdF&c4_4ZYI:(p^9,?qKw/:Cz.&!UH-/lB1A}/qSAfs[qVkTqZQ^zcSn' );


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
