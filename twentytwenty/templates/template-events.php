<?php
/**
 * Template Name: Events template
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
 
 <section class="latest__events">
<?php
		$today = date('Ymd');
		$args = [
        'post_type'         => 'event',
 		'meta_key'  		=> 'event_date',
    	'orderby'   		=> 'meta_value_num',
    	'order'     		=> 'ASC',
		'meta_query' => array(
        	array(
             'key'     => 'event_date',
            'compare' => '>=',
            'value'   => $today,
        )
	),
    ];
	 $events = new WP_Query( $args );		
        ?>

        <?php if ( $events->have_posts() ) : ?>
         <div class="container">
             <h1>Latest events</h1>
              <div class="row g-0">
          <?php while ( $events->have_posts() ) : $events->the_post(); ?>	
          <?php get_template_part( 'templates/partials/post-listing/listing-future-events' ); ?>
          <?php endwhile; ?>
		  </div>
                        <?php else : ?>
								<div class="center-column text-center">
                               <i class="fa-solid fa-face-frown fa-5x"></i>
							<h1>SORRY, NO CURRENT EVENTS RUNNING!</h1>						  	
                              <p>To keep up to date on upcoming events please sign up to our mailing list.</p>
		    				<a href="/">JOIN OUR MAILING LIST</a>
									</div>
          <?php wp_reset_query() ?>
      </div>
       </div>
        <?php endif; ?>
			</section>
			<section id="events" class="dis-block p-t-20 p-b-20">
				<div class="container">
					<h1>Previous events</h1>
<?php
		$today = date('Ymd');
		$args = [
        'post_type'         => 'event',
 		'meta_key'  		=> 'event_date',
    	'orderby'   		=> 'meta_value_num',
    	'order'     		=> 'DESC',
		'meta_query' => array(
        	array(
            'key'     => 'event_date',
            'compare' => '<=',
            'value'   => $today,
        )
	),
    ];
   $events = new WP_Query( $args );		
        ?>

        <?php if ( $events->have_posts() ) : ?>
         <div class="container">
              <div class="row">
          <?php while ( $events->have_posts() ) : $events->the_post(); ?>	
          <?php get_template_part( 'templates/partials/post-listing/listing-events' ); ?>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
      </div>
       </div>
        <?php endif; ?>
				</div>
			</section>

<?php
get_footer();
