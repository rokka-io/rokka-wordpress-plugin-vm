<?php

/**
 * Add / Remove Scripts and CSS
 *
 * @return void
 */
function scripts_frontend() {
	if ( is_admin() ) {
		return;
	}

	wp_register_style( 'app', get_template_directory_uri() . '/assets/css/app.css', array(), get_theme_version() );
	wp_enqueue_style( 'app' );

	wp_register_script( 'html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', array(), '3.7.2', false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'html5shiv' );

	wp_register_script( 'respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), '1.4.2', false );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respond' );

	// Footer
	wp_deregister_script( 'jquery' ); // Remove WP jQuery version
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.12.0.min.js', array(), '1.12.0', true );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'app', get_template_directory_uri() . '/assets/js/app.min.js', array( 'jquery' ), get_theme_version(), true );
	wp_enqueue_script( 'app' );
}

add_action( 'wp_enqueue_scripts', 'scripts_frontend' );
