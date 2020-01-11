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

$themes_path = get_theme_root_uri();  
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
								<div class="row mt-4 mb-4">
									<div class="col-12">
									
										<span class="footer-menu-item">
											<a href="https://www.facebook.com/empwrmenthouse/?__tn__=%2Cd%2CP-R&eid=ARCKAGZQDgh8aQUeF-acsP-5bOnU8jjC-A3UuYQUdAgJCyRf6qMlX2kS1VPoXbFLP3-MkyaKFGzc74h-" target="_blank">
												<img src="<?=$themes_path;?>/theme-eh-19/images/icons/grey-facebook.png" >
											</a>
										</span>
									
										<span class="footer-menu-item">
											<a href="https://www.instagram.com/empowrmenthouse/" target="_blank">
												<img src="<?=$themes_path;?>/theme-eh-19/images/icons/grey-instagram.png">
											</a>
										</span>

										<span class="footer-menu-item">
											<a href="https://twitter.com/empowrmenthouse" target="_blank">
												<img src="<?=$themes_path;?>/theme-eh-19/images/icons/grey-twitter.png">
											</a>
										</span>
									
										<span class="footer-menu-item">
											<a href="https://www.linkedin.com/in/mariehallempowr/" target="_blank">
												<img src="<?=$themes_path;?>/theme-eh-19/images/icons/grey-linkedin.png">
											</a>
										</span>
										
									</div>
								</div>
								
								<div class="row mt-4">
									<div class="col-12">
										<!-- Disable footer menu
										<?php
											wp_nav_menu(
											  array(
											    'menu' => 'footer-menu',
											    'link_before' => '<span class="footer-menu-item">',
											    'link_after' => '</span>',
											  )
											);	
										?>			
										-->															
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

