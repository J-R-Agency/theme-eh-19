 <?php
/**
 * Template Name: Membership -- Flexible Content Template
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
		
		<!-- Membership Benefits Section -->

		<?php

		$membership_benefits_copy = get_field('membership_benefits_copy');
		$membership_benefits_list = get_field('membership_benefits_list');
		$membership_benefits_cta = get_field('membership_benefits_cta');
		$modifier = get_field('modifier');
		
		if ( $membership_benefits_copy && $membership_benefits_list ):

			echo "<div class=\"membership_benefits_container\">";

			if( $membership_benefits_copy ):
				echo "<div class=\"membership_benefits_item membership_benefits_copy\" id=\"membership_benefits_copy\">";
				echo $membership_benefits_copy;
				echo "</div>";
			endif;


			if( have_rows('membership_benefits_list') ):

				echo "<div class=\"membership_benefits_item membership_benefits_list\" id=\"membership_benefits_list\">";

					echo "<ul id=\"membership_benefits_list_items\">";

				while ( have_rows('membership_benefits_list') ) : the_row();
			
					$membership_benefits_list_item = get_sub_field('membership_benefits_list_item');

					if ( $membership_benefits_list_item ):
						echo "<li>" . $membership_benefits_list_item . "</li>";
					else:
						echo "";
					endif;
				endwhile;

					echo "</ul>";
				echo "</div>";

			endif;

			echo "</div>";
		endif;

		?>


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
						<div class='row primary_content_cta'>
							<div class='col-12'>
								<p>". $primary_content_cta_text ."</p>
							</div>
							
							<div class='col-12'>
								<a href='". $primary_content_cta_link['url'] ."'>
						        	<div class='cta_link'>". $primary_content_cta_button . "</div>
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
	
</div>

<?php 
get_footer();
?>
