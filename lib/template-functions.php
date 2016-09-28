<?php

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
    $classes[]  = 'cover-media-' . get_row_layout();

    $classes = array_filter(array_map('trim', $classes));
    echo trim(implode(' ', apply_filters( 'cover_media_set_classes', $classes )));
}

/**
 * Insert cover image templates
 *
 */
    function acfci_cover() {
        $content = do_shortcode('[acf-cover]');
        echo $content;
    }
