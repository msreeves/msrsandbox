<?php
/**
 * ACF: Flexible Content > Layouts > Event
 * 
 * @package WordPress
 */
?>
        <?php 	
      $args = array(
        'post_type' => 'event',
        'posts_per_page' => 1,

      );
      $all_posts = new WP_Query( $args );		
      ?>

      <?php if ( $all_posts->have_posts() ) : ?>      
          <?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>	
              <?php get_template_part( 'templates/partials/post-listing/listing-events' ); ?>
               <section><div class="text-center">
                   <a href="./events"><button> View All Events</button></a>
                </div></section>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
      <?php endif; ?>
