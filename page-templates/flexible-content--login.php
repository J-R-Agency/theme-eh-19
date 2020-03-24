 <?php
/**
 * Template Name: Login -- Flexible Content Template
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
			<h1>MEMBERSHIP</h1>
		</div>
	</div>

	<section class="container-fluid form-area">
			<div class="row">
				
				<div class="col-12 col-md-6">
					<div class="form form__registration">
						<h1>Join empowerment house</h1>
						<p>&nbsp;</p>
						<!-- form id="registerform-custom">
							<p class="register-username">
								<input type="text" name="log" placeholder="Username" id="user_login" class="input" value="" size="20" autocomplete="off">
							</p>
							<p class="register-password">
								<input type="password" name="pwd" placeholder="Password" id="user_pass" class="input" value="" size="20" autocomplete="off">
							</p>
							<p class="register-submit">
								<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="SIGN ME UP">
							</p>
						</form -->
						<div>
							<a  class="cta_link navy centered button button-primary" href="mailto:info@empowermenthouse.co.uk" title="Sign me up">Sign me up</a>
						</div>
					</div>
				</div>
				
				<div class="col-12 col-md-6">
					<div class="form form__login">
						<h1>log into your members area</h1>
						<p>&nbsp;</p>
						<?php
							if ( ! is_user_logged_in() ) { // Display WordPress login form:
							    $args = array(
							        'redirect' => site_url( '/members-area/' ), 
							        'form_id' => 'loginform-custom',
							        'label_username' => __( '' ),
							        'label_password' => __( '' ),
							        'label_remember' => __( '' ),
							        'label_log_in' => __( 'LOG IN' ),
							        'remember' => false,
							        'echo' => false
							    );
							    $loginForm = wp_login_form( $args );
							    
							    $loginForm = str_replace('name="log"', 'name="log" placeholder="Username"', $loginForm);
								$loginForm = str_replace('name="pwd"', 'name="pwd" placeholder="Password"', $loginForm);
								
								echo $loginForm;
								
							} else { // If logged in:
								$redirect = 'login';
								$link = '<a href="' . esc_url( wp_logout_url( $redirect ) ) . '" class="logout-link">' . __( 'Log out' ) . '</a>';
								echo apply_filters( 'loginout', $link );
								//echo "<div class='logout-link'>";
							    //wp_loginout( home_url() ); // Display "Log Out" link.
							    //echo "</div>";
							}
						?>
					</div>				
				</div>
				
			</div>
		</section>
	
	<div class="content">
		

		<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>					
	</div>
	
</div>

<?php 
get_footer();
?>
