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
	'posts_per_page'=>4,
)); ?>

<div class="row">							
 Testing
</div>



<?php wp_reset_postdata(); ?>