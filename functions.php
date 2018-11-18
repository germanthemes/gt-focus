<?php
/**
 * GT Health functions and definitions
 *
 * @package GT Health
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gt_health_setup() {

	// Make theme available for translation.
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gt_health_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );

	// Add Theme Support for Selective Refresh in Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
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
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gt_health_widgets_init() {

	// Register Footer Column 1 widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'gt-health' ),
		'id'            => 'footer-column-1',
		'description'   => esc_html_x( 'Appears in the first column in footer.', 'widget area description', 'gt-health' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class = "widget-title">',
		'after_title'   => '</h4>',
	) );

	// Register Footer Column 2 widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'gt-health' ),
		'id'            => 'footer-column-2',
		'description'   => esc_html_x( 'Appears in the second column in footer.', 'widget area description', 'gt-health' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class = "widget-title">',
		'after_title'   => '</h4>',
	) );

	// Register Footer Column 3 widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'gt-health' ),
		'id'            => 'footer-column-3',
		'description'   => esc_html_x( 'Appears in the third column in footer.', 'widget area description', 'gt-health' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class = "widget-title">',
		'after_title'   => '</h4>',
	) );

	// Register Footer Column 4 widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'gt-health' ),
		'id'            => 'footer-column-4',
		'description'   => esc_html_x( 'Appears in the fourth column in footer.', 'widget area description', 'gt-health' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class = "widget-title">',
		'after_title'   => '</h4>',
	) );

	// Register Footer Copyright widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Copyright', 'gt-health' ),
		'id'            => 'footer-copyright',
		'description'   => esc_html_x( 'Appears in the bottom footer line.', 'widget area description', 'gt-health' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class = "widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'gt_health_widgets_init' );


/**
 * Set up automatic theme updates.
 *
 * @return void
 */
function gt_health_theme_updater() {
	if ( '' !== gt_health_get_option( 'license_key' ) ) :

		// Setup the updater.
		$theme_updater = new GT_Health_Plugin_Updater( GT_HEALTH_STORE_API_URL, __FILE__, array(
			'version' => '1.2',
			'license' => trim( gt_health_get_option( 'license_key' ) ),
			'item_id' => GT_HEALTH_PRODUCT_ID,
			'author'  => 'ThemeZee',
		) );

	endif;
}
add_action( 'admin_init', 'gt_health_theme_updater', 0 );


/**
 * Include Files
 */

// Include Admin Classses.
require get_template_directory() . '/inc/admin/license-key.php';
require get_template_directory() . '/inc/admin/theme-updater.php';

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
