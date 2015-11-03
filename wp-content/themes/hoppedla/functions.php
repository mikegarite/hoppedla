<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since progression 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */


if ( ! function_exists( 'progression_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since progression 1.0
 */
function progression_setup() {

	// Post Thumbnails
	add_theme_support('post-thumbnails');
	add_image_size('progression-page-title', 1800, 425, true); // Blog Post Image
	add_image_size('progression-blog', 900, 500, true); // Blog Post Image
	add_image_size('progression-beers', 600, 1200, false); // Blog Post Image
	add_image_size('progression-events', 900, 675, true); // Blog Post Image
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on progression, use a find and replace
	 * to change 'progression' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'progression', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	// Include widgets
	require( get_template_directory() . '/widgets/widgets.php' );
	
	
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link' ) );
	add_post_type_support( 'beers', 'post-formats' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'progression' ),
		'footer-menu' => __( 'Footer Menu', 'progression' ),
	) );



}
endif; // progression_setup
add_action( 'after_setup_theme', 'progression_setup' );


/* WooCommerce */
add_theme_support( 'woocommerce' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);



// WooCommerce Posts Per Page - 9
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );


function woo_related_products_limit() {
  global $product;
	
	$args = array(
		'post_type'        		=> 'product',
		'no_found_rows'    		=> 1,
		'posts_per_page'   		=> 3,
		'ignore_sticky_posts' 	=> 1,
		'post__not_in'        	=> array($product->id)
	);
	return $args;
}
add_filter( 'woocommerce_related_products_args', 'woo_related_products_limit' );





/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since progression 1.0
 */
function progression_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'progression' ),
		'id' => 'sidebar-1',
		'description'   => 'Default Sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider"></div></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Shop Sidebar', 'progression' ),
		'id' => 'sidebar-shop',
		'description'   => 'WooCommerce Sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider"></div></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	

	register_sidebar( array(
		'name' => __( 'Homepage Widgets', 'progression' ),
		'id' => 'homepage-widgets',
		'description'   => 'Display Home: widgets on the homepage page template',
		'before_widget' => '<div id="%1$s" class="widget home-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title-homepage">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Newsletter Footer Widget', 'progression' ),
		'description' => __( 'Newsletter Footer widget', 'progression' ),
		'id' => 'newsletter-footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'progression' ),
		'description' => __( 'Footer widgets', 'progression' ),
		'id' => 'footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'progression_widgets_init' );



add_filter('widget_text', 'do_shortcode'); 



/* remove more link jump */
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );



//Removed Normal Rating Loop
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );



function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}


/* custom portfolio posts per page */
function pro_my_post_queries( $query ) {
	$portfolio_count = get_theme_mod('portfolio_pages_progression');
	if ($query->is_main_query()){
	
	if(is_tax( 'beer_type' )){
      // show 50 posts on custom taxonomy pages
      $query->set('posts_per_page', $portfolio_count);
    }
	
	}
	

	if(is_post_type_archive( 'beers' )){
      $query->set('posts_per_page', $portfolio_count);
    }
	
  }
add_action( 'pre_get_posts', 'pro_my_post_queries' );



/* custom portfolio posts per page */
function pro_my_event_queries( $query ) {
	$event_count = get_theme_mod('event_pages_progression');
	if ($query->is_main_query()){
	
	if(is_tax( 'event-category' )){
      // show 50 posts on custom taxonomy pages
      $query->set('posts_per_page', $event_count);
    }
	
	if(is_tax( 'event-location' )){
      // show 50 posts on custom taxonomy pages
      $query->set('posts_per_page', $event_count);
    }
	
	if(is_tax( 'event-organizer' )){
      // show 50 posts on custom taxonomy pages
      $query->set('posts_per_page', $event_count);
    }
	
	}
	

	if(is_post_type_archive( 'event' )){
      $query->set('posts_per_page', $event_count);
    }
	
  }
add_action( 'pre_get_posts', 'pro_my_event_queries' );



/**
 * Enqueue scripts and styles
 */
function progression_scripts() {
	wp_enqueue_style( 'progression-style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array( 'progression-style' ) );
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Noto+Sans:400,700|BenchNine:300,400,700', array( 'progression-style' ) );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.6.2.min.js', false, '20120206', false );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'progression_scripts' );



function pro_mobile_menu_insert()
{
    ?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
	$('.sf-menu').mobileMenu({
	    defaultText: '<?php _e( "Navigate to...", "progression" ); ?>',
	    className: 'select-menu',
	    subMenuDash: '&ndash;&ndash;'
	});
	});
	</script>
    <?php
}
add_action('wp_footer', 'pro_mobile_menu_insert');


/*
	MetaBox Options from Dev7studios
*/
require get_template_directory() . '/inc/dev7_meta_box_framework.php';
require get_template_directory() . '/inc/custom-fields.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load Plugin Activiation
 */
require get_template_directory() . '/tgm-plugin-activation/plugin-activation.php';
