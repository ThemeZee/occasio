<?php
/**
 * The template for displaying single posts
 *
 * @version 1.0
 * @package Kairos
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post-header entry-header">

		<?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>

		<?php kairos_entry_meta(); ?>

		<?php kairos_entry_categories(); ?>

	</header><!-- .entry-header -->

	<?php kairos_post_image_single(); ?>

	<?php get_template_part( 'template-parts/entry/entry', 'single' ); ?>

</article>
