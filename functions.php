<?php
/**
 * Theme Name Functions
 *
 * @package Theme_Slug
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Theme version (synced with style.css).
define( 'THEME_SLUG_VERSION', wp_get_theme()->get( 'Version' ) );

// Theme directory path.
define( 'THEME_SLUG_DIR', get_template_directory() );

// Theme directory URI.
define( 'THEME_SLUG_URI', get_template_directory_uri() );

/**
 * Load Composer autoloader.
 */
if ( file_exists( THEME_SLUG_DIR . '/vendor/autoload.php' ) ) {
	require_once THEME_SLUG_DIR . '/vendor/autoload.php';
}

/**
 * GitHub Updater
 */
require_once THEME_SLUG_DIR . '/includes/theme-updater.php';

/**
 * Enqueue Scripts and Styles
 */
function theme_slug_enqueue_assets() {
	// Enqueue main stylesheet.
	wp_enqueue_style(
		'theme-slug-style',
		get_stylesheet_uri(),
		array(),
		THEME_SLUG_VERSION
	);

	// Enqueue compiled CSS.
	wp_enqueue_style(
		'theme-slug-main',
		THEME_SLUG_URI . '/build/css/build.css',
		array(),
		THEME_SLUG_VERSION
	);

	// Enqueue compiled JavaScript.
	wp_enqueue_script(
		'theme-slug-main',
		THEME_SLUG_URI . '/build/js/build.js',
		array(),
		THEME_SLUG_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_assets' );
