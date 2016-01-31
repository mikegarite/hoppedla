<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */



$header_default = array(
	'width'         => 1800,
	'height'        => 125,
	'header-text'    => false,
	'default-image' => get_template_directory_uri() . '/images/page-title.jpg',
);
add_theme_support( 'custom-header', $header_default );



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function progression_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'progression_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function progression_customize_preview_js() {
	wp_enqueue_script( 'progression_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'progression_customize_preview_js' );



/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function progression_customizer( $wp_customize ) {
	
	// Adds abaillity to add text area
	if ( class_exists( 'WP_Customize_Control' ) ) { 
		# Adds textarea support to the theme customizer 
		class ProgressionTextAreaControl extends WP_Customize_Control { 
			public $type = 'textarea'; 
			public function __construct( $manager, $id, $args = array() ) { 
				$this->statuses = array( '' => __( 'Default', 'progression' ) ); 
				parent::__construct( $manager, $id, $args ); 
			}   
			
			public function render_content() { 
				echo '<label> 
				<span class="customize-control-title">' . esc_html( $this->label ) . '</span> 
				<textarea rows="5" style="width:100%;" '; $this->link(); echo '>' . esc_textarea( $this->value() ) . '</textarea> 
				</label>'; } 
			}   
		}
		
//Add Section Page of Theme Settings
    $wp_customize->add_section(
        'options_panel_progression',
        array(
            'title' => __('Theme Settings', 'progression'),
            'description' => __('Main Theme Settings', 'progression'),
            'priority' => 70,
        )
    );
	
	//Logo Uploader
	$wp_customize->add_setting( 
		'logo_upload' ,
		array(
	        'default' => get_template_directory_uri().'/images/logo.png',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'logo_upload',
	        array(
	            'label' => __('Theme Logo', 'progression'), 
	            'section' => 'options_panel_progression',
	            'settings' => 'logo_upload',
					'priority'   => 5,
	        )
	    )
	);
	
	//Logo Width
	$wp_customize->add_setting( 
		'logo_width' ,
		array(
	        'default' => '220',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'logo_width',
   	array(
	   	'label' => __('Logo Width', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'logo_width',
			'type' => 'text',
			'priority'   => 7,
	    )
	);
	
	
	
	
	//Header Padding
	$wp_customize->add_setting( 
		'header_padding' ,
		array(
	        'default' => '43',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'header_padding',
   	array(
	   	'label' => __('Navigation Margin Top/bottom', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'header_padding',
			'type' => 'text',
			'priority'   => 9,
	    )
	);
	

	//Comment Options
	$wp_customize->add_setting( 
		'header_fix_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'header_fix_progression',
   	array(
	   	'label' => __('Set Header Fixed?', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'header_fix_progression',
			'type' => 'checkbox',
			'priority'   => 10,
	    )
	);

	// Add Copyright Text
		$wp_customize->add_setting( 
			'copyright_textbox',
			array (
			'default' => 'Developed by ProgressionStudios',
			'sanitize_callback' => 'progression_sanitize_text',
			)
		);
	$wp_customize->add_control(
   'copyright_textbox',
   	array(
	   	'label' => __('Copyright Text', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'copyright_textbox',
			'type' => 'text',
			'priority'   => 12,
	    )
	);

	
	
	
	//Homepage Child Pages
	$wp_customize->add_setting( 
		'home_col_progression' ,
		array(
	        'default' => '3',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'home_col_progression',
   	array(
		'label' => __('Home Child Page Column Count (2-4)', 'progression'), 
		'section' => 'options_panel_progression', 
		'settings' => 'home_col_progression', 
		'priority' => 19, 
	    )
	);
	
	
	//Comment Options
	$wp_customize->add_setting( 
		'comment_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'comment_progression',
   	array(
	   	'label' => __('Display comments for pages?', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'comment_progression',
			'type' => 'checkbox',
			'priority'   => 20,
	    )
	);

	
	
	
	//Footer Column
	$wp_customize->add_setting( 
		'footer_cols' ,
		array(
	        'default' => '3',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'footer_cols',
   	array(
	   	'label' => __('Footer Column Count (1-4)', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'footer_cols',
			'type' => 'text',
			'priority'   => 15,
	    )
	);
	
	
	//Portfolio Categories
	$wp_customize->add_setting( 
		'portfolio_col_progression' ,
		array(
	        'default' => '3',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'portfolio_col_progression',
   	array(
	   	'label' => __('Beer posts per column (2-4)', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'portfolio_col_progression',
			'type' => 'text',
			'priority'   => 40,
	    )
	);
	
	
	//Portfolio Pagination
	$wp_customize->add_setting( 
		'portfolio_pages_progression' ,
		array(
	        'default' => '12',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'portfolio_pages_progression',
   	array(
	   	'label' => __('Beer posts per page', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'portfolio_pages_progression',
			'type' => 'text',
			'priority'   => 45,
	    )
	);
	
	//Shop Column Count
	$wp_customize->add_setting( 
		'shop_col_progression' ,
		array(
	        'default' => '3',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'shop_col_progression',
   	array(
	   	'label' => __('Shop posts per column (2-4)', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'shop_col_progression',
			'type' => 'text',
			'priority'   => 50,
	    )
	);
	
	//Shop Column Count
	$wp_customize->add_setting( 
		'events_col_progression' ,
		array(
	        'default' => '3',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'events_col_progression',
   	array(
	   	'label' => __('Event posts per column (2-4)', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'events_col_progression',
			'type' => 'text',
			'priority'   => 55,
	    )
	);

	
	//Shop Column Count
	$wp_customize->add_setting( 
		'event_pages_progression' ,
		array(
	        'default' => '12',
			'sanitize_callback' => 'progression_sanitize_text',
	    )
	);
	$wp_customize->add_control(
   'event_pages_progression',
   	array(
	   	'label' => __('Event posts per page', 'progression'), 
			'section' => 'options_panel_progression',
			'settings'   => 'event_pages_progression',
			'type' => 'text',
			'priority'   => 56,
	    )
	);


//Add Section Page of Social Settings
    $wp_customize->add_section(
        'footer_options_progression',
        array(
            'title' => __('Header Social Icons', 'progression'),
            'description' => 'Social Settings here!',
            'priority' => 71,
        )
    );
	
	

	
	
	//Map Marker Icon
	$wp_customize->add_setting( 
		'location_link_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'location_link_progression',
   	array(
	   	'label' => __('Map Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'location_link_progression',
			'type' => 'text',
			'priority'   => 15,
	    )
	);
	//Facebook Icon
	$wp_customize->add_setting( 
		'facebook_link_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'facebook_link_progression',
   	array(
	   	'label' => __('Facebook Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'facebook_link_progression',
			'type' => 'text',
			'priority'   => 20,
	    )
	);
	
	//Twitter Icon
	$wp_customize->add_setting( 
		'twitter_link_progression',
		array(
			'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'twitter_link_progression',
   	array(
	   	'label' => __('Twitter Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'twitter_link_progression',
			'type' => 'text',
			'priority'   => 21,
	    )
	);
	
	//Google Plus Icon
	$wp_customize->add_setting( 
		'google_link_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',)
	);
	$wp_customize->add_control(
   'google_link_progression',
   	array(
	   	'label' => __('Google Plus Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'google_link_progression',
			'type' => 'text',
			'priority'   => 22,
	    )
	);
	
	//Linkedin Icon
	$wp_customize->add_setting( 
		'linkedin_link_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',)
	);
	$wp_customize->add_control(
   'linkedin_link_progression',
   	array(
	   	'label' => __('LinkedIn Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'linkedin_link_progression',
			'type' => 'text',
			'priority'   => 24,
	    )
	);
	
	//Instagram Icon
	$wp_customize->add_setting( 
		'instagram_link_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',)
	);
	$wp_customize->add_control(
   'instagram_link_progression',
   	array(
	   	'label' => __('Instagram Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'instagram_link_progression',
			'type' => 'text',
			'priority'   => 25,
	    )
	);
	
	//Pinterest Icon
	$wp_customize->add_setting( 
		'pinterest_link_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',)
	);
	$wp_customize->add_control(
   'pinterest_link_progression',
   	array(
	   	'label' => __('Pinterest Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'pinterest_link_progression',
			'type' => 'text',
			'priority'   => 26,
	    )
	);
	
	//Tumblr Icon
	$wp_customize->add_setting( 
		'tumblr_link_progression',
		array(
			'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'tumblr_link_progression',
   	array(
	   	'label' => __('Tumblr Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'tumblr_link_progression',
			'type' => 'text',
			'priority'   => 27,
	    )
	);
	
	
	//YouTube Icon
	$wp_customize->add_setting( 
		'youtube_link_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',)
	);
	$wp_customize->add_control(
   'youtube_link_progression',
   	array(
	   	'label' => __('YouTube Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'youtube_link_progression',
			'type' => 'text',
			'priority'   => 28,
	    )
	);
	
	//DropBox Icon
	$wp_customize->add_setting( 
		'dropbox_link_progression',
		array(
			'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'dropbox_link_progression',
   	array(
	   	'label' => __('DropBox Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'dropbox_link_progression',
			'type' => 'text',
			'priority'   => 29,
	    )
	);
	
	//Flickr Icon
	$wp_customize->add_setting( 
		'flickr_link_progression',
		array(
			'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'flickr_link_progression',
   	array(
	   	'label' => __('Flickr Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'flickr_link_progression',
			'type' => 'text',
			'priority'   => 30,
	    )
	);
	
	
	//Dribbble Icon
	$wp_customize->add_setting( 
		'dribbble_link_progression',
		array (
		'sanitize_callback' => 'progression_sanitize_text',)
	);
	$wp_customize->add_control(
   'dribbble_link_progression',
   	array(
	   	'label' => __('Dribbble Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'dribbble_link_progression',
			'type' => 'text',
			'priority'   => 31,
	    )
	);


	//E-mail Icon
	$wp_customize->add_setting( 
		'mail_link_progression',
		array(
			'sanitize_callback' => 'progression_sanitize_text',
		)
	);
	$wp_customize->add_control(
   'mail_link_progression',
   	array(
	   	'label' => __('E-mail Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'settings'   => 'mail_link_progression',
			'type' => 'text',
			'priority'   => 33,
	    )
	);

//Add Section Page of Background Colors
    $wp_customize->add_section(
        'progression_background_colors',
        array(
            'title' => __('Background Colors', 'progression'),
            'description' => 'Adjust background colors for the theme!',
            'priority' => 72,
        )
    );
	
	
	
	
	
	$wp_customize->add_setting('header_bg', array(
	    'default'     => '#2c2722',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg', array(
		'label'        => __( 'Header Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'header_bg',
		'priority'   => 5,
	)));
	
	
	
	$wp_customize->add_setting('page_title_progression', array(
	    'default'     => '#1d1e1f',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_title_progression', array(
		'label'        => __( 'Page Title Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'page_title_progression',
		'priority'   => 6,
	)));
	
	
	
	$wp_customize->add_setting('nav_bg', array(
	    'default'     => '#cc5b44',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg', array(
		'label'        => __( 'Sub-Navigation Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'nav_bg',
		'priority'   => 8,
	)));
	


	
	
	
	$wp_customize->add_setting('body_bg_progression', array(
	    'default'     => '#eeeeee',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_bg_progression', array(
		'label'        => __( 'Body Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'body_bg_progression',
		'priority'   => 15,
	)));
	
	$wp_customize->add_setting('child_pages_pro', array(
	    'default'     => '#6f5e4f',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'child_pages_pro', array(
		'label'        => __( 'Homepage Child Pages Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'child_pages_pro',
		'priority'   => 16,
	)));
	

	$wp_customize->add_setting('footer_border_progression', array(
	    'default'     => '#191612',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_border_progression', array(
		'label'        => __( 'Footer Widget Background', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'footer_border_progression',
		'priority'   => 18,
	)));
	
	$wp_customize->add_setting('footer_bg_progression', array(
	    'default'     => '#26221d',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_bg_progression', array(
		'label'        => __( 'Footer Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'footer_bg_progression',
		'priority'   => 19,
	)));
	
	

	$wp_customize->add_setting('button_bg_progression', array(
	    'default'     => '#cc5b44',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_bg_progression', array(
		'label'        => __( 'Button Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'button_bg_progression',
		'priority'   => 25,
	)));
	
	

	$wp_customize->add_setting('button_hover_bg_progression', array(
	    'default'     => '#bc543f',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_hover_bg_progression', array(
		'label'        => __( 'Button Hover Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'button_hover_bg_progression',
		'priority'   => 30,
	)));
	
	
	
	$wp_customize->add_setting('second_button_bg_progression', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'second_button_bg_progression', array(
		'label'        => __( 'Pagination/Beer Categories Background', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'second_button_bg_progression',
		'priority'   => 31,
	)));
	
	
	$wp_customize->add_setting('main_content_bg_pro', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'main_content_bg_pro', array(
		'label'        => __( 'Content Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'main_content_bg_pro',
		'priority'   => 35,
	)));
	

	
	$wp_customize->add_setting('sidebar_content_bg_pro', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sidebar_content_bg_pro', array(
		'label'        => __( 'Sidebar Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'sidebar_content_bg_pro',
		'priority'   => 36,
	)));
	

//Add Section Page of Background Colors
    $wp_customize->add_section(
        'progression_font_colors',
        array(
            'title' => __('Font Colors', 'progression'),
            'description' => 'Adjust font colors for the theme!',
            'priority' => 75,
        )
    );
	
	
	
	$wp_customize->add_setting('body_font_progression', array(
	    'default'     => '#777777',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_font_progression', array(
		'label'        => __( 'Body Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'body_font_progression',
		'priority'   => 1,
	)));
	
	
	$wp_customize->add_setting('page_font_progression', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_font_progression', array(
		'label'        => __( 'Page Title Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'page_font_progression',
		'priority'   => 2,
	)));
	
	
	
	$wp_customize->add_setting('bread_crumb-pro', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bread_crumb-pro', array(
		'label'        => __( 'Bread-Crumb Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'bread_crumb-pro',
		'priority'   => 3,
	)));
	
	
	$wp_customize->add_setting('bread_crumb-default-pro', array(
	    'default'     => '#cccccc',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bread_crumb-default-pro', array(
		'label'        => __( 'Bread-Crumb Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'bread_crumb-default-pro',
		'priority'   => 4,
	)));
	
	$wp_customize->add_setting('body_link_progression', array(
	    'default'     => '#cc5b44',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_link_progression', array(
		'label'        => __( 'Main Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'body_link_progression',
		'priority'   => 7,
	)));
	
	
	$wp_customize->add_setting('body_link_hover_progression', array(
	    'default'     => '#ff7356',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_link_hover_progression', array(
		'label'        => __( 'Main Hover Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'body_link_hover_progression',
		'priority'   => 9,
	)));
	
	$wp_customize->add_setting('navigation_menu_color', array(
	    'default'     => '#e5e4e4',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'navigation_menu_color', array(
		'label'        => __( 'Navigation Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'navigation_menu_color',
		'priority'   => 10,
	)));
	
	$wp_customize->add_setting('nav_selected_pro', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_selected_pro', array(
		'label'        => __( 'Navigation Current Page Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'nav_selected_pro',
		'priority'   => 11,
	)));
	
	
	
	
	$wp_customize->add_setting('sub_font_color', array(
	    'default'     => '#f1d1cb',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sub_font_color', array(
		'label'        => __( 'Sub-Navigation Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'sub_font_color',
		'priority'   => 14,
	)));
	
	
	$wp_customize->add_setting('sub_hover_font_color', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sub_hover_font_color', array(
		'label'        => __( 'Sub-Navigation Hover Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'sub_hover_font_color',
		'priority'   => 15,
	)));
	
	
	$wp_customize->add_setting('heading_font_progression', array(
	    'default'     => '#101010',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'heading_font_progression', array(
		'label'        => __( 'Heading Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'heading_font_progression',
		'priority'   => 18,
	)));
	
	
	$wp_customize->add_setting('sidebar_border_btm_pro', array(
	    'default'     => '#e94a29',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sidebar_border_btm_pro', array(
		'label'        => __( 'Sidebar Border Bottom Color Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'sidebar_border_btm_pro',
		'priority'   => 19,
	)));
	
	

	
	$wp_customize->add_setting('button_font_pro', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_font_pro', array(
		'label'        => __( 'Button Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'button_font_pro',
		'priority'   => 20,
	)));
	
	
	$wp_customize->add_setting('button_hover_font_pro', array(
	    'default'     => '#ffffff',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_hover_font_pro', array(
		'label'        => __( 'Button Hover Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'button_hover_font_pro',
		'priority'   => 22,
	)));
	
	
	$wp_customize->add_setting('page_numbers_bg_pro', array(
	    'default'     => '#999999',
		'sanitize_callback' => 'progression_sanitize_text',
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_numbers_bg_pro', array(
		'label'        => __( 'Pagination/Beer Categories Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'page_numbers_bg_pro',
		'priority'   => 24,
	)));
	
	
	
}
add_action( 'customize_register', 'progression_customizer' );


function progression_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function progression_customize_css()
{
    ?>
 
<style type="text/css">
	body #logo, body #logo img {width:<?php echo get_theme_mod('logo_width', '220'); ?>px;}
	.sf-menu a {margin-top:<?php echo get_theme_mod('header_padding', '43') ; ?>px; margin-bottom:<?php echo get_theme_mod('header_padding', '43'); ?>px;}
	.social-ico {margin-top:<?php echo get_theme_mod('header_padding', '43') + 8 ; ?>px; }
	<?php if (get_theme_mod( 'comment_progression')) : ?><?php else: ?>body.page #respond {display:none;}<?php endif ?>
	header { background-color:<?php echo get_theme_mod('header_bg', '#2c2722'); ?>; border-bottom:1px solid rgba(255, 255, 255, 0.08); } 
	header .social-ico a i {color:<?php echo get_theme_mod('header_bg', '#2c2722'); ?>;}
	#page-title { background-color:<?php echo get_theme_mod('page_title_progression', '#1d1e1f'); ?>; }
	#main, #homepage-content-container { background-color:<?php echo get_theme_mod('body_bg_progression', '#eeeeee'); ?>; }
	.sf-menu ul { background:<?php echo get_theme_mod('nav_bg', '#cc5b44'); ?>; }
	.sf-menu ul:before { border-bottom:8px solid <?php echo get_theme_mod('nav_bg', '#cc5b44'); ?>; }
	#widget-area { background:<?php echo get_theme_mod('footer_border_progression', '#191612'); ?>; }
	#widget-area .social-ico a i {color:<?php echo get_theme_mod('footer_border_progression', '#191612'); ?>;}
	footer, body { background-color:<?php echo get_theme_mod('footer_bg_progression', '#26221d'); ?>; }
	footer .social-ico a i {color:<?php echo get_theme_mod('footer_bg_progression', '#26221d'); ?>;}
	body.page-template-homepage-php #main {background-color:<?php echo get_theme_mod('child_pages_pro', '#6f5e4f'); ?>; }
	#pro-home-slider .Button-Growler a, body #main .width-container #respond input#submit, 
body #main a.button, body #main button.single_add_to_cart_button, body #main input.button, body.woocommerce-cart #main td.actions  input.button.checkout-button, body #main button.button, body #single-product-pro a.button, body #single-product-pro button.single_add_to_cart_button, body #single-product-pro input.button, body.woocommerce-cart #single-product-pro input.button.checkout-button, body #single-product-pro button.button,
body a.progression-button, body input.wpcf7-submit, body input#submit, body a.ls-sc-button.default, .page-numbers span.current, .page-numbers a:hover  { background:<?php echo get_theme_mod('button_bg_progression', '#cc5b44'); ?>; border-color:<?php echo get_theme_mod('button_bg_progression', '#cc5b44'); ?>;}
	body #main .width-container .widget_price_filter .ui-slider .ui-slider-handle{ background:<?php echo get_theme_mod('button_bg_progression', '#cc5b44'); ?>; border-color:<?php echo get_theme_mod('button_bg_progression', '#cc5b44'); ?>; }
	span.comment-meta-pro a, ul#menu-sub-nav li a:hover, ul#menu-sub-nav li.current-cat a, body  #main .widget_price_filter .ui-slider .ui-slider-range {background:<?php echo get_theme_mod('button_bg_progression', '#cc5b44'); ?>; }
	body #main .width-container #respond input#submit:hover,
	body #main a.button:hover, body #main button.single_add_to_cart_button:hover, body #main input.button:hover, body.woocommerce-cart #main td.actions input.button.checkout-button:hover, body #main button.button:hover, body #single-product-pro a.button:hover, body #single-product-pro button.single_add_to_cart_button:hover, body #single-product-pro input.button:hover, body.woocommerce-cart #single-product-pro input.button.checkout-button:hover, body #single-product-pro button.button:hover,
	body a.progression-button:hover, body input.wpcf7-submit:hover, body input#submit:hover, body a.ls-sc-button.default:hover { background:<?php echo get_theme_mod('button_hover_bg_progression', '#bc543f'); ?>; border-color:<?php echo get_theme_mod('button_hover_bg_progression', '#bc543f'); ?>;}
	span.comment-meta-pro a:hover { background:<?php echo get_theme_mod('button_hover_bg_progression', '#bc543f'); ?>; }
	.page-numbers span, .page-numbers a, ul#menu-sub-nav li a { background:<?php echo get_theme_mod('second_button_bg_progression', '#ffffff'); ?>; }
	.content-container-pro, .container-blog, .shop-index-container, .menu-index-pro, .menu-single-content-pro, .event-container-pro { background:<?php echo get_theme_mod('main_content_bg_pro', '#ffffff'); ?>; }
	.sidebar-item { background:<?php echo get_theme_mod('sidebar_content_bg_pro', '#ffffff'); ?>; }
	body #main #events-full-calendar .fc-button-group button.fc-button.fc-state-active, .archive-meta.entry-meta strong, body.single-event .entry-meta, body.single-event .entry-meta a , body {color:<?php echo get_theme_mod('body_font_progression', '#777777'); ?>;}
	#page-title h1 {color:<?php echo get_theme_mod('page_font_progression', '#ffffff'); ?>;}
	#bread-crumb a i, #bread-crumb a { color:<?php echo get_theme_mod('bread_crumb-pro', '#ffffff'); ?>; }
	#bread-crumb { color:<?php echo get_theme_mod('bread_crumb-default-pro', '#cccccc'); ?>; }
	a, #bread-crumb i, #bread-crumb a:hover i, #bread-crumb a:hover, body #main a:hover h3.product-title-index-pro {color:<?php echo get_theme_mod('body_link_progression', '#cc5b44'); ?>;}
	a:hover, body #main a.more-link:hover {color:<?php echo get_theme_mod('body_link_hover_progression', '#ff7356'); ?>; }
	.sf-menu a { color:<?php echo get_theme_mod('navigation_menu_color', '#e5e4e4'); ?>; }
	.sf-menu a:hover, .sf-menu a:hover, .sf-menu li a:hover, .sf-menu a:hover, .sf-menu a:visited:hover, .sf-menu li.sfHover a, .sf-menu li.sfHover a:visited, body.single-post .sf-menu li.current_page_parent a, .sf-menu li.current-menu-item a {
		color:<?php echo get_theme_mod('nav_selected_pro', '#ffffff'); ?>;
		border-color:<?php echo get_theme_mod('nav_selected_pro', '#ffffff'); ?>; }
	.sf-menu li.sfHover li a, .sf-menu li.sfHover li a:visited, .sf-menu li.sfHover li li a, .sf-menu li.sfHover li li a:visited, .sf-menu li.sfHover li li li a, .sf-menu li.sfHover li li li a:visited, .sf-menu li.sfHover li li li li a, .sf-menu li.sfHover li li li li a:visited { color:<?php echo get_theme_mod('sub_font_color', '#f1d1cb'); ?>; }
	.sf-menu li li:hover, .sf-menu li li.sfHover, .sf-menu li li a:focus, .sf-menu li li a:hover, .sf-menu li li a:active, .sf-menu li li.sfHover a, .sf-menu li.sfHover li a:visited:hover, .sf-menu li li:hover a:visited,
	.sf-menu li li li:hover, .sf-menu li li li.sfHover, .sf-menu li li li a:focus, .sf-menu li li li a:hover, .sf-menu li li li a:active, .sf-menu li li li.sfHover a, .sf-menu li li.sfHover li a:visited:hover, .sf-menu li li li:hover a:visited,
	.sf-menu li li li li:hover, .sf-menu li li li li.sfHover, .sf-menu li li li li a:focus, .sf-menu li li li li a:hover, .sf-menu li li li li a:active, .sf-menu li li li li.sfHover a, .sf-menu li li li.sfHover li a:visited:hover, .sf-menu li li li li:hover a:visited,
	.sf-menu li li li li li:hover, .sf-menu li li li li li.sfHover, .sf-menu li li li li li a:focus, .sf-menu li li li li li a:hover, .sf-menu li li li li li a:active, .sf-menu li li li li li.sfHover a, .sf-menu li li li li.sfHover li a:visited:hover, .sf-menu li li li li li:hover a:visited  {  color:<?php echo get_theme_mod('sub_hover_font_color', '#ffffff'); ?>; }
	h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color:<?php echo get_theme_mod('heading_font_progression', '#101010'); ?>; } 
	#sidebar h5 { border-bottom:2px solid <?php echo get_theme_mod('sidebar_border_btm_pro', '#e94a29'); ?>; }
	.page-numbers span.current, .page-numbers a:hover, ul#menu-sub-nav li a:hover, ul#menu-sub-nav li.current-cat a, body a.ls-sc-button.secondary span, body a.ls-sc-button.default span , body #main .width-container #respond input#submit, 
	body #main a.button, body #main button.single_add_to_cart_button, body #main input.button, body.woocommerce-cart #main td.actions  input.button.checkout-button, body #main button.button, body #single-product-pro a.button, body #single-product-pro button.single_add_to_cart_button, body #single-product-pro input.button, body.woocommerce-cart #single-product-pro input.button.checkout-button, body #single-product-pro button.button,
	body a.progression-button, body input.wpcf7-submit, body input#submit, body a.ls-sc-button.default,
	#pro-home-slider .Button-Growler a { color:<?php echo get_theme_mod('button_font_pro', '#ffffff'); ?>; }
	#pro-home-slider .Button-Growler a:hover, body a.ls-sc-button.secondary span:hover, body a.ls-sc-button.default span:hover, body #main .width-container #respond input#submit:hover,
	body #main a.button:hover, body #main button.single_add_to_cart_button:hover, body #main input.button:hover, body.woocommerce-cart #main td.actions input.button.checkout-button:hover, body #main button.button:hover, body #single-product-pro a.button:hover, body #single-product-pro button.single_add_to_cart_button:hover, body #single-product-pro input.button:hover, body.woocommerce-cart #single-product-pro input.button.checkout-button:hover, body #single-product-pro button.button:hover, body a.progression-button:hover, body input.wpcf7-submit:hover, body input#submit:hover, body a.ls-sc-button.default:hover { color:<?php echo get_theme_mod('button_hover_font_pro', '#ffffff'); ?>; }
	ul#menu-sub-nav li a, .page-numbers span, .page-numbers a   { color:<?php echo get_theme_mod('page_numbers_bg_pro', '#999999'); ?>; }
</style>
    <?php
}
add_action('wp_head', 'progression_customize_css');

