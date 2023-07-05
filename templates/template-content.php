<?php
/**
 * Template Name: Content template
 *
 * @package WordPress
 * @subpackage msrsandbox
 * @since msrsandbox 1.0
 */

get_header();
?>

<main id="site-content">
    <div class="container">

	<?php the_content();?>
</div>
</main><!-- #site-content -->

<?php
get_footer();