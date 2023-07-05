	   <?php 	
      $args = array(
        'post_type' => 'advert',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
		  'tax_query' => array(
            array(
              'taxonomy' => 'type',
              'field' => 'slug',
              'terms' => 'top-leaderboard ',
            )
          )
      );
      $all_adverts = new WP_Query( $args );		
      ?>
	      <?php if ( $all_adverts->have_posts() ) : ?>
            <section id="adverthead" class="advert">
        <div class="container">
            <div class="row">
          <?php while ( $all_adverts->have_posts() ) : $all_adverts->the_post(); ?>	
       		<div class="col-lg-4">
				<div class="panel">
				<div class="my-auto">
				<h2 class="text-center">Advertisement</h2>
		  </div>
		  </div>
</div>
<div class="col-lg-8">
					<div class="panel">
				<div class="my-auto mx-auto">
                    <?php 
$link = get_field('link');  ?>
    <a href="<?php echo esc_url( $link ); ?>" target="_blank">
<?php the_post_thumbnail(); ?>
</a>
	  </div>
		  </div>
</div>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
      </div>
      </div>
      </section>
      <?php endif; ?>