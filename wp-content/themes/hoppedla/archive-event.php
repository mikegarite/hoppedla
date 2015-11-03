<?php
/**
 * The template for displaying event archives.
 *
 * Override this template by copying it to yourtheme/archive-event.php
 *
 * @author 	Digital Factory
 * @package Events Maker/Templates
 * @since 	1.1.0
 */
 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_header('events'); ?>

	<?php
	/**
	 * em_before_main_content hook
	 *
	 * @hooked em_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked em_breadcrumbs - 20
	 */
	do_action('em_before_main_content');
	?>
	
		<div id="page-title">		
			<div class="width-container">
				<?php if (apply_filters('em_show_page_title', true)) : ?>

					<h1 class="archive-title"><?php em_page_title(); ?></h1>

				<?php endif; ?>
				<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
				<div class="clearfix"></div>
			</div>
		</div><!-- close #page-title -->
		
		<div id="main">
		<div class="width-container">
				<?php  do_action('em_archive_description'); ?>
				
				
				<?php // start the loop
				if (have_posts()) : ?>
				
					
					<?php
					/* Start the Loop */
					$count = 1;
					$count_2 = 1;
					?>
					<?php do_action('em_before_events_loop'); ?>

					<?php while (have_posts()) : the_post(); 
						$col_count_progression = get_theme_mod('events_col_progression', '2');
						if($count >= 1+$col_count_progression) { $count = 1; }
						?>
					<div class="grid<?php echo get_theme_mod('events_col_progression', '2'); ?>column-progression <?php if($count == get_theme_mod('events_col_progression', '2')): echo ' lastcolumn-progression'; endif; ?>">
						<?php em_get_template_part('content', 'event'); ?>
					</div>
					<?php if($count == get_theme_mod('events_col_progression', '3')): ?><div class="clearfix"></div><?php endif; ?>
					<?php $count ++; $count_2++; endwhile; ?>
			
					<div class="clearfix"></div>
					<?php show_pagination_links( ); ?>

				<?php else : ?>
					<div class="entry-content">
					     <p><?php _e('Apologies, but no events were found.', 'progression'); ?></p>
					</div>
        		<?php endif; ?>
				
		<div class="clearfix"></div>
	</div>
	<?php get_footer(); ?>
	