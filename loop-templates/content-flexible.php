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
            <div class=\"module_content_block mt-5\"> " .
	    
	            	"<div class='row'>
	            		<div class='col-12'>
	            			<div class='line'>
	            				<img src='". $mcb_divider_icon['url'] ."' alt='".$mcb_divider_icon['alt']." class='line-icon'>
	            			</div>
	            		</div>
	            	</div>".
	            	"<div class=\"mcb_title centered mt-3\"><div class='row'><h2>". $mcb_title . "</h2></div></div>" .
	            	"<div class=\"mcb_content mt-3\"><div class='row'>". $mcb_content . "</div></div>";
	            
	        // Show CTA button if field is filled in. If not, don't display CTA.	
        	if( !empty($mcb_cta_link) ):
        		echo 
        			"<a href=\"". $mcb_cta_link['url'] ."\">
        				<div class=\"mcb_cta_link centered\">". $mcb_cta_text . "</div>
        			</a>
        		</div>";
        	endif;
        	
				echo "</div>";

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
            <div class=\"module_icon_block\">" .
            	"<div class=\"mib_title\"><h2>". $mib_title . "</h2></div>" .
            		"<div class=\"row\">" ;

				// check if the repeater field has rows of data
				if( have_rows('mib_icon_repeater') ):

					// loop through the rows of data
					while ( have_rows('mib_icon_repeater') ) : the_row();

						$mib_icon_image = get_sub_field('mib_icon_image'); // Image array
						$mib_icon_heading = get_sub_field('mib_icon_heading'); // Text

						echo
						"<div class=\"col-fifth mt-5\">" .
			            	"<img src='". $mib_icon_image['url'] ."' alt='".$mib_icon_imagen['alt']."'>" .
			            	"<div class=\"mib_icon_heading mt-1\">". $mib_icon_heading . "</div>" .
						"</div>"
						;

					endwhile;

				else :

					// no rows found

				endif;
			if( !empty($mib_body) ):	
	            echo 
	            	"</div>
	            		<div class=\"mib_body mt-5\">". $mib_body . "</div>" .
					"</div>";
			endif;

        // Case: CTA Feature Block.
        elseif( get_row_layout() == 'module_cta_feature_block' ): 

            $mcfb_repeater = get_sub_field('mcfb_repeater'); // Repeater --- need sub fields loop
            
            // Do something...
            
            echo "
            <div class=\"module_cta_feature_block\">" .
            	"<div class=\"row\">" ;

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

						echo
						"<div class=\"col-4 mt-5\">" .
			            	"<img src='". $mcfb_image['url'] ."' alt='".$mcfb_image['alt']."'>" .
			            
				            // Title
				            "<div class=\"mcfb_title mt-5 mb-3\"><h5>". $mcfb_title . "</h5></div>" .
				            
				            //Body
				            	"<div class=\"mcfb_body mt-3\">". $mcfb_body . "</div>" .
				            	
				            // CTA Button
				            	"<a href=\"". $mcfb_cta_link['url'] ."\">";
				            	
				            		if ($mcfb_cta_style == 'primary'):
				            			echo
											"<div class=\"mcb_cta_link centered\">". $mcfb_cta_text . "</div>";
										
									elseif($mcfb_cta_style == 'secondary'):
										echo
											"<div class=\"mcb_cta_link secondary centered\">". $mcfb_cta_text . "</div>";
									endif;
							echo
								"</a>" .					
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