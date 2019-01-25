<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package GT Focus
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function gt_focus_gutenberg_support() {

	// Get theme options from database.
	$theme_options = gt_focus_theme_options();

	// Add theme support for wide and full images.
	add_theme_support( 'align-wide' );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', apply_filters( 'gt_focus_editor_color_palette_args', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'gt-focus' ),
			'slug'  => 'primary',
			'color' => esc_html( $theme_options['primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'gt-focus' ),
			'slug'  => 'secondary',
			'color' => esc_html( $theme_options['secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'gt-focus' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'gt-focus' ),
			'slug'  => 'light-gray',
			'color' => '#e7e7e7',
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'gt-focus' ),
			'slug'  => 'dark-gray',
			'color' => '#575757',
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'gt-focus' ),
			'slug'  => 'black',
			'color' => '#242424',
		),
	) ) );

	// Add theme support for font sizes.
	add_theme_support( 'editor-font-sizes', apply_filters( 'gt_focus_editor_font_sizes_args', array(
		array(
			'name' => esc_html_x( 'Small', 'block font size', 'gt-focus' ),
			'size' => 16,
			'slug' => 'small',
		),
		array(
			'name' => esc_html_x( 'Medium', 'block font size', 'gt-focus' ),
			'size' => 20,
			'slug' => 'medium',
		),
		array(
			'name' => esc_html_x( 'Large', 'block font size', 'gt-focus' ),
			'size' => 24,
			'slug' => 'large',
		),
		array(
			'name' => esc_html_x( 'Extra Large', 'block font size', 'gt-focus' ),
			'size' => 36,
			'slug' => 'extra-large',
		),
	) ) );
}
add_action( 'after_setup_theme', 'gt_focus_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function gt_focus_block_editor_assets() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Enqueue Editor Styling.
	wp_enqueue_style( 'gt-focus-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), $theme_version, 'all' );

	// Enqueue Theme Settings Sidebar plugin.
	wp_enqueue_script( 'gt-focus-editor-theme-settings', get_theme_file_uri( '/assets/js/editor-theme-settings.js' ), array( 'wp-blocks', 'wp-element', 'wp-edit-post' ), $theme_version );

	$theme_settings_l10n = array(
		'plugin_title'   => esc_html__( 'Theme Settings', 'gt-focus' ),
		'page_options'   => esc_html__( 'Page Options', 'gt-focus' ),
		'page_layout'    => esc_html__( 'Page Layout', 'gt-focus' ),
		'default_layout' => esc_html__( 'Default', 'gt-focus' ),
		'full_layout'    => esc_html__( 'Full-width', 'gt-focus' ),
		'hide_title'     => esc_html__( 'Hide Title', 'gt-focus' ),
	);
	wp_localize_script( 'gt-focus-editor-theme-settings', 'gtThemeSettingsL10n', $theme_settings_l10n );
}
add_action( 'enqueue_block_editor_assets', 'gt_focus_block_editor_assets' );


/**
 * Register Post Meta
 */
function gt_focus_register_post_meta() {
	register_post_meta( 'page', 'gt_hide_page_title', array(
		'type'         => 'boolean',
		'single'       => true,
		'show_in_rest' => true,
	) );

	register_post_meta( 'page', 'gt_page_layout', array(
		'type'              => 'string',
		'single'            => true,
		'show_in_rest'      => true,
		'sanitize_callback' => 'sanitize_text_field',
	) );
}
add_action( 'init', 'gt_focus_register_post_meta' );


/**
 * Add body classes in Gutenberg Editor.
 */
function gt_focus_gutenberg_add_admin_body_class( $classes ) {
	global $post;
	$current_screen = get_current_screen();

	// Return early if we are not in the Gutenberg Editor.
	if ( ! ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) ) {
		return $classes;
	}

	// Fullwidth Page Layout?
	if ( get_post_type( $post->ID ) && 'fullwidth' === get_post_meta( $post->ID, 'gt_page_layout', true ) ) {
		$classes .= ' gt-fullwidth-page-layout ';
	}

	// Page Title hidden?
	if ( get_post_type( $post->ID ) && get_post_meta( $post->ID, 'gt_hide_page_title', true ) ) {
		$classes .= ' gt-page-title-hidden ';
	}

	return $classes;
}
add_filter( 'admin_body_class', 'gt_focus_gutenberg_add_admin_body_class' );


/**
 * Remove inline styling in Gutenberg.
 *
 * @return array $editor_settings
 */
function gt_focus_block_editor_settings( $editor_settings ) {
	// Remove editor styling.
	if ( ! current_theme_supports( 'editor-styles' ) ) {
		$editor_settings['styles'] = '';
	}

	return $editor_settings;
}
add_filter( 'block_editor_settings', 'gt_focus_block_editor_settings', 11 );
