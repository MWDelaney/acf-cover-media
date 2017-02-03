<?php

namespace MWD\CoverMedia;

class Fields {

	function __construct() {

		// Add Fields
		add_action( 'acf/init', array( $this, 'add_fields' ), 0 );

	}

	/**
	 * Enable all fields in the "Fields" subdirectory
	 */
	function add_fields() {
		foreach(glob(ACFCI_PLUGIN_DIR . 'lib/fields/*.php') as $field) {
				include($field);
		}
	}

}
