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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'NLuxw+z*.^2AKwzEpr(+2?NF[]Y&vE%h2EC|WM?<.[|<AdWuxtd+J?3E.E[>ZZmW' );
define( 'SECURE_AUTH_KEY',  'A-ioUHQ(@;SsXEAp|O|MT?UeDYxD1t9|l>Jrj&wR;tw<#D$|A&V+T$OyyzQ7])>a' );
define( 'LOGGED_IN_KEY',    'h8`qHq ?IjLVrUt!R0Ki9!Q`RQe5}j$BUQPtJItZ>F.KnN8zcg3J0VW.z.#W:b-{' );
define( 'NONCE_KEY',        'uwVxAwaZC^DYM_x8%phLG]]Pu)X ~!~#V9]&0q]2@Q]Ca:jNzY#!REa5%oQm3mct' );
define( 'AUTH_SALT',        'eKhvxNFUiDGIOR5XlZ<IBY?9w/E}3A|mzYX2?`O50.7|/baqm>@e&}T%&6L,Q:!C' );
define( 'SECURE_AUTH_SALT', 'y2YXOjIE-abVEZBZCc4?>MXNZ6V(&1:eX=ex+:T#-F0v)6K JSoTG08,N @mj#v2' );
define( 'LOGGED_IN_SALT',   'B@<Mb]2:[rD[f`M#raoMFpG|VO7X(FN}JMzHXa^WruKpY9rLl|~Zjl7Xt6ell:pr' );
define( 'NONCE_SALT',       '#r.otN%##)o%7NH_|3&e7,RW+M:2#`IEoz}#m}v8t[v,:2+<DKQsy;Y<c/^=+rG!' );

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
