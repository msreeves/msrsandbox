<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage msrsandbox
 * @since msrsandbox 1.0
 */

?>

<article <?php post_class(); ?> id="post-people<?php the_ID(); ?>">
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="center-column">
		<?php the_title( '<h1>', '</h1>' ); ?>

	<div class="post-inner">
		<div class="entry-content">
			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'msrsandbox' ) );
			}
			?>
									<?php 
    			$attr = array(
        		'src' => get_field('episode') ,
        		'loop' => '',
        		'autoplay' => '',
        		'preload' => 'none'
    		);
    		echo wp_audio_shortcode($attr);
				?>
		</div><!-- .entry-content -->

	</div><!-- .post-inner -->
		</div>
		</div>
		<div class="col-sm-6">
			    <?php the_post_thumbnail(); ?>
			</div>
	</div>
		</div>
	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'msrsandbox' ) . '"><span class="label">' . __( 'Pages:', 'msrsandbox' ) . '</span>',
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
