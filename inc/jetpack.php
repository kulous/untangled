<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package untangled
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function untangled_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'untangled_jetpack_setup' );
