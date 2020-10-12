<?php
/**
 * Main Navigation
 *
 * @version 1.1
 * @package Kairos
 */
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<button class="primary-menu-toggle menu-toggle" aria-controls="primary-menu" aria-expanded="false" <?php kairos_amp_menu_toggle(); ?>>
		<?php
		echo kairos_get_svg( 'menu' );
		echo kairos_get_svg( 'close' );
		?>
		<span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'kairos' ); ?></span>
	</button>

	<div class="primary-navigation">

		<nav id="site-navigation" class="main-navigation" <?php kairos_amp_menu_is_toggled(); ?> role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'kairos' ); ?>">

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
				)
			);
			?>
		</nav><!-- #site-navigation -->

	</div><!-- .primary-navigation -->

<?php endif; ?>

<?php do_action( 'kairos_after_navigation' ); ?>
