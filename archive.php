<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @version 1.0
 * @package Kairos
 */

get_header();

if ( have_posts() ) :
	?>

	<?php kairos_archive_header(); ?>

	<div id="post-wrapper" class="post-wrapper">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/blog/content', esc_html( kairos_get_option( 'blog_layout' ) ) );

	endwhile;
	?>

	</div>

	<?php
	kairos_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();
