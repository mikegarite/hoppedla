<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package progression
 * @since progression 1.0
 */
?>

<div class="clearfix"></div>
</div><!-- close #main -->


<?php if ( is_active_sidebar( 'newsletter-footer-widgets' ) ) : ?>
	<?php dynamic_sidebar( 'newsletter-footer-widgets' ); ?>
<?php endif; ?>



<footer>
	<div id="copyright">
		<div class="width-container">
		<div id="widget-area">
	<div class="width-container">
		<?php if ( ! dynamic_sidebar( 'Footer Widgets' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div>
	<div class="clearfix"></div>
</div>
			
			<?php if (get_theme_mod( 'copyright_textbox', '&copy; 2014 All Rights Reserved. Developed by ProgressionStudios')) : ?>
			<div id="copyrigh-text">&copy; 2016 All Rights Reserved. Developed by HoppedLa</div>
			<?php endif; ?>
			<?php if ( has_nav_menu( 'footer-menu') ) : ?>
				<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'depth' => 1, 'container_class' => false, 'menu_class' => 'pro-footer-menu', 'fallback_cb' => false) ); ?>
			<?php endif; ?>
		</div><!-- close .width-container -->
		<div class="clearfix"></div>
	</div><!-- close #copyright -->
</footer>
<?php wp_footer(); ?>
</body>
</html>