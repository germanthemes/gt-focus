<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package GT Health
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function gt_health_gutenberg_support() {

	// Get theme options from database.
	$theme_options = gt_health_theme_options();

	// Add theme support for wide and full images.
	add_theme_support( 'align-wide' );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'gt-health' ),
			'slug'  => 'primary',
			'color' => esc_html( $theme_options['block_primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'gt-health' ),
			'slug'  => 'secondary',
			'color' => esc_html( $theme_options['block_secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Accent', 'block color', 'gt-health' ),
			'slug'  => 'accent',
			'color' => esc_html( $theme_options['block_accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Complementary', 'block color', 'gt-health' ),
			'slug'  => 'complementary',
			'color' => esc_html( $theme_options['block_complementary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'gt-health' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'gt-health' ),
			'slug'  => 'light-gray',
			'color' => '#e5e5e5',
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'gt-health' ),
			'slug'  => 'dark-gray',
			'color' => '#555555',
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'gt-health' ),
			'slug'  => 'black',
			'color' => '#242424',
		),
	) );

	// Disable theme support for custom colors.
	#add_theme_support( 'disable-custom-colors' );

	// Disable theme support for custom font sizes.
	add_theme_support( 'disable-custom-font-sizes' );

	// Add theme support for font sizes.
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name'      => esc_html_x( 'Small', 'block font size', 'gt-health' ),
			'shortName' => esc_html_x( 'S', 'block font size', 'gt-health' ),
			'size'      => 16,
			'slug'      => 'small',
		),
		array(
			'name'      => esc_html_x( 'Medium', 'block font size', 'gt-health' ),
			'shortName' => esc_html_x( 'M', 'block font size', 'gt-health' ),
			'size'      => 20,
			'slug'      => 'medium',
		),
		array(
			'name'      => esc_html_x( 'Large', 'block font size', 'gt-health' ),
			'shortName' => esc_html_x( 'L', 'block font size', 'gt-health' ),
			'size'      => 24,
			'slug'      => 'large',
		),
		array(
			'name'      => esc_html_x( 'Extra Large', 'block font size', 'gt-health' ),
			'shortName' => esc_html_x( 'XL', 'block font size', 'gt-health' ),
			'size'      => 36,
			'slug'      => 'extra-large',
		),
	) );
}
add_action( 'after_setup_theme', 'gt_health_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function gt_health_block_editor_assets() {
	wp_enqueue_script( 'gt-health-block-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-editor' ), '20180529' );
	wp_enqueue_style( 'gt-health-block-editor', get_theme_file_uri( '/assets/css/editor.css' ), array(), '20180529', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'gt_health_block_editor_assets' );


/**
 * Add Page Options metabox.
 */
function gt_health_add_page_options_metabox() {
    add_meta_box( 'gt_health_page_options', __( 'GT Page Options', 'gt-health' ), 'gt_health_display_page_options_metabox', 'page', 'side' );
}
add_action( 'add_meta_boxes', 'gt_health_add_page_options_metabox' );


/**
 * Display Page Options metabox.
 */
function gt_health_display_page_options_metabox( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'gt_health_page_options_nonce' );
	$page_options = get_post_meta( $post->ID );
	?>

	<p>
		<label for="gt-hide-page-title">
            <input type="checkbox" name="gt-hide-page-title" id="gt-hide-page-title" value='1' <?php if ( isset ( $page_options['gt_hide_page_title'] ) ) checked( $page_options['gt_hide_page_title'][0], '1' ); ?> />
            <?php _e( 'Hide page title', 'gt-health' )?>
        </label>
	</p>

	<?php
}


/**
 * Saves the custom meta input
 */
function gt_health_save_page_options_metabox( $post_id ) {
 
    // Checks save status.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'gt_health_page_options_nonce' ] ) && wp_verify_nonce( $_POST[ 'gt_health_page_options_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status.
    if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
        return;
    }
 
	// Checks for input and sanitizes/saves if needed.
	if( isset( $_POST[ 'gt-hide-page-title' ] ) ) {
		update_post_meta( $post_id, 'gt_hide_page_title', '1' );
	} else {
		update_post_meta( $post_id, 'gt_hide_page_title', '' );
	}
}
add_action( 'save_post', 'gt_health_save_page_options_metabox' );