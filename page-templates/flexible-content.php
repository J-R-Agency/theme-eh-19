<?php
/**
 * Template Name: Flexible Content Template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="container-fluid no-margins">
	
	<div class="row">
		<div class="col-12">
			<?php if ( has_post_thumbnail() ): ?>
				<?php $thumb = get_the_post_thumbnail_url(); ?>
					<div class="hero" style="background: url('<?php echo $thumb; ?>') no-repeat; background-size: cover;"></div>	
			<?php endif ?>
		</div>
	</div>
	
	<div class="content">
		<div class="row">
			<div class="col-12">
				<h2>Flexible Content</h2>
				<p>Example Para<p>


<?php

// Check value exists.
if( have_rows('fc_content_block') ):

    // Loop through rows.
    while ( have_rows('fc_content_block') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'module_content_block' ):
            $mcb_title = get_sub_field('mcb_title');
            // Do something...

            echo "<div>HERE IS SOME FLEXIBLE CONTENT: " . $mcb_title . "</div>";

        // Case: Download layout.
        elseif( get_row_layout() == 'module_new_video_block' ): 
            $new_video_url = get_sub_field('new_video_url');
            // Do something...
            echo "VIDEO";
?>
			<div class="embed-container">
				<?php the_sub_field('new_video_url'); ?>
			</div>
<?
        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;

?>


			</div>
		</div>
	</div>
</div>

<?php 
get_footer();
?>
