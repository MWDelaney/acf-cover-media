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


add_action( 'init', function() {

/**
 * Require classes
 *
 * Require classes to load template files from site theme with fallback to plugin directory
 */
    require ACFCI_PLUGIN_DIR . 'lib/class-gamajo-template-loader.php';
    require ACFCI_PLUGIN_DIR . 'lib/class-acfci-template-loader.php';
		require ACFCI_PLUGIN_DIR . 'lib/class-init.php';
		require ACFCI_PLUGIN_DIR . 'lib/template-functions.php';

} );

add_action('wp_loaded', function() {

		$acf_cover_image = new MWD\ACFCM\CreateCoverMedia();
		$acf_cover_image->create_acf_fields();

});
