<?php
 namespace MWD\CoverMedia;
/**
 * Template loader for ACF Flexible Content Blocks.
 *
 * Only need to specify class properties here.
 *
 */
class Templates extends \Gamajo_Template_Loader {

	/**
	 * Prefix for filter names.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $filter_prefix = 'acf-cover-media';

	/**
	 * Directory name where custom templates for this plugin should be found in the theme.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $theme_template_directory = 'templates/partials/cover-media';

	/**
	 * Reference to the root directory path of this plugin.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $plugin_directory = ACFCI_PLUGIN_DIR;

}
