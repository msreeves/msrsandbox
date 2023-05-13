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
		<div class="container d-flex flex-wrap justify-content-center max-w-5xl mx-auto px-6">
<?php
    $images = acf_photo_gallery('image_gallery', $post->ID);
    if( count($images) ):
        foreach($images as $image):
            $id = $image['id'];
            $title = $image['title'];
            $caption= $image['caption'];
            $full_image_url= $image['full_image_url'];
            $full_image_url_thumbnail = acf_photo_gallery_resize_image($full_image_url, 300, 300);
            $thumbnail_image_url= $image['thumbnail_image_url'];
            $url= $image['url'];
            $target= $image['target'];
            $alt = get_field('photo_gallery_alt', $id);
            $class = get_field('photo_gallery_class', $id);
?>
<div class="col-xs-6 col-md-3">
    <div class="thumbnail">
		  <a data-fancybox="gallery" src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" href="<?php echo $full_image_url; ?>">
    <img class="rounded" src="<?php echo $full_image_url_thumbnail; ?>"  alt="<?php echo $title; ?>" title="<?php echo $title; ?>" />
  </a>
    </div>
</div>
<?php endforeach; endif; ?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

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
