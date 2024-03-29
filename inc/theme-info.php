<?php
/**
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
 *
 * @package Occasio
 */

/**
 * Add Theme Info page to admin menu
 */
function occasio_theme_info_menu_link() {

	// Get theme details.
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'occasio' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'occasio' ),
		'edit_theme_options',
		'occasio',
		'occasio_theme_info_page'
	);

}
add_action( 'admin_menu', 'occasio_theme_info_menu_link' );

/**
 * Display Theme Info page
 */
function occasio_theme_info_page() {

	// Get theme details.
	$theme = wp_get_theme();
	?>

	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'occasio' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->display( 'Description' ); ?></div>

		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'occasio' ); ?>:</strong>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/occasio/', 'occasio' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=occasio&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'occasio' ); ?></a>
				<a href="http://preview.themezee.com/?demo=occasio&utm_source=theme-info&utm_campaign=occasio" target="_blank"><?php esc_html_e( 'Theme Demo', 'occasio' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/occasio-documentation/', 'occasio' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=occasio&utm_content=documentation' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'occasio' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=occasio', 'occasio' ) ); ?>" target="_blank"><?php esc_html_e( 'Theme Changelog', 'occasio' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/occasio/reviews/', 'occasio' ) ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'occasio' ); ?></a>
			</p>
		</div>
		<hr>

		<div id="getting-started">

			<h3><?php printf( esc_html__( 'Getting started with %s', 'occasio' ), $theme->display( 'Name' ) ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'occasio' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Need help to set up and configure this theme? We got you covered! Check out the extensive theme documentation on our website.', 'occasio' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/docs/occasio-documentation/', 'occasio' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=occasio&utm_content=documentation' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( "View %s's documentation", 'occasio' ), 'Occasio' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'occasio' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'occasio' ), $theme->display( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo wp_customize_url(); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'occasio' ); ?></a>
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

			<h3><?php esc_html_e( 'Get more features', 'occasio' ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Pro Version Add-on', 'occasio' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( 'Purchase the %s Pro Add-on to get additional features and advanced customization options.', 'occasio' ), 'Occasio' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/addons/occasio-pro/', 'occasio' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=occasio&utm_content=pro-version' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'occasio' ), 'Occasio' ); ?>
							</a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Recommended Plugins', 'occasio' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Extend the functionality of your WordPress website with our free and easy to use plugins.', 'occasio' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( admin_url( 'plugin-install.php?tab=search&type=tag&s=themezee' ) ); ?>" class="button button-secondary">
								<?php esc_html_e( 'Install Plugins', 'occasio' ); ?>
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
				printf(
					esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'occasio' ),
					$theme->display( 'Name' ),
					'<a target="_blank" href="' . __( 'https://themezee.com/', 'occasio' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=occasio" title="ThemeZee">ThemeZee</a>',
					'<a target="_blank" href="' . __( 'https://wordpress.org/support/theme/occasio/reviews/', 'occasio' ) . '" title="' . esc_attr__( 'Rate this theme', 'occasio' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'occasio' ) . '</a>'
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
function occasio_theme_info_page_css( $hook ) {

	// Load styles and scripts only on theme info page.
	if ( 'appearance_page_occasio' != $hook ) {
		return;
	}

	// Embed theme info css style.
	wp_enqueue_style( 'occasio-theme-info-css', get_template_directory_uri() . '/assets/css/theme-info.css' );

}
add_action( 'admin_enqueue_scripts', 'occasio_theme_info_page_css' );
