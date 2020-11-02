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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sop_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3b[S`2y=I7<KkRLqO^z`+N<*z$ *m~n#Xow{w0O5g0p# >P8&4CXl$uBM^4NjV+G' );
define( 'SECURE_AUTH_KEY',  'k/MBbZGypGJNIl5zaGbNG/d:$M#iWJ[/uBK.L67aKGP|vN60#n3bLq6XXceyU0>m' );
define( 'LOGGED_IN_KEY',    '5{#0L95b[7q4siq-#B(U`H~|*k9[_A8ut#VPj1.xD-64%mMpL;0F1]R9w$sG T!B' );
define( 'NONCE_KEY',        '+c$mDd>6IZtfMB&,`yhKa{I;WX/;3q;?lH=Dh<l.lN?=)f~xS]hf9U2-l8jf<}Dk' );
define( 'AUTH_SALT',        'V?Ga$iPt>#HQJd[G+O[+;8p=+,E_^syq.fqAm]/[4 %oY+;Y#rWd3Xc/ng7IJXTh' );
define( 'SECURE_AUTH_SALT', '?;80T8QpX~5;hB!)Xa$+zvaBA0FxcV-NaPdp6G2[D@ qS$:;w-Q,6hl*QWu74LI>' );
define( 'LOGGED_IN_SALT',   'SWa7s!1]2<_*|0+2_g(iRC&*3)?!-`V2/BBA^5<3|Kt5+GHCEXv%RC,oy@8y2^aa' );
define( 'NONCE_SALT',       'qkN@&cl~W{z{h>69jFPUz)AqCUq3+-0CsP_*m>:Pqa7rKsp4tyvOMuQP;TcTHheC' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
