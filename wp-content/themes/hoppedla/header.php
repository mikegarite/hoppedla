<?php
/**
 * The Header for our theme.
 *
 * @package progression
 * @since progression 1.0
 */
?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	

<header<?php if (get_theme_mod( 'header_fix_progression', '0')) : ?> id="fixed-header-pro"<?php endif ?>>
	<div class="width-container">
		<h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory');?>/images/hoppedla-logo.png" alt="<?php bloginfo('name'); ?>" width="<?php echo get_theme_mod( 'logo_width', '220' ); ?>" /></a></h1>
		<?php get_template_part( 'social', 'icons' ); ?>
		<nav><?php wp_nav_menu( array('theme_location' => 'primary', 'depth' => 4, 'menu_class' => 'sf-menu', 'fallback_cb' => false) ); ?>
		</nav>
	<div class="clearfix"></div>
	</div><!-- close .width-container -->
	<?php get_template_part( 'header', 'background' ); ?>
</header>


<?php
    $args = array(
        'posts_per_page' => -1,  // Limit to 5 posts
        'post_type' => 'breweries',  // Query for the default Post type
        'order_by' => 'post_date'  // Order by date posted
    );
    $last_five_posts = get_posts( $args );

    foreach ( $last_five_posts as $post ) : setup_postdata( $post ); ?>
        <!-- <h2> <a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2> -->
    <?php endforeach;
    wp_reset_postdata();
?>



<?php if(is_page()): ?>
<?php if(get_post_meta($post->ID, 'progression_category_slug', true)): ?>

<?php else: ?>
<?php endif; ?> 
<?php endif; ?> 
