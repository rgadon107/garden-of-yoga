<?php
/*
 * Enqueue Assets
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

