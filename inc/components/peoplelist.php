<?php
/**
 * ACF: Flexible Content > Layouts > People
 *
 * @package WordPress
 * @subpackage QORP
 */

?>

        <section>
          <div class="container">
 <?php 	
      $args = array(
        'post_type' => 'member',
        'posts_per_page' => -1,
         'meta_key' => 'name',
         'orderby' => 'title',
         'order' => 'ASC',
      );
      $all_posts = new WP_Query( $args );		
      ?>

      <?php if ( $all_posts->have_posts() ) : ?>
            <div class="row">
          <?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>	
          <?php get_template_part( 'templates/partials/post-listing/listing-people' ); ?>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
      </div>
      <?php endif; ?>
       </div>
  </section>