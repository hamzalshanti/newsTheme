<?php
/**
 * Create A Simple Theme Options Panel
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Theme Settings', 'text-domain' ),
				esc_html__( 'Theme Settings', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Checkbox


				// Input
				if ( ! empty( $options['fb_url'] ) ) {
					$options['fb_url'] = sanitize_text_field( $options['fb_url'] );
				} else {
					unset( $options['fb_url'] ); // Remove from options if empty
				}

				// Input
				if ( ! empty( $options['twitter_url'] ) ) {
					$options['twitter_url'] = sanitize_text_field( $options['twitter_url'] );
				} else {
					unset( $options['twitter_url'] ); // Remove from options if empty
				}
				// Input
				if ( ! empty( $options['google_plus_url'] ) ) {
					$options['google_plus_url'] = sanitize_text_field( $options['google_plus_url'] );
				} else {
					unset( $options['google_plus_url'] ); // Remove from options if empty
				}	
			    // Input
				if ( ! empty( $options['youtube_url'] ) ) {
					$options['youtube_url'] = sanitize_text_field( $options['youtube_url'] );
				} else {
					unset( $options['youtube_url'] ); // Remove from options if empty
                }
                // Input
				if ( ! empty( $options['android_url'] ) ) {
					$options['android_url'] = sanitize_text_field( $options['android_url'] );
				} else {
					unset( $options['android_url'] ); // Remove from options if empty
                }
                // Input
				if ( ! empty( $options['ios_url'] ) ) {
					$options['ios_url'] = sanitize_text_field( $options['ios_url'] );
				} else {
					unset( $options['ios_url'] ); // Remove from options if empty
				}			
				// Input
				if ( ! empty( $options['copy_right'] ) ) {
					$options['copy_right'] = sanitize_text_field( $options['copy_right'] );
				} else {
					unset( $options['copy_right'] ); // Remove from options if empty
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', 'text-domain' ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">

						<?php // Text input example ?>
						<tr valign="top">
							<th scope="row">Facebook URL</th>
							<td>
								<?php $value = self::get_theme_option( 'fb_url' ); ?>
								<input type="text" name="theme_options[fb_url]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
						
						<?php // Text input example ?>
						<tr valign="top">
							<th scope="row">Twitter URL</th>
							<td>
								<?php $value = self::get_theme_option( 'twitter_ul' ); ?>
								<input type="text" name="theme_options[twitter_ul]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
						<?php // Text input example ?>
						<tr valign="top">
							<th scope="row">Google Plus URL</th>
							<td>
								<?php $value = self::get_theme_option( 'google_plus_url' ); ?>
								<input type="text" name="theme_options[google_plus_url]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>

						<?php // Text input example ?>
						<tr valign="top">
							<th scope="row">Youtube URL</th>
							<td>
								<?php $value = self::get_theme_option( 'youtube_url' ); ?>
								<input type="text" name="theme_options[youtube_url]" value="<?php echo esc_attr( $value ); ?>">
							</td>
                        </tr>
                        
                        <?php // Text input example ?>
						<tr valign="top">
							<th scope="row">Android URL</th>
							<td>
								<?php $value = self::get_theme_option( 'android_url' ); ?>
								<input type="text" name="theme_options[android_url]" value="<?php echo esc_attr( $value ); ?>">
							</td>
                        </tr>
                        
                        <?php // Text input example ?>
						<tr valign="top">
							<th scope="row">IOS URL</th>
							<td>
								<?php $value = self::get_theme_option( 'ios_url' ); ?>
								<input type="text" name="theme_options[ios_url]" value="<?php echo esc_attr( $value ); ?>">
							</td>
						</tr>
					
						<?php // Copy right ?>
						<tr valign="top">
							<th scope="row">Copy Right</th>
							<td>
								<?php $value = self::get_theme_option( 'copy_right' ); ?>
								<textarea  name="theme_options[copy_right]"><?php echo esc_attr( $value ); ?></textarea>
							</td>
						</tr>


					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function roya_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}