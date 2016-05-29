# Advanced Custom Fields Cover Media
NOTE: This plugin is very much a work in progress.

A WordPress plugin that provides Easy, consistent cover image fields for WordPress and ACF Pro 5.

## Requirements
1. WordPress 4.5+
2. Advanced Custom Fields Pro 5

## Usage
This plugin requires a small change to your theme:
### Template Tag
Add the following template tag wherever you want cover images to appear in your theme:
````
<?php acfci_cover(); ?>
````

### Recommended CSS
In order for the cover image to look right, its immediate parent should have something like the following css:
````
height: 100vh;
````

### Layout Classes
Layout classes are added to the body tag and can be used to style the cover image in your theme's CSS

### Change where the Cover Image fields appear
By cover images are enabled for Pages, to define which post types cover images should be available on, declare theme support:

````
$landing_page_templates = array(
  array('page_template', '==', 'template-landing.php'), 
  array('page_template', '==', 'template-home.php')
);
add_theme_support( 'cover-image-location', $landing_page_templates );
````
