<?php
/**
 * Theme Info Settings
 *
 * Register Theme Info Settings
 *
 * @package GT Focus
 */

/**
 * Adds all Theme Info settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_focus_customize_register_theme_info_settings( $wp_customize ) {

	// Add Section for Theme Fonts.
	$wp_customize->add_section( 'gt_focus_section_theme_info', array(
		'title'    => esc_html__( 'Theme Info', 'gt-focus' ),
		'priority' => 200,
		'panel'    => 'gt_focus_options_panel',
	) );

	// Add Theme Links control.
	$wp_customize->add_control( new GT_Focus_Customize_Links_Control(
		$wp_customize, 'gt_focus_theme_links', array(
			'section'  => 'gt_focus_section_theme_info',
			'settings' => array(),
			'priority' => 10,
		)
	) );
}
add_action( 'customize_register', 'gt_focus_customize_register_theme_info_settings' );
