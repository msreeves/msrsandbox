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