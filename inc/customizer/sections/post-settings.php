<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Occasio
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function occasio_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section(
		'occasio_section_post',
		array(
			'title'    => esc_html__( 'Post Settings', 'occasio' ),
			'priority' => 50,
			'panel'    => 'occasio_options_panel',
		)
	);

	// Get Default Settings.
	$default = occasio_default_options();

	// Add Featured Images Headline.
	$wp_customize->add_control(
		new Occasio_Customize_Header_Control(
			$wp_customize,
			'occasio_theme_options[featured_images]',
			array(
				'label'    => esc_html__( 'Featured Images', 'occasio' ),
				'section'  => 'occasio_section_post',
				'settings' => array(),
				'priority' => 10,
			)
		)
	);

	// Add Setting and Control for featured images on blog and archives.
	$wp_customize->add_setting(
		'occasio_theme_options[post_image_archives]',
		array(
			'default'           => $default['post_image_archives'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[post_image_archives]',
		array(
			'label'    => esc_html__( 'Display images on blog and archives', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[post_image_archives]',
			'type'     => 'checkbox',
			'priority' => 20,
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'occasio_theme_options[post_image_archives]',
		array(
			'selector'         => '.site-main .post-wrapper',
			'render_callback'  => 'occasio_customize_partial_blog_layout',
			'fallback_refresh' => false,
		)
	);

	// Add Setting and Control for featured images on single posts.
	$wp_customize->add_setting(
		'occasio_theme_options[post_image_single]',
		array(
			'default'           => $default['post_image_single'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[post_image_single]',
		array(
			'label'    => esc_html__( 'Display images on single posts', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[post_image_single]',
			'type'     => 'checkbox',
			'priority' => 30,
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'occasio_theme_options[post_image_single]',
		array(
			'selector'         => '.single-post .site-main',
			'render_callback'  => 'occasio_customize_partial_single_post',
			'fallback_refresh' => false,
		)
	);

	// Add Post Details Headline.
	$wp_customize->add_control(
		new Occasio_Customize_Header_Control(
			$wp_customize,
			'occasio_theme_options[post_details_blog]',
			array(
				'label'    => esc_html__( 'Post Details on blog and archives', 'occasio' ),
				'section'  => 'occasio_section_post',
				'settings' => array(),
				'priority' => 40,
			)
		)
	);

	// Add Setting and Control for showing post date.
	$wp_customize->add_setting(
		'occasio_theme_options[meta_date]',
		array(
			'default'           => $default['meta_date'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[meta_date]',
		array(
			'label'    => esc_html__( 'Display date', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[meta_date]',
			'type'     => 'checkbox',
			'priority' => 50,
		)
	);

	// Add Setting and Control for showing post author.
	$wp_customize->add_setting(
		'occasio_theme_options[meta_author]',
		array(
			'default'           => $default['meta_author'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[meta_author]',
		array(
			'label'    => esc_html__( 'Display author', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[meta_author]',
			'type'     => 'checkbox',
			'priority' => 60,
		)
	);

	// Add Setting and Control for showing post categories.
	$wp_customize->add_setting(
		'occasio_theme_options[meta_categories]',
		array(
			'default'           => $default['meta_categories'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[meta_categories]',
		array(
			'label'    => esc_html__( 'Display categories', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[meta_categories]',
			'type'     => 'checkbox',
			'priority' => 70,
		)
	);

	// Add Setting and Control for showing post comments.
	$wp_customize->add_setting(
		'occasio_theme_options[meta_comments]',
		array(
			'default'           => $default['meta_comments'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[meta_comments]',
		array(
			'label'    => esc_html__( 'Display comments', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[meta_comments]',
			'type'     => 'checkbox',
			'priority' => 80,
		)
	);

	// Add Post Details Headline.
	$wp_customize->add_control(
		new Occasio_Customize_Header_Control(
			$wp_customize,
			'occasio_theme_options[post_details_single]',
			array(
				'label'    => esc_html__( 'Post Details on single posts', 'occasio' ),
				'section'  => 'occasio_section_post',
				'settings' => array(),
				'priority' => 90,
			)
		)
	);

	// Add Setting and Control for showing post date.
	$wp_customize->add_setting(
		'occasio_theme_options[single_meta_date]',
		array(
			'default'           => $default['single_meta_date'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[single_meta_date]',
		array(
			'label'    => esc_html__( 'Display date', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[single_meta_date]',
			'type'     => 'checkbox',
			'priority' => 100,
		)
	);

	// Add Setting and Control for showing post author.
	$wp_customize->add_setting(
		'occasio_theme_options[single_meta_author]',
		array(
			'default'           => $default['single_meta_author'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[single_meta_author]',
		array(
			'label'    => esc_html__( 'Display author', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[single_meta_author]',
			'type'     => 'checkbox',
			'priority' => 110,
		)
	);

	// Add Setting and Control for showing post categories.
	$wp_customize->add_setting(
		'occasio_theme_options[single_meta_categories]',
		array(
			'default'           => $default['single_meta_categories'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[single_meta_categories]',
		array(
			'label'    => esc_html__( 'Display categories', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[single_meta_categories]',
			'type'     => 'checkbox',
			'priority' => 120,
		)
	);

	// Add Setting and Control for showing post comments.
	$wp_customize->add_setting(
		'occasio_theme_options[single_meta_comments]',
		array(
			'default'           => $default['single_meta_comments'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[single_meta_comments]',
		array(
			'label'    => esc_html__( 'Display comments', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[single_meta_comments]',
			'type'     => 'checkbox',
			'priority' => 130,
		)
	);

	// Add Single Post Headline.
	$wp_customize->add_control(
		new Occasio_Customize_Header_Control(
			$wp_customize,
			'occasio_theme_options[single_post]',
			array(
				'label'    => esc_html__( 'Single Post', 'occasio' ),
				'section'  => 'occasio_section_post',
				'settings' => array(),
				'priority' => 140,
			)
		)
	);

	// Add Setting and Control for showing post tags.
	$wp_customize->add_setting(
		'occasio_theme_options[meta_tags]',
		array(
			'default'           => $default['meta_tags'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[meta_tags]',
		array(
			'label'    => esc_html__( 'Display tags', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[meta_tags]',
			'type'     => 'checkbox',
			'priority' => 150,
		)
	);

	// Add Setting and Control for showing post navigation.
	$wp_customize->add_setting(
		'occasio_theme_options[post_navigation]',
		array(
			'default'           => $default['post_navigation'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'occasio_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'occasio_theme_options[post_navigation]',
		array(
			'label'    => esc_html__( 'Display previous/next post navigation', 'occasio' ),
			'section'  => 'occasio_section_post',
			'settings' => 'occasio_theme_options[post_navigation]',
			'type'     => 'checkbox',
			'priority' => 160,
		)
	);
}
add_action( 'customize_register', 'occasio_customize_register_post_settings' );


/**
 * Render single posts partial
 */
function occasio_customize_partial_single_post() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/post/content', 'single' );
	}
}
