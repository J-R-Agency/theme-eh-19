<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">
						
						<!-- CONTENT -->
						<div class="row">
							<div class="col-md-6 col-12">
								<p>Empowerment House &#169; 2019</p>
								<p class="no-margins">Business address:</p>
								<p class="no-margins">61 Rodney Street, Merseyside,</p>
								<p class="no-margins">England, L1 9ER</p>
								<p class="no-margins">Registered Business Number:</p>

							</div>
							<div class="col-md-6 col-12">
								<div class="row">
									<div class="col-12">
										<p>Icons go here</p>
									</div>
								</div>
								
								<div class="row">
									<div class="col-12">
										<?php
											wp_nav_menu(
											  array(
											    'menu' => 'social-media-menu',
											    'link_before' => '<span class="footer-menu-item">',
											    'link_after' => '</span>',
											  )
											);	
										?>
									</div>
								</div>
								
							</div>
						</div>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

