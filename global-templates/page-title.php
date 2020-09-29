<?php
/**
 * Hero setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php
	$page_title_color = get_field('page_title_color');	
?>

<section class='bg-<?php echo $page_title_color; ?>'>
	<div class='container'>
		<div class="row page-title">
			<div class="col-12 centered">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>