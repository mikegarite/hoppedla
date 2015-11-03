<?php
add_action('widgets_init', 'pyre_homepage_foot_feat_load_widgets');

function pyre_homepage_foot_feat_load_widgets()
{
	register_widget('Pyre_Latest_Foot_Featured_Media_Widget');
}

class Pyre_Latest_Foot_Featured_Media_Widget extends WP_Widget {
	
	function Pyre_Latest_Foot_Featured_Media_Widget()
	{
		$widget_ops = array('classname' => 'pyre_homepage_media-product-feat', 'description' => 'Single Column highlight area');

		$control_ops = array('id_base' => 'pyre_homepage_media-widget-product-feat');
		
        add_action( 'load-widgets.php', array(&$this, 'my_custom_load') );
		
		
		$this->WP_Widget('pyre_homepage_media-widget-product-feat', 'Newsletter: Footer Widget', $widget_ops, $control_ops);
	}
	
    function my_custom_load() {    
          
       }
	
	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		$summary_text = $instance['summary_text'];
		
		$link_text = $instance['link_text'];
		$link_link = $instance['link_link'];
		$link_icon = $instance['link_icon'];
		
		$secondary_link_text = $instance['secondary_link_text'];
		$secondary_link_link = $instance['secondary_link_link'];
		$secondary_link_icon = $instance['secondary_link_icon'];
		
		$checkbox_pro = $instance['checkbox_pro'];
		$widget_bg = $instance['widget_bg'];
		$newsletter_form = $instance['newsletter_form'];
		
		echo $before_widget;
		
		 ?>
		
		<div class="footer-highlight" <?php if($widget_bg): ?>style="background-color:<?php echo esc_attr( $widget_bg ); ?>;"<?php endif; ?>>
			<div class="width-container">
				<?php if($title): ?>
					<h2 class="footer-highlight-widget"><?php echo esc_attr( $title ); ?></h2>
				<?php endif; ?>
				
				<?php if($summary_text): ?>
						<div class="summary-text-pro"><?php echo esc_attr( $summary_text ); ?></div>
				<?php endif; ?>
				
				<?php if($newsletter_form): ?>
						<div class="newletter-container"><?php echo do_shortcode( $newsletter_form ) ?></div>
				<?php endif; ?>
			<div class="clearfix"></div>
			</div>
		</div>

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		
		$instance['link_text'] = $new_instance['link_text'];
		$instance['link_link'] = $new_instance['link_link'];
		$instance['link_icon'] = $new_instance['link_icon'];
		
		$instance['summary_text'] = $new_instance['summary_text'];
		
		$instance['secondary_link_text'] = $new_instance['secondary_link_text'];
		$instance['secondary_link_link'] = $new_instance['secondary_link_link'];
		$instance['secondary_link_icon'] = $new_instance['secondary_link_icon'];
		
		$instance['widget_bg'] = $new_instance['widget_bg'];
		
		$instance['newsletter_form'] = $new_instance['newsletter_form'];
		$instance['checkbox_pro'] = $new_instance['checkbox_pro'];
		
		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => 'Newsletter', 'summary_text' => 'Subscribe to our newsletter and recieve special offers and discounts.', 'widget_bg' => '#cc5b44');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<script type='text/javascript'>
		            jQuery(document).ready(function($) {
		                $('.my-color-picker-footer').wpColorPicker();
		            });
		    </script>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
	
		<p>
			<label for="<?php echo $this->get_field_id('summary_text'); ?>"><?php _e( 'Summary Text', 'progression' ); ?>:</label>
	
			
			<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('summary_text'); ?>" name="<?php echo $this->get_field_name('summary_text'); ?>"><?php echo $instance['summary_text']; ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('newsletter_form'); ?>"><?php _e( 'Newsletter Embedded Form', 'progression' ); ?>:</label>
	
			
			<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('newsletter_form'); ?>" name="<?php echo $this->get_field_name('newsletter_form'); ?>"><?php echo $instance['newsletter_form']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('widget_bg'); ?>"><?php _e( 'Widget Background Color', 'progression' ); ?>:</label>
			<br>
			<input class="my-color-picker-footer" id="<?php echo $this->get_field_id('widget_bg'); ?>" name="<?php echo $this->get_field_name('widget_bg'); ?>" value="<?php echo $instance['widget_bg']; ?>" />
		</p>
		

	
		
	<?php }
}
?>