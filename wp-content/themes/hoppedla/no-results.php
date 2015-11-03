<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package progression
 */
?>
<div id="page-title">		
	<div class="width-container">
		<h1><?php _e( 'Nothing Found', 'progression' ); ?></h1>
		<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->


<div id="main">

<div class="width-container bg-sidebar-pro">
	<div id="content-container">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="content-container-pro">
				<br>
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'progression' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'progression' ); ?></p>

				<?php else : ?>

					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'progression' ); ?></p>

				<?php endif; ?>
				<br><br>
			</div>
		</article>

	</div>
	
	<?php get_sidebar(); ?>
	<div class="clearfix"></div>
</div>

<?php get_footer(); ?>