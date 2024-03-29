<?php
/**
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 * @package Occasio
 */

if ( ! function_exists( 'occasio_site_logo' ) ) :
	/**
	 * Displays the site logo in the header area
	 */
	function occasio_site_logo() {

		if ( has_custom_logo() ) : ?>

			<div class="site-logo">
				<?php the_custom_logo(); ?>
			</div>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_site_title' ) ) :
	/**
	 * Displays the site title in the header area
	 */
	function occasio_site_title() {

		if ( is_home() ) :
			?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<?php else : ?>

			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_site_description' ) ) :
	/**
	 * Displays the site description in the header area
	 */
	function occasio_site_description() {

		$description = get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */

		if ( $description || is_customize_preview() ) :
			?>

			<p class="site-description"><?php echo $description; ?></p>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_header_image' ) ) :
	/**
	 * Displays the custom header image below the navigation menu
	 */
	function occasio_header_image() {
		if ( has_header_image() ) :
			?>

			<div id="headimg" class="header-image default-header-image">

				<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id, 'full' ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

			</div>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_archive_header' ) ) :
	/**
	 * Displays the header title on archive pages.
	 */
	function occasio_archive_header() {
		?>

		<header class="archive-header entry-header">

			<?php the_archive_title( '<h1 class="archive-title entry-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

		</header><!-- .archive-header -->

		<?php
	}
endif;


if ( ! function_exists( 'occasio_search_header' ) ) :
	/**
	 * Displays the header title on search results.
	 */
	function occasio_search_header() {
		?>

		<header class="search-header entry-header">

			<h1 class="search-title entry-title">
				<?php
				// translators: Search Results title.
				printf( esc_html__( 'Search Results for: %s', 'occasio' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
			<?php get_search_form(); ?>

		</header><!-- .search-header -->

		<?php
	}
endif;


if ( ! function_exists( 'occasio_post_image_archives' ) ) :
	/**
	 * Displays the featured image on archive posts.
	 */
	function occasio_post_image_archives( $image_size = 'post-thumbnail' ) {

		// Display Post Thumbnail if activated.
		if ( has_post_thumbnail() && true === occasio_get_option( 'post_image_archives' ) ) :
			?>

			<figure class="post-image post-image-archives">
				<a class="wp-post-image-link" href="<?php the_permalink(); ?>" rel="bookmark" aria-hidden="true">
					<?php the_post_thumbnail( $image_size ); ?>
				</a>
			</figure>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_post_image_single' ) ) :
	/**
	 * Displays the featured image on single posts.
	 */
	function occasio_post_image_single() {

		// Display Post Thumbnail if activated.
		if ( has_post_thumbnail() && true === occasio_get_option( 'post_image_single' ) ) :
			?>

			<figure class="post-image post-image-single">
				<?php the_post_thumbnail(); ?>
			</figure>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_post_image_page' ) ) :
	/**
	 * Displays the featured image on static pages
	 */
	function occasio_post_image_page() {
		if ( has_post_thumbnail() ) :
			?>

			<figure class="post-image post-image-single">
				<?php the_post_thumbnail(); ?>
			</figure>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_entry_meta' ) ) :
	/**
	 * Displays the date and author of a post
	 */
	function occasio_entry_meta() {

		$postmeta  = occasio_entry_categories();
		$postmeta .= occasio_entry_date();
		$postmeta .= occasio_entry_author();
		$postmeta .= occasio_entry_comments();

		echo '<div class="entry-meta">' . $postmeta . '</div>';
	}
endif;


if ( ! function_exists( 'occasio_entry_date' ) ) :
	/**
	 * Returns the post date
	 */
	function occasio_entry_date() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		return '<span class="posted-on">' . $posted_on . '</span>';
	}
endif;


if ( ! function_exists( 'occasio_entry_author' ) ) :
	/**
	 * Returns the post author
	 */
	function occasio_entry_author() {

		$author_string = sprintf(
			'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			// translators: post author link.
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'occasio' ), get_the_author() ) ),
			esc_html( get_the_author() )
		);

		return '<span class="posted-by"> ' . $author_string . '</span>';
	}
endif;


if ( ! function_exists( 'occasio_entry_categories' ) ) :
	/**
	 * Displays the post categories
	 */
	function occasio_entry_categories() {

		// Return early if post has no category.
		if ( ! has_category() ) {
			return;
		}

		$categories = get_the_category_list( '' );

		return '<div class="entry-categories"> ' . $categories . '</div>';
	}
endif;


if ( ! function_exists( 'occasio_entry_comments' ) ) :
	/**
	 * Displays the post comments
	 */
	function occasio_entry_comments() {

		// Check if comments are open or we have at least one comment.
		if ( ! ( comments_open() || get_comments_number() ) ) {
			return;
		}

		// Start Output Buffering.
		ob_start();

		// Display Comments.
		comments_popup_link(
			esc_html__( 'No comments', 'occasio' ),
			esc_html__( '1 comment', 'occasio' ),
			esc_html__( '% comments', 'occasio' )
		);
		$comments = ob_get_contents();

		// End Output Buffering.
		ob_end_clean();

		return '<span class="entry-comments"> ' . $comments . '</span>';
	}
endif;


if ( ! function_exists( 'occasio_entry_tags' ) ) :
	/**
	 * Displays the post tags on single post view
	 */
	function occasio_entry_tags() {
		// Get tags.
		$tag_list = get_the_tag_list( sprintf( '<span class="entry-tags-label screen-reader-text">%s</span>', esc_html__( 'Tags', 'occasio' ) ) );

		// Display tags.
		if ( $tag_list ) :
			echo '<div class="entry-tags">' . $tag_list . '</div>';
		endif;
	}
endif;


if ( ! function_exists( 'occasio_more_link' ) ) :
	/**
	 * Displays the more link on posts
	 */
	function occasio_more_link() {

		// Get Read More Text.
		$read_more = occasio_get_option( 'read_more_link' );

		if ( '' !== $read_more || is_customize_preview() ) :
			?>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="more-link"><?php echo esc_html( $read_more ); ?></a>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_post_navigation' ) ) :
	/**
	 * Displays Single Post Navigation
	 */
	function occasio_post_navigation() {

		if ( true === occasio_get_option( 'post_navigation' ) || is_customize_preview() ) :

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-link-text">' . esc_html_x( 'Previous Post', 'post navigation', 'occasio' ) . '</span><h3 class="entry-title">%title</h3>',
					'next_text' => '<span class="nav-link-text">' . esc_html_x( 'Next Post', 'post navigation', 'occasio' ) . '</span><h3 class="entry-title">%title</h3>',
				)
			);

		endif;
	}
endif;


if ( ! function_exists( 'occasio_pagination' ) ) :
	/**
	 * Displays pagination on archive pages
	 */
	function occasio_pagination() {

		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => '&laquo;<span class="screen-reader-text">' . esc_html_x( 'Previous Posts', 'pagination', 'occasio' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . esc_html_x( 'Next Posts', 'pagination', 'occasio' ) . '</span>&raquo;',
			)
		);

	}
endif;


if ( ! function_exists( 'occasio_footer_text' ) ) :
	/**
	 * Displays footer text on footer line
	 */
	function occasio_footer_text() {
		if ( '' !== occasio_get_option( 'footer_text' ) || is_customize_preview() ) :
			?>

			<span class="footer-text">
				<?php echo do_shortcode( wp_kses_post( occasio_get_option( 'footer_text' ) ) ); ?> 
			</span>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_credit_link' ) ) :
	/**
	 * Displays credit link on footer line
	 */
	function occasio_credit_link() {
		if ( true === occasio_get_option( 'credit_link' ) || is_customize_preview() ) :
			?>

			<span class="credit-link">
				<?php
				// translators: Theme Name and Link to ThemeZee.
				printf(
					esc_html__( 'WordPress Theme: %1$s by %2$s.', 'occasio' ),
					esc_html__( 'Occasio', 'occasio' ),
					'ThemeZee'
				);
				?>
			</span>

			<?php
		endif;
	}
endif;


if ( ! function_exists( 'occasio_breadcrumbs' ) ) :
	/**
	 * Displays ThemeZee Breadcrumbs plugin
	 */
	function occasio_breadcrumbs() {

		if ( function_exists( 'themezee_breadcrumbs' ) ) {

			themezee_breadcrumbs(
				array(
					'before' => '<div class="breadcrumbs-container">',
					'after'  => '</div>',
				)
			);

		}
	}
endif;


if ( ! function_exists( 'occasio_related_posts' ) ) :
	/**
	 * Displays ThemeZee Related Posts plugin
	 */
	function occasio_related_posts() {

		if ( function_exists( 'themezee_related_posts' ) ) {

			themezee_related_posts(
				array(
					'container'    => 'div',
					'class'        => 'related-posts',
					'before_title' => '<header class="archive-header related-posts-header entry-header"><h2 class="archive-title related-posts-title entry-title">',
					'after_title'  => '</h2></header>',
				)
			);

		}
	}
endif;
