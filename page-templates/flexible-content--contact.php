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
	<?php if ( has_post_thumbnail() ): ?>
		<?php $thumb = get_the_post_thumbnail_url(); ?>
		<div class="row">
			<div class="col-12">					
				<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
			</div>
		</div>					
	<?php endif ?>

	<!-- Page title -->
	<div class="row callout-banner callout-banner--contact">
		<div class="col-12">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	
	<!-- Subtitle -->
	<?php
		$subtitle = get_field('subtitle');
		
		if (!empty ($subtitle)): ?>
		<div class="row subtitle">
			<div class="col-12">
				<h1><?php echo $subtitle; ?></h1>
			</div>
		</div>
	<?php endif ?>
	
	<div class="content">
		<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>					
	</div>
	
</div>

<?php 
get_footer();
?>
