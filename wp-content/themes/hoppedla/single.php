<?php
/**
 * The Template for displaying all single posts.
 *
 * @package progression
 */

get_header(); ?>
<div id="page-title">		
	<div class="width-container">
		<?php $page_for_posts = get_option('page_for_posts'); ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <h1 class=""><?php the_title();?></h1>
    <?php endwhile; // end of the loop. ?>
		
		<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->


<div id="main">
	
<div class="width-container bg-sidebar-pro">
	<div id="content-container">



<?php if(is_singular( array( 'breweries')  )) { 
  get_template_part( 'content', 'breweries' ); 
} ?>

<?php if(is_singular( array( 'bars')  )) { 
  get_template_part( 'content', 'bars' ); 
} ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

	<?php endwhile; // end of the loop. ?>
	
	</div>
  <?php if(!is_singular( array('breweries','bars' ))) { ?> 
	<?php get_sidebar(); ?>
  <?php } ?>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>
