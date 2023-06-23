 <div class="center-column event__panel">
            <div class="my-auto">
                  <h2><?php echo $podcaster_term->name; ?></h2>
    <?php
    if ( $podcaster_query->have_posts() ) : while ( $podcaster_query->have_posts() ) : $podcaster_query->the_post(); ?>
      
                	<h3><?php the_title( '<span>', '</span>' ); ?>
                <?php if ( get_field('runtime') ) : ?>
                        <span> <i class="fa fa-clock p-1" aria-hidden="true"></i><?php print get_field('runtime') ?></span>
						<?php endif; ?> </h3>  
                        <p>      			
				<?php 
    			$attr = array(
        		'src' => get_field('episode') ,
        		'loop' => '',
        		'autoplay' => '',
        		'preload' => 'none'
    		);
    		echo wp_audio_shortcode($attr);
				?> </p>
    <?php endwhile; endif; ?>
     </div>
      </div>  