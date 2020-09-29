<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<?php if ( have_posts() ) : ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="centered">
					<?php
					the_category( ', ' );
					?>
				</h1><!-- .page-header -->
			</div>
		</div>
		
		<!-- POST LOOP -->
		<?php get_template_part( 'global-templates/subsection-cards--blog' ); ?>
		
		<div class="row">
			<div class="col-12">
				<a href="<?php echo site_url(); ?>/members-area/">Back to Members Area</a>
			</div>
		</div>
	</div> <!-- end container -->
</section>

<?php else : ?>

	<?php get_template_part( 'loop-templates/content', 'none' ); ?>

<?php endif; ?>

<?php get_footer();
