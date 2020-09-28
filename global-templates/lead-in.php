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
	$lead_in = get_field('lead_in');
	
	if (!empty ($lead_in)): ?>
	<section>
		<div class='container'>
			<div class="row lead-in">
				<div class="col-12">
					<p><?php echo $lead_in; ?></p>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>
