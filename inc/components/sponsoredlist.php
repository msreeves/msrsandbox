<?php 	
        $args = array(
          'post_type' => 'post',
          'posts_per_page'  => 3,
          'orderby' => 'publish_date',
          'order' => 'ASC',
          'category__in' => array( 6 )
        );
        $posts = new WP_Query( $args );		
        ?>

        <?php if ( $posts->have_posts() ) : ?>
        <section class="cta">
          <div class="container">
          <div class="row">
          <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>	
          <?php get_template_part( 'templates/partials/post-listing/posts/maincategory' ); ?>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
        </div>
        </div>
        </section>
        <?php endif; ?>