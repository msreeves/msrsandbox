     <?php
/**
 * Template Name: Podcast Template
 *
 * @package WordPress
 * @subpackage msrsandbox
 * @since msrsandbox 1.0
 */
get_header();
?>
<section>
  <div class="container">
        <?php the_title( '<h1>', '</h1>' ); ?>
          <?php the_content(); ?>
        <?php get_template_part( 'templates/partials/post-listing/listing-podcast' ); ?>
    </div>
    </section>
      <?php
get_footer();