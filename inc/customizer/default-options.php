<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package GT Focus
 */

/**
* Get a single theme option
*
* @return mixed
*/
function gt_focus_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = gt_focus_theme_options();

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
function gt_focus_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'gt_focus_theme_options', array() ), gt_focus_default_options() );

	// Return theme options.
	return apply_filters( 'gt_focus_theme_options', $theme_options );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function gt_focus_default_options() {

	$default_options = array(
		'site_title'             => true,
		'site_description'       => true,
		'meta_date'              => true,
		'meta_author'            => true,
		'meta_categories'        => true,
		'meta_tags'              => false,
		'primary_color'          => '#006699',
		'secondary_color'        => '#0791b6',
		'accent_color'           => '#99001a',
		'highlight_color'        => '#00601a',
		'light_gray_color'       => '#e4e4e4',
		'gray_color'             => '#848484',
		'dark_gray_color'        => '#242424',
		'link_color'             => '#006699',
		'button_color'           => '#006699',
		'button_hover_color'     => '#242424',
		'header_color'           => '#ffffff',
		'navi_color'             => '#006699',
		'title_color'            => '#006699',
		'post_title_color'       => '#242424',
		'post_title_hover_color' => '#006699',
		'footer_color'           => '#e7e7e7',
		'text_font'              => 'Lato',
		'title_font'             => 'Lato',
		'title_is_bold'          => true,
		'title_is_uppercase'     => false,
		'navi_font'              => 'Lato',
		'navi_is_bold'           => false,
		'navi_is_uppercase'      => false,
	);

	return apply_filters( 'gt_focus_default_options', $default_options );
}
