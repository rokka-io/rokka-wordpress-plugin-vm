<?php
// ===================================================
// Load environment specific configuration
// ===================================================

if ( file_exists( dirname( __FILE__ ) . '/wp-dev-config.php' ) ) {
	// Dev
	include( dirname( __FILE__ ) . '/wp-dev-config.php' );
} elseif ( file_exists( dirname( __FILE__ ) . '/wp-stage-config.php' ) ) {
	// Stage
	include( dirname( __FILE__ ) . '/wp-stage-config.php' );
} else {
	// Live
	include( dirname( __FILE__ ) . '/wp-live-config.php' );
}


// ===================================================
// Define path & url for Content
// ===================================================

define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', WP_HOME .'/content' );


// ===================================================
// Define path & url for Uploads and Plugins
// ===================================================

define( 'WP_PLUGIN_DIR', dirname( __FILE__ ) . '/content/plugins' );
define( 'WP_PLUGIN_URL', WP_HOME . '/content/plugins' );


// ===================================================
// Set path to MU Plugins
// ===================================================

define( 'WPMU_PLUGIN_DIR', dirname( __FILE__ ) . '/content/mu-plugins' );
define( 'WPMU_PLUGIN_URL', WP_HOME . '/content/mu-plugins' );


// ===================================================
// Table prefix
// ===================================================

$table_prefix = 'rokkavm_';


// ===================================================
// Give mama some more memory
// ===================================================

define( 'WP_MEMORY_LIMIT', '512M' );


// ===================================================
// Activate compression
// ===================================================

define( 'COMPRESS_CSS', true );
define( 'COMPRESS_SCRIPTS', true );
define( 'ENFORCE_GZIP', true );


// ===================================================
// Some admin tweeks
// ===================================================

define( 'WP_POST_REVISIONS', 30 );
define( 'AUTOSAVE_INTERVAL', 86400 );

define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define( 'WP_ALLOW_REPAIR', true );
define( 'DISALLOW_FILE_EDIT', true );

define( 'AUTOMATIC_UPDATER_DISABLED', true );


// ===================================================
// Authentication Unique Keys and Salts.
// ===================================================

define('AUTH_KEY', '*w]byDnVn{6%* &]/Z/:SrlX=l3f =jT|yv|CHqTnQw|%wAdY0M&#tY5HgLFJN,)'); define('SECURE_AUTH_KEY', '$>TzU2X8ZO,|>luwGXh$hveE KAhvq{{Yia)Zw.YI}d;&_P8,rNe:Fm.+xa>tx5m'); define('LOGGED_IN_KEY', '$]:J8V+t]J]jFOfV]nglV&H~j<jCEL9L%OQ(*%XbMTl(X,|XTzF^6sjiF-)T+kO|'); define('NONCE_KEY', '?58Z^r~Zw-+H($,:Mp<!vO;.z_O||Ez3p&uP]16Rl-v$nboi&H,Ql8h#:12`])Fo'); define('AUTH_SALT', 'TDmMrp2Iy3lmlix~.9MsR>l=|+`-%c/mK<d)<I,)w+Q=7-J2vS.:^]&|h6AR1:1K'); define('SECURE_AUTH_SALT', 'o[8?oq_0/ =3+{IN_]8x-?DUte3-M;5jK!z6)MX-+hi.LSLMF^rX|-RUC;d/1HpA'); define('LOGGED_IN_SALT', '+}5T!OuLEIou|.*2G=[9:Ra{-O,=l@6JAg5JR3oWGil;6_!szpeeSQ2sK=ii53h+'); define('NONCE_SALT', '_|[Xlw3+6V]h-*s=c%=@W|c]RpIbzKMqb6S4Ab`B)h0fH~{s_lac67r*O-`!`=o5');

// ===================================================
// DO NOT EDIT FORM HERE ! ! !
// ===================================================

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
