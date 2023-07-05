     <div class="col-md-6"> 
       <?php the_post_thumbnail(); ?>
    </div>
     <div class="col-md-6">
        <div class="panel ">
            <div class="my-auto text-center">
        			    <h1><?php the_title(); ?></h1>			  	                 
						<?php if ( get_field('event_date') ) : ?>
                        <p><i class="fa fa-calendar p-1" aria-hidden="true"></i><strong><?php print get_field('event_date') ?> </p> </strong>
                        	<?php endif; ?>  
                        <?php if ( get_field('venue') ) : ?>
                        <p> <i class="fa fa-map-marker p-1" aria-hidden="true"></i><?php print get_field('venue') ?></p>
						<?php endif; ?>                               
                     <p> <?php echo get_the_excerpt(); ?> </p>
                       <a href="<?php echo the_permalink(); ?>"><button>VIEW</button></a>
                        </div>
                        </div>
     </div>