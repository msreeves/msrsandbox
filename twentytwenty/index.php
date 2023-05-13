<?php
/**
 * Homepage Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">
    <section class="cta">
	<div class="container mx-auto">
			<h1 class="animate__animated animate__backInLeft">Hello & Welcome to my Sandbox!</h1>
		</div>
	</div>
</section>
	<section>
<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_1a8dx7zj.json"  background="#FFEAB0"  speed="1"  style="width: 100%; height: 400px;"  loop  autoplay></lottie-player>
</section>
<section>
	<div class="container">
	<h1>
  <span href="" class="typewrite" data-period="2000" data-type='[ "Hi, Im Si.", "I am Creative.", "I Love Design.", "I Love to Develop." ]'>
    <span class="wrap"></span>
  </span>
</h1>
</div>
</section>
<section>
<div class="carousel">
    <div class="carousel-row">
          <div class="carousel-tile" style="background: #46B1C9;"></div>
          <div class="carousel-tile" style="background: #84C0C6;"></div>
          <div class="carousel-tile" style="background: #9FB7B9;"></div>
          <div class="carousel-tile" style="background: #BCC1BA;"></div>
          <div class="carousel-tile" style="background: #F2E2D2;"></div>
    </div>
</div>
</section

<section class="posts-tabs">
	<div class="container">
	<div class="categories">
			<h1> My Stories </h1>
	<ul class="nav nav-tabs">
<?php 

$categories = get_categories($cat_args);

foreach($categories as $cat) : ?>
	<li class="js-filter-item"><a data-category="<?= $cat->term_id; ?>" href="<?= get_category_link($cat->term_id); ?>"><button><?= $cat->name; ?></button></a></li>
<?php endforeach; ?>
</ul>
</div>
<div class="js-filter">
	<?php
	$args = array(
		'post_type' => array( 'post', 'feature'),
		'posts_per_page' => 3
		);

		$query = new WP_Query($args);

		if($query->have_posts()) :
			echo '<div class="container">';
			echo '<div class="row">';
			while($query->have_posts()) : $query->the_post();
				get_template_part( 'templates/partials/post-listing/listing-posts' );
			endwhile;
			echo '</div>';
			echo '</div>';
			endif;
			wp_reset_postdata(); ?>
</div>
		</div>
</section>
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
        <?php endif; ?>
			</section>
       <section class="cta">
        <div class="container">
            <div class="row">
       		<div class="col-lg-8">
				<div class="center-column">
				<div class="my-auto">
				<h1 class="animate__animated animate__backInLeft">Want to get in touch?</h1>
		  </div>
		  </div>
</div>
<div class="col-lg-4">
					<div class="center-column">
				<div class="my-auto mx-auto">
      <a href="mailto:reevesy87@hotmail.co.uk"><button>EMAIL ME</button></a>
	  </div>
		  </div>
</div>
      </div>
      </div>
</section>
<section>
    <h1> Latest Podcasts </h1>
    	<?php
	$args = array(
		'post_type' => 'podcast',
		'posts_per_page' => 3
		);

		$query = new WP_Query($args);

		if($query->have_posts()) :
			echo '<div class="container">';
			
			while($query->have_posts()) : $query->the_post();
            echo '<div class="row" style="margin-bottom: 10px;">';
				get_template_part( 'templates/partials/post-listing/listing-future-podcast' );
                	echo '</div>';
			endwhile;
		
			echo '</div>';
			endif;
			wp_reset_postdata(); ?>
        </section>
<?php
get_footer();
