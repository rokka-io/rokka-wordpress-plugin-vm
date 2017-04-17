<?php
/**
 * Init package
 *
 * @package WordPress
 */

/**
 * Setup of theme
 *
 * @return void
 */
function theme_setup() {
	// =======================================================================//
	// Translations
	// =======================================================================//

	load_theme_textdomain( 'rokkavm', get_template_directory() . '/languages' );

	// =======================================================================//
	// Register Navigations
	// =======================================================================//

	register_nav_menus( array(
		'main_navigation' => esc_html__( 'Main Navigation', 'rokkavm' ),
	) );

	// =======================================================================//
	// Register Sidebars
	// =======================================================================//
	register_sidebar( array(
		'id' => 'address_block',
		'name' => esc_html__( 'Address Block', 'rokkavm' ),
	) );

	// =======================================================================//
	// Add support for Stuff
	// =======================================================================//

	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'theme_setup' );
