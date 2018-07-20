<?php
/**
 * Custom Colors
 *
 * Generates Custom CSS code for Color Settings
 *
 * @package GT Health
 */

/**
 * Custom Colors Class
 */
class GT_Health_Custom_Colors {

	/**
	 * Actions Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Add Custom Colors CSS code.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'custom_colors_css' ), 11 );
	}

	/**
	 * Adds Color CSS styles in the head area to override default colors
	 *
	 * @return string CSS code
	 */
	static function custom_colors_css() {

		// Get theme options from database.
		$theme_options = gt_health_theme_options();

		// Get default colors.
		$default = gt_health_default_options();

		// Color Variables.
		$color_variables = '';

		// Set Header Color.
		if ( $theme_options['header_color'] !== $default['header_color'] ) {
			$color_variables .= '--header-background-color: ' . $theme_options['header_color'] . ';';

			// Check if a dark background color was chosen.
			if ( self::is_color_dark( $theme_options['header_color'] ) ) {
				$color_variables .= '--header-text-color: #fff;';
				$color_variables .= '--header-border-color: rgba(255, 255, 255, 0.1);';
				$color_variables .= '--navi-hover-bg-color: rgba(255, 255, 255, 0.1);';
			}
		}

		// Set Navigation Color.
		if ( $theme_options['navi_color'] !== $default['navi_color'] ) {
			$color_variables .= '--navi-active-bg-color: ' . $theme_options['navi_color'] . ';';
			$color_variables .= '--header-hover-text-color: ' . $theme_options['navi_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['navi_color'] ) ) {
				$color_variables .= '--navi-active-text-color: #242424;';
			}
		}

		// Set Title Color.
		if ( $theme_options['title_color'] !== $default['title_color'] ) {
			$color_variables .= '--title-background-color: ' . $theme_options['title_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['title_color'] ) ) {
				$color_variables .= '--title-text-color: #242424;';
			}
		}

		// Set Link Color.
		if ( $theme_options['link_color'] !== $default['link_color'] ) {
			$color_variables .= '--link-color: ' . $theme_options['link_color'] . ';';
			$color_variables .= '--button-color: ' . $theme_options['link_color'] . ';';
			$color_variables .= '--post-title-hover-color: ' . $theme_options['link_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['link_color'] ) ) {
				$color_variables .= '--button-text-color: #242424;';
			}
		}

		// Set Footer Color.
		if ( $theme_options['footer_color'] !== $default['footer_color'] ) {
			$color_variables .= '--footer-color: ' . $theme_options['footer_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_dark( $theme_options['footer_color'] ) ) {
				$color_variables .= '--footer-text-color: #ffffff;';
				$color_variables .= '--footer-hover-text-color: rgba(255, 255, 255, 0.5);';
				$color_variables .= '--footer-border-color: rgba(255, 255, 255, 0.1);';
			}
		}

		// Return if no color variables were defined.
		if ( '' === $color_variables ) {
			return;
		}

		// Sanitize CSS Code.
		$custom_css .= ':root {' . $color_variables . '}';
		$custom_css  = wp_kses( $custom_css, array( '\'', '\"' ) );
		$custom_css  = str_replace( '&gt;', '>', $custom_css );
		$custom_css  = preg_replace( '/\n/', '', $custom_css );
		$custom_css  = preg_replace( '/\t/', '', $custom_css );

		// Enqueue Custom CSS.
		wp_add_inline_style( 'gt-health-stylesheet', $custom_css );
	}

	/**
	 * Returns color brightness.
	 *
	 * @param int Number of brightness.
	 */
	static function get_color_brightness( $hex_color ) {

		// Remove # string.
		$hex_color = str_replace( '#', '', $hex_color );

		// Convert into RGB.
		$r = hexdec( substr( $hex_color, 0, 2 ) );
		$g = hexdec( substr( $hex_color, 2, 2 ) );
		$b = hexdec( substr( $hex_color, 4, 2 ) );

		return ( ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000 );
	}

	/**
	 * Check if the color is light.
	 *
	 * @param bool True if color is light.
	 */
	static function is_color_light( $hex_color ) {
		return ( self::get_color_brightness( $hex_color ) > 130 );
	}

	/**
	 * Check if the color is dark.
	 *
	 * @param bool True if color is dark.
	 */
	static function is_color_dark( $hex_color ) {
		return ( self::get_color_brightness( $hex_color ) <= 130 );
	}
}

// Run Class.
GT_Health_Custom_Colors::setup();
