<?php

// ===================================================
// DB config
// ===================================================

define( 'DB_NAME', 'rokkavm' );
define( 'DB_USER', 'rokkavm' );
define( 'DB_PASSWORD', '123' );
define( 'DB_HOST', 'localhost' );


// ===================================================
// Various Dev Settings
// ===================================================

define( 'WP_LOCAL_DEV', true );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'SCRIPT_DEBUG', true );
define( 'SAVEQUERIES', true );
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

define( 'WP_HOME', 'http://rokka-wordpress-plugin-vm.dev' );
define( 'WP_SITEURL', 'http://rokka-wordpress-plugin-vm.dev/cms' );
