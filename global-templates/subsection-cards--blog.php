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
	
$excludeNewsletter = get_term_by( 'name', 'newsletter', 'category' );
$excludeEvents = get_term_by( 'name', 'events', 'category' );

// QUERY ALL except newsletters and events
$wpb_query = new WP_Query(array(
	'post_type'=>'post',
	'post_status'=>'publish',
	'posts_per_page'=> 3,
	'category__not_in' => array( $excludeNewsletter->term_id, $excludeEvents ->term_id )
));

?>

<div class="row">							
<?php if ( $wpb_query->have_posts() ) :
    $i = 0;
	while ( $wpb_query->have_posts() ) : $wpb_query->the_post();
		if ( $i == 0 ) :
?>
			<?php include (get_template_directory() . '/global-templates/cards/big-blog-card.php'); ?>
		<?php endif;?>
		
		<?php if($i != 0 ): ?>
			<?php include (get_template_directory() . '/global-templates/cards/small-blog-card.php'); ?>	
		<?php endif;?>
<?php $i++; ?>
<?php
    endwhile;
endif;
?>
</div>



<?php wp_reset_postdata(); ?>