<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package progression
 */

get_header(); ?>


<div id="page-title">		
	<div class="width-container">
		<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'progression' ); ?></h1>
		<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->


<div id="main">

<div class="width-container">
	<p><?php _e( 'It looks like nothing was found at this location. ', 'progression' ); ?></p>
	
</div>
<br><br>

<?php get_footer(); ?>