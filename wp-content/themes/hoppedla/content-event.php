<?php
/**
 * The template for displaying event content within loops.
 *
 * Override this template by copying it to yourtheme/content-event.php
 *
 * @author 	Digital Factory
 * @package Events Maker/Templates
 * @since 	1.1.0
 */
 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Extra event classes
//$classes = apply_filters('em_loop_event_classes', array('hcalendar'));

?>
	<article id="post-<?php the_ID(); ?>" <?php // post_class($classes); ?>>
		<div class="event-container-pro">
			<?php if(has_post_thumbnail()): ?>
				<div class="featured-event-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('progression-events'); ?></a></div>
			<?php endif; ?>
			<div class="event-content-index">
				<h3 class="entry-title summary"><a href="<?php the_permalink(); ?>" class="url" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<div class="event-meta-pro">
					<?php do_action('em_loop_event_meta_start'); ?>
				</div>
				
			</div>
		</div>
	</article>
