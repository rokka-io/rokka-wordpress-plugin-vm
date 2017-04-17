<?php
// =======================================================================//
// Frontend & Backend Includes
// =======================================================================//
$frontend_includes = array(
	'assets/php/init.php',
	'assets/php/cleanup.php',
	'assets/php/theme_functions.php',
	'assets/php/scripts_frontend.php',
);

foreach ( $frontend_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( esc_html_x( 'Error locating %s for inclusion', '%s contains path to file.', 'rokkavm' ), esc_html( $file ) ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );

if ( is_admin() ) {
	// =======================================================================//
	// Backend Includes
	// =======================================================================//
	$backend_includes = array(
		'assets/php/backend/scripts_backend.php',
		'assets/php/backend/tinymce.php',
	);

	foreach ( $backend_includes as $file ) {
		if ( ! $filepath = locate_template( $file ) ) {
			trigger_error( sprintf( esc_html_x( 'Error locating %s for inclusion', '%s contains path to file.', 'rokkavm' ), esc_html( $file ) ), E_USER_ERROR );
		}
		require_once $filepath;
	}
	unset( $file, $filepath );
}
