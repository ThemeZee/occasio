<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Kairos
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Kairos_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'kairos' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/kairos/', 'kairos' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=kairos&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'kairos' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=kairos&utm_source=customizer&utm_campaign=kairos" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'kairos' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/kairos-documentation/', 'kairos' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=kairos&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'kairos' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=kairos/', 'kairos' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'kairos' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/kairos/reviews/', 'kairos' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'kairos' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
