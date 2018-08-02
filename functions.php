<?php
/**
 * GT Health functions and definitions
 *
 * @package GT Health
 */

/**
 * GT Health only works in WordPress 5.0 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.0-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}


if ( ! function_exists( 'gt_health_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gt_health_setup() {

		// Make theme available for translation. Translations can be filed at https://translate.wordpress.org/projects/wp-themes/gt-health
		load_theme_textdomain( 'gt-health', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set default Post Thumbnail size.
		set_post_thumbnail_size( 720, 360, true );

		// Register Navigation Menus.
		register_nav_menus( array(
			'primary' => esc_html__( 'Main Navigation', 'gt-health' ),
		) );

		// Switch default core markup for galleries and captions to output valid HTML5.
		add_theme_support( 'html5', array(
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom logo feature.
		add_theme_support( 'custom-logo', apply_filters( 'gt_health_custom_logo_args', array(
			'height'      => 60,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		) ) );

		// Set up the WordPress core custom header feature.
		add_theme_support( 'custom-header', apply_filters( 'gt_health_custom_header_args', array(
			'header-text' => false,
			'width'       => 2560,
			'height'      => 480,
			'flex-height' => true,
		) ) );

		// Add Theme Support for Selective Refresh in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'gt_health_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gt_health_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gt_health_content_width', 1040 );
}
add_action( 'after_setup_theme', 'gt_health_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function gt_health_scripts() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Register and Enqueue Stylesheet.
	wp_enqueue_style( 'gt-health-stylesheet', get_stylesheet_uri(), array(), $theme_version );

	// Register and enqueue navigation.js.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script( 'gt-health-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$gt_health_l10n = array(
			'expand'   => esc_html__( 'Expand child menu', 'gt-health' ),
			'collapse' => esc_html__( 'Collapse child menu', 'gt-health' ),
			'icon'     => gt_health_get_svg( 'expand' ),
		);
		wp_localize_script( 'gt-health-navigation', 'gtHealthScreenReaderText', $gt_health_l10n );
	}

	// Enqueue svgxuse to support external SVG Sprites in Internet Explorer.
	wp_enqueue_script( 'svgxuse', get_theme_file_uri( '/assets/js/svgxuse.min.js' ), array(), '1.2.4' );
}
add_action( 'wp_enqueue_scripts', 'gt_health_scripts' );


/**
 * Enqueue block styles for Gutenberg Editor.
 */
function gt_health_block_editor_styles() {
	wp_enqueue_style( 'gt-health-block-editor-styles', get_theme_file_uri( '/assets/css/editor.css' ), array(), '20180529', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'gt_health_block_editor_styles' );


/**
 * Include Files
 */

// Include Customizer Options.
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include SVG Icon Functions.
require get_template_directory() . '/inc/icons.php';

// Include Template Functions.
require get_template_directory() . '/inc/template-functions.php';

// Include Template Tags.
require get_template_directory() . '/inc/template-tags.php';

// Include Gutenberg Features.
require get_template_directory() . '/inc/gutenberg.php';

// Include Customization Features.
require get_template_directory() . '/inc/custom-colors.php';
require get_template_directory() . '/inc/custom-fonts.php';
