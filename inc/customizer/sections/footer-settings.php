<?php
/**
 * Footer Settings
 *
 * Register Footer Settings
 *
 * @package GT Health
 */

/**
 * Adds all Footer settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_health_customize_register_footer_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'gt_health_section_footer', array(
		'title'    => esc_html_x( 'Footer', 'Footer Settings', 'gt-health' ),
		'priority' => 50,
		'panel'    => 'gt_health_options_panel',
	) );

	// Add Footer Text setting.
	$wp_customize->add_setting( 'gt_health_theme_options[footer_text]', array(
		'default'           => gt_health_get_option( 'footer_text' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'gt_health_sanitize_html',
	) );

	$wp_customize->add_control( 'gt_health_theme_options[footer_text]', array(
		'label'    => esc_html__( 'Footer Text', 'gt-health' ),
		'section'  => 'gt_health_section_footer',
		'settings' => 'gt_health_theme_options[footer_text]',
		'type'     => 'textarea',
		'priority' => 10,
	) );

	// Add selective refresh for footer text.
	$wp_customize->selective_refresh->add_partial( 'gt_health_theme_options[footer_text]', array(
		'selector'         => '.site-info .footer-text',
		'render_callback'  => 'gt_health_customize_partial_footer_text',
		'fallback_refresh' => false,
	) );

}
add_action( 'customize_register', 'gt_health_customize_register_footer_settings' );

/**
 * Render the footer text for the selective refresh partial.
 */
function gt_health_customize_partial_footer_text() {
	echo wp_kses_post( gt_health_get_option( 'footer_text' ) );
}
