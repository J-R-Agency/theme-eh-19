<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
		<?php if ( has_post_thumbnail() ): ?>
			<?php $thumb = get_the_post_thumbnail_url(); ?>
				<div class="hero" style="background: url('<?php echo $thumb; ?>') no-repeat; background-size: cover;"></div>	
		<?php endif ?>
	
		<header class="entry-header">
			<?php $category = get_the_category();
				if(!empty($category)) {
					$firstCategory = $category[0]->cat_name;
				}
			?>
			<span class="category-title centered"><?php echo $firstCategory; ?></span>
				
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
			<h4 class="post-excerpt">Vestibulum molestie, ex vitae ornare ullamcorper, mi sapien commodo mi, maximus volutpat orci nibh nec dolor. Proin vitae justo id ipsum ultricies molestie. Sed vitae tortor sagittis, malesuada elit quis, ornare lorem. Orci varius natoque penatibus et magnis dis parturient montes.</h4>
	
			<!--<div class="entry-meta">
	
				<?php understrap_posted_on(); ?>
	
			</div><!-- .entry-meta -->
	
		</header><!-- .entry-header -->
		
		<div class="entry-content">
	
			<?php the_content(); ?>
	
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				)
			);
			?>
	
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">
			<?php understrap_entry_footer(); ?>
	
		</footer><!-- .entry-footer -->
	
	</article><!-- #post-## -->
</div>