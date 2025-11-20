<?php
/**
 * GitHub Theme Updater
 *
 * Enables automatic theme updates from GitHub releases.
 *
 * @package Theme_Slug
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

/**
 * Initialize GitHub updater.
 *
 * IMPORTANT: Update the GitHub repository URL below with your actual repository.
 * The updater will check for new releases and automatically update the theme.
 *
 * Requirements:
 * - Repository must be public OR you must provide a GitHub access token
 * - Releases must be created with version tags (e.g., v1.0.0)
 * - Release assets must include the theme .zip file
 */
function theme_slug_init_updater() {
	// Only load if the update checker class exists (Composer installed).
	if ( ! class_exists( 'YahnisElsts\PluginUpdateChecker\v5\PucFactory' ) ) {
		return;
	}

	$update_checker = PucFactory::buildUpdateChecker(
		'https://github.com/your-username/theme-slug/', // GitHub repository URL.
		THEME_SLUG_DIR . '/functions.php',               // Full path to main theme file.
		'theme-slug'                                      // Theme slug (must match folder name).
	);

	// Set the branch to check for updates (default: main).
	$update_checker->setBranch( 'main' );

	// Optional: If the repository is private, set a GitHub access token.
	// $update_checker->setAuthentication( 'your-github-token-here' );
}
add_action( 'after_setup_theme', 'theme_slug_init_updater' );
