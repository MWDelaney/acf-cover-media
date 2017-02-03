<?php
// check if the flexible content field has rows of data
if( have_rows('media_type') ): ?>


    <?php
    // loop through the rows of data
    while ( have_rows('media_type') ) : the_row(); ?>

        <?php
        	\MWD\CoverMedia\template('media-base', get_row_layout());
       	?>
<?php
    endwhile;

endif;

?>
