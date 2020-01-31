<?php
/**
 * Template Name: Stories - Flexible Content Template
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
				<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
			</div>
		</div>					
	<?php endif ?>

	<!-- Page title -->
	<div class="row callout-banner callout-banner--stories">
		<div class="col-12 centered">
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

	<div class="content">
		<!-- Get Child Pages as subcontent -->
	    <?php include_once (get_template_directory() . '/global-templates/subsection-cards--stories.tpl'); ?>
	</div>

</div>

<?php 
get_footer();
?>
