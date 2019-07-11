<?php
/**
 * Theme Color Settings
 *
 * @package GT Focus
 */

/**
 * Adds Theme Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_focus_customize_register_theme_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_focus_section_colors', array(
		'title'    => esc_html__( 'Theme Colors', 'gt-focus' ),
		'priority' => 20,
		'panel'    => 'gt_focus_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_focus_default_options();

	// Add Header Color setting.
	$wp_customize->add_setting( 'gt_focus_theme_options[header_color]', array(
		'default'           => $default['header_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_focus_theme_options[header_color]', array(
			'label'    => esc_html_x( 'Header', 'Color Option', 'gt-focus' ),
			'section'  => 'gt_focus_section_colors',
			'settings' => 'gt_focus_theme_options[header_color]',
			'priority' => 40,
		)
	) );

	// Add Primary Title Color setting.
	$wp_customize->add_setting( 'gt_focus_theme_options[title_color]', array(
		'default'           => $default['title_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_focus_theme_options[title_color]', array(
			'label'    => esc_html_x( 'Page Titles', 'Color Option', 'gt-focus' ),
			'section'  => 'gt_focus_section_colors',
			'settings' => 'gt_focus_theme_options[title_color]',
			'priority' => 50,
		)
	) );

	// Add Footer Color setting.
	$wp_customize->add_setting( 'gt_focus_theme_options[footer_color]', array(
		'default'           => $default['footer_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_focus_theme_options[footer_color]', array(
			'label'    => esc_html_x( 'Footer', 'Color Option', 'gt-focus' ),
			'section'  => 'gt_focus_section_colors',
			'settings' => 'gt_focus_theme_options[footer_color]',
			'priority' => 60,
		)
	) );
}
add_action( 'customize_register', 'gt_focus_customize_register_theme_color_settings' );
