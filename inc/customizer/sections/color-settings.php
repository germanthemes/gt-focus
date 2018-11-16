<?php
/**
 * Theme Color Settings
 *
 * @package GT Health
 */

/**
 * Adds Theme Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_health_customize_register_theme_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_health_section_colors', array(
		'title'    => esc_html_x( 'Colors', 'Color Settings', 'gt-health' ),
		'priority' => 10,
		'panel'    => 'gt_health_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_health_default_options();

	// Add Block Primary Color setting.
	$wp_customize->add_setting( 'gt_health_theme_options[primary_color]', array(
		'default'           => $default['primary_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_health_theme_options[primary_color]', array(
			'label'    => esc_html_x( 'Primary', 'block color', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[primary_color]',
			'priority' => 10,
		)
	) );

	// Add Block Secondary Color setting.
	$wp_customize->add_setting( 'gt_health_theme_options[secondary_color]', array(
		'default'           => $default['secondary_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_health_theme_options[secondary_color]', array(
			'label'    => esc_html_x( 'Secondary', 'block color', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[secondary_color]',
			'priority' => 20,
		)
	) );

	// Add Header Color setting.
	$wp_customize->add_setting( 'gt_health_theme_options[header_color]', array(
		'default'           => $default['header_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_health_theme_options[header_color]', array(
			'label'    => esc_html_x( 'Header', 'theme colors', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[header_color]',
			'priority' => 30,
		)
	) );

	// Add Primary Title Color setting.
	$wp_customize->add_setting( 'gt_health_theme_options[title_color]', array(
		'default'           => $default['title_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_health_theme_options[title_color]', array(
			'label'    => esc_html_x( 'Page Titles', 'theme colors', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[title_color]',
			'priority' => 40,
		)
	) );

	// Add Footer Color setting.
	$wp_customize->add_setting( 'gt_health_theme_options[footer_color]', array(
		'default'           => $default['footer_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_health_theme_options[footer_color]', array(
			'label'    => esc_html_x( 'Footer', 'theme colors', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[footer_color]',
			'priority' => 50,
		)
	) );
}
add_action( 'customize_register', 'gt_health_customize_register_theme_color_settings' );
