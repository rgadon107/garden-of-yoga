<?php
/**
 *  Register sidebars for the child theme.
 *
 * @package     spiralWebDB\gardenOfYoga
 * @since       1.0.0
 * @author      Robert A. Gadon
 * @link        https://spiralwebdb.com
 * @license     GNU General Public License 2.0+
 */

namespace spiralWebDB\gardenOfYoga;

add_action( 'widgets_init', __NAMESPACE__ . '\register_footer_widget_area' );
/**
 * Register the footer widget area for the main content section.
 *
 * Note: The Twentyfifteen (parent) theme registers its sidebar in its functions.php file.
 *    Follow the same file structure in the child theme as in the parent.
 *
 * @since version 1.0.0
 * @param $args array   Optional. Array of args.
 *
 * @return      string  Sidebar ID added to $wp_registered_sidebars global.
 */
function register_footer_widget_area( $args = [] ) {
	$args =  [
		'id'            => 'main-content-footer-widget',
		'name'          => 'Main Content Footer Widget',
		'description'   => 'Add widgets to appear in the footer of the main content area.',
		'class'         => 'main-content-footer',
		'before_widget' => sprintf( '<aside id="%1$s" class="widget %2$s">', 'main-content-footer','footer-widget' ),
		'after_widget'  => "</aside>\n",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => "</h2>\n",
	];

	return register_sidebar( $args );
}