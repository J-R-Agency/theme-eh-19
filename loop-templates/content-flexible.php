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
            <div class=\"module_content_block\"><h2>Content Block: </h2>" .
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
            <div class=\"module_video_block\"><h2>Video Block: </h2>" .
            	"<div class=\"mvb_video_url\">". $mvb_video_url . "</div>" .
            	"<div class=\"mvb_video_title\">". $mvb_video_title . "</div>" .
            	"<div class=\"mvb_style\">". $mvb_style . "</div>" .
			"</div>";

        // Case: Module Icon Block.
        elseif( get_row_layout() == 'module_icon_block' ): 

			$mib_title = get_sub_field('mib_title'); // Text
			$mib_icon_repeater = get_sub_field('mib_icon_repeater'); // Repeater --- need sub fields loop
			$mib_body = get_sub_field('mib_body'); // WYSIWYG block
			$mib_style = get_sub_field('mib_style'); // Select
            
            // Do something...

            echo "
            <div class=\"module_icon_block\"><h2>Icon Block: </h2>" .
            	"<div class=\"mib_title\">". $mib_title . "</div>" .
            	"<div class=\"mib_icon_repeater\">". $mib_icon_repeater . "</div>" ;

				// check if the repeater field has rows of data
				if( have_rows('mib_icon_repeater') ):

					// loop through the rows of data
					while ( have_rows('mib_icon_repeater') ) : the_row();

						$mib_icon_image = get_sub_field('mib_icon_image'); // Image array
						$mib_icon_heading = get_sub_field('mib_icon_heading'); // Text

						echo "
			            <div class=\"mib_icon_repeater\">Icon Repeater: " .
			            	"<div class=\"mib_icon_image\">". $mib_icon_image['url'] . " " . $mib_icon_image['title'] . " " . $mib_icon_image['alt'] . " " . $mib_icon_image['caption'] . " " . "</div>" .
			            	"<div class=\"mib_icon_heading\">". $mib_icon_heading . "</div>" .
						"</div>";

					endwhile;

				else :

					// no rows found

				endif;

            echo 
            	"<div class=\"mib_body\">". $mib_body . "</div>" .
            	"<div class=\"mib_style\">". $mib_style . "</div>" .
			"</div>";

        // Case: CTA Feature Block.
        elseif( get_row_layout() == 'module_cta_feature_block' ): 

            $mcfb_repeater = get_sub_field('mcfb_repeater'); // Repeater --- need sub fields loop
            
            // Do something...
            
            echo "
            <div class=\"module_cta_feature_block\"><h2>CTA Feature Block: </h2>" .
            	"<div class=\"mcfb_repeater\">". $mcfb_repeater . "</div>" ;

				// check if the repeater field has rows of data
				if( have_rows('mcfb_repeater') ):

					// loop through the rows of data
					while ( have_rows('mcfb_repeater') ) : the_row();

						$mcfb_image = get_sub_field('mcfb_image'); // Image array
						$mcfb_title = get_sub_field('mcfb_title'); // Text
						$mcfb_body = get_sub_field('mcfb_body'); // Text area
						$mcfb_cta_text = get_sub_field('mcfb_cta_text'); // Text
						$mcfb_cta_link = get_sub_field('mcfb_cta_link'); // Link array
						$mcfb_cta_style = get_sub_field('mcfb_cta_style'); // Select

						echo "
			            <div class=\"mcfb_repeater\">CTA Feature Block Repeater: " .
			            	"<div class=\"mcfb_image\">". $mcfb_image['url'] . " " . $mcfb_image['title'] . " " . $mcfb_image['alt'] . " " . $mcfb_image['caption'] . " " . "</div>" .
			            	"<div class=\"mcfb_title\">". $mcfb_title . "</div>" .
			            	"<div class=\"mcfb_body\">". $mcfb_body . "</div>" .
			            	"<div class=\"mcfb_cta_text\">". $mcfb_cta_text . "</div>" .
			            	"<div class=\"mcfb_cta_link\">". $mcfb_cta_link['url'] . " " . $mcfb_cta_link['title'] . " " . $mcfb_cta_link['target'] . " " . "</div>" .
			            	"<div class=\"mcfb_cta_style\">". $mcfb_cta_style . "</div>" .						
			            "</div>";

					endwhile;

				else :

					// no rows found

				endif;

           	echo "</div>";


        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;

?>