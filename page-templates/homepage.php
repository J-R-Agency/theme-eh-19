<?php
/**
 * Template Name: Homepage Template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$themes_path = get_theme_root_uri();  

get_header();
?>

	<!-- Hero image -->
	<?php include_once (get_template_directory() . '/global-templates/hero.php'); ?>
	
	<!-- Homepage Introduction -->
	<?php
		$homepage_title = get_field('homepage_title');
		$homepage_first_copy = get_field('homepage_first_copy');
		$homepage_second_copy = get_field('homepage_second_copy');
		$homepage_cta_text = get_field('homepage_cta_text');
		$homepage_cta_link = get_field('homepage_cta_link');
	?>
	
	<div class="homepage-introduction">
		<div class='container'>
			<div class="row">
				<div class="col-12">
					<h1><?php echo $homepage_title ?></h1>
				</div>
			</div>
			
			<div class="homepage-copy">
				<?php if ($homepage_first_copy): ?>
					<div class="first-copy"><?php echo $homepage_first_copy; ?></div>
				<?php endif; ?>
				
				<?php if ($homepage_second_copy): ?>
					<div class="second-copy"><?php echo $homepage_second_copy; ?></div>
				<?php endif; ?>			
			</div>
			
			<div class="row">
				<div class="col-12 centered">
					<a href=" <?php echo $homepage_cta_link['url'] ?> ">
			        	<div class="cta_link navy"> <?php echo $homepage_cta_text; ?></div>
			        </a>				
				</div>
			</div>
		</div>
	</div>
	
	<!-- Flexible Content -->
	<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>	
	
<?php 
get_footer();
?>