<?php
/**
 * The default template for displaying content
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

<article <?php post_class(); ?> id="post-people<?php the_ID(); ?>">
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="center-column">
				<div class="my-auto text-center">
				<?php the_title( '<h1>', '</h1>' ); ?>
			<div class="social-media">
		   		<?php if ( get_field('linkedin') ) : ?>
                <a href="https://www.linkedin.com/in/<?php print get_field('linkedin') ?>" target="_blank"><i class="fa fa-linkedin-square fa-2xl"></i></a>
                <?php endif; ?>
				<?php if ( get_field('twitter') ) : ?>
                <a href="https://www.twitter.com/<?php print get_field('twitter') ?>" target="_blank"><i class="fa fa-twitter-square fa-2xl"></i></a>
                <?php endif; ?>
				<?php if ( get_field('facebook') ) : ?>
                <a href="https://<?php print get_field('facebook') ?>" target="_blank"><i class="fa fa-facebook-square fa-2xl"></i></a>
                <?php endif; ?>
				<?php if ( get_field('pinterest') ) : ?>
                <a href="https://<?php print get_field('pinterest') ?>" target="_blank"><i class="fa fa-pinterest-square fa-2xl"></i></a>
                <?php endif; ?>
				<?php if ( get_field('youtube') ) : ?>
                <a href="https://<?php print get_field('youtube') ?>" target="_blank"><i class="fa fa-youtube-square fa-2xl"></i></a>
                <?php endif; ?>
		   </div>
		<?php if (get_field('job_title')) : ?>
			<h2> <i class="fa fa-briefcase" aria-hidden="true"></i> <?php print get_field('job_title') ?> </h2>
			  <?php endif; ?>
			  <?php if (get_field('company')) : ?>
			<h2> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php print get_field('company') ?> </h2>
			<?php endif; ?>

	<div class="post-inner">
		<div class="entry-content">
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>
		</div><!-- .entry-content -->

	</div><!-- .post-inner -->
		</div>
		</div>
			</div>
		<div class="col-sm-6">
		<?php get_template_part( 'template-parts/featured-image' ); ?>
		</div>
		<div class="col-sm-12">
 <?php while( have_rows('accordion_information') ): the_row(); ?>
		<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
             <h2> <?php the_sub_field('accordion_title'); ?> </h2>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"> <?php the_sub_field('accordion_text'); ?></div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          <h2> <?php the_sub_field('second_accordion_title'); ?></h2>
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"> <?php the_sub_field('second_accordion_text'); ?></div>
    </div>
  </div>
</div>
    <?php endwhile; ?>
		</div>
	</div>
		</div>
	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/*
	 * Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->
