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

	<div class="content">
		<!-- Get Child Pages as subcontent -->
	    <?php include_once (get_template_directory() . '/global-templates/subsection-cards--stories.tpl'); ?>
	</div>


<?php 
get_footer();
?>
