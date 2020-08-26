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
			'name'  => esc_html_x( 'Accent', 'block color', 'gt-focus' ),
			'slug'  => 'accent',
			'color' => esc_html( $theme_options['accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Highlight', 'block color', 'gt-focus' ),
			'slug'  => 'highlight',
			'color' => esc_html( $theme_options['highlight_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'gt-focus' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'gt-focus' ),
			'slug'  => 'light-gray',
			'color' => esc_html( $theme_options['light_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Gray', 'block color', 'gt-focus' ),
			'slug'  => 'gray',
			'color' => esc_html( $theme_options['gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'gt-focus' ),
			'slug'  => 'dark-gray',
			'color' => esc_html( $theme_options['dark_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'gt-focus' ),
			'slug'  => 'black',
			'color' => '#000000',
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

	// Register Small Buttons Block style.
	register_block_style( 'core/buttons', array(
		'name'         => 'gt-small',
		'label'        => esc_html__( 'GT Small', 'gt-focus' ),
		'style_handle' => 'gt-focus-stylesheet',
	) );

	// Register Medium Buttons Block style.
	register_block_style( 'core/buttons', array(
		'name'         => 'gt-medium',
		'label'        => esc_html__( 'GT Medium', 'gt-focus' ),
		'style_handle' => 'gt-focus-stylesheet',
	) );

	// Register Large Buttons Block style.
	register_block_style( 'core/buttons', array(
		'name'         => 'gt-large',
		'label'        => esc_html__( 'GT Large', 'gt-focus' ),
		'style_handle' => 'gt-focus-stylesheet',
	) );

	// Register block pattern category.
	register_block_pattern_category( 'gt-focus', array( 'label' => esc_html__( 'GT Focus', 'gt-focus' ) ) );

	// Register Block patterns.
	register_block_pattern( 'gt-focus/hero-section', array(
		'title'      => esc_html__( 'Hero Section', 'gt-focus' ),
		'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"primary\",\"textColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-color has-primary-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:spacer {\"height\":50} --><div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div><!-- /wp:spacer --><!-- wp:columns --><div class=\"wp-block-columns\"><!-- wp:column {\"verticalAlignment\":\"center\"} --><div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":1,\"fontSize\":\"extra-large\"} --><h1 class=\"has-extra-large-font-size\">Hero Heading</h1><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
		'categories' => array( 'gt-focus' ),
	) );

	register_block_pattern( 'gt-focus/call-to-action', array(
		'title'      => esc_html__( 'Call to Action', 'gt-focus' ),
		'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"secondary\",\"textColor\":\"white\",\"gtRemoveMarginBottom\":true} --><div class=\"wp-block-group alignfull has-white-color has-secondary-background-color has-text-color has-background gt-remove-margin-bottom\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"gtRemoveMarginBottom\":true} --><div class=\"wp-block-columns are-vertically-aligned-center gt-remove-margin-bottom\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":66.66} --><div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:66.66%\"><!-- wp:paragraph {\"fontSize\":\"large\",\"gtRemoveMarginBottom\":true} --><p class=\"has-large-font-size gt-remove-margin-bottom\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":33.33} --><div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:33.33%\"><!-- wp:buttons {\"className\":\"is-style-gt-large\",\"gtRemoveMarginBottom\":true} --><div class=\"wp-block-buttons is-style-gt-large gt-remove-margin-bottom\"><!-- wp:button {\"className\":\"is-style-outline\"} --><div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">Button</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
		'categories' => array( 'gt-focus' ),
	) );

	register_block_pattern( 'gt-focus/services', array(
		'title'      => esc_html__( 'Services', 'gt-focus' ),
		'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"light-gray\"} --><div class=\"wp-block-group alignfull has-light-gray-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text {\"align\":\"\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-media-text is-stacked-on-mobile has-white-background-color has-background\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:paragraph {\"fontSize\":\"large\"} --><p class=\"has-large-font-size\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --><!-- wp:columns --><div class=\"wp-block-columns\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"white\"} --><div class=\"wp-block-group has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Service 01</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"white\"} --><div class=\"wp-block-group has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Service 02</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"white\"} --><div class=\"wp-block-group has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Service 03</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
		'categories' => array( 'gt-focus' ),
	) );

	register_block_pattern( 'gt-focus/portfolio', array(
		'title'      => esc_html__( 'Portfolio', 'gt-focus' ),
		'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns --><div class=\"wp-block-columns\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"secondary\",\"textColor\":\"white\"} --><div class=\"wp-block-group has-white-color has-secondary-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3,\"textColor\":\"white\"} --><h3 class=\"has-white-color has-text-color\">Project 01</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"primary\",\"textColor\":\"white\"} --><div class=\"wp-block-group has-white-color has-primary-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3,\"textColor\":\"white\"} --><h3 class=\"has-white-color has-text-color\">Project 02</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:group {\"backgroundColor\":\"secondary\",\"textColor\":\"white\"} --><div class=\"wp-block-group has-white-color has-secondary-background-color has-text-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"className\":\"is-style-default\"} --><figure class=\"wp-block-image is-style-default\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3,\"textColor\":\"white\"} --><h3 class=\"has-white-color has-text-color\">Project 03</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div></div><!-- /wp:group --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
		'categories' => array( 'gt-focus' ),
	) );
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
		'plugin_title'         => esc_html__( 'Theme Settings', 'gt-focus' ),
		'page_options'         => esc_html__( 'Page Options', 'gt-focus' ),
		'page_layout'          => esc_html__( 'Page Layout', 'gt-focus' ),
		'default_layout'       => esc_html__( 'Default', 'gt-focus' ),
		'full_layout'          => esc_html__( 'Full-width', 'gt-focus' ),
		'hide_title'           => esc_html__( 'Hide title?', 'gt-focus' ),
		'remove_bottom_margin' => esc_html__( 'Remove bottom margin?', 'gt-focus' ),
	);
	wp_localize_script( 'gt-focus-editor-theme-settings', 'gtThemeSettingsL10n', $theme_settings_l10n );
}
add_action( 'enqueue_block_editor_assets', 'gt_focus_block_editor_assets' );


/**
 * Register Post Meta
 */
function gt_focus_register_post_meta() {
	register_post_meta( 'page', 'gt_page_layout', array(
		'type'              => 'string',
		'single'            => true,
		'show_in_rest'      => true,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	register_post_meta( 'page', 'gt_hide_page_title', array(
		'type'         => 'boolean',
		'single'       => true,
		'show_in_rest' => true,
	) );

	register_post_meta( 'page', 'gt_remove_bottom_margin', array(
		'type'         => 'boolean',
		'single'       => true,
		'show_in_rest' => true,
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

	// Remove bottom margin of page?
	if ( get_post_type( $post->ID ) && get_post_meta( $post->ID, 'gt_remove_bottom_margin', true ) ) {
		$classes .= ' gt-page-bottom-margin-removed ';
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
