<?php
/**
 * Hero setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php if ( has_post_thumbnail() ): ?>
	<?php $thumb = get_the_post_thumbnail_url(); ?>
	<div class="row">
		<div class="col-12">					
			<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
		</div>
	</div>					
<?php endif ?>
