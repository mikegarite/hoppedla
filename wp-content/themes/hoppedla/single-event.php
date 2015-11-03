<?php
/**
 * The template for displaying all single events.
 *
 * Override this template by copying it to yourtheme/single-event.php
 *
 * @author 	Digital Factory
 * @package Events Maker/Templates
 * @since 	1.1.0
 */
 
if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_header('events'); ?>

	<?php
	do_action('em_before_main_content');
	?>
		<?php // start the loop
		while (have_posts()) : the_post(); ?>
		
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
			<?php em_get_template_part('content', 'single-event'); ?>
			<div class="clearfix"></div>
			</div>
		<?php endwhile; ?>

	<?php
	do_action('em_after_main_content');
	?>

<?php get_footer('events'); ?>