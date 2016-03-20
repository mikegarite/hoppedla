<?php
# Database Configuration
define( 'DB_NAME', 'wp_hoppedla' );
define( 'DB_USER', 'hoppedla' );
define( 'DB_PASSWORD', 'nIfBJVVicFq5mjodaP3M' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'V&FAS[4Y6|(f6CRQ[]p3BUh1`}&:;(*O3Y=~[W:DnHxIY?[2?23U/|#yeT%A3j+O');
define('SECURE_AUTH_KEY',  '.yu&!($vH+0k)q.-hwaIPL|*nPuRS,H4Tkn^#jiw^zNe|e~EA0)bGHV=MRm:N]|3');
define('LOGGED_IN_KEY',    '>SFL2q=r)JZ@IoLC?LIYI|`N&D+n>uWKsKj0JNiH%ioY=L:Ar_#)XEI<pkPlMzrD');
define('NONCE_KEY',        'J3j8O(3Bsrnk5@s/{^ ##hl:*Q#?!D-g`7P+t`~:ezROd-Vt1vI+Gq_6zl@X,[*c');
define('AUTH_SALT',        '6j)jAHuh;D4N?*;x{^7H:)eQ1M(;3)WRv7?N(Z:uq@a1v4l,q}A*6|w8%tr)Lq$r');
define('SECURE_AUTH_SALT', 'Uj}~AJLFp,6%@01@[yC*p,F@=icT{<NkEfRt9UGR@9:h1Uc~br,su;^Wm4%v>.n1');
define('LOGGED_IN_SALT',   'Grt!:v^t.p=0?hGT(DJ[.4(M5t*{4V(qf!sdBfU8$|T!LRkiTUAv<=J<Y,%joMD3');
define('NONCE_SALT',       '?4BJ9Y5S9cT?QQe]DZF4p7?qPOiII;qF1(/Uyhq4jsT>^]me*_U]g!yM}1L/iR`i');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'hoppedla' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '185de0d13a7fb670ffb531036507da88008a65d5' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '33765' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '162.242.247.25' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'hoppedla.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-33765', );

$wpe_special_ips=array ( 0 => '162.242.247.25', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID



# WP Engine Settings





# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
