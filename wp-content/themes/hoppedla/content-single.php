<?php
/**
 * @package progression
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-blog">
		<?php if( has_post_format( 'gallery' ) ): ?>
			<div class="featured-blog-progression">
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
					<?php $image = wp_get_attachment_image_src($attachment->ID, 'large'); ?>
					<?php $thumbnail = wp_get_attachment_image_src($attachment->ID, 'progression-blog'); ?>
					<li><a href="<?php echo $image[0]; ?>" rel="prettyPhoto[gallery]"><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a></li>
					<?php endforeach; endif; ?>
				</ul>
				</div>
			</div>
		<?php else: ?>
		<?php if(has_post_thumbnail()): ?>
			<div class="featured-blog-progression">
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
				<a href="<?php echo $image[0]; ?>" rel="prettyPhoto">
					<?php //the_post_thumbnail('progression-blog'); ?>
				</a>
			</div>
			<?php else: ?>
			<?php if(get_post_meta($post->ID, 'progression_media_embed', true)): ?>
				<div class="featured-blog-progression">
					<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_media_embed', true)); ?>
				</div>
			<?php endif; ?> <!-- close media_embed option -->
		<?php endif; ?>
		<?php endif; ?>
		
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="meta-progression">
			<span class="posted-meta-pro"><?php progression_posted_on(); ?></span>
			<span class="author-meta-pro"><?php _e( 'By', 'progression' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'in', 'progression' ); ?></span> 
			<span class="category-meta-pro"><?php the_category(', '); ?></span> 
			
			<span class="comment-meta-pro"><?php comments_popup_link( '' . __( '<i class="fa fa-comments-o"></i> 0', 'progression' ) . '', _x( '<i class="fa fa-comments-o"></i> 1', 'comments number', 'progression' ), _x( '<i class="fa fa-comments-o"></i> %', 'comments number', 'progression' ) ); ?></span>
			<div class="clearfix"></div>
		</div>
		<?php endif; ?>
		<?php if(!is_singular( array('breweries','bars') )) { ?> 
			<h2 class="blog-title"><?php the_title(); ?></h2>
		<?php } ?>	
		<div class="blog-container-text">
			<?php the_content(); ?>
			<?php the_tags('<div id="tags-pro">', ' ', '</div>'); ?> 

			<?php // progression_content_nav( 'nav-below' ); ?>
	
		
		
			<?php
				// If comments are open or we have at least one comment, load up the comment template
			//	if ( comments_open() || '0' != get_comments_number() )
				//	comments_template();
			?>
		</div>
	
	<div class="clearfix"></div>
	</div><!-- close .blog-container-text -->
</article><!-- #post-## -->
