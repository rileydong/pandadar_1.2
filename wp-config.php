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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('REVISR_WORK_TREE', '/var/www/html/wordpress/'); // Added by Revisr
define('REVISR_GIT_PATH', ''); // Added by Revisr
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'oG7NXugkqc');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/*20151116*/
define('WP_MEMORY_LIMIT','960M');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=d5gk]Vlll;F;s0?(vW1ILd4._i#&+`jTiX6ihs<j&z8r9Hlz&wL?u~00K(Hhe07');
define('SECURE_AUTH_KEY',  'I&L[}h.@M)y;0xNv^U/D{QHM@Xp;vdV(&>rz,;d@jm>NWJ)zjczv#RI;L0zyAVBP');
define('LOGGED_IN_KEY',    '~<F=,0;B1CHe1AH[ErL`^UiV4%IwmMGHi&Ghnm=CN0(,&]`}r$(-uZG+a7em,pkF');
define('NONCE_KEY',        '.;#~?#-9urk=YmlEzU]na&Cv~qzbIT@:;7l]HyUD9+;/Ye9&1wpYGo_+e_$pul4.');
define('AUTH_SALT',        '4ay[JH&TDWdk9{[.IMVu4^OH+b*rt1O+50(@sDD)N<N8eq3M`xz4>v.mHl5+E&f7');
define('SECURE_AUTH_SALT', 'y5T>Wl>`F&=NkJZ;h!YfGNetQ$2Z/T+nf`<g:+@#!3:b 06{c.|U,H{0Y?%R=CaT');
define('LOGGED_IN_SALT',   'HS_ ](wL>QqfuCg{V!O1.<{>EuCB+Jfa!{BCe{!Dhk7yG++z@OKmvLdph;<0#}a`');
define('NONCE_SALT',       'S?OA=#Pw5QM!qn;)<S1c@N%quyl)giH`o~/ef@FHAo25`A<4w=@megVv.:-7P4+P');

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
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'FTP_BASE', '/var/www/html/wordpress/' );
define( 'FTP_CONTENT_DIR', '/var/www/html/wordpress/wp-content/' );
define( 'FTP_PLUGIN_DIR ', '/var/www/html/wordpress/wp-content/plugins/' );

define( 'WP_HOME','https://pandadar.com/wordpress');
define( 'WP_SITEURL','https://pandadar.com/wordpress');

