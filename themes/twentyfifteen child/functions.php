<?php
add_action( 'wp_enqueue_scripts', 'twentyfifteen_child_enqueue_styles' );
function twentyfifteen_child_enqueue_styles() {
 
    $parent_style = 'twentyfifteen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
/**
 * Register footer widget area.
 *
 * @since Twenty Fifteen Child 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_child_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Footer Widgets', 'twenty-fifteen-child' ),
    'id'            => 'sidebar-2',
    'description'   => __( 'Add widgets here to appear in your footer area.', 'twenty-fifteen-child' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'twentyfifteen_child_widgets_init' );