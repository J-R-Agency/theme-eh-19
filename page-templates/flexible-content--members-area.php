 <?php
/**
 * Template Name: Members Area -- Flexible Content Template
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
	<div class="row callout-banner callout-banner--tertiary">
		<div class="col-12">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	
	<!-- Flexible Content -->
	<div class="content">
		<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>					
	</div>
</div>

<div class="container-fluid blog-area">
	<!-- Recent blog posts -->
	<div class="row">
		<div class="col-12">
			<h1>Latest from the Members Blog</h1>
		</div>
	</div>

	<?php include_once (get_template_directory() . '/global-templates/subsection-cards--blog.tpl'); ?>
	
	<div class="row">
		<div class="col-12">
			<div class="cta_link float-right">More from the Blog ></div>
		</div>
	</div>
	
	<!-- Videos -->
	<div class="row">
		<div class="col-12">
			<h1>Video channel</h1>
		</div>
	</div>
		
	<div class="row">
		<div class="col-12">
			Video here
		</div>
	</div>
		
	<div class="row">
		<div class="col-12">
			<div class="cta_link float-right">More of our Videos ></div>
		</div>
	</div>
		
</div>

<?php 
get_footer();
?>
