<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/wp-admin.php',                        // /wp-admin/ related functions
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


/*-- REGISTER MENUS --*/

function register_my_menus() {
  register_nav_menus(
    array(
	  'social-media-menu' => __('Social Media Menu'),
      'footer-menu' => __( 'Footer Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );
 
 
 /*-- ADD ACF OPTIONS --*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	acf_add_options_sub_page("Header");
	acf_add_options_sub_page("Company Info");
}
 
/*-- REGISTER WIDGETS --*/
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Post Footer',
    'id' => 'post-footer',
    'before_widget' => '<div class = "post-footer">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);
 
/* -- SOCIAL MEDIA ICONS -- */
function wmpudev_enqueue_icon_stylesheet() {
    wp_register_style( 'fontawesome', 'http:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet' );


// Add menu order to posts
add_action( 'admin_init', 'posts_order_wpse_91866' );

function posts_order_wpse_91866() 
{
    add_post_type_support( 'post', 'page-attributes' );
}

/* -- ADD "JOB ROLE" FIELD -- */
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
    <h3><?php _e("Extra profile information", "blank"); ?></h3>

    <table class="form-table">
	    <tr>
	        <th><label for="job-role"><?php _e("Job Role"); ?></label></th>
	        <td>
	            <input type="text" name="job-role" id="job-role" value="<?php echo esc_attr( get_the_author_meta( 'job-role', $user->ID ) ); ?>" class="regular-text" /><br />
	            <span class="description"><?php _e("Please enter your job role."); ?></span>
	        </td>
	    </tr>
    </table>
<?php }
	
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'job-role', $_POST['job-role'] );
}


/* -- ADD POST TYPE SUPPORT FOR EXCERPTS ON PAGES -- */
add_post_type_support( 'page', 'excerpt' );

/**
* Add read_private_posts capability to subscriber
* Note this is saves capability to the database on admin_init, so consider doing this once on theme/plugin activation
*/
add_action ('admin_init','add_sub_caps');
 
 // Allow subscribers to see Private posts and pages

 $subRole = get_role( 'subscriber' ); 
 $subRole->add_cap( 'read_private_posts' );
 $subRole->add_cap( 'read_private_pages' );

// remove "Private: " from titles
function remove_private_prefix($title) {
	$title = str_replace('Private: ', '', $title);
	return $title;
}
add_filter('the_title', 'remove_private_prefix');

// Remove "ellipses" and "read more" from blog excerpt
function trim_excerpt($text) {
	$string = " [...]";
    $text = str_replace( $string, '...', $text);
    return $text;
}
add_filter('get_the_excerpt', 'trim_excerpt', 99);

// Add login button to menu
add_filter( 'wp_nav_menu_items', 'add_login', 10, 2 );
function add_login ( $items, $args ) {
	
	$login_page = get_page_by_title('login');
	
    if( $args->theme_location == 'primary' and $login_page->post_status == 'publish') {
        $items .=
        '
        <li class="login-link">
        	<a href="./members/" class="nav-link">
        		Login
        	</a>
        </li>
        ';
    }
    return $items;
}
 
