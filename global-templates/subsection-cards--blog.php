<?php
/**
 * Subsection cards for the blog
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$themes_path = get_theme_root_uri(); 
?>

<?php
// QUERY ALL
$wpb_query = new WP_Query(array(
	'post_type'=>'post',
	'post_status'=>'publish',
	'posts_per_page'=>3,
	'orderby' => 1;
)); ?>

<div class="row">							
<?php if ( $wpb_query->have_posts() ) :
    $i = 0;
	while ( $wpb_query->have_posts() ) : $wpb_query->the_post();
		if ( $i == 0 ) :
?>
			<div class="col-12">
				<a href="<?php the_permalink(); ?>" class="title">
					<div class="blog-card">
						<div>
							<?php if ( has_post_thumbnail() ) {
					    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\">";
							} else {
								echo "<img src='".$themes_path."/theme-eh-19/images/blog/placeholder.jpg'>";
							}?>
					    </div><!--end image -->	
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt() ?>
					</div>
				</a>
			</div>
		<?php endif;?>
		<?php if($i != 0 ): ?>
					<div class="col-12 col-md-4">
						<a href="<?php the_permalink(); ?>" class="title">
							<div class="blog-card blog-card__small">
								
									<?php if ( has_post_thumbnail() ) {
							    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\">";
									} else {
										echo "<img src='".$themes_path."/theme-eh-19/images/blog/placeholder.jpg'>";
									}?>
								<h3><?php the_title(); ?></h3>
								<p class="blog-excerpt"><?php the_excerpt() ?></p>
							</div>
						</a>
					</div>
		<?php endif;?>
<?php $i++; ?>
<?php
    endwhile;
endif;
?>
</div>



<?php wp_reset_postdata(); ?>