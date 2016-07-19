<?php
/*
Plugin Name: ACF Cover Media
Plugin URI: 
Description: Cover media for WordPress content using ACF Pro 5
Version: 1.0
Author: Michael W. Delaney
Author URI: 
License: MIT
*/



/**
 * Define constants
 */
    define( 'ACFCI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    define( 'ACFCI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


/**
 * Require classes
 *
 * Require classes to load template files from site theme with fallback to plugin directory
 */
    require ACFCI_PLUGIN_DIR . 'lib/class-gamajo-template-loader.php';
    require ACFCI_PLUGIN_DIR . 'lib/class-acfci-template-loader.php';



/**
 * Template wrapper
 *
 * @param string $slug The slug name for the generic template.
 * @param string $load The name of the specialised template.
 */
    function ci_template($slug, $load = null) {
        $acfci_templates = new ACFCI_Template_Loader; 
        $acfci_templates->get_template_part( $slug, $load );
    }



/**
 * Set classes for the cover image container. These can be overridden or added to with a filter like the following:
 *     add_filter( 'cover_media_set_classes', 'custom_cover_classes' );
 *     function custom_cover_classes($classes) {
 *         if(is_page_template('template-landing-page.php') {
 *             $classes[]   = 'on-landing-page';
 *         }
 *         return $classes;
 *     }
 *         
 * @return string string of classes
 */
function ci_classes() {
    $classes    = array();
    $classes[]  = 'cover-media-container';
    $classes[]  = 'cover-media-' . get_field('cover_media_layout');
    
    $classes = array_filter(array_map('trim', $classes));
    echo trim(implode(' ', apply_filters( 'cover_media_set_classes', $classes )));
}



/**
 * Insert cover image templates
 * 
 * @param string $content The original WordPress content
 * @return string
 */
    function acfci_cover() {
        $content = do_shortcode('[acf-cover]');
        echo $content;
    }

/**
 * Main Complex Titles class
 */

    class ACFCoverImage {
        
        /**
         * Run filters and actions
         */

            function __construct() {


                //Initialize shortcodes
                add_action( 'init', array( $this, 'add_shortcodes' ) );	  
               
                // Enqueue front-end styles
                add_action('wp_enqueue_scripts', array( $this, 'front_end_styles' ) );

                //Initialize ACF fields
                add_action( 'init', array( $this, 'create_acf_fields' ) );   

                // Add body class for cover image content alignment
                add_filter( 'body_class', array( $this, 'body_classes' ) );


            }



            /**
             * Add the ACF fields
             */

                function create_acf_fields() {
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
                if(get_field('cover_type_of_media') && get_field('cover_type_of_media') != 'none') {
                    $classes[]      = 'cover-media';
                    $classes[]      = 'cover-media-' . get_field('cover_type_of_media');
                    $classes[]      = 'cover-media-layout-' . get_field('cover_media_layout');
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
                // Image styles
                if(get_field('cover_type_of_media') == 'image') {
    				$image = get_field('cover_image');
    		        $custom_css = "
    		                .cover-media-container {
    		                        background-image: url(" . $image['url'] . ");
    		                }";
    		        wp_add_inline_style( 'acfci-styles', $custom_css );
                }
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
                  if( get_field('cover_type_of_media') && get_field('cover_type_of_media') != 'none' ) {
                    ob_start();
                    ci_template( 'cover-base', get_post_type() );
                    return ob_get_clean();
                  }
                }


    }

$acf_cover_image = new ACFCoverImage();

