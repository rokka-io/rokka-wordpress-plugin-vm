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

	rokka_define_image_sizes();
}

add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Define image sizes to test rokka stacks
 */
function rokka_define_image_sizes() {
	// Image size medium 375w <unlimited>h
	update_option( 'medium_size_w', 370 );
	update_option( 'medium_size_h', 9999 );

	// Image size medium_large 750w <unlimited>h
	update_option( 'medium_large_size_w', 735 );
	update_option( 'medium_large_size_h', 9999 );

	// Image size medium-large-to-large 1250w <unlimited>h
	add_image_size( 'medium-large-to-large', 1250, 9999 );

	// Image size responsive can be used to stretch image to the full with of the container.
	add_image_size( 'responsive', 1250, 9999 );

	// Image size large 1500w <unlimited>h
	update_option( 'large_size_w', 1500 );
	update_option( 'large_size_h', 9999 );

	// Image size colmd4-image is used render different sizes attribute for images in a col-md-4 column.
	add_image_size( 'colmd4-image', 1500, 9999 );

	// Image size teaser 750w 375h cropped
	add_image_size( 'teaser', 750, 375, true );
}
