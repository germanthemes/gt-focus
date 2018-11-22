<?php
/**
 * Typography Settings
 *
 * Register Typography Settings
 *
 * @package GT Health
 */

/**
 * Adds all Typography settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_health_customize_register_typography_settings( $wp_customize ) {

	// Add Section for Theme Fonts.
	$wp_customize->add_section( 'gt_health_section_typography', array(
		'title'    => esc_html__( 'Typography', 'gt-health' ),
		'priority' => 20,
		'panel'    => 'gt_health_options_panel',
	) );

	// Get Default Fonts from settings.
	$default = gt_health_default_options();

	// Add Text Font setting.
	$wp_customize->add_setting( 'gt_health_theme_options[text_font]', array(
		'default'           => $default['text_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Health_Customize_Font_Control(
		$wp_customize, 'text_font', array(
			'label'    => esc_html__( 'Body Font', 'gt-health' ),
			'section'  => 'gt_health_section_typography',
			'settings' => 'gt_health_theme_options[text_font]',
			'priority' => 10,
		)
	) );

	// Add Title Font setting.
	$wp_customize->add_setting( 'gt_health_theme_options[title_font]', array(
		'default'           => $default['title_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Health_Customize_Font_Control(
		$wp_customize, 'title_font', array(
			'label'    => esc_html_x( 'Headings', 'Font Setting', 'gt-health' ),
			'section'  => 'gt_health_section_typography',
			'settings' => 'gt_health_theme_options[title_font]',
			'priority' => 20,
		)
	) );

	// Add Navigation Font setting.
	$wp_customize->add_setting( 'gt_health_theme_options[navi_font]', array(
		'default'           => $default['navi_font'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Health_Customize_Font_Control(
		$wp_customize, 'navi_font', array(
			'label'    => esc_html_x( 'Navigation', 'Font Setting', 'gt-health' ),
			'section'  => 'gt_health_section_typography',
			'settings' => 'gt_health_theme_options[navi_font]',
			'priority' => 30,
		)
	) );
}
add_action( 'customize_register', 'gt_health_customize_register_typography_settings' );
