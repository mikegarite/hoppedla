<?php
// Template Name: HomePage
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>

<?php $args = array( 'post_type' => 'breweries', 'posts_per_page' => -1 ); ?>
<?php $query = new WP_Query($args); ?>
 <?php 
 $addresses = array();

 $i = 1;
 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

 <?php 

				  $address = array('lat' => get_post_meta($post->ID, '_hl_brewery_latitude', true), 'lon' => get_post_meta($post->ID, '_hl_brewery_longitude', true), 'address' => get_post_meta($post->ID, '_hl_brewery_address', true), 'neighborhood' => get_post_meta($post->ID, '_hl_brewery_neighborhood', true), 'image' => get_post_meta($post->ID, '_hl_brewery_image', true), 'phone' => get_post_meta($post->ID, '_hl_brewery_phone', true), 'website' => get_post_meta($post->ID, '_hl_brewery_website', true), 'instagram' => get_post_meta($post->ID, '_hl_brewery_instagram', true), 'facebook' => get_post_meta($post->ID, '_hl_brewery_facebook', true),'untapped' => get_post_meta($post->ID, '_hl_brewery_untapped', true),'foursquare' => get_post_meta($post->ID, '_hl_brewery_foursquare', true),'description' => get_post_meta($post->ID, '_hl_brewery_wysiwyg', true),'filters' => get_post_meta($post->ID, '_hl_brewery_filter', true), "title" => get_the_title(), "id" => $i++, "link" => get_the_permalink());
				  array_push($addresses, $address);
				?>

 <?php endwhile; 
 wp_reset_postdata();
 else : ?>
 <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>
                





			<?php 



				// $args = array( 'post_type' => 'breweries', 'posts_per_page' => -1 );
				// $loop = new WP_Query( $args );
				// $addresses = array();
				// while ( $loop->have_posts() ) : $loop->the_post();
				//   $address = array('lat' => get_post_meta($post->ID, '_hl_brewery_latitude', true), 'lon' => get_post_meta($post->ID, '_hl_brewery_longitude', true));
				//   array_push($addresses, $address);
				// endwhile;

				


			?>

			<script>

        var $ = jQuery;
        $(function(){

          google.maps.event.addDomListener(window, 'load', initialize);

          $('.filter').on('click', function(){
              $(this).toggleClass('active');
              var _filters = [];
              $( ".filter.active" ).each(function( index ) {
                _filters.push($(this).attr('id'));
              });
              filterMarkers(_filters);
          })
        })



				var jArray= <?php echo json_encode($addresses); ?>;
				var map;
		    var breweries_ = jArray;
        var allMyMarkers = [];
        function setMarkers(map, locations, c) {
          
          var image = {
            url : 'http://hoppedla.com/wp-content/themes/surfarama/library/images/marker.png'
          };
   
    
   
        for (var i = 0; i < locations.length; i++) {

      	  var template;
      		template = "<a data-id='"+locations[i].id+"' href='"+locations[i].link+"'>"+locations[i].title+"</a>";
      		jQuery('#brewery-list').append(template);
      
          var myLatLng = new google.maps.LatLng(locations[i].lat, locations[i].lon);
          var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              icon: image,
              barid: locations[i].id,
              address: locations[i].address,
              description: locations[i].description,
              facebook: locations[i].facebook,
              foursquare: locations[i].foursquare,
              image: locations[i].image,
              instagram: locations[i].instagram,
              link: locations[i].link,
              neighborhood: locations[i].neighborhood,
              phone: locations[i].phone,
              title: locations[i].title,
              untapped: locations[i].untapped,
              website: locations[i].website,
              filters: locations[i].filters
          });


          addInfoWindow(marker);

          allMyMarkers.push(marker); 

          function addInfoWindow(marker) {
                google.maps.event.addListener(marker, 'click', function() {                
                runWindowPane(marker);
            });
          }


    // google.maps.event.addListener(marker, "mouseover", function(data) {
    //   var x = this.barid;
    //   jQuery.fn.scrollTo = function(elem, speed) { 
		  //   jQuery(this).animate({
		  //       scrollTop:  jQuery(this).scrollTop() - jQuery(this).offset().top + jQuery(elem).offset().top - 100
		  //   }, speed == undefined ? 1000 : speed); 
		  //   return this; 
	   //  };
		  // jQuery('#brewery-list a').removeClass('active');
    //   jQuery('#brewery-list a[data-id="'+x+'"]').addClass('active');
  		// jQuery("#brewery-list").scrollTo("a.active", 500);
    // });

  }


}




    function runWindowPane(marker){
      console.log(marker);
        var $ = jQuery;
        $('.info-pane .address').text(marker.address);
        $('.info-pane .description').text(marker.description);
        $('.info-pane .facebook').text(marker.facebook);
        $('.info-pane .foursquare').text(marker.foursquare);
        $('.info-pane .image').attr('src',marker.image);
        $('.info-pane .instagram').text(marker.instagram);
        $('.info-pane .link').text(marker.link);
        $('.info-pane .neighborhood').text(marker.neighborhood);
        $('.info-pane .phone').text(marker.phone);
        $('.info-pane .title').text(marker.title);
        $('.info-pane .untapped').text(marker.untapped);
        $('.info-pane .website').text(marker.website);
    }


		function initialize() {
		  var mapOptions = {
		    zoom: 10,
		    scrollwheel: false,
		    panControl: false,
			  zoomControl: true,
			  mapTypeControl: false,
			  scaleControl: false,
			  streetViewControl: false,
			  overviewMapControl: true,
		    center: new google.maps.LatLng(34.0500, -118.2500),
		    styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a0d6d1"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#dedede"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#dedede"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f1f1f1"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
		  };
		  

      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		  setMarkers(map, breweries_, 'test');

		}

      filterMarkers = function(category) {
        var c_;
        for (i = 0; i < allMyMarkers.length; i++) {
          marker = allMyMarkers[i];
          if (category.length == 0) {
            marker.setVisible(true);
          } 
          else {
              // If is same category or category not picked
              if (marker.filters.length) {
             
                  for (var z = 0; z < marker.filters.length; z++) {
                       for (var c = 0; c < category.length; c++) {
                  c_ = category[c];
                    if (marker.filters[z] === c_) {
                      console.log(marker.filters[z])
                        console.log(c_);

                      marker.setVisible(true);
                    }
                    else{
                  marker.setVisible(false);
                }
                  };
                };
              }
              // Categories don't match 
              else {
                marker.setVisible(false);
              }
                      }
        };
      }
      		

				

			</script>



				                <div id="map-canvas"></div>
                        <div class="info-pane">
                          
                            <p class="address"></p>
                            <p class="description"></p>
                            <p class="facebook"></p>
                            <p class="foursquare"></p>
                            <img src="" class="image" />
                            <p class="instagram"></p>
                            <p class="link"></p>
                            <p class="neighborhood"></p>
                            <p class="phone"></p>
                            <p class="title"></p>
                            <p class="untapped"></p>
                            <p class="website"></p>



                        </div>
                        <div class="map-filter">
                          <button id="pets" class="filter"></button>
                          <button id="food" class="filter"></button>
                          <button id="favorite" class="filter"></button>
                          <button class="active"></button>


                        </div>
				                <div id="brewery-list"></div>

