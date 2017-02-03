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

namespace MWD\CoverMedia;

/**
 * Set up autoloader
 */
require __DIR__ . '/vendor/autoload.php';

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
 $acfci = new \MWD\CoverMedia\Init();
 $acfci_fields = new \MWD\CoverMedia\Fields();

/**
 * Template wrapper
 *
 * @param string $slug The slug name for the generic template.
 * @param string $load The name of the specialised template.
 */
 function template($slug, $load = null) {
	 $a = ($load) ? '-' . $load : null;
	 $s = ($slug) ? '-' . $slug : null;
	 $t = new \MWD\CoverMedia\Templates;
	 do_action('acf-cover-media-before' . $s);
	 do_action('acf-cover-media-before' . $a);
	 $t->get_template_part( $slug, $load );
	 do_action('acf-cover-media-after' . $a);
	 do_action('acf-cover-media-after' . $s);
 }
 function template_data($data, $name) {
	 $d = new \MWD\CoverMedia\Templates;
	 $d->set_template_data( $data, $name );
 }
