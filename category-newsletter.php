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
$themes_path = get_theme_root_uri();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
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
						<?php get_template_part( 'global-templates/subsection-cards--newsletters' ); ?>
						
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

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer();
