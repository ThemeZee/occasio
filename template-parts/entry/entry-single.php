<?php
/**
 * The template for displaying the full content of a single post
 *
 * @version 1.0
 * @package Kairos
 */
?>

<div class="entry-content">

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>

</div><!-- .entry-content -->

<?php do_action( 'kairos_after_posts' ); ?>
<?php do_action( 'kairos_author_bio' ); ?>
<?php kairos_entry_tags(); ?>
