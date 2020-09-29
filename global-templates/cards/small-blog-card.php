<?php
/**
 * Subsection cards for the blog
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$themes_path = get_theme_root_uri(); 
$categories = get_the_category();

if (!$mpbp_category) {
	$category_color = 'dark-blue';
} else {
	$category_color = $mpbp_card_color;
}
?>

<div class="col-12 col-md-4">
	<a href="<?php the_permalink(); ?>" class="title">
		<div class="blog-card blog-card__small blog-card__<?php echo $category_color; ?>">
			
				<?php if ( has_post_thumbnail() ) {
		    		echo "<img src=\"" . get_the_post_thumbnail_url() . "\">";
				} else {
					echo "<img src='".$themes_path."/theme-eh-19/images/blog/placeholder.jpg'>";
				}?>
			<h3>
				<?php
				$thetitle = $post->post_title; /* or you can use get_the_title() */
				echo $thetitle;
				?>									
			</h3>
			<div class="blog-excerpt">
				<?php the_excerpt() ?>
			</div>
		</div>
	</a>
</div>


<?php wp_reset_postdata(); ?>