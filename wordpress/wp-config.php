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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'barton' );

/** Database password */
define( 'DB_PASSWORD', '6706424' );

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
define('AUTH_KEY',         ']p#D7F|ZB-k:*_|$yQ:.$ZsT0!>b^IWFqtiv>zy,h0+TIz @$-^U&<S_MGU]hKDJ');
define('SECURE_AUTH_KEY',  'XOZ :{zalj}iNZJ^i$]Y@^j(Yq_D.R##KA1hYJGW O6?mPL26gs~++S^yFz|~[;5');
define('LOGGED_IN_KEY',    'ety3U%b~6(R|aFG>.{LBS?XFwNUAQPdh!q ZaR|6xmYUxH:FWmG*aA1l1bVRqs&X');
define('NONCE_KEY',        'JHaS;>=BV=fvQQWTw`Ww,W-#&.+HxM]Pf,3sstWFb!)813|;6{r2SKn+/%Q_zJb`');
define('AUTH_SALT',        'fzY&r;*Puyhu+N9?<t3G4T]4SRmQO1ju{@@%>o:aOwPd6*ErTq6-xfM[&.34|}af');
define('SECURE_AUTH_SALT', ';$lw>7Q@u[2 cVz.Gh+mHufS#B[YvGFOG@zDgj]Xwr[$`Xy:Vcyj~$+;WU[Us;E1');
define('LOGGED_IN_SALT',   '*]hn|3bfJ=6MRz*fKZx!LQRL=@?)iGNMr`85WdxY0_g)AFD!0w]AxT>&g}2y)mGH');
define('NONCE_SALT',       '<=XN]+/.R1AOQauP+}JB|S4#Wx+OJBld`^z+eJsj.lxyjf&c?52ZlpA9~v0+mlL2');
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
