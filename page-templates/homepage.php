<?php
/**
 * Template Name: Homepage Template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="container-fluid no-margins">
	
	<?php if ( has_post_thumbnail() ): ?>
		<?php $thumb = get_the_post_thumbnail_url(); ?>
			<div class="hero" style="background: url('<?php echo $thumb; ?>') no-repeat; background-size: cover;"></div>	
	<?php endif ?>
	
	<div class="row">
		<div class="col-12">
			<h1><?php the_field('homepage_header'); ?></h1>
			<h2>Subheader</h2>
			<p>Test<p>
		</div>
	</div>
	
</div>

<?php 
get_footer();
?>
