<?php
/**
 * License Settings
 *
 * Register License Settings
 *
 * @package GT Focus
 */

/**
 * Adds all License settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_focus_customize_register_license_settings( $wp_customize ) {

	// Add Section for License.
	$wp_customize->add_section( 'gt_focus_section_license', array(
		'title'       => esc_html__( 'License', 'gt-focus' ),
		'description' => esc_html__( 'Please enter your license key. An active license key is necessary for automatic theme updates and support.', 'gt-focus' ),
		'priority'    => 30,
		'panel'       => 'gt_focus_options_panel',
	) );

	// Add Theme Links control.
	$wp_customize->add_control( new GT_Focus_Customize_Links_Control(
		$wp_customize, 'gt_focus_theme_links', array(
			'section'  => 'gt_focus_section_license',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	// Add License Key setting.
	$wp_customize->add_setting( 'gt_focus_theme_options[license_key]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Focus_Customize_License_Control(
		$wp_customize, 'license_key', array(
			'label'    => esc_html__( 'License Key', 'gt-focus' ),
			'section'  => 'gt_focus_section_license',
			'settings' => 'gt_focus_theme_options[license_key]',
			'priority' => 20,
		)
	) );
}
add_action( 'customize_register', 'gt_focus_customize_register_license_settings' );
