<?php
/* Social media icons */
defined( 'ABSPATH' ) || exit;

  $themes_path = get_theme_root_uri();  

?>

<ul class="centered no-margins">
	<!-- SHARE (IMAGE) -->
	<li>
		<img src="<?=$themes_path;?>/theme-eh-19/images/icons/dark-share.png">
	</li>
	
	<!-- FACEBOOK -->
	<li>
		<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank">
			<img src="<?=$themes_path;?>/theme-eh-19/images/icons/dark-facebook.png">
		</a>
	</li>
	
	<!-- TWITTER -->
	<li>
		<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank">
			<img src="<?=$themes_path;?>/theme-eh-19/images/icons/dark-twitter.png">
		</a>
	</li>
		
	<!-- LINKEDIN -->
	<li>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank">
			<img src="<?=$themes_path;?>/theme-eh-19/images/icons/dark-linkedin.png">
		</a>
	</li>		
</ul>