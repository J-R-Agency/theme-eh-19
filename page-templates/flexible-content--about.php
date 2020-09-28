 <?php
/**
 * Template Name: About -- Flexible Content Template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<!-- Hero image -->
<?php include_once (get_template_directory() . '/global-templates/hero.php'); ?>

<!-- Page title -->
<?php include_once (get_template_directory() . '/global-templates/page-title.php'); ?>

<!-- Subtitle -->
<?php include_once (get_template_directory() . '/global-templates/subtitle.php'); ?>


<!-- Callout Banner -->
<?php
	$callout_banner = get_field('callout_banner');
	if (!empty ($callout_banner)): ?>
	<div class="row callout-banner">
		<div class="col-12">
			<p><?php echo $callout_banner; ?></p>
		</div>
	</div>
<?php endif ?>

<div class="content">
	
	<!-- Lead in -->
	<?php include_once (get_template_directory() . '/global-templates/lead-in.php'); ?>

	<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>
	
</div>

<?php


$afib_title = get_field('afib_title'); // Text
$afib_subtitle = get_field('afib_subtitle'); // Text 
$afib_image = get_field('afib_image'); // Image array
$afib_body = get_field('afib_body'); // Wysiwyg
$afib_twitter_cta = get_field('afib_twitter_cta'); // Link array
$afib_linkedin_cta = get_field('afib_linkedin_cta'); // Link array


echo "
<!-- About Feature Image Block -->
<div class=\"content module_content_block\">
    <div class=\"module_about_feature_image_block\">" .
    	"<div class=\" \">" ;
if ($afib_title):
	echo 
    "<h2>" . $afib_title . "</h2>";
endif;
if ($afib_subtitle):
	echo 
    "<h3>" . $afib_subtitle . "</h3>";
endif;
if ($afib_image):
	echo 
    "<img src=\"". $afib_image['url'] ."\" alt=\"".$afib_image['alt']."\" class=\"avatar--about\">";
endif;
if ($afib_body):
	echo "<div class=\"afib_body mcb_content grey-content\">" . $afib_body ;

    if ($afib_twitter_cta || $afib_linkedin_cta):
		echo "<div class=\"flex-wrapper\">";

		if ($afib_twitter_cta):
			echo "
			<div class=\"flex-item col-12\">
				<a href=\"". $afib_twitter_cta['url'] ."\" target=\"_blank\">
			    	<div class=\"cta_link\">". $afib_twitter_cta['title'] . "</div>
			    </a>
			</div>";
		endif;
		if ($afib_linkedin_cta):
			echo "
			<div class=\"flex-item col-12\">
				<a href=\"". $afib_linkedin_cta['url'] ."\" target=\"_blank\">
			    	<div class=\"cta_link\">". $afib_linkedin_cta['title'] . "</div>
			    </a>
			</div>";
		endif;

		echo "</div>";
	endif;

    echo "</div>";
endif;

	echo		
    "	</div>
    </div>
</div>";


?>



<!-- Primary Content CTA -->
<?php
	if( have_rows('primary_content_cta') ):
		while ( have_rows('primary_content_cta') ) : the_row();
	
			$primary_content_cta_text = get_sub_field('primary_content_cta_text');
			$primary_content_cta_link = get_sub_field('primary_content_cta_link');
			$primary_content_cta_button = get_sub_field('primary_content_cta_button'); // Button text
			
			if (!empty ($primary_content_cta_text)):
				echo
				"
					<div class='row primary_content_cta'>
						<div class='col-12'>
							<p>". $primary_content_cta_text ."</p>
						</div>
						
						<div class='col-12'>
							<a href=\"". $primary_content_cta_link['url'] ."\">
					        	<div class=\"cta_link\">". $primary_content_cta_button . "</div>
					        </a>
					    </div>						
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
