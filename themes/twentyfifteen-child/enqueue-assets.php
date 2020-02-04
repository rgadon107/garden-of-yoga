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

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_styles_and_scripts' );
/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.2
 */
function enqueue_styles_and_scripts() {
	$parent_theme_style = 'twentyfifteen-style';
	$child_theme_style  = 'twentyfifteen-child-style';
	$file = 'style.css';

	wp_enqueue_style( $parent_theme_style, get_template_directory_uri() . '/style.css', array(), get_parent_theme_version() );
	wp_enqueue_style( $child_theme_style, get_stylesheet_directory_uri() . '/style.css', array( $parent_theme_style ), _get_asset_version( $file ) );

	// Remove outdated version of FontAwesome loaded by dpProEventCalendar plugin.
	wp_dequeue_style( 'font-awesome-original');
}

/**
 * Font Awesome Kit Setup
 *
 * Load a Font Awesome kit_url to the front-end, admin back-end, and login screen area.
 *
 * @since 1.0.0
 * @param false|string    $kit_url    The custom setup kit url for the registered FA account.
 *
 * @see https://fontawesome.com/
 * @return void
 */
if (! function_exists('fa_custom_setup_kit') ) {
	function fa_custom_setup_kit( $kit_url = '' ) {

		if ( ! current_user_can( 'manage_options') ) {
			return;
		}

		$enqueue_actions = [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ];

		foreach ( $enqueue_actions as $action ) {
			add_action(
				$action,
				function () use ( $kit_url ) {
					wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
				}
			);
		}
	}
}

/*
 * Call the Font Awesome custom setup kit_url to render the FA icons.
 *
 * @since 1.0.0.
 *
 * @param string    $kit_url    The custom setup kit url for the registered FA account.
 *
 * @return void
 */
fa_custom_setup_kit('https://kit.fontawesome.com/e624e31c44.js');

