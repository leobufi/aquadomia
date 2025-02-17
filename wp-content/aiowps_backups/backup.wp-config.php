<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp202501_aquadomia' );

/** Database username */
define( 'DB_USER', 'adminwp202501_aquadomia' );

/** Database password */
define( 'DB_PASSWORD', 'Skate075%' );

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
define( 'AUTH_KEY',         ']a?4WAVK;H,l(,%q0p|;o]C;ig)_S!:Mw:_`cLr|#:Ex9aaC&mM.;z$4LNn(y*Qm' );
define( 'SECURE_AUTH_KEY',  'lA4@;ZDYSOZUTSbc.>sUP^0)R}pIAOMAb+ab5)EF8y@h?Jfx#5f;qP-*6]_$w.@1' );
define( 'LOGGED_IN_KEY',    '8DfW|-EhdJK25!)5AwuC)VVid<{1C?t1A4P6Cb}s@auf]; kb}ia;TW1,fZFJNf0' );
define( 'NONCE_KEY',        '.1[krguRi=a3l`8IBsNc#+r|MG,K}h+U-A9(FBJpaq:1=?D`1DKr?2T0MKa<Bdt-' );
define( 'AUTH_SALT',        '4K=YzSW~}?7cCA1qC9}^]7Xjd!)MG1ZS`]l}$ztDWY[b>*UX+OU[p/:#@;,d:=E.' );
define( 'SECURE_AUTH_SALT', 'hPw8KYw1mk.MMJYo;JbXJ[q?8vzXT31%hd(@xZ=I{2?/dr:kuCasG2X8%TT2gQnU' );
define( 'LOGGED_IN_SALT',   's?}>z4g+Kb{+@+(%Z I|ndJO%h!gPY~07-i[qD(gf<` ]GVC|btd<fp`;,ZG8E7M' );
define( 'NONCE_SALT',       '&rfaHQjYDM{4kt#c-X9K=.>w@0[+[^r=t#FN7}^3X#;)dw6H_-eeteH*$__>EJ)a' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'aqua25_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
