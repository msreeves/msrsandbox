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
<?php if (is_page( 37 )) : ?>
    <?php get_template_part( 'inc/components/mainstories' ); ?>
    <?php get_template_part( 'inc/components/sponsoredlist' ); ?>  
    <?php get_template_part( 'inc/components/storieslist' ); ?>
    <?php get_template_part( 'inc/components/event' ); ?>
    <?php get_template_part( 'inc/components/publicationlist' ); ?>
    <?php get_template_part( 'inc/components/partners' ); ?>
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