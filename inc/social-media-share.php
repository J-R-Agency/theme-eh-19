<?php
/* Social media icons */
defined( 'ABSPATH' ) || exit;
?>

<!-- FACEBOOK -->
<a class="icon icon-facebook icon-replacement" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank">
	<img src="http://192.168.33.10/empowerment-house/wp-content/uploads/2019/12/dark-facebook.png">
</a>

<!-- TWITTER -->
<a class="icon icon-twitter icon-replacement" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank">
	<img src="http://192.168.33.10/empowerment-house/wp-content/uploads/2019/12/dark-twitter.png">
</a>
	
<!-- LINKEDIN -->
<a class="icon icon-twitter icon-replacement" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank">
	<img src="http://192.168.33.10/empowerment-house/wp-content/uploads/2019/12/dark-linkedin.png">
</a>	
	
	
