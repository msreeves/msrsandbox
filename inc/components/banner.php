
  <?php 	
      $args = array(
     	'post_type' => 'banner',
		  'posts_per_page' => 1
		);
      $all_banners = new WP_Query( $args );		
      ?>

      <?php if ( $all_banners->have_posts() ) : ?>
        <section>
            <div class="row g-0">
          <?php while ( $all_banners->have_posts() ) : $all_banners->the_post(); ?>	
          
          <div class="col-sm-6"> 
       <?php the_post_thumbnail(); ?>
    </div>
				   <div class="col-sm-6">
                <?php
                        $banner_colours = get_field('banner_colour_picker');
                        if( $banner_colours ): ?>
                     <div class="banner__panel center-column" style="background: <?php echo esc_html( $banner_colours['panel_colour'] ); ?>;">
                    <div class="my-auto">
        			    <h2 style="color: <?php echo esc_html( $banner_colours['title_colour'] ); ?>"><?php the_title(); ?></h2>			  	                                             
                     <p style="color: <?php echo esc_html( $banner_colours['content_colour'] ); ?>"> <?php print get_field('body_text') ?>  </p>
                      <?php endif; ?> 
                        <?php
                        $banner_button = get_field('banner_button');
                        if( $banner_button ): ?>
                        <a href="<?php echo esc_html( $banner_button['button_link'] ); ?>" target="_blank"><button style="background:<?php echo esc_html( $banner_button['button_background_colour'] ); ?>; color: <?php echo esc_html( $banner_button['button_label_colour'] ); ?>"><?php echo esc_html( $banner_button['button_label'] ); ?></button></a>
                        <?php endif; ?> 
                        </div>
                    </div>
                </div>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
      </div>
      </section>
      <?php endif; ?>   
