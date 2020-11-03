<?php
/**
 * Layout Settings
 *
 * Register Layout Settings section, settings and controls for Theme Customizer
 *
 * @package Kairos
 */

/**
 * Adds Layout settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function kairos_customize_register_layout_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'kairos_section_layout', array(
		'title'    => esc_html__( 'Layout Settings', 'kairos' ),
		'priority' => 10,
		'panel'    => 'kairos_options_panel',
	) );

	// Get Default Settings.
	$default = kairos_default_options();

	// Add Settings and Controls for Theme Layout.
	$wp_customize->add_setting( 'kairos_theme_options[theme_layout]', array(
		'default'           => $default['theme_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_select',
	) );

	$wp_customize->add_control( 'kairos_theme_options[theme_layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'kairos' ),
		'section'  => 'kairos_section_layout',
		'settings' => 'kairos_theme_options[theme_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'centered' => esc_html__( 'Centered Layout', 'kairos' ),
			'wide'     => esc_html__( 'Wide Layout', 'kairos' ),
		),
	) );

	// Add Settings and Controls for Sidebar Position.
	$wp_customize->add_setting( 'kairos_theme_options[sidebar_position]', array(
		'default'           => 'right-sidebar',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_select',
	) );

	$wp_customize->add_control( 'kairos_theme_options[sidebar_position]', array(
		'label'    => esc_html__( 'Sidebar Position', 'kairos' ),
		'section'  => 'kairos_section_layout',
		'settings' => 'kairos_theme_options[sidebar_position]',
		'type'     => 'radio',
		'priority' => 20,
		'choices'  => array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'kairos' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'kairos' ),
		),
	) );
}
add_action( 'customize_register', 'kairos_customize_register_layout_settings' );
