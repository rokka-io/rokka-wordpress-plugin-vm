<?php
/**
 * Returns version number theme
 *
 * @return string
 */
function get_theme_version() {
	$theme = wp_get_theme();
	return $theme->get( 'Version' );
}
