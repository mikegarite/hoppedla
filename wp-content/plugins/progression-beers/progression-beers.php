<?php
/*
Plugin Name: Progression Beers Taxonomy
Plugin URI: http://progressionstudios.com
Description: This plugin registers the beer custom post type for the Growler WordPress Theme
Version: 1.0
Author: Progression Studios
Author URI: http://progressionstudios.com/
Author Email: contact@progressionstudios.com
License: GNU General Public License v3.0
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Registering Custom Post Type
 */
add_action('init', 'progression_portfolio_init');
function progression_portfolio_init() {
	register_post_type(
		'beers',
		array(
			'labels' => array(
				'name' => 'Beers',
				'singular_name' => 'Beer'
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'beer-type'),
			'supports' => array('title', 'excerpt', 'editor', 'thumbnail','comments'),
			'can_export' => true,
		)
	);
	register_taxonomy('beer_type', 'beers', array('hierarchical' => true, 'label' => 'Beer Categories', 'query_var' => true, 'rewrite' => true));
}


?>