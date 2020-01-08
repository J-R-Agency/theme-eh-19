<?php
/**
 * Template Name: Homepage Template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$themes_path = get_theme_root_uri();  

get_header();
?>

<div class="container-fluid no-margins">

	<!-- Hero image -->
	<?php if ( has_post_thumbnail() ): ?>
		<?php $thumb = get_the_post_thumbnail_url(); ?>
		<div class="row">
			<div class="col-12">					
				<div class="hero" style="background: url('<?php echo $thumb; ?>') no-repeat; background-size: cover;"></div>
			</div>
		</div>					
	<?php endif ?>
	
	<!-- Homepage Introduction -->
	<?php
		$homepage_title = get_field('homepage_title');
		$homepage_first_copy = get_field('homepage_first_copy');
		$homepage_second_copy = get_field('homepage_second_copy');
		$homepage_cta_text = get_field('homepage_cta_text');
		$homepage_cta_link = get_field('homepage_cta_link');
	?>
	<div class="homepage-introduction">
		
		<div class="row">
			<div class="col-12">
				<h1><?php echo $homepage_title ?></h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-6">
				<p class="first-copy"><?php echo $homepage_first_copy ?></p>
			</div>
			<div class="col-6 vertical-center">
				<p class="second-copy"><?php echo $homepage_second_copy ?></p>				
			</div>
		</div>
		
		<div class="row">
			<div class="col-12 centered mt-4">
				<a href=" <?php echo $homepage_cta_link['url'] ?> ">
		        	<div class="cta_link navy"> <?php echo $homepage_cta_text ?></div>
		        </a>				
			</div>
		</div>
	</div>
	
	<div class="content">
		<?php get_template_part( 'loop-templates/content', 'flexible' ); ?>
	</div>
	
	<div class="row social-cta">
		<div class="col-6 sm-icons">
			<h3>JOIN US ON SOCIAL</h3>
			
				<span class="sm-icon">
					<a href="https://www.facebook.com/empwrmenthouse/?__tn__=%2Cd%2CP-R&eid=ARCKAGZQDgh8aQUeF-acsP-5bOnU8jjC-A3UuYQUdAgJCyRf6qMlX2kS1VPoXbFLP3-MkyaKFGzc74h-" target="_blank">
						<img src="<?=$themes_path;?>/theme-eh-19/images/icons/peach-facebook.png" >
					</a>
				</span>
			
				<span class="sm-icon">
					<a href="https://www.instagram.com/empowrmenthouse/" target="_blank">
						<img src="<?=$themes_path;?>/theme-eh-19/images/icons/peach-instagram.png">
					</a>
				</span>
	
				<span class="sm-icon">
					<a href="https://twitter.com/empowrmenthouse" target="_blank">
						<img src="<?=$themes_path;?>/theme-eh-19/images/icons/peach-twitter.png">
					</a>
				</span>
			
				<span class="sm-icon">
					<a href="https://www.linkedin.com/in/mariehallempowr/" target="_blank">
						<img src="<?=$themes_path;?>/theme-eh-19/images/icons/peach-linkedin.png">
					</a>
				</span>			
		</div>
		<div class="col-6 get-in-touch">
			<div class="row">
				<div class="col-12">
					<p>Email us for more information about how we can help</p>			
				</div>
			</div>
			<div class="row">
				<div class="col-12 centered">
					<a href="#">
			        	<div class="cta_link">Get in touch</div>
			        </a>					
				</div>
			</div>						
		</div>		
	</div>
	
</div>

<?php 
get_footer();
?>