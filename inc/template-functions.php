<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package GT Health
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gt_health_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = gt_health_theme_options();

	// Fullwidth Page Layout?
	if ( is_page() && 'fullwidth' === get_post_meta( get_the_ID(), 'gt_page_layout', true ) ) {
		$classes[] = 'fullwidth-page-layout';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'gt_health_body_classes' );


/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function gt_health_hide_elements() {

	// Get theme options from database.
	$theme_options = gt_health_theme_options();

	$elements = array();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$elements[] = '.site-title';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$elements[] = '.site-description';
	}

	// Hide Page Title?
	if ( is_page() && get_post_meta( get_the_ID(), 'gt_hide_page_title', true ) ) {
		$elements[] = '.type-page .page-header-container';
	}

	// Allow plugins to add own elements.
	$elements = apply_filters( 'gt_health_hide_elements', $elements );

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes    = implode( ', ', $elements );
	$custom_css = $classes . ' { position: absolute; clip: rect(1px, 1px, 1px, 1px); width: 1px; height: 1px; overflow: hidden; }';

	// Add Custom CSS.
	wp_add_inline_style( 'gt-health-stylesheet', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'gt_health_hide_elements', 11 );
