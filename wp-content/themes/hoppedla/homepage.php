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

				  $address = array('venue_type' => 'brewery', 'lat' => get_post_meta($post->ID, '_hl_brewery_latitude', true), 'lon' => get_post_meta($post->ID, '_hl_brewery_longitude', true), 'address' => get_post_meta($post->ID, '_hl_brewery_address', true), 'neighborhood' => get_post_meta($post->ID, '_hl_brewery_neighborhood', true), 'image' => get_post_meta($post->ID, '_hl_brewery_image', true), 'phone' => get_post_meta($post->ID, '_hl_brewery_phone', true), 'website' => get_post_meta($post->ID, '_hl_brewery_website', true), 'instagram' => get_post_meta($post->ID, '_hl_brewery_instagram', true), 'facebook' => get_post_meta($post->ID, '_hl_brewery_facebook', true),'untapped' => get_post_meta($post->ID, '_hl_brewery_untapped', true),'foursquare' => get_post_meta($post->ID, '_hl_brewery_foursquare', true),'description' => get_post_meta($post->ID, '_hl_brewery_wysiwyg', true),'filters' => get_post_meta($post->ID, '_hl_brewery_filter', true), "title" => get_the_title(), "id" => $i++, "link" => get_the_permalink());
				  array_push($addresses, $address);
				?>

 <?php endwhile; 
 wp_reset_postdata();
 else : ?>
 <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>
                


