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


<?php wp_reset_postdata(); ?>