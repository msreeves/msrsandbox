 <?php
$podcaster_terms = get_terms( 'podcaster' );
?>
<?php
foreach ( $podcaster_terms as $podcaster_term ) {
    $podcaster_query = new WP_Query( array(
        'post_type' => 'podcast',
        'tax_query' => array(
            array(
                'taxonomy' => 'podcaster',
                'field' => 'slug',
                'terms' => array( $podcaster_term->slug ),
                'operator' => 'IN'
            )
        )
    ) );
    ?>

    <h2><?php echo $podcaster_term->name; ?></h2>
    <div class="panel ">
            <div class="my-auto">
    <?php
    if ( $podcaster_query->have_posts() ) : while ( $podcaster_query->have_posts() ) : $podcaster_query->the_post(); ?>
      
                	<h3><?php the_title( '<span>', '</span>' ); ?>
                <?php if ( get_field('runtime') ) : ?>
                        <span> <i class="fa fa-clock p-1" aria-hidden="true"></i><?php print get_field('runtime') ?></span>
						<?php endif; ?> </h3>        			
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
                       
   
    <?php endwhile; endif; ?>
     </div>
                        </div>
          </div>  
    <?php
    // Reset things, for good measure
    $podcaster_query = null;
    wp_reset_postdata();
}
?>