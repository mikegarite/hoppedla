<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
		
	

	
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		
		
		<?php if(is_search()): ?>
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			
			<div id="page-title">		
				<div class="width-container">
					<h1><?php woocommerce_page_title(); ?></h1>
					<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
					<div class="clearfix"></div>
				</div>
			</div><!-- close #page-title -->
		<?php endif; ?>
			
		<?php else: ?>
			
		<?php if(is_shop()): ?>
		
			<?php $your_shop_page = get_post( wc_get_page_id( 'shop' ) ); ?>
			<?php if(get_post_meta($your_shop_page->ID, 'progression_category_slug', true)): ?>
			<div id="pro-home-slider"><?php echo apply_filters('the_content', get_post_meta($your_shop_page->ID, 'progression_category_slug', true)); ?></div>
		
			<?php else: ?>


			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			
				<div id="page-title">		
					<div class="width-container">
						<h1><?php woocommerce_page_title(); ?></h1>
						<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
						<div class="clearfix"></div>
					</div>
				</div><!-- close #page-title -->
			<?php endif; ?>
		<?php endif; ?>
		
		<?php else: ?>
			
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			
				<div id="page-title">		
					<div class="width-container">
						<h1><?php woocommerce_page_title(); ?></h1>
						<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
						<div class="clearfix"></div>
					</div>
				</div><!-- close #page-title -->
				<?php get_template_part( 'title', 'shop' ); ?>

			<?php endif; ?>
		
		<?php endif; ?>
		<?php endif; ?>
		
		

		
		<div id="main">
		<div class="width-container bg-sidebar-pro">
			<div id="sidebar-border">
				
				<div id="content-container">
					
		
		<?php do_action( 'woocommerce_archive_description' ); ?>


		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	
	</div>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
	
	
	
	<div class="clearfix"></div>
	</div><!-- close #sidebar-border -->
</div><!-- close .width-container -->
<?php get_footer( 'shop' ); ?>