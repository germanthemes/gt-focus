<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package GT Health
 */

if ( ! function_exists( 'gt_health_gutenberg_support' ) ) :
	/**
	 * Registers support for various Gutenberg features.
	 *
	 * @return void
	 */
	function gt_health_gutenberg_support() {

		// Add theme support for wide and full images.
		add_theme_support( 'align-wide' );

		// Add theme support for block color palette.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html_x( 'Primary', 'block color', 'gt-health' ),
				'slug'  => 'primary',
				'color' => '#006699',
			),
			array(
				'name'  => esc_html_x( 'Secondary', 'block color', 'gt-health' ),
				'slug'  => 'secondary',
				'color' => '#ee9922',
			),
			array(
				'name'  => esc_html_x( 'Accent', 'block color', 'gt-health' ),
				'slug'  => 'accent',
				'color' => '#11bb55',
			),
			array(
				'name'  => esc_html_x( 'Complementary', 'block color', 'gt-health' ),
				'slug'  => 'complementary',
				'color' => '#bb4411',
			),
			array(
				'name'  => esc_html_x( 'White', 'block color', 'gt-health' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html_x( 'Light Gray', 'block color', 'gt-health' ),
				'slug'  => 'light-gray',
				'color' => '#e5e5e5',
			),
			array(
				'name'  => esc_html_x( 'Dark Gray', 'block color', 'gt-health' ),
				'slug'  => 'dark-gray',
				'color' => '#555555',
			),
			array(
				'name'  => esc_html_x( 'Black', 'block color', 'gt-health' ),
				'slug'  => 'black',
				'color' => '#242424',
			),
		) );

		// Disable theme support for custom colors.
		#add_theme_support( 'disable-custom-colors' );

		// Disable theme support for custom font sizes.
		add_theme_support( 'disable-custom-font-sizes' );

		// Add theme support for font sizes.
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name'      => esc_html_x( 'Small', 'block font size', 'gt-health' ),
				'shortName' => esc_html_x( 'S', 'block font size', 'gt-health' ),
				'size'      => 16,
				'slug'      => 'small',
			),
			array(
				'name'      => esc_html_x( 'Medium', 'block font size', 'gt-health' ),
				'shortName' => esc_html_x( 'M', 'block font size', 'gt-health' ),
				'size'      => 24,
				'slug'      => 'medium',
			),
			array(
				'name'      => esc_html_x( 'Large', 'block font size', 'gt-health' ),
				'shortName' => esc_html_x( 'L', 'block font size', 'gt-health' ),
				'size'      => 32,
				'slug'      => 'large',
			),
			array(
				'name'      => esc_html_x( 'Extra Large', 'block font size', 'gt-health' ),
				'shortName' => esc_html_x( 'XL', 'block font size', 'gt-health' ),
				'size'      => 48,
				'slug'      => 'extra-large',
			),
		) );
	}
endif;
add_action( 'after_setup_theme', 'gt_health_gutenberg_support' );
