<?php
/**
 * Template Name: No Sidebar
 * Template Post Type: post
 *
 * Description: A custom template for displaying a post without sidebar.
 *
 * @package Kairos
 */

get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/post/content', esc_html( kairos_get_option( 'post_image_single' ) ) );

	kairos_post_navigation();

	kairos_related_posts();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;

get_footer();
