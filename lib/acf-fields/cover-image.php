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
				'key' => 'field_57488a37d3103',
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
				'key' => 'field_57488a37d3104',
			    'label' => 'Type of Media',
			    'name' => 'cover_type_of_media',
			    'type' => 'radio',
			    'instructions' => '',
			    'required' => 0,
			    'conditional_logic' => 0,
			    'wrapper' => array (
			        'width' => '',
			        'class' => '',
			        'id' => '',
			    ),
			    'choices' => array (
			        'none' => 'None',
			        'image' => 'Image',
			        'video' => 'Video',
			    ),
			    'other_choice' => 0,
			    'save_other_choice' => 0,
			    'default_value' => '',
			    'layout' => 'horizontal',
			),
			array (
				'key' => 'field_57488a37d3105',
			    'label' => 'Media Placeholder',
			    'name' => '',
			    'type' => 'message',
			    'instructions' => '',
			    'required' => 0,
			    'conditional_logic' => array (
			        array (
			            array (
			                'field' => 'field_57488a37d3104',
			                'operator' => '==',
			                'value' => 'none',
			            ),
			        ),
			    ),
			    'wrapper' => array (
			        'width' => '',
			        'class' => 'acf-media',
			        'id' => '',
			    ),
			    'message' => 'No media will be displayed.',
			    'new_lines' => 'wpautop',
			    'esc_html' => 0,
			),
			array (
				'key' => 'field_5748877b3a530',
				'label' => 'Cover Image',
				'name' => 'cover_image',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
			    'conditional_logic' => array (
			        array (
			            array (
			                'field' => 'field_57488a37d3104',
			                'operator' => '==',
			                'value' => 'image',
			            ),
			        ),
			    ),
			    'wrapper' => array (
					'width' => '',
					'class' => 'acf-media',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'large',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array (
				'key' => 'field_5748877b3a531',
			    'label' => 'Video',
			    'name' => 'cover_video_hosted',
			    'type' => 'oembed',
			    'instructions' => '',
			    'required' => 0,
			    'conditional_logic' => array (
			        array (
			            array (
			                'field' => 'field_57488a37d3104',
			                'operator' => '==',
			                'value' => 'video',
			            ),
			        ),
			    ),
			    'wrapper' => array (
			        'width' => '',
			        'class' => 'acf-media',
			        'id' => '',
			    ),
			    'width' => '',
			    'height' => '',
			),
			array (
				'key' => 'field_57488a41d3104',
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
				'key' => 'field_574887b23a531',
				'label' => 'Layout',
				'name' => 'cover_media_layout',
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
				'placeholder' => '',
				'disabled' => 0,
				'readonly' => 0,
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
