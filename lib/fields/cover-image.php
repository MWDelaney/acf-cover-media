<?php
/**
 * Create custom fields for ACF Cover Image
 *
 * @package   acf-cover-image
 * @author    Michael W. Delaney
 * @link      https://github.com/MWDelaney/acf-cover-image
 * @copyright 2016 Michael W. Delaney
 * @license   MIT
 * @version   1.0
 */

if( function_exists('acf_add_local_field_group') ):
    /**
     * Variable holding the ACF fields definition to be automatically created
     */
    $args = array (
		'key' => 'group_574887694af90',
		'title' => 'Cover Media',
		'fields' => array (
			array (
				'key' => 'field_57ea8eeeb491d',
				'label' => 'Media',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_57ea8e7ab4919',
				'label' => 'Media Type',
				'name' => 'media_type',
				'type' => 'flexible_content',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'button_label' => 'Add Media',
				'min' => 0,
				'max' => 1,
				'layouts' => array (
					array (
						'key' => '57ea8e7e49fd3',
						'name' => 'image',
						'label' => 'Image',
						'display' => 'block',
						'sub_fields' => array (
							array (
								'key' => 'field_57ea8e89b491a',
								'label' => 'Image',
								'name' => 'image',
								'type' => 'image',
								'instructions' => '',
								'required' => '',
								'conditional_logic' => '',
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'array',
								'preview_size' => 'full',
								'library' => '',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
					array (
						'key' => '57ea8ec1b491b',
						'name' => 'video',
						'label' => 'Video',
						'display' => 'block',
						'sub_fields' => array (
							array (
								'key' => 'field_57ea8ec6b491c',
								'label' => 'Video',
								'name' => 'video',
								'type' => 'oembed',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'width' => '',
								'height' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
					array (
						'key' => '57ea9071ee793',
						'name' => 'gallery',
						'label' => 'Gallery',
						'display' => 'block',
						'sub_fields' => array (
							array (
								'key' => 'field_57ea9076ee794',
								'label' => 'Gallery',
								'name' => 'gallery',
								'type' => 'gallery',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array (
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'min' => '',
								'max' => '',
								'insert' => 'append',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
							),
						),
						'min' => '',
						'max' => '',
					),
				),
			),
			array (
				'key' => 'field_57ea8f09b491e',
				'label' => 'Layout',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_57ea8f12b491f',
				'label' => 'Layout',
				'name' => 'layout',
				'type' => 'select',
				'instructions' => 'The general orientation of the image. This will help us position the title and call to action over it.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'left' => 'Left',
					'right' => 'Right',
					'center' => 'Center',
				),
				'default_value' => array (
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'ajax' => 0,
				'return_format' => 'value',
				'placeholder' => '',
			),
		),
		'location' => array (),
		'menu_order' => 100,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	);


    /**
    * Check for declared post types or templates to attach fields to
    *
    * @author Michael W. Delaney
    * @since 1.0
    *
    * Default: post_type == page
    *
    * Declare theme support for specific post types:
    * $landing_page_templates = array(
    * 	array (
    * 		array (
    * 			'param' => 'post_type',
    * 			'operator' => '==',
    * 			'value' => 'page',
    * 		),
    * 		array (
    * 			'param' => 'page_template',
    * 			'operator' => '!=',
    * 			'value' => 'template-no-header-image.php',
    * 		),
    *	),
    * );
    * add_theme_support( 'cover-image-location', $landing_page_templates );
 */

    //Check if theme support is explicitly defined. If so, enable all attachments declared in theme support.
    if( current_theme_supports( 'cover-image-location' ) ) {
        $locations_supported    = get_theme_support( 'cover-image-location' );
        $locations_enabled      = $locations_supported[0];

    } else {
        // If theme support is not explicitly defined, enable default attachments.
        $locations_enabled = array(
          array (
            array (
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'page',
            )
          )
        );
    }
    // Insert each location into the $args array
    $args['location'] = $locations_enabled;



    /**
    * Add the local field group to ACF
    *
    * @author Michael W. Delaney
    * @since 1.0
    *
    */
    acf_add_local_field_group($args);


endif;
