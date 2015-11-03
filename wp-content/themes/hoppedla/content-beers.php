<?php
/**
 * @package progression
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="menu-index-pro">
			<div class="menu-image-pro">
				<?php if( has_post_format( 'gallery' ) ): ?>
					<div class="flexslider gallery-progression">
			      	<ul class="slides">
						<?php
						$args = array(
						    'post_type' => 'bew',
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
							<?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>"><?php else: ?><a href="<?php echo $image[0]; ?>" rel="prettyPhoto[gallery]"><?php endif; ?><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a>
						</li>
						<?php endforeach; endif; ?>
					</ul>
					</div>
				<?php else: ?>
				<?php if(has_post_thumbnail()): ?>
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
					<?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>"><?php else: ?>
					<a href="<?php echo $image[0]; ?>" rel="prettyPhoto[gallery]"><?php endif; ?><?php the_post_thumbnail('progression-beers'); ?></a>
				<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="menu-content-pro">
				<h3><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>"><?php endif; ?><?php the_title(); ?><?php if(get_post_meta($post->ID, 'progression_external_link', true)): ?></a><?php endif; ?></h3>
				<?php if(get_post_meta($post->ID, 'progression_beer_subhead', true)): ?><div class="pro_sub_header"><?php echo get_post_meta($post->ID, 'progression_beer_subhead', true) ?></div><?php endif; ?>
				<div class="menu_content_pro"><?php the_excerpt(); ?></div>
			</div>
			<div class="clearfix"></div>
		</div><!-- close .portfolio-index-text -->
</article><!-- #post-## -->