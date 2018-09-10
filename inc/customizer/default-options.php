<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package GT Health
 */

/**
* Get a single theme option
*
* @return mixed
*/
function gt_health_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = gt_health_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function gt_health_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'gt_health_theme_options', array() ), gt_health_default_options() );

	// Return theme options.
	return apply_filters( 'gt_health_theme_options', $theme_options );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function gt_health_default_options() {

	$default_options = array(
		'site_title'                => true,
		'site_description'          => true,
		'meta_date'                 => true,
		'meta_author'               => true,
		'meta_category'             => true,
		'post_image_archives'       => true,
		'post_image_single'         => true,
		'header_color'              => '#ffffff',
		'navi_color'                => '#006699',
		'title_color'               => '#006699',
		'link_color'                => '#006699',
		'footer_color'              => '#ffffff',
		'block_primary_color'       => '#006699',
		'block_secondary_color'     => '#0791b6',
		'block_accent_color'        => '#f4e08a',
		'block_complementary_color' => '#e7393a',
		'text_font'                 => 'Roboto',
		'title_font'                => 'Lato',
		'navi_font'                 => 'Roboto',
		'footer_text'               => sprintf( '&copy; %1$s %2$s', date( 'Y' ), get_bloginfo( 'name' ) ),
	);

	return apply_filters( 'gt_health_default_options', $default_options );
}
