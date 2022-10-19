<?php
/**
 * Custom Markup for Search form
 *
 * @version 1.0
 * @package Occasio
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'occasio' ); ?></span>
		<input type="search" class="search-field"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'occasio' ); ?>"
			value="<?php echo get_search_query(); ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'occasio' ); ?>" />
	</label>
	<button type="submit" class="search-submit" aria-label="<?php echo esc_attr_x( 'Search', 'submit button', 'occasio' ); ?>">
		<?php echo occasio_get_svg( 'search' ); ?>
	</button>
</form>
