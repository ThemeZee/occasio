<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package Kairos
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function kairos_gutenberg_support() {

	// Add theme support for wide and full images.
	add_theme_support( 'align-wide' );

	// Define block color palette.
	$color_palette = apply_filters( 'kairos_color_palette', array(
		'primary_color'    => '#2a4861',
		'secondary_color'  => '#5d7b94',
		'tertiary_color'   => '#90aec7',
		'accent_color'     => '#60945d',
		'contrast_color'   => '#e63e4c',
		'highlight_color'  => '#915d94',
		'light_gray_color' => '#ededef',
		'gray_color'       => '#84848f',
		'dark_gray_color'  => '#24242f',
	) );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', apply_filters( 'kairos_editor_color_palette_args', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'kairos' ),
			'slug'  => 'primary',
			'color' => esc_html( $color_palette['primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'kairos' ),
			'slug'  => 'secondary',
			'color' => esc_html( $color_palette['secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Tertiary', 'block color', 'kairos' ),
			'slug'  => 'tertiary',
			'color' => esc_html( $color_palette['tertiary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Accent', 'block color', 'kairos' ),
			'slug'  => 'accent',
			'color' => esc_html( $color_palette['accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Contrast', 'block color', 'kairos' ),
			'slug'  => 'contrast',
			'color' => esc_html( $color_palette['contrast_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Highlight', 'block color', 'kairos' ),
			'slug'  => 'highlight',
			'color' => esc_html( $color_palette['highlight_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'kairos' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'kairos' ),
			'slug'  => 'light-gray',
			'color' => esc_html( $color_palette['light_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Gray', 'block color', 'kairos' ),
			'slug'  => 'gray',
			'color' => esc_html( $color_palette['gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'kairos' ),
			'slug'  => 'dark-gray',
			'color' => esc_html( $color_palette['dark_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'kairos' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
	) ) );

	// Add theme support for font sizes.
	add_theme_support( 'editor-font-sizes', apply_filters( 'kairos_editor_font_sizes_args', array(
		array(
			'name' => esc_html_x( 'Small', 'block font size', 'kairos' ),
			'size' => 16,
			'slug' => 'small',
		),
		array(
			'name' => esc_html_x( 'Medium', 'block font size', 'kairos' ),
			'size' => 24,
			'slug' => 'medium',
		),
		array(
			'name' => esc_html_x( 'Large', 'block font size', 'kairos' ),
			'size' => 36,
			'slug' => 'large',
		),
		array(
			'name' => esc_html_x( 'Extra Large', 'block font size', 'kairos' ),
			'size' => 48,
			'slug' => 'extra-large',
		),
		array(
			'name' => esc_html_x( 'Huge', 'block font size', 'kairos' ),
			'size' => 64,
			'slug' => 'huge',
		),
	) ) );
}
add_action( 'after_setup_theme', 'kairos_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function kairos_block_editor_assets() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Enqueue Editor Styling.
	wp_enqueue_style( 'kairos-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), $theme_version, 'all' );

	// Enqueue Page Template Switcher Editor plugin.
	wp_enqueue_script( 'kairos-page-template-switcher', get_theme_file_uri( '/assets/js/page-template-switcher.js' ), array( 'wp-blocks', 'wp-element', 'wp-edit-post' ), $theme_version );
}
add_action( 'enqueue_block_editor_assets', 'kairos_block_editor_assets' );


/**
 * Remove inline styling in Gutenberg.
 *
 * @return array $editor_settings
 */
function kairos_block_editor_settings( $editor_settings ) {
	// Remove editor styling.
	if ( ! current_theme_supports( 'editor-styles' ) ) {
		$editor_settings['styles'] = '';
	}

	return $editor_settings;
}
add_filter( 'block_editor_settings', 'kairos_block_editor_settings', 11 );


/**
 * Add body classes in Gutenberg Editor.
 */
function kairos_block_editor_body_classes( $classes ) {
	global $post;
	$current_screen = get_current_screen();

	// Return early if we are not in the Gutenberg Editor.
	if ( ! ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) ) {
		return $classes;
	}

	// Set Theme Layout.
	if ( 'wide' === kairos_get_option( 'theme_layout' ) ) {
		$classes .= ' kairos-wide-theme-layout ';
	} else {
		$classes .= ' kairos-centered-theme-layout ';
	}

	// Fullwidth Page Template?
	if ( 'templates/template-fullwidth.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' kairos-fullwidth-page-layout ';
	}

	// No Title Page Template?
	if ( 'templates/template-no-title.php' === get_page_template_slug( $post->ID ) or
		'templates/template-sidebar-left-no-title.php' === get_page_template_slug( $post->ID ) or
		'templates/template-sidebar-right-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' kairos-page-title-hidden ';
	}

	// Full-width / No Title Page Template?
	if ( 'templates/template-fullwidth-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' kairos-fullwidth-page-layout kairos-page-title-hidden ';
	}

	return $classes;
}
add_filter( 'admin_body_class', 'kairos_block_editor_body_classes' );
