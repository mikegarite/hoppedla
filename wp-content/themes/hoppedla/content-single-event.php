<?php
/**
 * The template for displaying event content in the single-event.php template
 *
 * Override this template by copying it to yourtheme/content-single-event.php
 *
 * @author 	Digital Factory
 * @package Events Maker/Templates
 * @since 	1.1.0
 */
 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Extra event classes
$classes = apply_filters('em_loop_event_classes', array('hcalendar'));

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
	  	<div class="grid2column-progression">
			<?php if(has_post_thumbnail()): ?>
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
				<a href="<?php echo $image[0]; ?>" rel="prettyPhoto"><?php the_post_thumbnail('progression-events'); ?></a>
			<?php endif; ?>
	  	</div>
		
		<div class="grid2column-progression lastcolumn-progression">
		  	<div class="events-container-single">
			  	<h2><?php the_title(); ?></h2>
	  		
			  	<?php do_action ('em_after_single_event_title');?>
	  		
			    <div class="entry-content description">
			        <?php the_content(); ?>
					<?php // edit link
					edit_post_link(__('Edit Event', 'progression'), '<p class="edit-link"><strong>', '</strong></p>'); ?>
			    </div>
		  	</div>
	  	</div>
	</article>