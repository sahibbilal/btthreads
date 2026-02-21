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
define( 'DB_NAME', 'btthreadscom_wp156' );

/** Database username */
define( 'DB_USER', 'btthreadscom_wp156' );

/** Database password */
define( 'DB_PASSWORD', 'S55pMy!-7S.D-r1(' );

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
define( 'AUTH_KEY',         'vozukwdcvkjpyd5ottmjyiaks3nhwdddcbsd3voy34mhymo13o6vlbqje6zbjstx' );
define( 'SECURE_AUTH_KEY',  'xizf9ohjdrv4g6cplfc4rflcmsxkqtpo0rhyofh8qcrifrb7hcm4fq1b2kxwf8uc' );
define( 'LOGGED_IN_KEY',    'nu9oelwa5irusw9vdg192jgndufqwltr03gs1hleematai5cbwahcs9qaak7aso1' );
define( 'NONCE_KEY',        'aapv6knuwg4zjkprhfakfr1yfgeebrs5y9kumf8jqrnuqnw93h5no2wygszlqydu' );
define( 'AUTH_SALT',        '1nlym0htne6qktytbmsxsr55c9rfzzb7tfn0hx0sw6lrxk8jyivwnqkx70yfh7hc' );
define( 'SECURE_AUTH_SALT', 'udiag4dpjfa1uy60l116so6v6faxmdjsxvljt9tq4m5f6ujd78gqusky8ol2hkxj' );
define( 'LOGGED_IN_SALT',   '1suxoc5znk04bjgyf52ecs6q4m609hwzlwhfzjyj8mwevrwb0yj3vpxzntb4dzg0' );
define( 'NONCE_SALT',       '93k7xhfratjuyjmmuhnymu8gfui84nfxmvtu1n1cpn6hmolmuth4mpmdxuldreyq' );

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
$table_prefix = 'wphj_';

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
