<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package msrsandbox
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container">
<div class="row g-0">
    <div class="col-lg-4">
  <?php echo get_template_part( 'templates/partials/featured-image' ); ?>
</div>
    <div class="col-lg-8">
      <div class="center-column event__panel">
        <div class="my-auto">
<h1> <?php echo search_title_highlight(); ?></h1>
<?php echo search_excerpt_highlight(); ?>
  <a href="<?php echo the_permalink(); ?>"><button>Read more</button></a>
</div>
</div>
</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->