<?php if(get_post_meta($post->ID, 'progression_address_home', true)): ?>
<div id="address-hours-homepage">
	<div class="width-container">
		<div id="address-homepage-pro"><?php echo (get_post_meta($post->ID, 'progression_address_home', true)); ?></div>
		<?php if(get_post_meta($post->ID, 'progression_hours_home', true)): ?><div id="hours-homepage-pro"><?php echo (get_post_meta($post->ID, 'progression_hours_home', true)); ?></div><?php endif; ?> 
	</div>
</div>
<?php endif; ?> 

<div id="main">
	<div class="width-container">
	<!-- Homepage Child Pages Start -->
	<?php
	$args = array(
		'post_type' => 'page',
		'numberposts' => -1,
		'post' => null,
		'post_parent' => $post->ID,
	    'order' => 'ASC',
	    'orderby' => 'menu_order'
	);
	$features = get_posts($args);
	$features_count = count($features);
	if($features):
		$count = 1;
		foreach($features as $post): setup_postdata($post);
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, 'large');
			$col_count_progression = get_theme_mod('home_col_progression', '3');
			if($count >= 1+$col_count_progression) { $count = 1; }
	?>
		<div class="home-child-boxes grid<?php echo get_theme_mod('home_col_progression', '3'); ?>column-progression <?php if($count == get_theme_mod('home_col_progression', '3')): echo ' lastcolumn-progression'; endif; ?>">
			<div class="home-child-boxes-container">
				<?php if(get_post_meta($post->ID, 'progression_child_link', true)): ?><a href="<?php echo get_post_meta( get_the_ID(), 'progression_child_link', true ); ?>"><?php endif; ?>
				<?php if($image_url[0]): ?><div class="home-child-image-pro"><img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>"></div><?php endif; ?>
				
				<?php if($image_url[0]): ?><div class="floating-text-home"><?php the_content(); ?><?php endif; ?>
					<h3 class="home-child-title"><?php the_title(); ?></h3>
				<?php if($image_url[0]): ?></div><?php else : ?><?php the_content(); ?><?php endif; ?>
				<?php if(get_post_meta($post->ID, 'progression_child_link', true)): ?></a><?php endif; ?>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	<?php if($count == get_theme_mod('home_col_progression', '3')): ?><div class="clearfix"></div><?php endif; ?>
	<?php $count ++; endforeach; ?>
	<?php endif; ?>
	<div class="clearfix"></div>
	<!-- Homepage Child Pages End -->
	</div><!-- close .width-container -->
	
	<!-- this code pull in the homepage content -->
	<?php while(have_posts()): the_post(); ?>
		<?php if($post->post_content=="") : ?><?php else : ?>
		<div id="homepage-content-container">
			<div class="width-container">
			<?php the_content(); ?>
			<div class='clearfix'></div>
			</div>
		</div>
		<?php endif; ?>
	<?php endwhile; ?>
	
	<?php if ( is_active_sidebar( 'homepage-widgets' ) ) : ?>
		<?php dynamic_sidebar( 'homepage-widgets' ); ?>
	<?php endif; ?>

<?php get_footer(); ?>
