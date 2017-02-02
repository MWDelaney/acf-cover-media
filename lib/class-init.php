<?php

namespace MWD\ACFCM;


	class CreateCoverMedia {

					/**
					 * Run filters and actions
					 */

							function __construct() {

									//Initialize shortcodes
									$this->add_shortcodes();

									// Enqueue front-end styles
									add_action('wp_enqueue_scripts', array( $this, 'front_end_styles' ) );

									// Add body class for cover image content alignment
									add_filter( 'body_class', array( $this, 'body_classes' ) );


							}



			/**
			 * Add the ACF fields
			 */
				public static function create_acf_fields() {
						$acf_includes = [
							'lib/acf-fields/cover-image.php'                  // Cover image fields
						];

						foreach ($acf_includes as $file) {
							require_once ACFCI_PLUGIN_DIR . $file;
						}
				}



				/**
				 * Add cover image layout classes to the body
				 */
				function body_classes( $classes ) {
						if(have_rows('media_type')) {
								$classes[]      = 'cover-media';
								while ( have_rows('media_type') ) : the_row();
									$classes[] = 'cover-media-' . get_row_layout();
								endwhile;
								$classes[]      = 'cover-media-layout-' . get_field('layout');
						}
						return $classes;
				}


			/**
			 * Enqueue front-end styles, add inline styles when enqueued
			 */
				function front_end_styles() {
					wp_enqueue_style(
						'acfci-styles',
						ACFCI_PLUGIN_URL . 'assets/css/styles.css'
					);
				}



		/**
		 * Add 'acf-cover' shortcode
		 *
		 * @uses acf-cover Function to build the shorcode
		 */
				function add_shortcodes() {
					add_shortcode( 'acf-cover', array($this, 'acf_cover'));
				}



		/**
		 * Build the shortcode, call templates
		 */
				function acf_cover() {
					ob_start();
					ci_template( 'cover-media' );
					return ob_get_clean();
				}


}
