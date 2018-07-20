<?php
/**
 * Color Settings
 *
 * Register Color Settings
 *
 * @package GT Health
 */

/**
 * Adds all Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_health_customize_register_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_health_section_colors', array(
		'title'    => esc_html_x( 'Colors', 'Color Settings', 'gt-health' ),
		'priority' => 30,
		'panel'    => 'gt_health_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_health_default_options();

	// Add Header Color setting.
	$wp_customize->add_setting( 'gt_health_theme_options[header_color]', array(
		'default'           => $default['header_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_health_theme_options[header_color]', array(
			'label'    => esc_html_x( 'Header', 'Color Settings', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[header_color]',
			'priority' => 10,
		)
	) );

	// Add Navigation Color setting.
	$wp_customize->add_setting( 'gt_health_theme_options[navi_color]', array(
		'default'           => $default['navi_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_health_theme_options[navi_color]', array(
			'label'    => esc_html_x( 'Navigation', 'Color Settings', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[navi_color]',
			'priority' => 20,
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
			'label'    => esc_html_x( 'Titles', 'Color Settings', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[title_color]',
			'priority' => 30,
		)
	) );

	// Add Link Color setting.
	$wp_customize->add_setting( 'gt_health_theme_options[link_color]', array(
		'default'           => $default['link_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_health_theme_options[link_color]', array(
			'label'    => esc_html_x( 'Links & Buttons', 'Color Settings', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[link_color]',
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
			'label'    => esc_html_x( 'Footer', 'Color Settings', 'gt-health' ),
			'section'  => 'gt_health_section_colors',
			'settings' => 'gt_health_theme_options[footer_color]',
			'priority' => 50,
		)
	) );
}
add_action( 'customize_register', 'gt_health_customize_register_color_settings' );
