<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			
			<div id="page-title">		
				<div class="width-container">
					<h1><?php woocommerce_page_title(); ?></h1>
					<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
					<div class="clearfix"></div>
				</div>
			</div><!-- close #page-title -->
			
		<?php endif; ?>
		
		
		<div id="main">
		<div class="width-container bg-sidebar-pro">
			<div id="sidebar-border">
				<div id="content-container">
					<div class="content-container-pro">
		
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
	
		</div><!-- close .content-container-pro -->
	</div><!-- close #content-container -->

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