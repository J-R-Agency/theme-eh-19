 <?php
/**
 * Template Name: Members Area -- Flexible Content Template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$themes_path = get_theme_root_uri(); 
get_header();
?>

<div class="container-fluid no-margins">

	<!-- Hero image -->
	<?php if ( has_post_thumbnail() ): ?>
		<?php $thumb = get_the_post_thumbnail_url(); ?>
		<div class="row">
			<div class="col-12">					
				<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
			</div>
		</div>					
	<?php endif ?>

	<!-- Page title -->
	<div class="row callout-banner callout-banner--tertiary">
		<div class="col-12">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	
	<!-- Flexible Content -->
	<div class="content">
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
		            <div class=\"module_content_block " . $module_content_block_modifier . "\" id=\"" . sanitize_title( $mcb_title ) . "\">";

				            
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
		        	
					echo "</div>"; // Close module_content_block
					endif;
				endwhile;
			else:
				//Do nothing
			endif;
			 
			?>				
	</div>
</div>

<div class="container-fluid blog-area">
	<!-- Recent blog posts -->
	<div class="row">
		<div class="col-12">
			<h1>Latest from the Members Blog</h1>
		</div>
	</div>

	<?php get_template_part( 'global-templates/subsection-cards--blog' ); ?>
	
	<div class="row">
		<div class="col-12">
			<div class="cta_link float-right">More from the Blog ></div>
		</div>
	</div>
	
	<!-- Videos -->
	<div class="row">
		<div class="col-12">
			<h1>Video channel</h1>
		</div>
	</div>
		
	<div class="row">
		<div class="col-12">
			<?php
			
			// Check value exists.
			if( have_rows('fc_content_block') ):
			
			    // Loop through rows.
			    while ( have_rows('fc_content_block') ) : the_row();
			    
			          // -------------------------- //
			         // ---- CASE: VIDEO BLOCK ----//
			        // -------------------------- //
			        if( get_row_layout() == 'module_video_block' ): 
			
			            $mvb_video_url = get_sub_field('mvb_video_url'); // oEmbed
						$mvb_video_title = get_sub_field('mvb_video_title'); // Text
						$mvb_style = get_sub_field('mvb_style'); // Select
			                        
			            echo '
			            <!-- Module Video Block -->
			            <div class="mvb_video_url">'. $mvb_video_url . '</div>';
					endif;
				endwhile;
			
			else:
				//Do nothing
			endif;
			 
			?>
		</div>
	</div>
		
	<div class="row">
		<div class="col-12">
			<div class="cta_link float-right">More of our Videos ></div>
		</div>
	</div>
		
</div>

<div class="container-fluid no-margins">
	<div class="content">
	<!-- INTRODUCTION -->
	
		<div class="module_content_block">
			<div class='row'>
				<div class='col-12'>
					<div class='line'>
						<img src="https://empowermenthouse.co.uk/wp-content/uploads/2020/01/hr-icon-house-circle-white.png" class='line-icon'>
					</div>
				</div>
			</div>
			<h2>Exclusive resources</h2>
			<div class="mcb_content mcb_style--primary mcb_cta_style--primary">
				<p>Aliquam fringilla blandit mattis. Sed eget gravida eros. Sed interdum, justo vel maximus sodales, purus enim elementum tellus, ac mattis ipsum dolor.</p>
			</div>
		</div>	
	
	
	<!-- NEWSLETTERS -->
	<div class="row">
		<div class="col-12">
			<h3>Newsletters</h3>
		</div>
	</div>
	<!-- Newsletters go here -->
	<div class="row">
		<div class="col-12">
			<div class="more-resources float-right"><a href="#">More Newsletters<img src="<?=$themes_path;?>/theme-eh-19/images/icons/teal-arrow.png"></a></div>
		</div>
	</div>
	
	<!-- EVENTS -->
	<div class="row">
		<div class="col-12">
			<h3>Events</h3>
		</div>
	</div>
	<!-- Events go here -->
	<div class="row">
		<div class="col-12">
			<div class="more-resources float-right"><a href="#">More Events<img src="<?=$themes_path;?>/theme-eh-19/images/icons/peach-arrow.png"></a></div>
		</div>
	</div>
		
	</div>
</div>

<!-- Primary Content CTA -->
<?php
	if( have_rows('primary_content_cta') ):
		while ( have_rows('primary_content_cta') ) : the_row();
	
			$primary_content_cta_text = get_sub_field('primary_content_cta_text');
			$primary_content_cta_link = get_sub_field('primary_content_cta_link');
			$primary_content_cta_button = get_sub_field('primary_content_cta_button'); // Button text

			if ( $primary_content_cta_text || $primary_content_cta_link || $primary_content_cta_button ):
				echo
				"
					<div class='module_rich_callout_banner_block mrcbb_style--tertiary'>
						<img src='".$themes_path."/theme-eh-19/images/separators/separator-white-nocircle.png' class='line-icon'>
						". $primary_content_cta_text ."
						<a href='". $primary_content_cta_link['url'] ."'>
							<div class='cta_link'>". $primary_content_cta_button . "</div>
						</a>
					</div>	
				";
			else:
				echo "";
			endif;
		endwhile;
	endif;
?>	



<?php 
get_footer();
?>
