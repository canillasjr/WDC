<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function undiscovered_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'           => 'click',
		'footer_widgets' => true,
		'container'      => 'main',
		'wrapper'        => true,
		'render'         => false
	));
}
add_action( 'after_setup_theme', 'undiscovered_jetpack_setup' );
