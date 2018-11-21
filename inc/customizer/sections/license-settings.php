<?php
/**
 * License Settings
 *
 * Register License Settings
 *
 * @package GT Health
 */

/**
 * Adds all License settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_health_customize_register_license_settings( $wp_customize ) {

	// Add Section for License.
	$wp_customize->add_section( 'gt_health_section_license', array(
		'title'       => esc_html__( 'License', 'gt-health' ),
		'description' => esc_html__( 'Please enter your license key. An active license key is necessary for automatic theme updates and support.', 'gt-health' ),
		'priority'    => 30,
		'panel'       => 'gt_health_options_panel',
	) );

	// Add License Key setting.
	$wp_customize->add_setting( 'gt_health_theme_options[license_key]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Health_Customize_License_Control(
		$wp_customize, 'license_key', array(
			'label'    => esc_html__( 'License Key', 'gt-health' ),
			'section'  => 'gt_health_section_license',
			'settings' => 'gt_health_theme_options[license_key]',
			'priority' => 10,
		)
	) );
}
add_action( 'customize_register', 'gt_health_customize_register_license_settings' );
