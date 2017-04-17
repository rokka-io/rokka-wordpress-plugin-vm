<?php
/**
 * Cleanup tasks for WP
 *
 * @package WordPress
 */

/**
 * Cleanup wp_head
 */
function head_cleanup() {
	global $sitepress;

	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10 );
	remove_action( 'wp_head', 'start_post_rel_link', 10 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', array( $sitepress, 'meta_generator_tag' ) );
	remove_action( 'wp_head', 'start_post_rel_link', 10 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
	remove_action( 'wp_head', 'rel_canonical' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

	add_filter( 'use_default_gallery_style', '__return_null' );
}

add_action( 'init', 'head_cleanup' );


/**
 * Remove Widgets
 */
function unregister_default_wp_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Nav_Menu_Widget' );
}

add_action( 'widgets_init', 'unregister_default_wp_widgets' );


/**
 * Remove Dashboard Widgets
 */
function remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'normal' );

	remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'side' );
	remove_meta_box( 'notepad_widget', 'dashboard', 'side' );
}

add_action( 'admin_init', 'remove_dashboard_widgets' );

/**
 * Disable emojis
 *
 * @return void
 */
function disable_emojis() {
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

/**
 * Disable emojis in TinyMCE
 *
 * @param array $plugins All available plugins.
 *
 * @return array
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

// Disable emojis
add_action( 'init', 'disable_emojis' );

/**
 * Disable pingback XMLRPC method
 *
 * @param array $methods Method strings.
 *
 * @return mixed
 */
function soil_filter_xmlrpc_method( $methods ) {
	unset( $methods['pingback.ping'] );

	return $methods;
}

add_filter( 'xmlrpc_methods', 'soil_filter_xmlrpc_method', 10, 1 );

/**
 * Remove pingback header
 *
 * @param array $headers HTTP Headers.
 *
 * @return mixed
 */
function soil_filter_headers( $headers ) {
	if ( isset( $headers['X-Pingback'] ) ) {
		unset( $headers['X-Pingback'] );
	}

	return $headers;
}

add_filter( 'wp_headers', 'soil_filter_headers', 10, 1 );

/**
 * Kill trackback rewrite rule.
 *
 * @param array $rules Filter rules.
 *
 * @return mixed
 */
function soil_filter_rewrites( $rules ) {
	foreach ( $rules as $rule => $rewrite ) {
		if ( preg_match( '/trackback\/\?\$$/i', $rule ) ) {
			unset( $rules[ $rule ] );
		}
	}

	return $rules;
}

add_filter( 'rewrite_rules_array', 'soil_filter_rewrites' );

/**
 * Kill bloginfo('pingback_url')
 *
 * @param string $output Output variable.
 * @param string $show   Show action.
 *
 * @return string
 */
function soil_kill_pingback_url( $output, $show ) {
	if ( 'pingback_url' === $show ) {
		$output = '';
	}

	return $output;
}

add_filter( 'bloginfo_url', 'soil_kill_pingback_url', 10, 2 );

/**
 * Disable XMLRPC call
 *
 * @param string $action Name of action.
 *
 * @return void
 */
function soil_kill_xmlrpc( $action ) {
	if ( 'pingback.ping' === $action ) {
		wp_die(
			'Pingbacks are not supported',
			'Not Allowed!',
			array( 'response' => 403 )
		);
	}
}

add_action( 'xmlrpc_call', 'soil_kill_xmlrpc' );
