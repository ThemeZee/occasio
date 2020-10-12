<?php
/**
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
 *
 * @package Kairos
 */

/**
 * Add Theme Info page to admin menu
 */
function kairos_theme_info_menu_link() {

	// Get theme details.
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'kairos' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'kairos' ),
		'edit_theme_options',
		'kairos',
		'kairos_theme_info_page'
	);

}
add_action( 'admin_menu', 'kairos_theme_info_menu_link' );

/**
 * Display Theme Info page
 */
function kairos_theme_info_page() {

	// Get theme details.
	$theme = wp_get_theme();
	?>

	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'kairos' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->display( 'Description' ); ?></div>

		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'kairos' ); ?>:</strong>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/kairos/', 'kairos' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=kairos&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'kairos' ); ?></a>
				<a href="http://preview.themezee.com/?demo=kairos&utm_source=theme-info&utm_campaign=kairos" target="_blank"><?php esc_html_e( 'Theme Demo', 'kairos' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/kairos-documentation/', 'kairos' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=kairos&utm_content=documentation' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'kairos' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=kairos', 'kairos' ) ); ?>" target="_blank"><?php esc_html_e( 'Theme Changelog', 'kairos' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/kairos/reviews/', 'kairos' ) ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'kairos' ); ?></a>
			</p>
		</div>
		<hr>

		<div id="getting-started">

			<h3><?php printf( esc_html__( 'Getting started with %s', 'kairos' ), $theme->display( 'Name' ) ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'kairos' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Need help to set up and configure this theme? We got you covered! Check out the extensive theme documentation on our website.', 'kairos' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/docs/kairos-documentation/', 'kairos' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=kairos&utm_content=documentation' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( "View %s's documentation", 'kairos' ), 'Kairos' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'kairos' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'kairos' ), $theme->display( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo wp_customize_url(); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'kairos' ); ?></a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg" />

				</div>

			</div>

		</div>

		<hr>

		<div id="more-features">

			<h3><?php esc_html_e( 'Get more features', 'kairos' ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Pro Version Add-on', 'kairos' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( 'Purchase the %s Pro Add-on to get additional features and advanced customization options.', 'kairos' ), 'Kairos' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/addons/kairos-pro/', 'kairos' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=kairos&utm_content=pro-version' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'kairos' ), 'Kairos' ); ?>
							</a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Recommended Plugins', 'kairos' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Extend the functionality of your WordPress website with our free and easy to use plugins.', 'kairos' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( admin_url( 'plugin-install.php?tab=search&type=tag&s=themezee' ) ); ?>" class="button button-secondary">
								<?php esc_html_e( 'Install Plugins', 'kairos' ); ?>
							</a>
						</p>
					</div>

				</div>

			</div>

		</div>

		<hr>

		<div id="theme-author">

			<p>
				<?php
				printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'kairos' ),
					$theme->display( 'Name' ),
					'<a target="_blank" href="' . __( 'https://themezee.com/', 'kairos' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=kairos" title="ThemeZee">ThemeZee</a>',
					'<a target="_blank" href="' . __( 'https://wordpress.org/support/theme/kairos/reviews/', 'kairos' ) . '" title="' . esc_attr__( 'Rate this theme', 'kairos' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'kairos' ) . '</a>'
				);
				?>
			</p>

		</div>

	</div>

	<?php
}

/**
 * Enqueues CSS for Theme Info page
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function kairos_theme_info_page_css( $hook ) {

	// Load styles and scripts only on theme info page.
	if ( 'appearance_page_kairos' != $hook ) {
		return;
	}

	// Embed theme info css style.
	wp_enqueue_style( 'kairos-theme-info-css', get_template_directory_uri() . '/assets/css/theme-info.css' );

}
add_action( 'admin_enqueue_scripts', 'kairos_theme_info_page_css' );
