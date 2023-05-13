     <div class="col-sm-6"> 
       <?php the_post_thumbnail(); ?>
    </div>
     <div class="col-sm-6">
        <div class="center-column event__panel">
            <div class="my-auto text-center">
        				<?php the_title( '<h1>', '</h1>' ); ?>
									<?php 
    			$attr = array(
        		'src' => get_field('episode') ,
        		'loop' => '',
        		'autoplay' => '',
        		'preload' => 'none'
    		);
    		echo wp_audio_shortcode($attr);
				?>
                        </div>
                        </div>
     </div>