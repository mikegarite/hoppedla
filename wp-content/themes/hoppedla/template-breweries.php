<?php
// Template Name: Breweries
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
								
				
								
					<?php $args = array( 'post_type' => 'breweries', 'posts_per_page' => -1 ); ?>
<?php $query = new WP_Query($args); ?>

	
 <?php 
 $addresses = array();


 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
						
	<div class="grid3column-progression ">
		<article id="post-114" class="post-114 event type-event status-publish has-post-thumbnail hcalendar">
		<div class="event-container-pro">
		<div class="featured-event-img" style="height:300px;">
		<a href="<?php the_permalink();?>" style="width:100%;height:100%;display:block;text-align:center;">			

			<img style="vertical-align: middle;max-height: 300px;"src="<?php echo get_post_meta($post->ID, '_hl_brewery_image', true);?>" />
		</a>
		</div>
						<div class="event-content-index">
				<h3 class="entry-title summary"><a href="<?php the_permalink();?>" class="url" title="<?php the_title();?>"><?php the_title();?></a></h3>
				<div class="event-meta-pro">
							</div>
				<a href="<?php the_permalink(); ?>">View Brewery</a>
			</div>
		</div>
	</article>					</div>

 <?php endwhile; 
 			show_pagination_links( );

 //wp_reset_postdata();
 else : ?>
 <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>
								
					<div class="clearfix"></div>								
					<div class="clearfix"></div>
					
								
		<div class="clearfix"></div>
	</div>
	
<div class="clearfix"></div>
</div>
<?php get_footer(); ?>