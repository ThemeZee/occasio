<?php
/**
 * Implement theme options in the Customizer
 *
 * @package Occasio
 */

// Load Sanitize Functions.
require get_template_directory() . '/inc/customizer/sanitize-functions.php';

// Load Custom Controls.
require get_template_directory() . '/inc/customizer/controls/headline-control.php';
require get_template_directory() . '/inc/customizer/controls/links-control.php';
require get_template_directory() . '/inc/customizer/controls/plugin-control.php';
require get_template_directory() . '/inc/customizer/controls/upgrade-control.php';

// Load Customizer Sections.
require get_template_directory() . '/inc/customizer/sections/website-settings.php';
require get_template_directory() . '/inc/customizer/sections/layout-settings.php';
require get_template_directory() . '/inc/customizer/sections/blog-settings.php';
require get_template_directory() . '/inc/customizer/sections/post-settings.php';
require get_template_directory() . '/inc/customizer/sections/footer-settings.php';
require get_template_directory() . '/inc/customizer/sections/theme-info-settings.php';

/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 * @param object $wp_customize / Customizer Object.
 */
function occasio_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel.
	$wp_customize->add_panel(
		'occasio_options_panel',
		array(
			'priority'       => 180,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Theme Options', 'occasio' ),
		)
	);

	// Change default background section.
	$wp_customize->get_control( 'background_color' )->section = 'background_image';
	$wp_customize->get_section( 'background_image' )->title   = esc_html__( 'Background', 'occasio' );
}
add_action( 'customize_register', 'occasio_customize_register_options' );


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 */
function occasio_customize_preview_js() {
	wp_enqueue_script( 'occasio-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.min.js', array( 'customize-preview' ), '20201112', true );
}
add_action( 'customize_preview_init', 'occasio_customize_preview_js' );


/**
 * Embed JS for Customizer Controls.
 */
function occasio_customizer_controls_js() {
	wp_enqueue_script( 'occasio-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls.min.js', array(), '20201112', true );
}
add_action( 'customize_controls_enqueue_scripts', 'occasio_customizer_controls_js' );


/**
 * Embed CSS styles Customizer Controls.
 */
function occasio_customizer_controls_css() {
	wp_enqueue_style( 'occasio-customizer-controls', get_template_directory_uri() . '/assets/css/customizer-controls.css', array(), '20201112' );
}
add_action( 'customize_controls_print_styles', 'occasio_customizer_controls_css' );
