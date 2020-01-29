<?php
/*
 * Twentyfifteen Child Theme
 *
 * @package     spiralWebDB\gardenOfYoga
 * @since       1.0.0
 * @author      Robert A. Gadon
 * @link        https://spiralwebdb.com
 * @license     GNU General Public License 2.0+
 */

namespace spiralWebDB\gardenOfYoga;

/**
 * Get the absolute path to the root directory of the child theme.
 *
 * @since 1.0.0
 *
 * @return string returns the directory path.
 */
function get_theme_dir() {
	return __DIR__;
}

/**
 * Get the parent theme's version number.
 *
 * @since 1.0.0
 *
 * @return string returns the theme's version.
 */
function get_parent_theme_version() {
	static $version = null;

	if ( null !== $version ) {
		return $version;
	}

	$version = wp_get_theme( 'twentyfifteen' )->get( 'Version' );

	return $version;
}

/**
 * Get's the child theme's version number by using it's modification timestamp.
 *
 * @param string $relative_path Relative path to the asset file.
 *
 * @return bool|int
 * @since  1.0.0
 * @ignore
 * @access private
 *
 */
function _get_asset_version( $relative_path ) {
	return filemtime( get_stylesheet_directory() . '/' . $relative_path );
}

// Load enqueued assets.
include get_theme_dir() . '/enqueue-assets.php';

// Load the sidebar registered to WP by the child theme. 
include get_theme_dir() . '/register-sidebar.php';

