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
							
							<!-- LEFT -->
							<div class="col-md-6 col-12">
								<p>Empowerment House &#169; 2019</p>
								
								<?php
									
								$business_address = get_field('business_address', 'option');
								$business_number = get_field('business_number', 'option');
								
								if ($business_address) {
									echo "<p>Business address:</p>";
									echo $business_address;
								}
								
								if ($business_number) {
									echo "<p>Business number:</p>";
									echo $business_number;
								}
								
								?>

							</div>
							
							<!-- RIGHT -->
							<div class="col-md-6 col-12">
								<div class='container'>
									<div class="row mt-4 mb-4">
										<div class="col-12 sm-icons">
										
										<?php
										if( have_rows('social_media', 'option') ):
											while( have_rows('social_media', 'option') ): the_row();
											
												$social_media_type = get_sub_field('social_media_type', 'option');
												$social_media_link = get_sub_field('social_media_link', 'option');
												
												echo "
													<span class='sm-icon'>
														<a href='".$social_media_link['url']."' target='_blank'>
															<img src='".get_template_directory_uri()."/images/icons/grey-".$social_media_type.".svg' >
														</a>
													</span>			
												
												";
												
											endwhile;    
										endif;											
										?>
											
										</div>
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

