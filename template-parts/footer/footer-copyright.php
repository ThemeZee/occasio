<?php
/**
 * Footer Copyright
 *
 * @version 1.0
 * @package Kairos
 */


// Check if there is footer content available.
if ( is_active_sidebar( 'footer-copyright' ) || true === kairos_get_option( 'credit_link' ) || '' !== kairos_get_option( 'footer_text' ) ) :
	?>

	<div id="footer-line" class="site-info">

		<?php dynamic_sidebar( 'footer-copyright' ); ?>
		<?php kairos_footer_text(); ?>
		<?php kairos_credit_link(); ?>

	</div>

	<?php
endif;
