<?php
/**
 * The Template for displaying all single posts.
 *
 * @package progression
 */

get_header(); ?>
<div id="page-title">		
	<div class="width-container">
		<?php $page_for_posts = get_option('page_for_posts'); ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <h1 class=""><?php the_title();?></h1>
    <?php endwhile; // end of the loop. ?>
		
		<?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->


<div id="main">
	
<div class="width-container bg-sidebar-pro">
	<div id="content-container">



<?php if(is_singular( array( 'breweries', 'bars' )  )) { ?> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<style>
	   .panel-default{
	   	border: none;
	   }

	   .activity-list tr{
	   	height:60px;
	   	padding:0 10px;
	   }
	   .activity-list th, .activity-list td{
	   	padding:20px !important;
	   	border:none !important;
	   	font-family: 'Noto Sans', sans-serif;
	   }
	   .activity-list th{
	   	padding-left:15px !important;
	   }

     .r-top span{
        padding: 0;
        width:150px;
     }

     .rating_bar {
    /*this class creats 5 stars bar with empty stars */
    /*each star is 16 px, it means 5 stars will make 80px together */
    width: 80px;
    /*height of empty star*/
    height: 16px;
    /*background image with stars */
    background: url(http://www.webcodingeasy.com/images/stars.png);
    /*which will be repeated horizontally */
    background-repeat: repeat-x;
    /* as we are using sprite image, we need to position it to use right star, 
    //0 0 is for empty */
    background-position: 0 0;
    /* align inner div to the left */
    text-align: left;
    margin-top:0px;
    float:left;
}
.r-top{
  float:left;
}
.rating {
    /* height of full star is the same, we won't specify width here */
    height: 16px;
    /* background image with stars */
    background: url(http://www.webcodingeasy.com/images/stars.png);
    /* now we will position background image to use 16px from top, 
    //which means use full stars */
    background-position: 0 -16px;
    /* and repeat them horizontally */
    background-repeat: repeat-x;
}

.description{
  float:left;
  margin-top:15px;
}
	</style>
   
    <div id="content" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>

<div class="container target">
    <div class="row">
      <div class="col-sm-2"><a href="/users"><img title="profile image" class="img-circle img-responsive" src="<?php echo get_post_meta($post->ID, '_hl_brewery_image', true); ?>"/></a>

        </div>
        <div class="col-sm-10">
             <!-- <h1 class=""><?php the_title();?></h1> -->
             <div class="address"></div>
               <div class='rating_bar'>
                  <!-- div element that contains full stars with percentage width, 
                  which represents rating -->
                  <div  class='rating' style='width:0%;'></div>
              </div>
             <div class="r-top">
             </div>


             <div class="panel-body social">
                 <a href="#" class="location" target="_blank"></a>
                 <a class="website" target="_blank" href="#"></a>         

             </div>

             <div class="description"></div>
    
        </div>
      
    </div>
  <br>
    <div class="row">
       
        <!--/col-3-->
        <div class="col-sm-12" contenteditable="false" style="">
           <!--  <div class="panel panel-default">
                <div class="panel-heading"><?php the_title();?>'s Bio</div>
                <div class="panel-body description"></div>
            </div> -->
            <div class="panel panel-default" data-example-id="simple-table">
    <table class="table table-striped">
      <h3>Latest Beer Checkins.</h3>
      <thead>
        <tr>
          <th>Date</th>
          <th>Name</th>
          <th>Style</th>
          <th>ABV%</th>
        </tr>
      </thead>
      <tbody class="activity-list">
        
      </tbody>
    </table>
  </div>


            <div class="panel panel-default target">
                <div class="panel-body">
                  <div class="row photos"></div>
	            </div>
        	</div>
              
    </div>

           </div>


            <div id="push"></div>
        </div>
        
        
	
</div>
        
					
						<script>
              var venue_id = <?php echo get_post_meta($post->ID, '_hl_untappd_id', true); ?>;

                      var url_ = 'https://api.untappd.com/v4/venue/info/'+venue_id+'?client_id=ba87167981fb4eff95cdbda7f1019d1a&client_secret=31a111876e0fb9f738c9aa4347348b39';       




              var title = "<?php echo get_the_title();?>";
              
              console.log(venue_id);

                    var url_ = 'https://api.untappd.com/v4/search/brewery?q='+title+'&client_id=ba87167981fb4eff95cdbda7f1019d1a&client_secret=31a111876e0fb9f738c9aa4347348b39';

                      var _data = [];
              jQuery.ajax({
                url: url_,
                type: 'GET',
                dataType: 'json',
                data: {},
                success: function(data) {
                  console.log(data);
                    var brewery_url = 'https://api.untappd.com/v4/venue/info/'+venue_id+'?client_id=ba87167981fb4eff95cdbda7f1019d1a&client_secret=31a111876e0fb9f738c9aa4347348b39';
                    var activity_url = 'https://api.untappd.com/v4/venue/checkins/'+venue_id+'?client_id=ba87167981fb4eff95cdbda7f1019d1a&client_secret=31a111876e0fb9f738c9aa4347348b39';
                    jQuery.ajax({
                    url: activity_url,
                    dataType: 'json',
                    data: {},
                    success: function(activityData) {
                      ad = activityData.response.checkins.items;

                      for (var i = 0; i < 25; i++) {
                        var template;
                        var datestr = ad[i].created_at;
                    var timestamp = (new Date(datestr.split(".").join("-")).getTime())/1000;
                        function timeConverter(UNIX_timestamp){
                      var a = new Date(UNIX_timestamp*1000);
                      var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                      var year = a.getFullYear();
                      var month = months[a.getMonth()];
                      var date = a.getDate();
                      var hour = a.getHours();
                      var min = a.getMinutes();
                      var sec = a.getSeconds();
                      var timeValue = "" + ((hour >12) ? hour -12 :hour);
                        timeValue += ((min < 10) ? ":00" : ":"  + min);
                        //timeValue += ((sec < 10) ? ":00" : ":"  + sec);
                        timeValue += (hour >= 12) ? " PM" : " AM";
                      var time = month + ' ' + date + ', ' + year + ' ' + timeValue;
                      return time;
                    }
                  // will display time in 10:30:23 format
                  
                          template  = '<tr><td>'+timeConverter(timestamp)+'</td><td>'+ad[i].beer.beer_name+'</td><td>'+ad[i].beer.beer_style+'</td><td>'+ad[i].beer.beer_abv+'%</td></tr>';

                        jQuery('.activity-list').append(template);
                      };
                    }
                });
                    jQuery.ajax({
                    url: brewery_url,
                    type: 'GET',
                    dataType: 'json',
                    data: {},
                    success: function(breweryData) {
                      var stats = breweryData.response.brewery;

                      jQuery('a.location').attr('href','http://maps.google.com/maps?saddr='+stats.location.brewery_address +stats.location.brewery_city);
                      console.log(stats);

                      function addhttp(url) {
                     if (!/^(f|ht)tps?:\/\//i.test(url)) {
                        url = "http://" + url;
                     }
                     return url;
                  }


                  if(stats.contact.url.length){
                    jQuery('.website').attr('href', addhttp(stats.contact.url));  
                  }

                  else{
                    jQuery('.website').parent().parent().remove();
                  }

                  if(stats.contact.facebook.length){
                    jQuery('.social').append('<a class="facebook" href="'+addhttp(stats.contact.facebook)+'" target="_blank"><span style="visibility:hidden">.</span>&nbsp;</a>');
                  }
                  if(stats.contact.twitter.length){
                    jQuery('.social').append('<a class="twitter" href="http://twitter.com/'+stats.contact.twitter+'" target="_blank"><span style="visibility:hidden">.</span>&nbsp;</a>');
                  }
                  if(stats.contact.instagram.length){
                    //jQuery('.social').append('<a href="http://instagram.com/'+stats.contact.instagram+'" target="_blank">Instagram</a><br/>');
                  }

                  if (!jQuery('.social').text().trim().length) {
                        jQuery('.social').parent().remove();
                    }




                      var s_;
                        // s_   = '<li class="list-group-item text-right"><span class="pull-left"><strong class="">Ratings Score</strong></span> '+stats.rating.rating_score+'</li>';
                        s_ = '<span class="list-group-item text-right"><strong class="">Total Ratings</strong> '+stats.rating.count+'</span>';
                        // s_ += '<li class="list-group-item text-right"><span class="pull-left"><strong class="">Weekly Checkins</strong></span> '+stats.stats.weekly_count+'</li>';
                        // s_ += '<li class="list-group-item text-right"><span class="pull-left"><strong class="">Monthly Checkins</strong></span> '+stats.stats.monthly_count+'</li>';
                        // s_ += '<li class="list-group-item text-right"><span class="pull-left"><strong class="">Unique Checkins</strong></span> '+stats.stats.unique_count+'</li>';
                        // s_ += '<li class="list-group-item text-right"><span class="pull-left"><strong class="">Total Checkins</strong></span> '+stats.stats.total_count+'</li>';

                      jQuery('.r-top').append(s_);


                      var star_percentage = (stats.rating.rating_score / 5) * 100;
                      jQuery('.rating').attr('style', 'width:'+star_percentage+'%');


                  if(breweryData.response.brewery.brewery_description.length){
                    jQuery('.description').text(breweryData.response.brewery.brewery_description);
                  }
                  else{
                    jQuery('.description').parent().remove(); 
                  }
                  
                  

                      var photos = breweryData.response.brewery.media.items;
                      for (var p = 0; p < photos.length; p++) {
                        var p_;
                          p_ = '<div class="col-md-4"><div class="thumbnail"><img src="'+photos[p].photo.photo_img_md+'"/></div></div>';
                          
                      jQuery('.photos').append(p_);

                      };


                      var main_data = breweryData.response.brewery.beer_list.items;
                      for (var i = 0; i < main_data.length; i++) {
                        var template; 
                        if(main_data[i].beer.is_in_production === 1){
                          template  = '<li class="list-group-item text-right"><span class="pull-left"><strong class="">'+main_data[i].beer.beer_name+'</strong></span>'+main_data[i].beer.beer_abv+' ABV <p>'+main_data[i].beer.beer_style+'</p></li>';                       }
                        jQuery('.beer-list').append(template);
                      };
                    }
                });

                  
                }
              });





             
                        </script>







		
			<?php endwhile; // end of the loop. ?>

        

    </div> <!-- end #content -->

    <?php } ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

	<?php endwhile; // end of the loop. ?>
	
	</div>
  <?php if(!is_singular( array('breweries','bars' ))) { ?> 
	<?php get_sidebar(); ?>
  <?php } ?>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>
