<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package msrsandbox
 */

get_header();
?>

<main id="site-content">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_breadcrumb();
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>
</main><!-- #site-content -->

<?php
get_footer();
