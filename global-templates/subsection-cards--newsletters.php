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
// QUERY newsletters only
$wpb_query = new WP_Query(array(
	'post_type'=>'post',
	'post_status'=>'publish',
	'posts_per_page'=> 3,
	'category_name'=>'newsletter'
)); ?>

<div class="row">							
<?php
	while ( $wpb_query->have_posts() ) : $wpb_query->the_post();
?>
	<div class="col-12 col-md-4">
		<a href="<?php the_permalink(); ?>" class="title">
			<div class="resource-card resource-card__mint">
				
					<?php if ( has_post_thumbnail() ) {
			    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\">";
					} else {
						echo "<img src='".$themes_path."/theme-eh-19/images/blog/placeholder.jpg'>";
					}?>
				<h3>
					<?php
					$thetitle = $post->post_title; /* or you can use get_the_title() */
					$getlength = strlen($thetitle);
					$thelength = 30;
					echo substr($thetitle, 0, $thelength);
					if ($getlength > $thelength) echo "...";
					?>									
				</h3>
				<p class="blog-excerpt"><?php the_excerpt() ?></p>
			</div>
		</a>
	</div>
<?php endwhile; ?>
</div>



<?php wp_reset_postdata(); ?>