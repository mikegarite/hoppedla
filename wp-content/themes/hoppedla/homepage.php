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

				  $address = array('lat' => get_post_meta($post->ID, '_hl_brewery_latitude', true), 'lon' => get_post_meta($post->ID, '_hl_brewery_longitude', true), "title" => get_the_title(), "id" => $i++, "link" => get_the_permalink());
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

				var jArray= <?php echo json_encode($addresses); ?>;
				console.log(jArray);

		var map;
		var breweries_ = jArray;
var allMyMarkers = [];
function setMarkers(map, locations) {
  // Add markers to the map

  // Marker sizes are expressed as a Size of X,Y
  // where the origin of the image (0,0) is located
  // in the top left of the image.

  // Origins, anchor positions and coordinates of the marker
  // increase in the X direction to the right and in
  // the Y direction down.
  var image = {
    // This marker is 20 pixels wide by 32 pixels tall.
    url : 'http://hoppedla.com/wp-content/themes/surfarama/library/images/marker.png'
    // size: new google.maps.Size(20, 32),
    // // The origin for this image is 0,0.
    // origin: new google.maps.Point(0,0),
    // // The anchor for this image is the base of the flagpole at 0,32.
    // anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon.
  // The type defines an HTML &lt;area&gt; element 'poly' which
  // traces out a polygon as a series of X,Y points. The final
  // coordinate closes the poly by connecting to the first
  // coordinate.
  var shape = {
      coords: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
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
        shape: shape,
        barid: locations[i].id
    });

  

    function addInfoWindow(marker, message) {
                  var message = '<div id="iw-container">' +
                    '<div class="iw-title">Porcelain Factory of Vista Alegre</div>' +
                    '<div class="iw-content">' +
                      '<div class="iw-subTitle">History</div>' +
                      '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
                      '<p>Founded in 1824, the Porcelain Factory of Vista Alegre was the first industrial unit dedicated to porcelain production in Portugal. For the foundation and success of this risky industrial development was crucial the spirit of persistence of its founder, José Ferreira Pinto Basto. Leading figure in Portuguese society of the nineteenth century farm owner, daring dealer, wisely incorporated the liberal ideas of the century, having become "the first example of free enterprise" in Portugal.</p>' +
                      '<div class="iw-subTitle">Contacts</div>' +
                      '<p>VISTA ALEGRE ATLANTIS, SA<br>3830-292 Ílhavo - Portugal<br>'+
                      '<br>Phone. +351 234 320 600<br>e-mail: geral@vaa.pt<br>www: www.myvistaalegre.com</p>'+
                    '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';

              var infoWindow = new google.maps.InfoWindow({
                  content: message
              });
              google.maps.event.addListener(marker, 'click', function() {                
                  infoWindow.open(map, marker);
              });
          }
          addInfoWindow(marker, 'sup');

    allMyMarkers.push(marker); 




    google.maps.event.addListener(marker, "mouseover", function(data) {

       var x = this.barid;


       jQuery.fn.scrollTo = function(elem, speed) { 
		    jQuery(this).animate({
		        scrollTop:  jQuery(this).scrollTop() - jQuery(this).offset().top + jQuery(elem).offset().top - 100
		    }, speed == undefined ? 1000 : speed); 
		    return this; 
		};

		jQuery('#brewery-list a').removeClass('active');
        jQuery('#brewery-list a[data-id="'+x+'"]').addClass('active');



		jQuery("#brewery-list").scrollTo("a.active", 500);
       
       


    });

  }


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
		    setMarkers(map, breweries_);


		    

		}


		function toggleBounce(selectedID) {
        var pinID = selectedID.split('_');
        // loop through our array & check with marker has same ID with the text
        for(var j=0;j<allMyMarkers.length;j++){
                if(allMyMarkers[j].barid == pinID){

                        if (allMyMarkers[j].getAnimation() != null) {
                                allMyMarkers[j].setAnimation(null);
                        } else {
                                allMyMarkers[j].setAnimation(google.maps.Animation.BOUNCE);
                                map.panTo(allMyMarkers[j].getPosition());
                                map.setZoom(11);
                        }
                        break; // stop continue looping
                }
        }
}

		jQuery(function(){
			google.maps.event.addDomListener(window, 'load', initialize);

			jQuery('#brewery-list').on('hover', 'a', function(){
                var selectedID = jQuery(this).attr('data-id');
                toggleBounce(selectedID);
        	});


		});
				

			</script>
			<style>
				#brewery-list{
					width:30%;
					position: absolute;
					right:0;
					top:115px;
					
					float:left;
					background:#fff;
					height:500px;
					overflow-y: scroll;
          display: none;
				}

				#brewery-list a{
					width:96%;
					display: block;
					padding:15px 2%;
					background:#fff;
					color:#444;
					text-transform: uppercase;
					font-size:18px;
				}

				#brewery-list a:nth-child(even){
					background:#f9f9f9;
				}

				#brewery-list a.active, #brewery-list a:hover{
					background:#ccc;

				}
        #map-canvas{
          width:100%;
          height:100%;
          top:0;
          left:0;
          position: absolute;
          z-index: 99999999;
        }

        .map-filter{
          position: absolute;
          bottom:10px;
          width:60%;
          height:75px;
          background:rgba(238, 238, 238, .8);
          border:#ccc 2px solid;
          border-radius: 4px;
          margin-left:20%;
          z-index: 999999999;
        }

        .map-filter button{
          height:100%;
          width:10%;
          background:#ddd;
          float: left;
          border:none;
          border-left:#ccc 1px solid;
          border-right:#ccc 1px solid;
        }
        .map-filter button.active{
          background:#999;
        }
			</style>
				                <div id="map-canvas"></div>
                        <div class="map-filter">
                          <button></button>
                          <button class="active"></button>
                          <button></button>
                          <button></button>

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