<?php $b_args = array( 'post_type' => 'bars', 'posts_per_page' => -1 ); ?>
<?php $b_query = new WP_Query($b_args); ?>
 <?php 
 $bar_addresses = array();

 $i = 1;
 if ( $b_query->have_posts() ) : while ( $b_query->have_posts() ) : $b_query->the_post(); ?>
 <?php 

          $bar_address = array('venue_type' => 'bar', 'lat' => get_post_meta($post->ID, '_hl_bar_latitude', true), 'lon' => get_post_meta($post->ID, '_hl_bar_longitude', true), 'address' => get_post_meta($post->ID, '_hl_bar_address', true), 'neighborhood' => get_post_meta($post->ID, '_hl_bar_neighborhood', true), 'image' => get_post_meta($post->ID, '_hl_bar_image', true), 'phone' => get_post_meta($post->ID, '_hl_bar_phone', true), 'website' => get_post_meta($post->ID, '_hl_bar_website', true), 'instagram' => get_post_meta($post->ID, '_hl_bar_instagram', true), 'facebook' => get_post_meta($post->ID, '_hl_bar_facebook', true),'untapped' => get_post_meta($post->ID, '_hl_bar_untapped', true),'foursquare' => get_post_meta($post->ID, '_hl_bar_foursquare', true),'description' => get_post_meta($post->ID, '_hl_bar_wysiwyg', true),'filters' => get_post_meta($post->ID, '_hl_bar_filter', true), "title" => get_the_title(), "id" => $i++, "link" => get_the_permalink());
          array_push($bar_addresses, $bar_address);
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

				$venue_result = array();
        $venue_result = array_merge($addresses, $bar_addresses);


			?>

			<script>

        var $ = jQuery;
        $(function(){

          google.maps.event.addDomListener(window, 'load', initialize);

          $('.filter').on('click', function(){
              $('.info-pane').removeClass('on');
              $(this).toggleClass('active');
              var _filters = [];
              $( ".filter.active" ).each(function( index ) {
                _filters.push($(this).attr('id'));
              });
              filterMarkers(_filters);
          })
        })

				var jArray= <?php echo json_encode($venue_result); ?>;
        console.log(jArray);
				var map;

		    var breweries_ = jArray;
        var allMyMarkers = [];
        function setMarkers(map, locations, c) {
          console.log(locations);
          var image = {
            url : '/wp-content/themes/hoppedla/images/marker.png'
          };
   

        $('button#locations').on('click', function(){
          $('.info-pane').removeClass('on');
          $('.modal').toggleClass('on');
          runLocationsWindow(jArray);
        })

        $('.modal').on('click', function(){
          $('.modal').toggleClass('on');
        })

        function runLocationsWindow(a){
          var n_array = []
          for (var i = 0; i < a.length; i++) {
            var n = a[i].neighborhood;
            
            if(n != ''){
                $('.modal .modal-info').empty();
                $('.modal .modal-info').append("<ul></ul>")
                n_array.push(n);
            };
          };
            

            var s_n = unique(n_array).sort();

            for (var sn = 0; sn < s_n.length; sn++) {
              $('.modal  .modal-info ul').append('<li class="'+s_n[sn].replace(/\s/g, '').replace(/[^a-z0-9\s]/gi, '').toLowerCase()+'"><h3>'+s_n[sn]+'</h3></li>')
              
            };

             for (var gn = 0; gn < a.length; gn++) {
                  var _n = a[gn].neighborhood;
                  
                  if(_n != ''){
//                      $('.modal').empty();
                      $('.modal  .modal-info .'+_n.replace(/\s/g, '').replace(/[^a-z0-9\s]/gi, '').toLowerCase()).append('<a href="'+a[gn].link+'">'+a[gn].title+'</a>')
                      console.log(a[gn]);
                  };
          };



        }
          

        function unique(list) {
            var result = [];
            $.each(list, function(i, e) {
                if ($.inArray(e, result) == -1) result.push(e);
            });
            return result;
        }
   
   


        for (var i = 0; i < locations.length; i++) {

      	  var template;
      		template = "<a data-id='"+locations[i].id+"' href='"+locations[i].link+"'>"+locations[i].title+"</a>";
      		jQuery('#brewery-list').append(template);
      
          var myLatLng = new google.maps.LatLng(locations[i].lat, locations[i].lon);
          var marker = new google.maps.Marker({
              position: myLatLng,
              map: map,
              icon: '/wp-content/themes/hoppedla/images/'+locations[i].venue_type+'-marker.png',
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
        $('.info-pane').addClass('on');
        $('.info-pane').on('click', function(){
          $('.info-pane').removeClass('on');
        });
        $('.info-pane .title').text(marker.title);
        $('.info-pane .address').text(marker.address);
        $('.info-pane .description').text(marker.description);
        $('.info-pane .facebook').text(marker.facebook);
        $('.info-pane .foursquare').text(marker.foursquare);
        $('.info-pane .image').attr('src',marker.image);
        $('.info-pane .instagram').text(marker.instagram);
        $('.info-pane .link').attr('href',marker.link);
        $('.info-pane .neighborhood').text(marker.neighborhood);
        $('.info-pane .phone').text(marker.phone);
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
		    styles: [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "hue": "#ffee00"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "hue": "#8dff00"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "all",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#00ff33"
            }
        ]
    },
    {
        "featureType": "landscape.natural.terrain",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#57ff00"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            },
            {
                "hue": "#ff0000"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#ff0000"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "all",
        "stylers": [
            {
                "color": "#90ffa8"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "visibility": "on"
            }
        ]
    }
]
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
                        <div class="modal">
                            <div class="modal-info"></div>
                            <div class="close-list"></div>
                        </div>
                        <div class="info-pane">
                            <p class="title"></p>
                            <img src="" class="image" />
                            <p class="neighborhood"></p>
                            <p class="phone"></p>
                            <p class="address"></p>
                            <p class="description"></p>
                            <a href="" class="link">Visit Page</a>
                            <p class="untapped"></p>
                            <p class="website"></p>
                            <p class="facebook"></p>
                            <p class="foursquare"></p>
                            <p class="instagram"></p>



                        </div>
                        <div class="map-filter">
                          <button id="pets" class="filter"></button>
                          <button id="food" class="filter"></button>
                          <button id="favorite" class="filter"></button>
                          <button id="locations"></button>

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
