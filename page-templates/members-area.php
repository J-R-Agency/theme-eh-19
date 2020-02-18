 <?php
/**
 * Template Name: Members Area
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$themes_path = get_theme_root_uri(); 
get_header();
?>

<!-- Variables -->
<?php
	$subtitle = get_field('subtitle');
	$lead_in = get_field('lead_in');
	$members_blog_section_title = get_field('members_blog_section_title');
	$members_video_section_title = get_field('members_video_section_title');
	$members_video_url = get_field('members_video_url');
	$exclusive_resources_section_title = get_field('exclusive_resources_section_title');
	$exclusive_resources_body_content = get_field('exclusive_resources_body_content');
	$callout_cta_banner_title = get_field('callout_cta_banner_title');
	$callout_cta_body_content = get_field('callout_cta_body_content');
	$callout_cta_link = get_field('callout_cta_link');
	$additional_resources_title = get_field('additional_resources_title');
	$additional_resources_description = get_field('additional_resources_description');
?>

<div class="container-fluid no-margins">

	<!-- Hero image -->
	<?php if ( has_post_thumbnail() ): ?>
		<?php $thumb = get_the_post_thumbnail_url(); ?>
		<div class="row">
			<div class="col-12">					
				<div class="hero" style="background-image: url('<?php echo $thumb; ?>');"></div>
			</div>
		</div>					
	<?php endif ?>

	<!-- Page title -->
	<div class="row callout-banner callout-banner--tertiary">
		<div class="col-12">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>

<!-- INTRODUCTION -->
	<div class="content">
		<div class="module_content_block module_content_block--primary">
			<h2 class="mcb_title mcb_title--primary"><?php echo $subtitle; ?></h2>
			<div class="mcb_content mcb_style--primary mcb_cta_style--primary">
				<p>
					<?php echo $lead_in; ?>
				</p>
			</div>
		</div>			
	</div>
</div>

<!-- RECENT BLOG POSTS -->
<section class="blog-area">
	<div class="container">
		<!-- Recent blog posts -->
		<div class="row">
			<div class="col-12">
				<h1><?php echo $members_blog_section_title; ?></h1>
			</div>
		</div>
	
		<?php get_template_part( 'global-templates/subsection-cards--blog' ); ?>
		
		<div class="row">
			<div class="col-12">
				<a href="<?php echo site_url(); ?>/blog/">
					<div class="cta_link float-right">More from the Blog ></div>
				</a>
			</div>
		</div>
		
		<!-- Videos -->
		<div class="row">
			<div class="col-12">
				<h1><?php echo $members_video_section_title; ?></h1>
			</div>
		</div>
			
		<div class="row">
			<div class="col-12">
				<?php       
		            echo '
		            <!-- Module Video Block -->
		            <div class="mvb_video_url">'. $members_video_url . '</div>';
				?>
			</div>
		</div>
			
		<div class="row">
			<div class="col-12">
				<div class="cta_link float-right">More of our Videos ></div>
			</div>
		</div>
	</div>
</div>

<!-- EXCLUSIVE RESOURCES -->
<div class="container">
	<!-- INTRODUCTION -->
		<div class="module_content_block">
			<div class='row'>
				<div class='col-12'>
					<div class='line'>
						<img src="https://empowermenthouse.co.uk/wp-content/uploads/2020/01/hr-icon-house-circle-white.png" class='line-icon'>
					</div>
				</div>
			</div>
			<h2><?php echo $exclusive_resources_section_title; ?></h2>
			<div class="mcb_content mcb_style--primary mcb_cta_style--primary">
				<p><?php echo $exclusive_resources_body_content; ?></p>
			</div>
		</div>	
	
	
	<!-- NEWSLETTERS -->
	<div class="row">
		<div class="col-12">
			<h3>Newsletters</h3>
		</div>
	</div>
	
	<?php get_template_part( 'global-templates/subsection-cards--newsletters' ); ?>
	
	<div class="row">
		<div class="col-12">		
			<div class="more-resources float-right">
				<?php
				    // Get the ID of a given category
				    $newsletter_id = get_cat_ID( 'newsletter' );
				    // Get the URL of this category
				    $newsletter_link = get_category_link( $newsletter_id );
				?>				
				<a href="<?php echo esc_url( $newsletter_link ); ?>">
					More Newsletters<img src="<?=$themes_path;?>/theme-eh-19/images/icons/teal-arrow.png">
				</a>
			</div>
		</div>
	</div>
	
	<!-- EVENTS -->
	<div class="row">
		<div class="col-12">
			<h3>Events</h3>
		</div>
	</div>
	<?php get_template_part( 'global-templates/subsection-cards--events' ); ?>
	
	<div class="row">
		<div class="col-12">
			<div class="more-resources float-right">
				<?php
				    // Get the ID of a given category
				    $events_id = get_cat_ID( 'events' );
				
				    // Get the URL of this category
				    $events_link = get_category_link( $events_id );
				?>					
				<a href="<?php echo esc_url( $events_link ); ?>">
					More Events<img src="<?=$themes_path;?>/theme-eh-19/images/icons/peach-arrow.png">
				</a>
			</div>
		</div>
	</div>
		
</div>

<!-- Primary Content CTA -->
<div class="container-fluid no-margins">
	<div class="row">
		<div class="col-12">	
			<div class='module_rich_callout_banner_block mrcbb_style--tertiary'>
				<div class='row'>
					<div class='col-12'>
						<img src='<?php echo $themes_path; ?>/theme-eh-19/images/separators/separator-white-nocircle.png' class='line-icon'>
					</div>
				</div>
				<div class='row'>
					<div class='col-12'>
						<h1><?php echo $callout_cta_banner_title; ?></h1>
						<p><?php echo $callout_cta_body_content; ?></p>
					</div>
				</div>
				<div class='row'>
					<div class='col-12'>
						<a href='<?php echo $callout_cta_link['url']; ?>'>
							<div class='cta_link'><?php echo $callout_cta_link['title']; ?></div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section>
	<div class="container">
		<!-- Introduction -->
		<div class="row">
			<div class="col-12">
				<h3><?php echo $additional_resources_title; ?></h3>
				<p><?php echo $additional_resources_description ?></p>
			</div>
		</div>
		
		<!-- Files -->
		<div class="row">
		<?php if( have_rows('additional_resources_repeater') ): ?>				
			<?php while( have_rows('additional_resources_repeater') ): the_row(); 
				// vars
				$file = get_sub_field('additional_resource_file');
				$type = get_sub_field('additional_resource_type');
				$name = get_sub_field('additional_resource_file_name');
				$description = get_sub_field('additional_resource_description');
				?>
				<div class="col-12 col-md-6">				
					<a href="<?php echo $file['url']; ?>" download>
						<div class="file">
							<div class="row">
								<div class="col-3">
									<?php if($type == 'misc'): ?>
										<img src="<?php echo $themes_path; ?>/theme-eh-19/images/icons/filetype_generic.png">
									<?php elseif($type == 'pdf'): ?>
										<img src="<?php echo $themes_path; ?>/theme-eh-19/images/icons/filetype_pdf.png">
									<?php elseif($type == 'doc'): ?>
										<img src="<?php echo $themes_path; ?>/theme-eh-19/images/icons/filetype_document.png">													<?php elseif($type == 'image'): ?>
										<img src="<?php echo $themes_path; ?>/theme-eh-19/images/icons/filetype_image.png">	
									<?php elseif($type == 'sheet'): ?>
										<img src="<?php echo $themes_path; ?>/theme-eh-19/images/icons/filetype_spreadsheet.png">												<?php elseif($type == 'link'): ?>
										<img src="<?php echo $themes_path; ?>/theme-eh-19/images/icons/filetype_link.png">
									<?php endif; ?>
								</div>
								<div class="col-9 vertical-center">
									<?php if($type == 'misc'): ?>
										<p class="file-name generic">									
									<?php elseif($type == 'pdf'): ?>
										<p class="file-name pdf">
									<?php elseif($type == 'doc'): ?>
										<p class="file-name document">
									<?php elseif($type == 'image'): ?>
										<p class="file-name image">
									<?php elseif($type == 'sheet'): ?>
										<p class="file-name spreadsheet">
									<?php elseif($type == 'link'): ?>
										<p class="file-name link">
									<?php endif; ?>	
										<?php echo $name; ?>
									</p>
									<p><?php echo $description; ?> ></p>
								</div> <!-- end col -->
							</div> <!-- end row -->
						</div> <!-- end file -->
					</a>
				</div>
			<?php endwhile; ?>							
		<?php endif; ?>			
		</div>
	</div>
</section>

<?php 
get_footer();
?>
