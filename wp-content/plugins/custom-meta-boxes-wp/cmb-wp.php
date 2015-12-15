<?php
/*
Plugin Name: Hoppedla Custom Meta Boxes
Plugin URI: http://www.wpbeginner.com/
Description: Create Meta Boxes for Sitename.
Version: 0.1
Author: Syed Balkhi
Author URI: http://www.wpbeginner.com/
License: GPL v2 or higher
License URI: License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

//Initialize the metabox class

function wpb_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once(plugin_dir_path( __FILE__ ) . 'init.php');
}

add_action( 'init', 'wpb_initialize_cmb_meta_boxes', 9999 );

//Add Meta Boxes

function wpb_sample_metaboxes( $meta_boxes ) {
	$prefix = '_hl_'; // Prefix for all fields

	// $meta_boxes[] = array(
	// 	'id' => 'test_metabox',
	// 	'title' => 'Extra Fields',
	// 	'pages' => array('podcasts'), // post type
	// 	'context' => 'normal',
	// 	'priority' => 'high',
	// 	'show_names' => true, // Show field names on the left
	// 	'fields' => array(
	// 		array(
	// 			'name' => 'Home Text',
	// 			'desc' => 'Text that displays on the homepage for the podcast',
	// 			'id' => $prefix . 'home_text',
	// 			'type' => 'text'
	// 		),
	// 		array(
	// 			'name' => 'Large Image',
	// 			'desc' => 'Large Image at the top of the Podcast Page',
	// 			'id' => $prefix . 'large_image',
	// 			'type' => 'file'
	// 		),
	// 		array(
	// 			'name' => 'Itunes Link',
	// 			'desc' => 'Link for Itunes Podcast',
	// 			'id' => $prefix . 'itunes_link',
	// 			'type' => 'text'
	// 		),
	// 		array(
	// 			'name' => 'Soundcloud Link',
	// 			'desc' => 'Link for Soundcloud Podcast',
	// 			'id' => $prefix . 'soundcloud_link',
	// 			'type' => 'text',
	// 		),
	// 		array(
	// 		    'name' => 'Show',
	// 		    'desc' => 'Select show podcast is affiliated with',
	// 		    'id' => $prefix . 'show_taxonomy_select',
	// 		    'taxonomy' => 'shows', //Enter Taxonomy Slug
	// 		    'type' => 'taxonomy_select',    
	// 		)
	// 	),
	// );

	$meta_boxes['breweries'] = array(
		'id'         => 'breweries',
		'title'      => __( 'Breweries' ),
		'pages'      => array( 'breweries' ), // Tells CMB to use user_meta vs post_meta
		'show_names' => true,
		'cmb_styles' => false, // Show cmb bundled styles.. not needed on user profile page
		'fields'     => array(
			array(
				'name' => 'Address',
				'desc' => 'Address of brewery',
				'id' => $prefix . 'brewery_address',
				'type' => 'text'
			),
			array(
				'name' => 'Neighborhood',
				'desc' => 'Neighborhood of brewery',
				'id' => $prefix . 'brewery_neighborhood',
				'type' => 'text'
			),
			array(
				'name' => 'Latitude',
				'desc' => 'Latitude of brewery',
				'id' => $prefix . 'brewery_latitude',
				'type' => 'text'
			),
			array(
				'name' => 'Longitude',
				'desc' => 'Longitude of brewery',
				'id' => $prefix . 'brewery_longitude',
				'type' => 'text'
			),
			array(
				'name' => __( 'Brewery Image', 'cmb' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb' ),
				'id'   => $prefix . 'brewery_image',
				'type' => 'file',
			),
			array(
				'name' => __( 'Phone number', 'cmb' ),
				'desc' => __( 'Phone number of brewery', 'cmb' ),
				'id'   => $prefix . 'brewery_phone',
				'type' => 'text',
			),
			array(
				'name' => __( 'Website', 'cmb' ),
				'desc' => __( 'Website address of brewery', 'cmb' ),
				'id'   => $prefix . 'brewery_website',
				'type' => 'text',
			),
			array(
				'name' => __( 'Instagram', 'cmb' ),
				'desc' => __( 'Instagram handle of brewery', 'cmb' ),
				'id'   => $prefix . 'brewery_instagram',
				'type' => 'text',
			),
			array(
				'name' => __( 'Facebook', 'cmb' ),
				'desc' => __( 'Facebook url of brewery', 'cmb' ),
				'id'   => $prefix . 'brewery_facebook',
				'type' => 'text',
			),
			array(
				'name' => __( 'Untapped', 'cmb' ),
				'desc' => __( 'Untapped url of brewery', 'cmb' ),
				'id'   => $prefix . 'brewery_untapped',
				'type' => 'text',
			),
			array(
				'name' => __( 'Foursquare', 'cmb' ),
				'desc' => __( 'Foursquare url of brewery', 'cmb' ),
				'id'   => $prefix . 'brewery_foursquare',
				'type' => 'text',
			),
			array(
				'name'    => __( 'Brewery Description', 'cmb' ),
				'desc'    => __( 'Brewery description (optional)', 'cmb' ),
				'id'      => $prefix . 'brewery_wysiwyg',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			array(
		    'name' => 'Brewery Filters',
		    'desc' => 'Check filters for venue',
		    'id' => $prefix . 'brewery_filter',
		    'type' => 'multicheck',
		    'options' => array(
		        'pets' => 'Pets',
		        'food' => 'Food',
		        'favorite' => 'Favorite',
		    )
		),


		)
	);

		$meta_boxes['bars'] = array(
		'id'         => 'bars',
		'title'      => __( 'Bars' ),
		'pages'      => array( 'bars' ), // Tells CMB to use user_meta vs post_meta
		'show_names' => true,
		'cmb_styles' => false, // Show cmb bundled styles.. not needed on user profile page
		'fields'     => array(
			array(
				'name' => 'Address',
				'desc' => 'Address of bar',
				'id' => $prefix . 'bar_address',
				'type' => 'text'
			),
			array(
				'name' => 'Neighborhood',
				'desc' => 'Neighborhood of bar',
				'id' => $prefix . 'bar_neighborhood',
				'type' => 'text'
			),
			array(
				'name' => 'Latitude',
				'desc' => 'Latitude of bar',
				'id' => $prefix . 'bar_latitude',
				'type' => 'text'
			),
			array(
				'name' => 'Longitude',
				'desc' => 'Longitude of bar',
				'id' => $prefix . 'bar_longitude',
				'type' => 'text'
			),
			array(
				'name' => __( 'Bar Image', 'cmb' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb' ),
				'id'   => $prefix . 'bar_image',
				'type' => 'file',
			),
			array(
				'name' => __( 'Phone number', 'cmb' ),
				'desc' => __( 'Phone number of bar', 'cmb' ),
				'id'   => $prefix . 'bar_phone',
				'type' => 'text',
			),
			array(
				'name' => __( 'Website', 'cmb' ),
				'desc' => __( 'Website address of bar', 'cmb' ),
				'id'   => $prefix . 'bar_website',
				'type' => 'text',
			),
			array(
				'name' => __( 'Instagram', 'cmb' ),
				'desc' => __( 'Instagram handle of bar', 'cmb' ),
				'id'   => $prefix . 'bar_instagram',
				'type' => 'text',
			),
			array(
				'name' => __( 'Facebook', 'cmb' ),
				'desc' => __( 'Facebook url of bar', 'cmb' ),
				'id'   => $prefix . 'bar_facebook',
				'type' => 'text',
			),
			array(
				'name' => __( 'Untapped', 'cmb' ),
				'desc' => __( 'Untapped url of bar', 'cmb' ),
				'id'   => $prefix . 'bar_untapped',
				'type' => 'text',
			),
			array(
				'name' => __( 'Foursquare', 'cmb' ),
				'desc' => __( 'Foursquare url of bar', 'cmb' ),
				'id'   => $prefix . 'bar_foursquare',
				'type' => 'text',
			),
			array(
				'name'    => __( 'Bar Description', 'cmb' ),
				'desc'    => __( 'Bar description (optional)', 'cmb' ),
				'id'      => $prefix . 'bar_wysiwyg',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),


		)
	);

	




	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'wpb_sample_metaboxes' );
