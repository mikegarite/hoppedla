<?php
// Template Name: Full Width
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
<div id="page-title">		
	<div class="width-container">
		<h1><?php the_title(); ?></h1>
		<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->
<div id="main">
	<div class="width-container">
		<div id="full-width-progression">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
		<div class="clearfix"></div>
		</div>
	</div><!-- close .width-container -->
<?php get_footer(); ?>