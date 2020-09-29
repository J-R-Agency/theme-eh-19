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

            // Check for style modifier 
            if( !empty($mcb_style) ){
            	$module_content_block_modifier = "module_content_block--" . $mcb_style ;
            }
			
            echo 
            "<!-- Module Content Block -->
            <section class= 'module_content_block " . $module_content_block_modifier . "' id='".sanitize_title( $mcb_title )."'>
	            <div class='container'>";
	            
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
		            	if ( !empty( $mcb_title ) ):
		            			if ( !empty( $mcb_style ) ):
		            				$mcb_title_modifier = "mcb_title--" . $mcb_style;
		            				echo
									"<h2 class=\"mcb_title $mcb_title_modifier\">". $mcb_title . "</h2>";
				           		endif;
		            	endif;
		            	
		            	
		            	// STYLES
		            	
	        			if ( !empty( $mcb_style ) ):
	        				$mcb_style_modifier = "mcb_style--" . $mcb_style;
	        				$mcb_cta_style_modifier = "mcb_cta_style--" . $mcb_cta_style;
	        				
	        				echo
		            		"<div class=\"mcb_content $mcb_style_modifier $mcb_cta_style_modifier\">". $mcb_content; 
		            		
		            		
		            		
					        // Show CTA button if field is filled in. If not, don't display CTA.	
				        	if( !empty($mcb_cta_link) ):
				        		echo 
				        			"<a href=\"". $mcb_cta_link['url'] ."\">
				        				<div class=\"cta_link centered\">". $mcb_cta_text . "</div>
				        			</a>";
				        	endif;
				        	echo "</div>"; // Close mcb_content  	            		
		            		      				
		           		endif;
        	
			echo "</div>
			</section>"; // Close module_content_block



          // -------------------------- //
         // ---- CASE: VIDEO BLOCK ----//
        // -------------------------- //
        elseif( get_row_layout() == 'module_video_block' ): 

            $mvb_video_url = get_sub_field('mvb_video_url'); // oEmbed
			$mvb_video_title = get_sub_field('mvb_video_title'); // Text
			$mvb_background_color = get_sub_field('mvb_background_color'); // Select
                        
            echo "
            <!-- Module Video Block -->
            <div class=\"module_video_block bg-".$mvb_background_color."\" id=\"" . sanitize_title( $mvb_video_title ) . "\">" .
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
			
	    	if ( !empty( $mib_style ) ):
				$mib_style_modifier = "mib_style--" . $mib_style;
				echo
	            "
	            <section class='module_icon_block ".$mib_style_modifier."' id='" . sanitize_title( $mib_title ) . "'>
		            <div class='container'>";
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
							"<div class=\"mib_icon_repeater col-fifth\">" .
				            	"<img src='". $mib_icon_image['url'] ."' alt='".$mib_icon_image['alt']."'>" .
				            	"<div class=\"mib_icon_heading\">". $mib_icon_heading . "</div>" .
							"</div>"
							;
	
						endwhile;
	
					else :
	
						// no rows found
	
					endif;
	
				if( !empty($mib_body) ):	
		            echo 
		            	"	<div class=\"mib_body\">". $mib_body . "</div>";
				endif;
				
				echo "</div>
				</div>
			</section>"; // Close module_icon_block
			

		  // -------------------------- //
         // - CASE: CTA FEATURE BLOCK -//
        // -------------------------- //
        
        elseif( get_row_layout() == 'module_cta_feature_block' ): 

            $mcfb_repeater = get_sub_field('mcfb_repeater'); // Repeater --- need sub fields loop
            $mcfb_style = get_sub_field('mcfb_style');
                        
            echo "
            <!-- CTA Feature Block -->
            <section class='module_cta_feature_block'>
	            <div class=\"container\">" .
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
							
							
							if ($mcfb_style == "primary"):
								echo
								"<div class=\"col-md-4 col-12\">" .
					            "<img src='". $mcfb_image['url'] ."' alt='".$mcfb_image['alt']."'>";
					        elseif ($mcfb_style == "profile"):
					        	echo
					        	"<div class=\"col-fifth\">" .
					        	"<img src='". $mcfb_image['url'] ."' alt='".$mcfb_image['alt']."' class='avatar-peach'>";
				            endif;
				            
				            echo
					            // Title
					            "<div class=\"mcfb_title\"><h5>". $mcfb_title . "</h5></div>" .
					            
					            //Body
					            	"<div class=\"mcfb_body\">". $mcfb_body . "</div>";
					            
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
				</div>
			</section>"; // Close cta_feature_block


          // ---------------------------------------- //
         // ---- CASE: RICH CALLOUT BANNER BLOCK ----//
        // ---------------------------------------- //
        elseif( get_row_layout() == 'module_rich_callout_banner_block' ): 

			$mrcbb_title = get_sub_field('mrcbb_title'); // Text
			$mrcbb_body = get_sub_field('mrcbb_body'); // WYSIWYG block
			$mrcbb_cta_text = get_sub_field('mrcbb_cta_text'); // Text
			$mrcbb_cta_link = get_sub_field('mrcbb_cta_link'); // Link array
			$mrcbb_cta_style = get_sub_field('mrcbb_cta_style'); // Select            
            
 	    	if ( !empty( $mrcbb_cta_style ) ):
				$mrcbb_style_modifier = "mrcbb_style--" . $mrcbb_cta_style;
				echo
	            "
		        <section class=\"module_rich_callout_banner_block $mrcbb_style_modifier\"
		        		 id=\"" . sanitize_title( $mrcbb_title ) . "\">";
		    	endif;
		        
		        echo "<div class='container'>";
		        	
		        	// Title
		        	if (!empty($mrcbb_title)):
						echo "<div class=\"mrcbb_title\">". $mrcbb_title . "</div>";
		        	endif;
		        	
		        	// Body
		        	if (!empty($mrcbb_body)):
	            		echo "<div class=\"mrcbb_body\">". $mrcbb_body . "</div>" ;
	            	endif;
	            	
				    // Show CTA button if field is filled in. If not, don't display CTA.	
		        	if( !empty($mrcbb_cta_link) ):
		        		echo 
		        			"<a href=\"". $mrcbb_cta_link['url'] ."\">
		        				<div class=\"cta_link centered\">". $mrcbb_cta_text . "</div>
		        			</a>";
		        	endif;           	
				echo
				"</div>
			</section>";



          // ----------------------------- //
         // ---- CASE: MODULE DIVIDER ----//
        // ----------------------------- //
        elseif( get_row_layout() == 'module_divider' ): 

			$md_icon = get_sub_field('md_icon'); // Image array
			$md_class = get_sub_field('md_class'); // Text        
            
            echo "
            <!-- Module Divider -->
            <div class='row'>
        		<div class='col-12'>
        			<div class=\"line $md_class\">
        				<img src='". $md_icon['url'] ."' alt='".$md_icon['alt']."'>
        			</div>
        		</div>
        	</div>";
        
          // ------------------------------------- //
         // ---- CASE: MODULE ACCORDION BLOCK ----//
        // ------------------------------------- //
        elseif( get_row_layout() == 'module_accordion_block' ): 

			$mab_title = get_sub_field('mab_title'); // Text
			$mab_style = get_sub_field('mab_style'); // Style (select)			  
            
            echo "
            <!-- Accordion Block -->
            <section>
            <div class='container'>
            <div class='accordion' id='myAccordion'>
	            <div class='row'>
	        		<div class='col-12'>
	        			<h2 class='mab_title'>".$mab_title."</h2>
	        		</div>
	        	</div>
        	";
        	
			if( have_rows('mab_repeater') ):
			
				$check_id = 1;
							
				// loop through the rows of data
				while ( have_rows('mab_repeater') ) : the_row();       	
					$question = get_sub_field('question'); // Text
					$answer = get_sub_field('answer');
					$check_id++;
					
		        	echo
		        	"
		        	<div class='card'>
		        	
		        		<!-- QUESTION -->
			        	<div class='card-header' id='heading-".$check_id."'>
		        				<button type='button' class='card-title'
								data-toggle='collapse' data-target='#collapse-".$check_id."'>
								".$question."</button>
						</div>
						
						<!-- ANSWER -->
			        	<div id='collapse-".$check_id."' class='collapse'
			        	aria-labelledby='heading-".$check_id."' data-parent='#myAccordion'>
			        		<div class='card-body'>
			        			<p>".$answer."</p>
			        		</div>
			        	</div>
				        	
		        	</div>
		        	";
		        endwhile;		        
		    endif;
		    
		    echo "
			    	</div>
			    </div>
		    </section>"; //end accordion-container


          // -------------------------------- //
         // ---- CASE: PUBLIC BLOG POSTS ----//
        // -------------------------------- //
        elseif( get_row_layout() == 'module_public_blog_posts' ): 
			
			$mpbp_title = get_sub_field('mpbp_title');
			$mpbp_category = get_sub_field('mpbp_category'); 
			$mpbp_card_color = get_sub_field('mpbp_card_color');
			$mpbp_background_color = get_sub_field('mpbp_background_color');
			$mpbp_show_sticky_posts = get_sub_field('mpbp_show_sticky_posts');
			$cat_name = get_cat_name($mpbp_category);
			$cat_link = get_category_link( $mpbp_category );
			
			if (!$mpbp_category) {
				$read_more_text = 'Read more from the blog';
			} else {
				$read_more_text = "Read more posts in " . $cat_name;
			}
			
			echo "
			<section class='bg-".$mpbp_background_color." blog-posts-module'>
				<div class='container'>
					<h2>".$mpbp_title."</h2>
			";
			
				if ($mpbp_show_sticky_posts) {
					// Big blog cards
					$stickyArgs = array(
					    'post_type'      => 'post',
					    'post_status'	 => 'private',
					    'posts_per_page' => 1,
					    'order'          => 'DESC',
					    'category__in'	 => $mpbp_category,
					    'ignore_sticky_posts' => 0
					 );
					 
					$stickyQuery = new WP_Query($stickyArgs);
					 
					if ( $stickyQuery->have_posts() ) :
						echo	"<div class='row'>";
															 
						    while ( $stickyQuery->have_posts() ) : $stickyQuery->the_post();
							 	
								$categories = get_the_category();
								$category_color = $mpbp_card_color;
								
								include (get_template_directory().'/global-templates/cards/big-blog-card.php');	
								
							endwhile;
							
						echo "</div> <!-- end row -->";
					endif;					
				}			
						   
				$args = array(
				    'post_type'      => 'post', //write slug of post type
				    'post_status'	 => 'publish',
				    'posts_per_page' => 3,
				    'order'          => 'DESC',
				    'category__in'	 => $mpbp_category,
				    'ignore_sticky_posts' => 1
				 );
				 
				$query = new WP_Query($args);
				 
				if ( $query->have_posts() ) :
					echo "<div class='row'>";
														 
					    while ( $query->have_posts() ) : $query->the_post();
						 	
							$categories = get_the_category();
							$category_color = $mpbp_card_color;
							
							include (get_template_directory().'/global-templates/cards/small-blog-card.php');	
							
						endwhile;
						
					echo "</div> <!-- end row -->";
				endif;
				
				echo "
						<div class='row'>
							<div class='col-12'>		
								<div class='more-resources float-right'>
									<a href='".$cat_link."'>
										".$read_more_text."<img src='".get_template_directory_uri()."/images/icons/".$mpbp_card_color."-arrow.svg'>
									</a>
								</div>
							</div>
						</div>
						
					</div> <!-- end container -->
				</section>				
				
				";				
				
				wp_reset_query();
 
 
           // -------------------------------- //
         // ---- CASE: PRIVATE BLOG POSTS ----//
        // -------------------------------- //
        elseif( get_row_layout() == 'module_private_blog_posts' ): 
			
			$mprbp_title = get_sub_field('mprbp_title');
			$mprbp_category = get_sub_field('mprbp_category'); 
			$mprbp_card_color = get_sub_field('mprbp_card_color');
			$mprbp_background_color = get_sub_field('mprbp_background_color');
			$mprbp_show_sticky_posts = get_sub_field('mprbp_show_sticky_posts');
			$cat_name = get_cat_name($mprbp_category);
			$cat_link = get_category_link( $mprbp_category );
			
			if (!$mprbp_category) {
				$read_more_text = 'Read more from the blog';
			} else {
				$read_more_text = "Read more posts in " . $cat_name;
			}
			
			echo "
			<section class='bg-".$mprbp_background_color." blog-posts-module'>
				<div class='container'>
					<h2>".$mprbp_title."</h2>";
				
				if ($mprbp_show_sticky_posts) {
					// Big blog cards
					$stickyArgs = array(
					    'post_type'      => 'post',
					    'post_status'	 => 'private',
					    'posts_per_page' => 1,
					    'order'          => 'DESC',
					    'category__in'	 => $mprbp_category,
					    'ignore_sticky_posts' => 0
					 );
					 
					$stickyQuery = new WP_Query($stickyArgs);
					 
					if ( $stickyQuery->have_posts() ) :
						echo	"<div class='row'>";
															 
						    while ( $stickyQuery->have_posts() ) : $stickyQuery->the_post();
							 	
								$categories = get_the_category();
								$category_color = $mprbp_card_color;
								
								include (get_template_directory().'/global-templates/cards/big-blog-card.php');	
								
							endwhile;
							
						echo "</div> <!-- end row -->";
					endif;					
				}
								
				// Small blog cards
				$args = array(
				    'post_type'      => 'post',
				    'post_status'	 => 'private',
				    'posts_per_page' => 3,
				    'order'          => 'DESC',
				    'category__in'	 => $mprbp_category,
				    'ignore_sticky_posts' => 1
				 );
				 
				$query = new WP_Query($args);
				 
				if ( $query->have_posts() ) :
					echo	"<div class='row'>";
														 
					    while ( $query->have_posts() ) : $query->the_post();
						 	
							$categories = get_the_category();
							$category_color = $mprbp_card_color;
							
							include (get_template_directory().'/global-templates/cards/small-blog-card.php');	
							
						endwhile;
						
					echo "</div> <!-- end row -->";
				endif;
				
				echo "
						<div class='row'>
							<div class='col-12'>		
								<div class='more-resources float-right'>
									<a href='".$cat_link."'>
										".$read_more_text."<img src='".get_template_directory_uri()."/images/icons/".$mprbp_card_color."-arrow.svg'>
									</a>
								</div>
							</div>
						</div>
						
					</div> <!-- end container -->
				</section>				
				
				";
				wp_reset_query();           
            

          // ----------------------------- //
         // ---- CASE: NEWSLETTER CTA ----//
        // ----------------------------- //
        elseif( get_row_layout() == 'module_newsletter_cta' ): 

			$mnc_title = get_sub_field('mnc_title');
			$mnc_link = get_sub_field('mnc_link');    
            $mnc_text = get_sub_field('mnc_text'); 
            
            echo "
			<section class='bg-dark-blue newsletter-cta'>
				<div class='container'>";
				
			
			if ($mnc_title) {
			echo	"<div class='row'>
						<div class='col-12'>
							<h2>".$mnc_title."</h2>
						</div>
					</div>";				
			}
			
			if ($mnc_text) {
			echo	"<div class='row'>
						<div class='col-12'>
							".$mnc_text."
						</div>
					</div>";				
			}
			
			if ($mnc_link) {
			echo	"<div class='row'>
						<div class='col-12'>
							<a href='".$mnc_link['url']."' target='".$mnc_link['target']."'>
								<div class='cta_link centered'>".$mnc_link['title']."</div>
							</a>
					</div>";				
			}
			
					
			echo "
				</div>
			</section>
           
           ";
        	
        	

          // ----------------------------- //
         // ---- CASE: CONTACT BLOCK ----//
        // ----------------------------- //
        elseif( get_row_layout() == 'module_contact_block' ): 
		
		$email = get_field('email', 'option');
		
		echo "
		<section class='social-cta'>
			<div class='container'>
				<div class='row'>
					<div class='col-md-6 col-12 sm-icons'>
						<h3>JOIN US ON SOCIAL</h3>
		";
		
		if( have_rows('social_media', 'option') ):
			while( have_rows('social_media', 'option') ): the_row();
			
				$social_media_type = get_sub_field('social_media_type', 'option');
				$social_media_link = get_sub_field('social_media_link', 'option');
				
				echo "
					<span class='sm-icon'>
						<a href='".$social_media_link['url']."' target='_blank'>
							<img src='".get_template_directory_uri()."/images/icons/peach-".$social_media_type.".svg' >
						</a>
					</span>			
				
				";
				
			endwhile;    
		endif;
		
		echo "
					</div>
					<div class='col-md-6 col-12 get-in-touch'>
						<div class='row'>
							<div class='col-12 centered'>
								<p>Email us for more information about how we can help</p>			
							</div>
						</div>
						<div class='row'>
							<div class='col-12 centered'>
								<a href='mailto:".$email."'>
						        	<div class='cta_link'>Get in touch</div>
						        </a>					
							</div>
						</div>						
					</div>		
				</div> <!-- end row -->
			</div> <!-- end container -->
		</section>		
		";


		    
        endif;        

    // End loop.
    endwhile;

// No value.
else :
    
endif;

?>