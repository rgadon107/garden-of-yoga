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

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_child_styles' );
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.1
 */
function enqueue_child_styles() {
	$parent_theme_style = 'twentyfifteen-style';
	$child_theme_style  = 'twentyfifteen-child-style';
	$file = 'style.css';

    wp_enqueue_style( $parent_theme_style, get_template_directory_uri() . '/style.css', array(), get_parent_theme_version() );
    wp_enqueue_style( $child_theme_style, get_stylesheet_directory_uri() . '/style.css', array( $parent_theme_style ), _get_asset_version( $file ) );
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

	return $version = wp_get_theme( 'twentyfifteen' )->get( 'Version' );
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
 * Loads non-admin child theme files.
 *
 * @since 1.0.0
 * @return void
 */
function load_nonadmin_files() {
	$filenames = [
		'sidebar.php',
		'footer.php',
	];

	load_specified_files( $filenames );
}

/**
 * Load each of the specified files.
 *
 * @since 1.0.1
 *
 * @param array  $filenames
 * @param string $folder_root
 *
 * @return void
 */
function load_specified_files( array $filenames, $folder_root = '' ) {
	$folder_root = $folder_root ?: get_theme_dir() . '/';

	foreach ( $filenames as $filename ) {
		include $folder_root . $filename;
	}
}

load_nonadmin_files();

