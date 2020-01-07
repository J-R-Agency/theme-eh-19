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

	<!-- Hero image -->
	<?php if ( has_post_thumbnail() ): ?>
		<?php $thumb = get_the_post_thumbnail_url(); ?>
		<div class="row">
			<div class="col-12">					
				<div class="hero" style="background: url('<?php echo $thumb; ?>') no-repeat; background-size: cover;"></div>
			</div>
		</div>					
	<?php endif ?>

	<!-- Page title -->
	<div class="row">
		<div class="col-12 centered mt-5 mb-5">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	
	<!-- Lead in -->
	<?php
		$subtitle = get_field('subtitle');
		
		if (!empty ($subtitle)): ?>
		<div class="row subtitle">
			<div class="col-12">
				<p><?php echo $subtitle; ?></p>
			</div>
		</div>
	<?php endif ?>

	
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
		<?php
			$lead_in = get_field('lead_in');
			
			if (!empty ($lead_in)): ?>
			<div class="row lead-in">
				<div class="col-12">
					<p><?php echo $lead_in; ?></p>
				</div>
			</div>
		<?php endif ?>

		<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>
		
	</div>
	
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
						        	<div class=\"mcb_cta_link\">". $primary_content_cta_button . "</div>
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
