<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$category_color = 'dark-blue';
$categories = get_the_category();
$term = get_queried_object_id();
?>

<?php

if (is_user_logged_in()) {
	$post_status = array('publish', 'private');
} else {
	$post_status = 'publish';
}

?>

<section>
	<div class="container">
		
		<!-- PUBLIC POSTS -->
		<div class="row">
			<div class="col-12">
				<h1 class="centered">
					<?php the_category( ',' ); ?>
				</h1><!-- .page-header -->
			</div>
		</div>
		
		<div class='row'>
			<?php
		    	
				$args = array(
				    'post_type'      => 'post', //write slug of post type
				    'order'          => 'DESC',
				    'post_status'	 => $post_status,
				    'ignore_sticky_posts' => 1,
				    'category__in'	=> $term,
				    'paged' => ( get_query_var('paged') ? get_query_var('paged') : 0)
				 );
				 
				$query = new WP_Query( $args );
				$wp_query = $query;
				 
				if ( $query->have_posts() ) :
				 
				    while ( $query->have_posts() ) : $query->the_post();
						
						include (get_template_directory().'/global-templates/cards/small-blog-card.php');	
						
					endwhile;
					
				endif; 
				wp_reset_postdata();
			?>
		</div>
		
		<div class='understrap-pagination'>
			<?php understrap_pagination(); ?>
		</div>
		
	</div> <!-- end container -->
</section>

<?php get_footer();
