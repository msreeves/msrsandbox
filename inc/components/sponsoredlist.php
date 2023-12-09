
        <?php 	
        $args = array(
          'post_type' => 'post',
          'posts_per_page'  => -1,
           'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'sponsored-content'
            )
          )
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