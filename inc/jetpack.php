<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package DJP2015
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function djp2015_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'djp2015_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function djp2015_jetpack_setup
add_action( 'after_setup_theme', 'djp2015_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function djp2015_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function djp2015_infinite_scroll_render
