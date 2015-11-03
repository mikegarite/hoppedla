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
					<?php $thumbnail = wp_get_attachment_image_src($attachment->ID, 'progression-blog'); ?>
					<li><?php if( has_post_format( 'link' ) ): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>">
				<?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a></li>
					<?php endforeach; endif; ?>
				</ul>
				</div>
			</div>
		<?php else: ?>
		<?php if(has_post_thumbnail()): ?>
			<div class="featured-blog-progression">
				<?php if( has_post_format( 'link' ) ): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>">
				<?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
					<?php the_post_thumbnail('progression-blog'); ?>
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
			
			<span class="comment-meta-pro"><?php comments_popup_link( '' . __( '<i class="fa fa-comments-o"></i> 0', 'progression' ) . '', _x( '<i class="fa fa-comments-o"></i> 1', 'comments number', 'progression' ), _x( '<i class="fa fa-comments-o"></i> %', 'comments number', 'progression' ) ); ?></span>
			<div class="clearfix"></div>
		</div>
		<?php else: ?><div class="spacer-top"></div>
		<?php endif; ?>
		
		<h2 class="blog-title">
			<?php if( has_post_format( 'link' ) ): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>">
			<?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?>
			<?php the_title(); ?>
			</a>
		</h2>
		
		<div class="blog-container-text">
			<div class="entry-content">	
				<p><?php echo excerpt(14); ?></p>
				<P><a href="<?php the_permalink(); ?>" class="more-link">Continue reading <span class="meta-nav">&rarr;</span></a></P>
				
			</div><!-- .entry-content -->
		</div><!-- close .blog-container-text -->
		
	</div>
</article>