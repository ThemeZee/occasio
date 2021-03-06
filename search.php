<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @version 1.0
 * @package Occasio
 */

get_header();

if ( have_posts() ) :

	occasio_search_header();

	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/page/content', 'search' );

	endwhile;

	occasio_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();
