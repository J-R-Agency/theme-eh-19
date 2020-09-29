<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<section>
	
	<?php while ( have_posts() ) : the_post(); ?>
		
		<?php get_template_part( 'loop-templates/content', 'single' ); ?>

	<?php endwhile; // end of the loop. ?>

	
</section>

<?php get_footer(); ?>
