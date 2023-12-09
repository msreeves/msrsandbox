<section>
  <div class="container">
<div class="latest post-tabs">
  <?php $post_categories = get_categories('parent=0&exclude=6'); // get all the categories ?>
  <div class="row">
  <div class="col-md-auto">

  <ul class="nav nav-tabs">
    <?php foreach($post_categories as $post_category) { ?>
      <li>
        <a href="#<?php echo $post_category->slug ?>" data-bs-toggle="tab"><button><?php echo $post_category->name ?></button></a>
      </li>
    <? } ?>
  </ul>
    </div>
<div class="col">
  <!-- Tab panes -->
  <div class="tab-content">

    <div class="tab-pane fade show active" id="all">
      <?php 	
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => $post_category->slug
            )
          )

      );
      $all_posts = new WP_Query( $args );		
      ?>

      <?php if ( $all_posts->have_posts() ) : ?>
        <div class="container">
            <div class="row">
          <?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>	
               <?php get_template_part( 'templates/partials/post-listing/posts/latest-maincategory' ); ?>
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
          'post_type' => 'post',
          'posts_per_page'  => 1,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => $post_category->slug
            )
          )
        );
        $posts = new WP_Query( $args );		
        ?>

        <?php if ( $posts->have_posts() ) : ?>
             <div class="container">
              <div class="row">
          <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>	
         <?php get_template_part( 'templates/partials/post-listing/posts/latest-maincategory' ); ?>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
      </div>
        </div>
        <?php endif; ?>

      </div>
    <? }  ?>

  </div>
      </div>
        </div>
        </div>
        </div>
        </section>