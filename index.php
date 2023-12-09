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
<?php if (is_page( 267 )) : ?>
  <?php

$news_cat_ID = get_cat_ID( 'category' ); 
$news_cats   = get_categories( "parent=$news_cat_ID&exclude=9" );
$news_query  = new WP_Query; ?>

<section>
          <div class="container">
          <div class="row">

<?php foreach ( $news_cats as $news_cat ) :
    $news_query->query( array(
        'cat'                 => $news_cat->term_id,
        'posts_per_page'      => 1,
        'no_found_rows'       => true,
        'ignore_sticky_posts' => true,
    ));

    ?>

    <?php while ( $news_query->have_posts() ) : $news_query->the_post() ?>
             <?php get_template_part( 'templates/partials/post-listing/posts/latest-maincategory' ); ?>
    <?php endwhile ?>
   

<?php endforeach ?>
  </div>
        </div>
        </section>
        
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
        
    <?php get_template_part( 'inc/components/storieslist' ); ?>
    <?php get_template_part( 'inc/components/event' ); ?>
    <?php get_template_part( 'inc/components/publicationlist' ); ?>
    <?php get_template_part( 'inc/components/partners' ); ?>
    <?php get_template_part( 'inc/components/peoplelist' ); ?>
<?php else : ?>
  <section>
   <div class="container">
    <div class="panel">
      <h1> <?php the_title(); ?> </h1>
    <?php the_content(); ?>
</div>
  </div>
</section>
<?php endif; ?>
</main>
<?php
get_footer();