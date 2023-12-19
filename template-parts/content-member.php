<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage msrawards
 * @since msrawards 1.0
 */

?>

<section>
<article <?php post_class(); ?> id="post-people<?php the_ID(); ?>">
<div class="container">
	<div class="row g-0">
		<div class="col-md-6">
			<div class="panel">
	<div class="my-auto text-center">
	<?php the_title( '<h1>', '</h1>' ); ?>
		<?php if (get_field('job_title')) : ?>
			<h2> <i class="fa fa-briefcase" aria-hidden="true"></i> <?php print get_field('job_title') ?> </h2>
			  <?php endif; ?>
		</div>
		</div>
			</div>
			<div class="col-md-6">
			<div class="listing-image">
			<?php the_post_thumbnail();
echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
</div>
		</div>
		<div class="col-sm-12">
			<div class="panel">
<?php if (get_field('profile')) : ?>
	<div class="post-inner">
		<div class="entry-content">
			
				<?php print get_field('profile') ?> 
				
		</div><!-- .entry-content -->

	</div><!-- .post-inner -->
	<?php endif; ?>
</div>
		</div>
		</div>
</div>
	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'msrawards' ) . '"><span class="label">' . __( 'Pages:', 'msrawards' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();
		?>

	</div><!-- .section-inner -->

</article><!-- .post -->
	</section>
