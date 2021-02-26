<?php
/**
 * Custom Colors
 *
 * Generates Custom CSS code for Color Settings
 *
 * @package GT Focus
 */

/**
 * Custom Colors Class
 */
class GT_Focus_Custom_Colors {

	/**
	 * Actions Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Add Custom Fonts CSS code to frontend.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'add_custom_colors_in_frontend' ), 11 );

		// Add Custom Fonts CSS code to editor.
		add_action( 'enqueue_block_editor_assets', array( __CLASS__, 'add_custom_colors_in_editor' ), 11 );
	}

	/**
	 * Add Font Family CSS styles in the head area of the theme.
	 */
	static function add_custom_colors_in_frontend() {
		wp_add_inline_style( 'gt-focus-stylesheet', self::get_custom_colors_css() );
	}

	/**
	 * Add Font Family CSS styles in the head area of the Gutenberg editor.
	 */
	static function add_custom_colors_in_editor() {
		wp_add_inline_style( 'gt-focus-editor-styles', self::get_custom_colors_css() );
	}

	/**
	 * Generate Color CSS styles to override default colors.
	 *
	 * @return string CSS code
	 */
	static function get_custom_colors_css() {

		// Get theme options from database.
		$theme_options = gt_focus_theme_options();

		// Get default colors.
		$default = gt_focus_default_options();

		// Color Variables.
		$color_variables = '';

		// Set Primary Color.
		if ( $theme_options['primary_color'] !== $default['primary_color'] ) {
			$color_variables .= '--gt-focus--primary-color: ' . $theme_options['primary_color'] . ';';
		}

		// Set Secondary Color.
		if ( $theme_options['secondary_color'] !== $default['secondary_color'] ) {
			$color_variables .= '--gt-focus--secondary-color: ' . $theme_options['secondary_color'] . ';';
		}

		// Set Accent Color.
		if ( $theme_options['accent_color'] !== $default['accent_color'] ) {
			$color_variables .= '--gt-focus--accent-color: ' . $theme_options['accent_color'] . ';';
		}

		// Set Highlight Color.
		if ( $theme_options['highlight_color'] !== $default['highlight_color'] ) {
			$color_variables .= '--gt-focus--highlight-color: ' . $theme_options['highlight_color'] . ';';
		}

		// Set Light Gray Color.
		if ( $theme_options['light_gray_color'] !== $default['light_gray_color'] ) {
			$color_variables .= '--gt-focus--light-gray-color: ' . $theme_options['light_gray_color'] . ';';
		}

		// Set Gray Color.
		if ( $theme_options['gray_color'] !== $default['gray_color'] ) {
			$color_variables .= '--gt-focus--gray-color: ' . $theme_options['gray_color'] . ';';
		}

		// Set Dark Gray Color.
		if ( $theme_options['dark_gray_color'] !== $default['dark_gray_color'] ) {
			$color_variables .= '--gt-focus--dark-gray-color: ' . $theme_options['dark_gray_color'] . ';';
		}

		// Set Link Color.
		if ( $theme_options['link_color'] !== $default['link_color'] ) {
			$color_variables .= '--gt-focus--link-color: ' . $theme_options['link_color'] . ';';
		}

		// Set Button Color.
		if ( $theme_options['button_color'] !== $default['button_color'] ) {
			$color_variables .= '--gt-focus--button-color: ' . $theme_options['button_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['button_color'] ) ) {
				$color_variables .= '--gt-focus--button-text-color: #242424;';
			}
		}

		// Set Button Hover Color.
		if ( $theme_options['button_hover_color'] !== $default['button_hover_color'] ) {
			$color_variables .= '--gt-focus--button-hover-color: ' . $theme_options['button_hover_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['button_hover_color'] ) ) {
				$color_variables .= '--gt-focus--button-hover-text-color: #242424;';
			}
		}

		// Set Header Color.
		if ( $theme_options['header_color'] !== $default['header_color'] ) {
			$color_variables .= '--gt-focus--header-background-color: ' . $theme_options['header_color'] . ';';

			// Check if a dark background color was chosen.
			if ( self::is_color_dark( $theme_options['header_color'] ) ) {
				$color_variables .= '--gt-focus--header-text-color: #fff;';
				$color_variables .= '--gt-focus--header-border-color: rgba(255, 255, 255, 0.1);';
				$color_variables .= '--gt-focus--navi-hover-bg-color: rgba(255, 255, 255, 0.1);';
			}
		}

		// Set Navigation Color.
		if ( $theme_options['navi_color'] !== $default['navi_color'] ) {
			$color_variables .= '--gt-focus--navi-active-bg-color: ' . $theme_options['navi_color'] . ';';
			$color_variables .= '--gt-focus--header-hover-text-color: ' . $theme_options['navi_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['navi_color'] ) ) {
				$color_variables .= '--gt-focus--navi-active-text-color: #242424;';
			}
		}

		// Set Page Title Color.
		if ( $theme_options['title_color'] !== $default['title_color'] ) {
			$color_variables .= '--gt-focus--title-background-color: ' . $theme_options['title_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['title_color'] ) ) {
				$color_variables .= '--gt-focus--title-text-color: #242424;';
			}
		}

		// Set Post Title Color.
		if ( $theme_options['post_title_color'] !== $default['post_title_color'] ) {
			$color_variables .= '--gt-focus--post-title-color: ' . $theme_options['post_title_color'] . ';';
		}

		// Set Post Title Hover Color.
		if ( $theme_options['post_title_hover_color'] !== $default['post_title_hover_color'] ) {
			$color_variables .= '--gt-focus--post-title-hover-color: ' . $theme_options['post_title_hover_color'] . ';';
		}

		// Set Footer Color.
		if ( $theme_options['footer_color'] !== $default['footer_color'] ) {
			$color_variables .= '--gt-focus--footer-background-color: ' . $theme_options['footer_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_dark( $theme_options['footer_color'] ) ) {
				$color_variables .= '--gt-focus--footer-text-color: #fff;';
				$color_variables .= '--gt-focus--footer-link-color: rgba(255, 255, 255, 0.5);';
				$color_variables .= '--gt-focus--footer-link-hover-color: #fff;';
				$color_variables .= '--gt-focus--footer-border-color: rgba(255, 255, 255, 0.1);';
			}
		}

		// Return if no color variables were defined.
		if ( '' === $color_variables ) {
			return;
		}

		// Sanitize CSS Code.
		$custom_css = ':root {' . $color_variables . '}';
		$custom_css = wp_kses( $custom_css, array( '\'', '\"' ) );
		$custom_css = str_replace( '&gt;', '>', $custom_css );
		$custom_css = preg_replace( '/\n/', '', $custom_css );
		$custom_css = preg_replace( '/\t/', '', $custom_css );

		return $custom_css;
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
GT_Focus_Custom_Colors::setup();
