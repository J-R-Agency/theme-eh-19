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

<!-- Hero image -->
<?php include_once (get_template_directory() . '/global-templates/hero.php'); ?>

<!-- Page title -->
<?php include_once (get_template_directory() . '/global-templates/page-title.php'); ?>

<!-- Subtitle -->
<?php include_once (get_template_directory() . '/global-templates/subtitle.php'); ?>

<!-- Flexible Content -->
<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>					

<?php 
get_footer();
?>
