<?php
/**
 * Partial template for flexible content in templates
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php

// Check value exists.
if( have_rows('fc_content_block') ):

    // Loop through rows.
    while ( have_rows('fc_content_block') ) : the_row();

        // Case: Content Block.
        if( get_row_layout() == 'module_content_block' ):

            $mcb_divider_icon = get_sub_field('mcb_divider_icon'); // Image
            $mcb_title = get_sub_field('mcb_title'); // Text
            $mcb_content = get_sub_field('mcb_content'); // WYSIWYG block
            $mcb_cta_text = get_sub_field('mcb_cta_text'); // Tect
            $mcb_cta_link = get_sub_field('mcb_cta_link'); // Link array
            $mcb_cta_style = get_sub_field('mcb_cta_style'); // Select
            $mcb_style = get_sub_field('mcb_style'); // Select

            // Do something...

            echo "
            <div class=\"module_content_block\">Content Block: " .
            	"<div class=\"mcb_divider_icon\">". $mcb_divider_icon['url'] . " " . $mcb_divider_icon['title'] . " " . $mcb_divider_icon['alt'] . " " . $mcb_divider_icon['caption'] . " " . "</div>" .
            	"<div class=\"mcb_title\">". $mcb_title . "</div>" .
            	"<div class=\"mcb_content\">". $mcb_content . "</div>" .
            	"<div class=\"mcb_cta_text\">". $mcb_cta_text . "</div>" .
            	"<div class=\"mcb_cta_link\">". $mcb_cta_link['url'] . " " . $mcb_cta_link['title'] . " " . $mcb_cta_link['target'] . " " . "</div>" .
            	"<div class=\"mcb_cta_style\">". $mcb_cta_style . "</div>" .
            	"<div class=\"mcb_style\">". $mcb_style . "</div>" .
			"</div>";

        // Case: Video Block.
        elseif( get_row_layout() == 'module_video_block' ): 

            $mvb_video_url = get_sub_field('mvb_video_url'); // oEmbed
			$mvb_video_title = get_sub_field('mvb_video_title'); // Text
			$mvb_style = get_sub_field('mvb_style'); // Select
            
            // Do something...
            
            echo "
            <div class=\"module_video_block\">Video Block: " .
            	"<div class=\"mvb_video_url\">". $mvb_video_url . "</div>" .
            	"<div class=\"mvb_video_title\">". $mvb_video_title . "</div>" .
            	"<div class=\"mvb_style\">". $mvb_style . "</div>" .
			"</div>";



        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;

?>