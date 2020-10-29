<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Kairos
 */

/**
* Get a single theme option
*
* @return mixed
*/
function kairos_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = kairos_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function kairos_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'kairos_theme_options', array() ), kairos_default_options() );

	// Return theme options.
	return apply_filters( 'kairos_theme_options', $theme_options );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function kairos_default_options() {

	$default_options = array(
		'retina_logo'         => false,
		'site_title'          => true,
		'site_description'    => true,
		'theme_layout'        => 'centered',
		'header_layout'       => 'horizontal',
		'blog_layout'         => 'vertical-list',
		'blog_content'        => 'excerpt',
		'excerpt_length'      => 25,
		'excerpt_more_text'   => '[...]',
		'read_more_link'      => esc_html__( 'Continue reading', 'kairos' ),
		'meta_date'           => true,
		'meta_author'         => true,
		'meta_comments'       => false,
		'meta_categories'     => true,
		'meta_tags'           => true,
		'post_navigation'     => true,
		'post_image_archives' => true,
		'post_image_single'   => true,
		'footer_text'         => '',
		'credit_link'         => true,
	);

	return apply_filters( 'kairos_default_options', $default_options );
}
