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


          // -------------------------- //
         // --- CASE: CONTENT BLOCK ---//
        // -------------------------- //
        if( get_row_layout() == 'module_content_block' ):

            $mcb_divider_icon = get_sub_field('mcb_divider_icon'); // Image
            $mcb_title = get_sub_field('mcb_title'); // Text
            $mcb_content = get_sub_field('mcb_content'); // WYSIWYG block
            $mcb_cta_text = get_sub_field('mcb_cta_text'); // Tect
            $mcb_cta_link = get_sub_field('mcb_cta_link'); // Link array
            $mcb_cta_style = get_sub_field('mcb_cta_style'); // Select
            $mcb_style = get_sub_field('mcb_style'); // Select
			
            echo 
            "<!-- Module Content Block -->
            <div class=\"module_content_block mt-5\">";
            
					// DIVIDER
					if( !empty($mcb_divider_icon) ):
		            	echo
		            	"<div class='row'>
		            		<div class='col-12'>
		            			<div class='line'>
		            				<img src='". $mcb_divider_icon['url'] ."' alt='".$mcb_divider_icon['alt']." class='line-icon'>
		            			</div>
		            		</div>
		            	</div>";
		            endif;
		            
		            
		            // TITLE
		            if( !empty($mcb_title) ):
		            	if ($mcb_style == 'primary' or $mcb_style == 'secondary' or $mcb_style == 'tertiary'):
		            		echo
			            	"<div class=\"mcb_title centered mt-3\"><div class='row'><h2>". $mcb_title . "</h2></div></div>";
			            elseif ($mcb_style == 'small'):
			            	echo
			            	"<div class=\"mcb_title centered mt-3\"><div class='row'><h5>". $mcb_title . "</h5></div></div>";
			            endif;			            
	            	endif;
	            	
	            	
	            	
	            	// PRIMARY STYLE
	            	if ($mcb_style == 'primary'):
	            		echo
	            		"<div class=\"mcb_content mt-3 mb-3\">". $mcb_content;
	            		
				        // Show CTA button if field is filled in. If not, don't display CTA.	
			        	if( !empty($mcb_cta_link) ):
			        		echo 
			        			"<a href=\"". $mcb_cta_link['url'] ."\">
			        				<div class=\"cta_link centered\">". $mcb_cta_text . "</div>
			        			</a>";
			        	endif;
			        	echo "</div>"; // Close mcb_content       	            		
					
					
					
					// SECONDARY STYLE (TWO COLUMNS)
	            	elseif ($mcb_style == 'secondary'):
	            		echo
	            		"<div class=\"mcb_content two-col mt-3\">". $mcb_content;
	            		
				        // Show CTA button if field is filled in. If not, don't display CTA.	
			        	if( !empty($mcb_cta_link) ):
			        		echo 
			        			"<a href=\"". $mcb_cta_link['url'] ."\">
			        				<div class=\"cta_link centered\">". $mcb_cta_text . "</div>
			        			</a>";
			        	endif;
			        	echo "</div>"; // Close mcb_content	            			            		
	            		
	            		
	            		
	            	// TERTIARY STYLE (GREY BACKGROUND)
	            	elseif ($mcb_style == 'tertiary' ):
	            	
	            		// PRIMARY CTA (PEACH)
	            		if ($mcb_cta_style == 'primary') :
		            		echo
		            		"<div class=\"mcb_content grey-content-block mt-3\">". $mcb_content;
	            		
	            		// SECONDARY CTA (GREEN)
	            		elseif ($mcb_cta_style == 'secondary') :
		            		echo
		            		"<div class=\"mcb_content grey-content-block green mt-3\">". $mcb_content;
	            		
	            		//TERTIARY CTA (NAVY)
	            		elseif ($mcb_cta_style == 'tertiary') :
		            		echo
		            		"<div class=\"mcb_content grey-content-block navy mt-3\">". $mcb_content;
	            		
	            		endif;
	            		
				        // Show CTA button if field is filled in. If not, don't display CTA.	
			        	if( !empty($mcb_cta_link)):
			        		echo 
			        			"<a href=\"". $mcb_cta_link['url'] ."\">
			        				<div class=\"cta_link centered\">". $mcb_cta_text . "</div>
			        			</a>";
			        	endif;
			        	
			        echo "</div>"; // Close mcb_content
			        	
			        // SMALL
	            	elseif ($mcb_style == 'small' ) :
	            		echo
	            		"<div class=\"mcb_content small mt-3\">". $mcb_content ."</div>";								        
	            	endif;
        	
			echo "</div>"; // Close module_content_block



          // -------------------------- //
         // ---- CASE: VIDEO BLOCK ----//
        // -------------------------- //
        elseif( get_row_layout() == 'module_video_block' ): 

            $mvb_video_url = get_sub_field('mvb_video_url'); // oEmbed
			$mvb_video_title = get_sub_field('mvb_video_title'); // Text
			$mvb_style = get_sub_field('mvb_style'); // Select
                        
            echo "
            <!-- Module Video Block -->
            <div class=\"module_video_block green\">" .
            	"<div class=\"mvb_video_title centered\"><h3>". $mvb_video_title . "</h3></div>" .            
            	"<div class=\"mvb_video_url\">". $mvb_video_url . "</div>" .
			"</div>";



          // -------------------------- //
         // - CASE: MODULE ICON BLOCK -//
        // -------------------------- //
        elseif( get_row_layout() == 'module_icon_block' ): 

			$mib_title = get_sub_field('mib_title'); // Text
			$mib_icon_repeater = get_sub_field('mib_icon_repeater'); // Repeater --- need sub fields loop
			$mib_body = get_sub_field('mib_body'); // WYSIWYG block
			$mib_style = get_sub_field('mib_style'); // Select
            
			echo "<!-- Module Icon Block -->";
			
			if ($mib_style == 'primary'):
	            echo
	            "<div class=\"module_icon_block mb-5\">";
	        elseif ($mib_style == 'secondary'):
	        	echo
	            "<div class=\"module_icon_block green mb-5\">";
	        elseif ($mib_style == 'tertiary'):
	        	echo
	            "<div class=\"module_icon_block navy mb-5\">";
	        endif;   
            
            echo
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
	            	"	<div class=\"mib_body mt-5\">". $mib_body . "</div>";
			endif;
			
			echo "</div>
			</div>"; // Close module_icon_block
			

		  // -------------------------- //
         // - CASE: CTA FEATURE BLOCK -//
        // -------------------------- //
        
        elseif( get_row_layout() == 'module_cta_feature_block' ): 

            $mcfb_repeater = get_sub_field('mcfb_repeater'); // Repeater --- need sub fields loop
            $mcfb_style = get_sub_field('mcfb_style');
                        
            echo "
            <!-- CTA Feature Block -->
            <div class=\"module_cta_feature_block\">" .
            	"<div class=\"row centered\">" ;

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
						
						
						echo "<div class=\"col-4 mt-5\">";
						if ($mcfb_style == "primary"):
							echo
				            "<img src='". $mcfb_image['url'] ."' alt='".$mcfb_image['alt']."'>";
				        elseif ($mcfb_style == "profile"):
				        	echo
				        	"<img src='". $mcfb_image['url'] ."' alt='".$mcfb_image['alt']."' class='avatar-peach'>";
			            endif;
			            
			            echo
				            // Title
				            "<div class=\"mcfb_title mt-5 mb-3\"><h5>". $mcfb_title . "</h5></div>" .
				            
				            //Body
				            	"<div class=\"mcfb_body mt-3\">". $mcfb_body . "</div>";
				            
				            if( !empty($mcfb_cta_link) ):
					            // CTA Button
					            echo
					            	"<a href=\"". $mcfb_cta_link['url'] ."\">";
					            	
					            		if ($mcfb_cta_style == 'primary'):
					            			echo
												"<div class=\"cta_link centered\">". $mcfb_cta_text . "</div>";
											
										elseif($mcfb_cta_style == 'secondary'):
											echo
												"<div class=\"cta_link navy centered\">". $mcfb_cta_text . "</div>";
												
										elseif($mcfb_cta_style == 'tertiary'):
											echo
												"<div class=\"cta_link green centered\">". $mcfb_cta_text . "</div>";
										
										endif;
								echo
									"</a>";
							endif;
							echo		
				            "</div>";

					endwhile;

				else :

					// no rows found

				endif;

			echo "</div>
			</div>"; // Close cta_feature_block


          // ---------------------------------------- //
         // ---- CASE: RICH CALLOUT BANNER BLOCK ----//
        // ---------------------------------------- //
        elseif( get_row_layout() == 'module_rich_callout_banner_block' ): 

			$mrcbb_title = get_sub_field('mrcbb_title'); // Text
			$mrcbb_body = get_sub_field('mrcbb_body'); // WYSIWYG block
			$mrcbb_cta_text = get_sub_field('mrcbb_cta_text'); // Text
			$mrcbb_cta_link = get_sub_field('mrcbb_cta_link'); // Link array
			$mrcbb_cta_style = get_sub_field('mrcbb_cta_style'); // Select            
            
			if ($mrcbb_cta_style == 'primary'):            
	            echo "
	            <div class=\"module_rich_callout_banner_block\">";
	            
	        elseif($mrcbb_cta_style == 'secondary'):
	            echo "
	            <div class=\"module_rich_callout_banner_block navy\">";	        
	        endif;
	        
	        echo
            	"<div class=\"mrcbb_title mt-2 mb-2\">". $mrcbb_title . "</div>" .
            	"<div class=\"mrcbb_body\">". $mrcbb_body . "</div>" .
            	"<div class=\"mrcbb_cta_text\">". $mrcbb_cta_text . "</div>";
            	
			    // Show CTA button if field is filled in. If not, don't display CTA.	
	        	if( !empty($mrcbb_cta_link) ):
	        		echo 
	        			"<a href=\"". $mrcbb_cta_link['url'] ."\">
	        				<div class=\"cta_link centered\">". $mrcbb_cta_text . "</div>
	        			</a>";
	        	endif;           	
			echo
			"</div>";



          // ----------------------------- //
         // ---- CASE: MODULE DIVIDER ----//
        // ----------------------------- //
        elseif( get_row_layout() == 'module_divider' ): 

			$md_icon = get_sub_field('md_icon'); // Image array
			$md_class = get_sub_field('md_class'); // Text        
            
            // Do something...
            
            echo "
            <!-- Module Divider -->
            <div class='row mt-5 mb-5'>
        		<div class='col-12'>
        			<div class='line'>
        				<img src='". $md_icon['url'] ."' alt='".$md_icon['alt']." class='".$md_class."'>
        			</div>
        		</div>
        	</div>";

        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;

?>