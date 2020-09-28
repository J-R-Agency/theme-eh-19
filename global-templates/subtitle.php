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
	$subtitle = get_field('subtitle');
	
	if (!empty ($subtitle)): ?>
	<section>
		<div class='container'>
			<div class="row subtitle">
				<div class="col-12">
					<?php echo $subtitle; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>
