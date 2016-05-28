<?php
/*
Plugin Name: ACF Cover Image
Plugin URI: 
Description: Cover images for WordPress content using ACF Pro 5
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
 * Main Complex Titles class
 */

    class ACFCoverImage {
        
        /**
         * Run filters and actions
         */

            function __construct() {

                //Initialize ACF fields
                //add_action( 'init', array( $this, 'create_acf_fields' ) );	  
               
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
                if($layout = get_field('cover_image_layout')) {
                    $classes[] = 'cover-image-layout-' . $layout ;
                }
                return $classes;
            }



			function front_end_styles() {
				wp_enqueue_style(
					'acfci-styles',
					ACFCI_PLUGIN_URL . 'assets/css/styles.css'
				);
				$image = get_field('cover_image');
		        $custom_css = "
		                .cover-image {
		                        background-image: url(" . $image['url'] . ");
		                }";
		        wp_add_inline_style( 'acfci-styles', $custom_css );
			}

    }

$acf_cover_image = new ACFCoverImage();

