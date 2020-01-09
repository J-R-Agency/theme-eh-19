<?php
/**
 * Subsection cards banner and repeater
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
 

<?php
global $post;
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID, 
    'order'          => 'ASC',
    'orderby'        => 'menu_order',
 );
 
 
$parent = new WP_Query( $args );
 
if ( $parent->have_posts() ) : ?>



<section class="success-stories--header" id="success-stories--header">
    <div class="module_cta_feature_block">
        <div class="row centered">
            <?php  if( $parent->have_posts() ): ?>
                <?php 
                //$count = count($parent->have_posts()); 
                $pages = get_pages( array( 'child_of' => $post->ID, 'post_type' => 'property'));
                $count = count($pages);
                if($count <= 2){
                    $class = "col-md-6";
                }else{
                    $class = "col-md-4";
                }
                ?>
                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                    <div class="col-fifth">
                        <img src="<?php echo get_the_post_thumbnail_url(  $post->ID, 'medium_large' ) ;?>" alt="" class="avatar-green">
                        <div class="mcfb_title mt-5 mb-3">
                            <h5><?php the_title(); ?></h5>
                        </div>
                        <div class="mcfb_body mt-3"><?php echo $post->post_excerpt ;?></div>
                    </div>

                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    
                <?php endwhile; ?>
            <?php endif ?>
        </div>
    </div>
</section>


<?php endif; wp_reset_query(); ?>





<?php
global $post;
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID, 
    'order'          => 'ASC',
    'orderby'        => 'menu_order',
 );
 
 
$parent = new WP_Query( $args );
 
if ( $parent->have_posts() ) : ?>



<section class="related-links capped-width">
    <div class="container">
        <div class="row">
            <?php  if( $parent->have_posts() ): ?>
                <?php 
                //$count = count($parent->have_posts()); 
                $pages = get_pages( array( 'child_of' => $post->ID, 'post_type' => 'property'));
                $count = count($pages);
                if($count <= 2){
                    $class = "col-md-6";
                }else{
                    $class = "col-md-4";
                }
                ?>

                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

                    <div class="subsection-cards centered">
                        <!-- Module Divider -->
                        <div class="row centered">
                            <div class="col-12">
                                <div class="line">
                                    <img src="https://empowermenthouse.co.uk/wp-content/uploads/2020/01/hr-icon-house-dark.png" alt="" class="line-icon line-icon--border">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="subsection-cards">
                        <div class="subsection-cards__item">
                            <div class="avatar--success-stories" style="background-image: url('<?php echo get_the_post_thumbnail_url(  $post->ID, 'medium_large' ) ;?>');"></div>
                        </div>
                        <div class="subsection-cards__item">
                            <h2 class="subsection-cards__title"><?php the_title(); ?></h2>
                            <div class="subsection-cards__content"><?php echo $post->post_content ;?></div>
                            <div class="back-to-top"><a href="#success-stories--header">Back to Top</a></div>
                        </div>
                    </div>

                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    
                <?php endwhile; ?>
            <?php endif ?>
        </div>
    </div>
</section>


<?php endif; wp_reset_query(); ?>

