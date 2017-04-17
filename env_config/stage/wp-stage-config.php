<?php

// ===================================================
// DB config
// ===================================================

define( 'DB_NAME', 'rokkavm' );
define( 'DB_USER', 'rokkavm' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );


// ===================================================
// Various Dev Settings
// ===================================================

define( 'WP_LOCAL_DEV', false );
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'SCRIPT_DEBUG', false );
define( 'SAVEQUERIES', false );
define( 'FS_METHOD', 'direct' );


// ===================================================
// Cache
// ===================================================

define( 'WP_CACHE', false ); // Enable redis cache by renaming web/content/_object-cache.php to web/content/object-cache.php


// ===================================================
// Object-Cache
// ===================================================

$redis_server = array( 'host' => '127.0.0.1', 'port' => 6379 );


// ===================================================
// Define Siteurl
// ===================================================

define( 'WP_HOME', 'http://rokka-wordpress-plugin-vm.test' );
define( 'WP_SITEURL', 'http://rokka-wordpress-plugin-vm.test/cms' );
