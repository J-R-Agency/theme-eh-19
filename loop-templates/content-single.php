<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
		<?php if ( has_post_thumbnail() ): ?>
			<?php $thumb = get_the_post_thumbnail_url(); ?>
				<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
		<?php endif ?>
	
		<header class="entry-header">
			<?php $category = get_the_category();
				if(!empty($category)) {
					$firstCategory = $category[0]->cat_name;
				}
			?>
			<span class="category-title centered"><?php echo $firstCategory; ?></span>
				
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php 
			// Get custom Blog Post Options
            $standfirst = get_field('standfirst'); //  WYSIWYG block
            if ( $standfirst ){
            	echo "<div class=\"post-excerpt\">" . $standfirst . "</div>";
            }
            ?>
	
		</header><!-- .entry-header -->
		
		<div class="entry-content">

			<!-- Social Media 1 -->
			<!-- HIDE FOR NOW
			<div class="row social-media-header centered">
					<?php //include get_template_directory() ."/inc/social-media-share.php"; ?>
			</div>
			-->
			<div class="row">
				<div class="col-12 mt-5">
					<?php the_content(); ?>					
				</div>
			</div>
				
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				)
			);
			?>
			
		<!-- Social Media 2 -->
		<!-- HIDE FOR NOW
		<div class="row social-media-footer centered">
				<?php //include get_template_directory() ."/inc/social-media-share.php"; ?>
		</div>
		-->
		<!-- AUTHOR BIO -->
		<?php		
			// Get author's display name 
			$display_name = get_the_author_meta( 'display_name', $post->post_author );
				  
			// Get author's biographical information or description
			$user_description = get_the_author_meta( 'user_description', $post->post_author );
			  
			// Get author's website URL 
			$user_website = get_the_author_meta('url', $post->post_author);
			  
			// Get link to the author archive page
			$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
			
			// Get avatar
			$user_avatar = get_avatar( get_the_author_meta('user_email') , 90 );
			
			// Get job role
			$job_role = get_the_author_meta('job-role', $post->post_author);
			
			$author_details = null;		
		?>
		
		<div class="row author-bio-section">
			<div class="col-md-4 col-12">
				<?php echo get_avatar( get_the_author_meta('user_email') , 240 ); ?>
			</div>
			<div class="col-md-8 vertical-center">
				<div class="row">
					<div class="col-12">
						<h3><?php echo $display_name; ?> </h3>
						<h4><?php echo $job_role; ?></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<p class="author_description">
							<?php echo $user_description; ?>
						</p>
					</div>
				</div>
				<div class="row author-bio-section">
					<?php echo $author_details; ?>
				</div>
			</div>
		</div>	<!-- end author bio section -->		
		
			
		</div><!-- .entry-content -->

		<!--
		<?php $uploads = wp_upload_dir(); ?>
		<div class="row related-articles">
			<img class="line-icon-overlap" src="<?php //echo $uploads['baseurl'] ; ?>/2019/12/eh-house-icon-grey.png" alt="icon">
			<div class="col-12">
				<h1 class="centered">Related Articles</h1>
			</div>
		</div>
		-->
		
		<!--<footer class="entry-footer">
			<?php understrap_entry_footer(); ?>-->
	
		<!--</footer><!-- .entry-footer -->
	
	</article><!-- #post-## -->
</div>