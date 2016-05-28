# Advanced Custom Fields Cover Image
NOTE: This plugin is very much a work in progress. It includes a small number of layouts now, and will include more as time allows.

A WordPress plugin that provides Easy, consistent cover image fields for WordPress and ACF Pro 5.

## Requirements
1. WordPress 4.5+
2. Advanced Custom Fields Pro 5

## Usage
This plugin requires a small change to your theme:
### Cover Image Class
Add the following class to whichever element you want to use for the cover image:
````
.cover-image
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
