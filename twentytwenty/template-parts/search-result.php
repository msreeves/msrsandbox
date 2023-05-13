<?php
/**
 * The search template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<div class="container">
<div class="row">
    <div class="col-lg-3">
  <?php echo get_template_part( 'template-parts/featured-image' ); ?>
</div>
    <div class="col-lg-9">
      <div class="center-column event__panel">
        <div class="my-auto">
<h3> <?php echo search_title_highlight(); ?></h3>
<?php echo search_excerpt_highlight(); ?>
</div>
</div>
</div>
</div>