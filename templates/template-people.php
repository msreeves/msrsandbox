<?php
/**
 * Template Name: People Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage msrsandbox
 * @since msrsandbox 1.0
 */
get_header();
?>

<section class="people-tabs">

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
         <div class="container">
              <div class="row">
          <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>	
          <?php get_template_part( 'templates/partials/post-listing/listing-people' ); ?>
          <?php endwhile; ?>
          <?php wp_reset_query() ?>
      </div>
       </div>
        <?php endif; ?>

      </div>
    <? }  ?>

  </div>

</section>
<?php
get_footer();