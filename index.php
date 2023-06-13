<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package msrsandbox
 */

get_header();
?>

<main id="site-content">
    <section class="cta">
	<div class="container mx-auto">
			<h1 class="animate__animated animate__backInLeft">Hello & Welcome to my Sandbox!</h1>
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
    <div class="container">
        <div class="row">
    	<h1> Latest Publications </h1>
    <?php
	$args = array(
		'post_type' => 'publication',
		'posts_per_page' => 4
		);

		$query = new WP_Query($args);

		if($query->have_posts()) :
			echo '<div class="carousel">';
			echo '<div class="carousel-row">';
			while($query->have_posts()) : $query->the_post();
           get_template_part( 'templates/partials/post-listing/listing-publication' );
			endwhile;
			echo '</div>';
			echo '</div>';
			endif;
			wp_reset_postdata(); ?>
            </div>
        </div>
</section>
<?php get_template_part( 'inc/components/banner' ); ?>
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
		'post_type' => 'post',
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
	 <section class="latest__events">
         <div class="container">
             <h1>Latest events</h1>
              <div class="row g-0">
          <?php while ( $events->have_posts() ) : $events->the_post(); ?>	
          <?php get_template_part( 'templates/partials/post-listing/listing-future-events' ); ?>
          <?php endwhile; ?>
		  </div>
          <?php wp_reset_query() ?>
      </div>
		</section>
        <?php endif; ?>
			<section>
	<?php get_template_part( 'inc/components/cta' ); ?>
    <h1> Latest Episode </h1>
    	<?php
	$args = array(
		'post_type' => 'podcast',
		'posts_per_page' => 3
		);

		$query = new WP_Query($args);

		if($query->have_posts()) :
			echo '<div class="container">';
			
			while($query->have_posts()) : $query->the_post();
            echo '<div class="row g-0" style="margin-bottom: 10px;">';
				get_template_part( 'templates/partials/post-listing/listing-future-podcast' );
                	echo '</div>';
			endwhile;
		
			echo '</div>';
			endif;
			wp_reset_postdata(); ?>
        </section>
<section class="people-tabs">
 <h1> Members </h1>
          <div class="container">
            <?php get_template_part( 'inc/components/searchbar' ); ?>
  <?php $post_categories = get_terms('sector'); // get all the categories ?>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
  <li class="active">
      <a href="#all" data-bs-toggle="tab" role="tab" aria-controls="all" aria-selected="all"><button><?php echo $post_category->name ?>All</button></a>
    </li>
    <?php foreach($post_categories as $post_category) { ?>
      <li>
        <a href="#<?php echo $post_category->slug ?>" data-bs-toggle="tab"><button><?php echo $post_category->name ?></button></a>
      </li>
    <? } ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane fade show active" id="all">
      <?php 	
      $args = array(
        'post_type' => 'people',
        'posts_per_page' => -1,
         'meta_key' => 'name',
         'orderby' => 'meta_value',
          'order' => 'ASC',
      );
      $all_posts = new WP_Query( $args );		
      ?>

      <?php if ( $all_posts->have_posts() ) : ?>
        <div class="container">
            <div class="row">
          <?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>	
              <?php get_template_part( 'templates/partials/post-listing/listing-people' ); ?>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
      </div>
      </div>
      <?php endif; ?>

    </div>

    <?php foreach($post_categories as $post_category) { ?>

      <div class="tab-pane fade" id="<?php echo $post_category->slug ?>">
        <?php 	
        $args = array(
          'post_type' => 'people',
          'posts_per_page'  => -1,
          'meta_key' => 'name',
          'orderby' => 'meta_value',
          'order' => 'ASC',
          'tax_query' => array(
            array(
              'taxonomy' => 'sector',
              'field' => 'slug',
              'terms' => $post_category->slug
            )
          )
        );
        $posts = new WP_Query( $args );		
        ?>

        <?php if ( $posts->have_posts() ) : ?>
              <div class="row">
          <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>	
          <?php get_template_part( 'templates/partials/post-listing/listing-people' ); ?>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>

       </div>
        <?php endif; ?>

      </div>
    <? }  ?>

  </div>
      </div>
</section>
 </main>
<?php
get_footer();

