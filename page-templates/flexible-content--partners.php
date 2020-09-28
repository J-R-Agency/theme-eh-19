<?php
/**
 * Template Name: Partners - Flexible Content Template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="container-fluid no-margins">

	<!-- Hero image -->
	<?php include_once (get_template_directory() . '/global-templates/hero.php'); ?>

	<!-- Page title -->
	<?php include_once (get_template_directory() . '/global-templates/page-title.php'); ?>
	
	<!-- Subtitle -->
	<?php include_once (get_template_directory() . '/global-templates/subtitle.php'); ?>

	<div class="content">
		
		<!-- Lead in -->
		<?php include_once (get_template_directory() . '/global-templates/lead-in.php'); ?>

		<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>
		
	</div>
	
	<!-- Get Child Pages as subcontent -->
	
    <?php include_once (get_template_directory() . '/global-templates/subsection-cards--partners.tpl'); ?>

</div>

<!-- General Content Block -->	
<?php
	if( have_rows('content_block_repeater') ):
		while ( have_rows('content_block_repeater') ) : the_row();
		
	        $gcb_divider_icon = get_sub_field('gcb_divider_icon'); // Image
			$gcb_title = get_sub_field('gcb_title'); // Title
			$gcb_image = get_sub_field('gcb_image'); // Image
			$gcb_body = get_sub_field('gcb_body'); // Body text
			$gcb_cta = get_sub_field('gcb_cta'); // CTA Link
			$gcb_modifier = get_sub_field('modifier'); // CTA Link

			// DIVIDER
			if( !empty($gcb_divider_icon) ):
	        	echo
	        	"
	        	<div class='row'>
	        		<div class='col-12'>
	        			<div class='line-icon-overlap'>
	        				<img src='". $gcb_divider_icon['url'] ."' alt='".$gcb_divider_icon['alt']." class='line-icon'>
	        			</div>
	        		</div>
	        	</div>";
	        endif;	
			
			echo
			"
				<div class='general_content_block $gcb_modifier'>
			";
		
			
			if (!empty ($gcb_image)):
				echo
				"
				<div class='row'>
						<div class='col-12'>
		            		<img src='". $gcb_image['url'] ."' alt='".$gcb_image['alt']."'>
		            	</div>	
		            </div>
			    ";
		    endif;
		    
		    echo
		    "				
					<div class='row gcb_title'>
						<div class='col-12'>
							<h2>". $gcb_title ."</h2>
						</div>
					</div>
					
					<div class='row gcb_body'>
						<div class='col-12'>
							<p>". $gcb_body ."</p>
					    </div>						
					</div>
			";
			
        	if( !empty($gcb_cta) ):
        		echo 
        			"<a href=\"". $gcb_cta['url'] ."\">
        				<div class=\"cta_link centered\">". $gcb_cta['title'] ."</div>
        			</a>";
        	endif;
        	
        	echo "</div>"; // Close general content block
			
		endwhile;
	endif;
?>
	
<?php 
get_footer();
?>
