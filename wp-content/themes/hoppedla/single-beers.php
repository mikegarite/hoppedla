<?php
/**
 * The Template for displaying all single posts.
 *
 * @package progression
 */

get_header(); ?>
<div id="page-title">		
	<div class="width-container">
		<h1><?php the_title() ?></h1>
		<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->

<div id="main">
	<?php while ( have_posts() ) : the_post(); ?>


	<div class="width-container">
				
		<div class="menu-single-pro">
			<div class="grid2column-progression">
				<?php if( has_post_format( 'gallery' ) ): ?>
					<div class="flexslider gallery-progression">
			      	<ul class="slides">
						<?php
						$args = array(
						    'post_type' => 'attachment',
						    'numberposts' => '-1',
						    'post_status' => null,
						    'post_parent' => $post->ID,
							'orderby' => 'menu_order',
							'order' => 'ASC'
						);
						$attachments = get_posts($args);
						?>
						<?php 
						if($attachments):
						    foreach($attachments as $attachment):
						?>
						<?php $thumbnail = wp_get_attachment_image_src($attachment->ID, 'progression-beers'); ?>
						<?php $image = wp_get_attachment_image_src($attachment->ID, 'large'); ?>
						<li>
							<a href="<?php echo $image[0]; ?>" rel="prettyPhoto[gallery]"><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a>
						</li>
						<?php endforeach; endif; ?>
					</ul>
					</div>
				<?php else: ?>
				<?php if(has_post_thumbnail()): ?>
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
					<a href="<?php echo $image[0]; ?>" rel="prettyPhoto"><?php the_post_thumbnail('progression-beers'); ?></a>
				<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="grid2column-progression lastcolumn-progression">
				<div class="menu-single-content-pro">
					<?php if(get_post_meta($post->ID, 'progression_beer_subhead', true)): ?><div class="pro_sub_header"><?php echo get_post_meta($post->ID, 'progression_beer_subhead', true) ?></div><?php endif; ?>
					<div class="menu_content_pro"><?php the_content(); ?></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div><!-- close .portfolio-index-text -->

	

	<div class="clearfix"></div>
</div>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
