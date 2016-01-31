<?php
// Template Name: Events
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
<div id="page-title">   
  <div class="width-container">
    <h1><?php the_title(); ?></h1>
    <?php if(function_exists('bcn_display')): ?><div id="bread-crumb"><?php bcn_display()?></div><?php endif; ?>
    <div class="clearfix"></div>
  </div>
</div><!-- close #page-title -->
<div id="main">

  <style>


    .content-show{
      display: block !important;
    }
    
    .page-item{
      display: none;
    }


  </style>
  <script>

    jQuery(function(){
    var $ = jQuery;
    $('#menu-sub-nav li a').on('click', function(){
        var d = $(this).attr('id'); 


          $('#menu-sub-nav li').removeClass('current-cat');
          $('.page-item').removeClass('content-show');
          $('.'+d).addClass('content-show');
          $('#'+d).parent().addClass('current-cat');


    })


    })
  </script>


    <div class="width-container">

 <ul id="menu-sub-nav">
          <li class="cat-item cat-item-17 current-cat"><a id="calendar" href="javascript:void(0);">Calendar</a></li>  <li class="cat-item cat-item-18"><a id="list" href="javascript:void(0);">List</a>
</li>
        </ul>


                          <div class="content-show calendar page-item">
  
        <?php the_content(); ?>

  </div>
        
                
          <?php $args = array( 'post_type' => 'event', 'posts_per_page' => -1 ); ?>
<?php $query = new WP_Query($args); ?>

  
 <?php 
 $addresses = array();


 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
  <div class="grid3column-progression list page-item">

 <article id="post-<?php the_ID(); ?>" <?php // post_class($classes); ?>>
    <div class="event-container-pro">
      <?php if(has_post_thumbnail()): ?>
        <div class="featured-event-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('progression-events'); ?></a></div>
      <?php endif; ?>
      <div class="event-content-index">
        <h3 class="entry-title summary"><a href="<?php the_permalink(); ?>" class="url" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
        <div class="event-meta-pro">
          <?php do_action('em_loop_event_meta_start'); ?>
        </div>
        
      </div>
    </div>
  </article> 
  </div>            

 <?php endwhile; 
      show_pagination_links( );

 //wp_reset_postdata();
 else : ?>
 <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>
        

          <div class="clearfix"></div>                
          <div class="clearfix"></div>
          
                
    <div class="clearfix"></div>
  </div>
  
<div class="clearfix"></div>
</div>
<?php get_footer(); ?>
