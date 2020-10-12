<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Kairos
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function kairos_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'kairos_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'kairos' ),
		'priority' => 50,
		'panel'    => 'kairos_options_panel',
	) );

	// Get Default Settings.
	$default = kairos_default_options();

	// Add Post Details Headline.
	$wp_customize->add_control( new Kairos_Customize_Header_Control(
		$wp_customize, 'kairos_theme_options[post_details]', array(
			'label'    => esc_html__( 'Post Details', 'kairos' ),
			'section'  => 'kairos_section_post',
			'settings' => array(),
			'priority' => 20,
		)
	) );

	// Add Setting and Control for showing post date.
	$wp_customize->add_setting( 'kairos_theme_options[meta_date]', array(
		'default'           => $default['meta_date'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kairos_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display date', 'kairos' ),
		'section'  => 'kairos_section_post',
		'settings' => 'kairos_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	// Add Setting and Control for showing post author.
	$wp_customize->add_setting( 'kairos_theme_options[meta_author]', array(
		'default'           => $default['meta_author'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kairos_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display author', 'kairos' ),
		'section'  => 'kairos_section_post',
		'settings' => 'kairos_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	// Add Setting and Control for showing post comments.
	$wp_customize->add_setting( 'kairos_theme_options[meta_comments]', array(
		'default'           => $default['meta_comments'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kairos_theme_options[meta_comments]', array(
		'label'    => esc_html__( 'Display comments', 'kairos' ),
		'section'  => 'kairos_section_post',
		'settings' => 'kairos_theme_options[meta_comments]',
		'type'     => 'checkbox',
		'priority' => 50,
	) );

	// Add Setting and Control for showing post categories.
	$wp_customize->add_setting( 'kairos_theme_options[meta_categories]', array(
		'default'           => $default['meta_categories'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kairos_theme_options[meta_categories]', array(
		'label'    => esc_html__( 'Display categories', 'kairos' ),
		'section'  => 'kairos_section_post',
		'settings' => 'kairos_theme_options[meta_categories]',
		'type'     => 'checkbox',
		'priority' => 60,
	) );

	// Add Single Post Headline.
	$wp_customize->add_control( new Kairos_Customize_Header_Control(
		$wp_customize, 'kairos_theme_options[single_post]', array(
			'label'    => esc_html__( 'Single Post', 'kairos' ),
			'section'  => 'kairos_section_post',
			'settings' => array(),
			'priority' => 70,
		)
	) );

	// Add Setting and Control for showing post tags.
	$wp_customize->add_setting( 'kairos_theme_options[meta_tags]', array(
		'default'           => $default['meta_tags'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kairos_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display tags', 'kairos' ),
		'section'  => 'kairos_section_post',
		'settings' => 'kairos_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 80,
	) );

	// Add Setting and Control for showing post navigation.
	$wp_customize->add_setting( 'kairos_theme_options[post_navigation]', array(
		'default'           => $default['post_navigation'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kairos_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display previous/next post navigation', 'kairos' ),
		'section'  => 'kairos_section_post',
		'settings' => 'kairos_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 90,
	) );

	// Add Featured Images Headline.
	$wp_customize->add_control( new Kairos_Customize_Header_Control(
		$wp_customize, 'kairos_theme_options[featured_images]', array(
			'label'    => esc_html__( 'Featured Images', 'kairos' ),
			'section'  => 'kairos_section_post',
			'settings' => array(),
			'priority' => 100,
		)
	) );

	// Add Setting and Control for featured images on blog and archives.
	$wp_customize->add_setting( 'kairos_theme_options[post_image_archives]', array(
		'default'           => $default['post_image_archives'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'kairos_theme_options[post_image_archives]', array(
		'label'    => esc_html__( 'Display images on blog and archives', 'kairos' ),
		'section'  => 'kairos_section_post',
		'settings' => 'kairos_theme_options[post_image_archives]',
		'type'     => 'checkbox',
		'priority' => 110,
	) );

	$wp_customize->selective_refresh->add_partial( 'kairos_theme_options[post_image_archives]', array(
		'selector'         => '.site-main .post-wrapper',
		'render_callback'  => 'kairos_customize_partial_blog_layout',
		'fallback_refresh' => false,
	) );

	// Add Setting and Control for featured images on single posts.
	$wp_customize->add_setting( 'kairos_theme_options[post_image_single]', array(
		'default'           => $default['post_image_single'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'kairos_sanitize_select',
	) );

	$wp_customize->add_control( 'kairos_theme_options[post_image_single]', array(
		'label'    => esc_html__( 'Featured Images on Single Posts', 'kairos' ),
		'section'  => 'kairos_section_post',
		'settings' => 'kairos_theme_options[post_image_single]',
		'type'     => 'select',
		'priority' => 120,
		'choices'  => array(
			'header-image' => esc_html__( 'Display image in the header', 'kairos' ),
			'above-title'  => esc_html__( 'Display image above post title', 'kairos' ),
			'below-title'  => esc_html__( 'Display image below post title', 'kairos' ),
			'hide-image'   => esc_html__( 'Hide featured image', 'kairos' ),
		),
	) );

	$wp_customize->selective_refresh->add_partial( 'kairos_theme_options[post_image_single]', array(
		'selector'         => '.single-post .site-main',
		'render_callback'  => 'kairos_customize_partial_single_post',
		'fallback_refresh' => false,
	) );
}
add_action( 'customize_register', 'kairos_customize_register_post_settings' );


/**
 * Render single posts partial
 */
function kairos_customize_partial_single_post() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', esc_html( kairos_get_option( 'post_image_single' ) ) );
	}
}
