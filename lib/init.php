<?php

namespace MWD\CoverMedia;


	class Init {

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

									// Set up contextual data for templates
									add_action('acf-cover-media-before-media-base', array( $this, 'media_context' ) );

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
					add_shortcode( 'acf-cover', array($this, 'get_acf_cover'));
				}


			/**
			 * Set up cover media template context
			 * @return [type] [description]
			 */
			function media_context() {
				$classes    = array();
		    $classes[]  = 'cover-media-container';
		    $classes[]  = 'cover-media-' . get_row_layout();

				$classes = apply_filters( 'acf-cover-media-classes', $classes );
				$data = array('classes' => esc_attr(trim(implode(' ', $classes))));
				\MWD\CoverMedia\template_data( $data, 'context' );
			}


		/**
		 * Build the shortcode, call templates
		 */
				function get_acf_cover() {
					ob_start();
					\MWD\CoverMedia\template( 'cover-media' );
					return ob_get_clean();
				}

				/**
				 * Insert cover image templates
				 *
				 */
			    public static function acf_cover() {
			        $content = do_shortcode('[acf-cover]');
			        echo $content;
			    }


}
