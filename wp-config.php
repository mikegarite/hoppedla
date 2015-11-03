<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('WP_CACHE', true); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/mnt/stor14-wc1-ord1/946190/www.hoppedla.com/web/content/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'hoppedla');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'ZYer8sjJep');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '428H/PY9LS9d3]&+9ct;JdBmyGxbw1;}30FUQ14|Tzdjx/5H3zzNN@0_f5[M6?J9');
define('SECURE_AUTH_KEY',  ',>qF?;FIrS3ZJ84N5E]Td9Dt$y^)nnQca*S|0{H|O7Y{^4J-6ICje^N.bq!zOoMY');
define('LOGGED_IN_KEY',    '32Y$]3#NbzJ?0/06z9qO<%F]2dyRC-eG+#h=^;x,r*^s9Nz6XZVJB|IEc&"PZ8"K');
define('NONCE_KEY',        '-cuY42NwHqYd%[kzV^)[%qA,5uF5CzclLH)P7u_OVI2yE=8]ZP"C^vs-Z8N04ZmP');
define('AUTH_SALT',        '533cy>1;vqr!a{9!L4ap{D7W8UXci)3o+6AkS|c<pEXAAu8=[j9/XhO6#9(:.Ih%');
define('SECURE_AUTH_SALT', ',>qF?;FIrS3ZJ84N5E]Td9Dt$y^)nnQca*S|0{H|O7Y{^4J-6ICje^N.bq!zOoMY');
define('LOGGED_IN_SALT',   'jN/-&W"lE;7KZw[a?MWp9&RH2Zbur<xLAptf_nAogH9^$5?3fL,+pGt?4FiwrQ(3');
define('NONCE_SALT',       '^9*Zxg+OXUszng|C3,o,wR^B[{9mMO>pY5<:_!HGt!&Q,&.R6fG|8kB3g7>4V#/h');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_CONTENT_URL', '/wp-content');
define('DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST']);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
