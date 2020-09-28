 <?php
/**
 * Template Name: Contact -- Flexible Content Template
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
		<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>					
	</div>
	
</div>

<?php 
get_footer();
?>
