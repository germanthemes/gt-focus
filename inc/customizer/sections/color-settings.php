<?php
/**
 * Color Settings
 *
 * Register Color Settings
 *
 * @package GT Workout
 */

/**
 * Adds all Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_workout_customize_register_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_workout_section_colors', array(
		'title'    => esc_html_x( 'Colors', 'Color Settings', 'gt-workout' ),
		'priority' => 30,
		'panel'    => 'gt_workout_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_workout_default_options();

	// Add Link Color setting.
	$wp_customize->add_setting( 'gt_workout_theme_options[link_color]', array(
		'default'           => $default['link_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_workout_theme_options[link_color]', array(
			'label'    => esc_html_x( 'Links & Buttons (primary)', 'Color Settings', 'gt-workout' ),
			'section'  => 'gt_workout_section_colors',
			'settings' => 'gt_workout_theme_options[link_color]',
			'priority' => 10,
		)
	) );

	// Add Button Color setting.
	$wp_customize->add_setting( 'gt_workout_theme_options[link_hover_color]', array(
		'default'           => $default['link_hover_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_workout_theme_options[link_hover_color]', array(
			'label'    => esc_html_x( 'Links & Buttons (secondary)', 'Color Settings', 'gt-workout' ),
			'section'  => 'gt_workout_section_colors',
			'settings' => 'gt_workout_theme_options[link_hover_color]',
			'priority' => 20,
		)
	) );

	// Add Navigation Primary Color setting.
	$wp_customize->add_setting( 'gt_workout_theme_options[header_color]', array(
		'default'           => $default['header_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_workout_theme_options[header_color]', array(
			'label'    => esc_html_x( 'Header', 'Color Settings', 'gt-workout' ),
			'section'  => 'gt_workout_section_colors',
			'settings' => 'gt_workout_theme_options[header_color]',
			'priority' => 30,
		)
	) );

	// Add Navigation Secondary Color setting.
	$wp_customize->add_setting( 'gt_workout_theme_options[submenu_color]', array(
		'default'           => $default['submenu_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_workout_theme_options[submenu_color]', array(
			'label'    => esc_html_x( 'Navigation Submenus', 'Color Settings', 'gt-workout' ),
			'section'  => 'gt_workout_section_colors',
			'settings' => 'gt_workout_theme_options[submenu_color]',
			'priority' => 40,
		)
	) );

	// Add Primary Title Color setting.
	$wp_customize->add_setting( 'gt_workout_theme_options[title_color]', array(
		'default'           => $default['title_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_workout_theme_options[title_color]', array(
			'label'    => esc_html_x( 'Titles (primary)', 'Color Settings', 'gt-workout' ),
			'section'  => 'gt_workout_section_colors',
			'settings' => 'gt_workout_theme_options[title_color]',
			'priority' => 50,
		)
	) );

	// Add Secondary Title Color setting.
	$wp_customize->add_setting( 'gt_workout_theme_options[title_hover_color]', array(
		'default'           => $default['title_hover_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_workout_theme_options[title_hover_color]', array(
			'label'    => esc_html_x( 'Titles (secondary)', 'Color Settings', 'gt-workout' ),
			'section'  => 'gt_workout_section_colors',
			'settings' => 'gt_workout_theme_options[title_hover_color]',
			'priority' => 60,
		)
	) );

	// Add Footer Color setting.
	$wp_customize->add_setting( 'gt_workout_theme_options[footer_color]', array(
		'default'           => $default['footer_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_workout_theme_options[footer_color]', array(
			'label'    => esc_html_x( 'Footer', 'Color Settings', 'gt-workout' ),
			'section'  => 'gt_workout_section_colors',
			'settings' => 'gt_workout_theme_options[footer_color]',
			'priority' => 70,
		)
	) );
}
add_action( 'customize_register', 'gt_workout_customize_register_color_settings' );
