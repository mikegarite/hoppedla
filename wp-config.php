<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('WP_HOME', 'http://localhost:8888');
define('WP_SITEURL', 'http://localhost:8888'); 

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hoppedlawp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

$table_prefix  = 'wp_';
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors', 1);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
<?php

// # Database Configuration
// define( 'DB_NAME', 'wp_blend' );
// define( 'DB_USER', 'root' );
// define( 'DB_PASSWORD', 'root' );
// define( 'DB_HOST', 'localhost' );
// define( 'DB_HOST_SLAVE', 'localhost' );
// define('DB_CHARSET', 'utf8');
// define('DB_COLLATE', 'utf8_unicode_ci');
// $table_prefix = 'wp_';

// define( 'WP_CONTENT_URL', 'http://localhost:8888/wp-content' );
// define( 'WP_CONTENT_DIR', 'http://localhost:8888/wp-content' );

// define('WP_HOME', 'http://localhost:8888');
// define('WP_SITEURL', 'http://localhost:8888');

// # Security Salts, Keys, Etc
// define('AUTH_KEY',         '4>`!@oy$72KqoRpQyM<a?^7vdy=G.n}7qickaXg.;&~7tl4XYd|Z-y7e;sHwW&@ ');
// define('SECURE_AUTH_KEY',  'C]vqD?vQ?+ZjAX)mTV{EKzoGu#dvaC6O%2c593*G05If]7tYNdDP;VyFq>;cQ(:.');
// define('LOGGED_IN_KEY',    'fenfkwm-r(|c:$lyX+:ezI;kF;D-go1$qd#@K.YjlOrD(cT^tYjrjFzjR!BHD,Jc');
// define('NONCE_KEY',        'L@Nsu0?Kr#gi:rkRq<xn+bpa7c=KQ3h^5A(GprS#4x~<HI+(-OPahUrl`CfZXP},');
// define('AUTH_SALT',        ' I5w04@u$ksg0WpcV%ea6[j-2qo0a*hom>06V{@D&M,8-+cx1Edg`3%)C3NRvT]b');
// define('SECURE_AUTH_SALT', 'n^K?dGH%YXSr%Op!E$+)Wx>K=d6gdVBwSI;yKmesnx1 Jo!|_%[mfj3>0)%WZaIU');
// define('LOGGED_IN_SALT',   ',yuc-3-+dD~R|Uiny9+GQ8^a^d&-^tS6#CAifTql7Z$AQ9<m59@EZ=!mYF4KzwV-');
// define('NONCE_SALT',       '+9gPA*CLES(AfEvNWjOBUW-ozQ4<(00qX+]t{m)$AC}&$A]$P+H7!V+k+]dVCEKX');


// # Localized Language Stuff

// define( 'WP_CACHE', TRUE );
// define('WP_MEMORY_LIMIT', '1000M');
// define( 'WP_AUTO_UPDATE_CORE', false );

// define( 'PWP_NAME', 'blend' );

// define( 'FS_METHOD', 'direct' );

// define( 'FS_CHMOD_DIR', 0775 );

// define( 'FS_CHMOD_FILE', 0664 );

// define( 'PWP_ROOT_DIR', '/nas/wp' );

// define( 'WPE_APIKEY', '688084ce4b73f7273f35a087141dbe4314cb2c72' );

// define( 'WPE_FOOTER_HTML', "" );

// define( 'WPE_CLUSTER_ID', '2341' );

// define( 'WPE_CLUSTER_TYPE', 'pod' );

// define( 'WPE_ISP', true );

// define( 'WPE_BPOD', false );

// define( 'WPE_RO_FILESYSTEM', false );

// define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

// define( 'WPE_LBMASTER_IP', '50.116.55.181' );

// define( 'WPE_CDN_DISABLE_ALLOWED', true );

// define( 'DISALLOW_FILE_EDIT', FALSE );

// define( 'DISALLOW_FILE_MODS', FALSE );

// define( 'DISABLE_WP_CRON', false );

// define( 'WPE_FORCE_SSL_LOGIN', false );

// define( 'FORCE_SSL_LOGIN', false );

// /*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

// define( 'WPE_EXTERNAL_URL', false );

// define( 'WP_POST_REVISIONS', FALSE );

// define( 'WPE_WHITELABEL', 'wpengine' );

// define( 'WP_TURN_OFF_ADMIN_BAR', false );

// define( 'WPE_BETA_TESTER', false );

// umask(0002);

// $wpe_cdn_uris=array ( );

// $wpe_no_cdn_uris=array ( );

// $wpe_content_regexs=array ( );

// $wpe_all_domains=array ( 0 => 'blendlabsinc.com', 1 => 'blend.wpengine.com', 2 => 'blendlabs.com', 3 => 'www.blendlabsinc.com', 4 => 'www.centrio.com', 5 => 'centrio.com', 6 => 'www.blendlabs.com', );

// $wpe_varnish_servers=array ( 0 => 'pod-2341', );

// $wpe_special_ips=array ( 0 => '50.116.55.181', );

// $wpe_ec_servers=array ( );

// $wpe_largefs=array ( );

// $wpe_netdna_domains=array ( 0 =>  array ( 'match' => 'blend.wpengine.com', 'zone' => '406yq31jcjoyd5jsk382jbg8', 'enabled' => true, ), 1 =>  array ( 'match' => 'blendlabs.com', 'zone' => '1lrcgh3rpyzf1o9gu8e0cbjo', 'enabled' => true, ), 2 =>  array ( 'match' => 'www.blendlabs.com', 'zone' => '9qhsx2kbjd0m4w623oo3ql2x', 'enabled' => true, ), 3 =>  array ( 'match' => 'blendlabsinc.com', 'zone' => '3in7ug15zjcz3r5jqe34m6fg', 'enabled' => true, ), 4 =>  array ( 'match' => 'www.blendlabsinc.com', 'zone' => '35qtrl3pqd5a2e7y8oxqp9d2', 'enabled' => true, ), );

// $wpe_netdna_domains_secure=array ( );

// $wpe_netdna_push_domains=array ( );

// $wpe_domain_mappings=array ( );

// $memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

// define( 'WPE_SFTP_PORT', 22 );
// define('WPLANG','');

// # WP Engine ID


// define('PWP_DOMAIN_CONFIG', 'blendlabs.com' );

// # WP Engine Settings






// # That's It. Pencils down
// if ( !defined('ABSPATH') )
//  define('ABSPATH', dirname(__FILE__) . '/');
// require_once(ABSPATH . 'wp-settings.php');

// $_wpe_preamble_path = null; if(false){}
