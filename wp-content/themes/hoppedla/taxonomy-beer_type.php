<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package progression
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>	

<div id="page-title">		
	<div class="width-container">
		<h1><?php if (is_tax('beer_type')) {
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$tax_term_breadcrumb_taxonomy_slug = $term->taxonomy;
						echo '' . $term->name . '';
					}
					?>
			</h1>
		<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->


<div id="main">
<div class="width-container">
	<div id="menu-index">			

				<ul id="menu-sub-nav">
					<?php echo progression_menu_category_nav(); ?>
				</ul>
				
				<div id="menu_header">
					<div id="menu-cat-description"><?php echo category_description( ); ?></div>
				</div>

				<div class="clearfix"></div>
				
				<?php
				/* Start the Loop */
				$count = 1;
				$count_2 = 1;
				?>
				<?php while ( have_posts() ) : the_post();
					$col_count_progression = get_theme_mod('portfolio_col_progression', '3');
					if($count >= 1+$col_count_progression) { $count = 1; }
				?>
				<div class="grid<?php echo get_theme_mod('portfolio_col_progression', '3'); ?>column-progression <?php if($count == get_theme_mod('portfolio_col_progression', '3')): echo ' lastcolumn-progression'; endif; ?>">
					<?php
						get_template_part( 'content', 'beers');
					?>
				</div>

				<?php if($count == get_theme_mod('portfolio_col_progression', '3')): ?><div class="clearfix"></div><?php endif; ?>
				<?php $count ++; $count_2++; endwhile; ?>

				<div class="clearfix"></div>
				<?php show_pagination_links( ); ?>

				<?php else : ?>
					<?php get_template_part( 'no-results', 'archive' ); ?>
				<?php endif; ?>
		

			<div class="clearfix"></div>
	</div>
</div><!-- close .width-container -->
<?php get_footer(); ?>