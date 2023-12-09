<?php
/**
 * Layouts > Listing Stories
 *
 * @package WordPress
 * @subpackage QORP
 */

?>

        <section>
          <div class="container">
        <div class="latest_posts_wrapper">
   <?php
    $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
      $latests = new WP_Query(array(
      	'post_type' => 'post',
      	'posts_per_page' => 3,
      	'paged' => $paged,
      )); ?>
      
              <div class="row">
      <?php while($latests->have_posts()): $latests->the_post();	?>	
        
      <?php get_template_part( 'templates/partials/post-listing/listing-posts' ); ?>

       <?php endwhile; ?>
   </div>
</div>
<script>
   var limit = 3,
       page = 1,
       type = 'latest',
       category = '',
       max_pages_latest = <?php echo $latests->max_num_pages ?>
</script>
<?php if ( $latests->max_num_pages > 1 ){
   echo '<section><div class="load_more text-center">
                   <button href="#" class="btn-load-more">LOAD MORE</button>
                </div></section>';
        }else{?>
<?php }
   wp_reset_query();
   ?>
       </div>
  </section>