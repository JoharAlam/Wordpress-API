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
define( 'DB_NAME', 'WooCommerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'lUBxVToRkYxIxGBUD0bWwJ7J0jIrY8W1VmG7WgsNJ2ykvR4fUnee4tKqFW8FPtAi' );
define( 'SECURE_AUTH_KEY',  'JClDvbo5wR6c2kMe97lxI2mXQNY3WZKJXRIRXPFz0t0AbpKRbtLWSPbmSjGzTP3m' );
define( 'LOGGED_IN_KEY',    'RQ17vEPmeQ8jA1QWApwOBsjt44eqQ3xWgZUYpW8gxI4H86zo1VtnuWq8SNFnMF3M' );
define( 'NONCE_KEY',        'dJp8GiZmn6hbiqNEEX93ESYRApIqmHFWS1Ke2z9UXO8onSoSlanBoWbIQJBvai7d' );
define( 'AUTH_SALT',        'EgviFeRLCDefyicBBkQ1Z4OWs2LBNM8okZZvq5wNoCedsbYBy8zN9Gi1ixMcVmXU' );
define( 'SECURE_AUTH_SALT', '19UjQS2KKRo9hI9iETse4ttjZmfCkrfoW1PK3HwrOIiTIYN7Smt24G4AgtJkiZ2l' );
define( 'LOGGED_IN_SALT',   'MNKgdW0tADFK1Z88zJfg1fMOGuT0JK4OVkjINx3Fgt91oH20pENrOoKMp3IIB29W' );
define( 'NONCE_SALT',       'piSRAK5908YoTaVOexhreF03yVCNT3wCQeL6zGAhHqngZBRBeHSt2j2dlqCatqip' );

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
