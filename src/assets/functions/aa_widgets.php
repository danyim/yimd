<?php
/**
 *
 * Widgets
 *
 * @since  1.0.0
 *
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function neat_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'neat' ),
		'id'            => 'aa_sidebar_1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-3 vtop widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'neat_widgets_init' );
