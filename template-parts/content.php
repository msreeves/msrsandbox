<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package msrsandbox
 */

?>

<section>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="panel text-center">
				     <p><?php 
$categories = get_the_category( get_the_ID() );
if( $categories ){
    $output = "";

    //display all the top-level categories first
    foreach ($categories as $category) {
        if( !$category->parent ){
            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ><span>' . $category->name.'</span></a>';
        }
    }

    //now, display all the child categories
    foreach ($categories as $category) {
        if( $category->parent ){
            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '" ><span>' . $category->name.'</span></a>';
        }
    }

    echo trim( $output, "," );
}
?>
                 </p>  
				 <?php
if(in_category(10)){
?>
<h3> <i>This is Sponsored content</i></h3>
<?php } ?> 
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<p class="entry-meta">
				<i class="fa fa-clock fa-2xl"></i> 
                <?php echo get_the_date(); ?>
		</p><!-- .entry-meta -->
		<?php endif; ?>
			</div><!-- .entry-header -->

	<div class="entry-content">
		     <?php get_template_part('templates/partials/featured-image'); ?>
			 <section>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'msrsandbox' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'msrsandbox' ),
				'after'  => '</div>',
			)
		);
		?>
		</section>
	</div><!-- .entry-content -->
	<?php $categories = get_the_category();
foreach( $categories as $category ){
    if( 0 != $category->parent )
        $child_cat = $category;
}

if( isset( $child_cat ) ){  
    echo '<h1>'. 'More stories in ' . $child_cat->name . '</h1>';
    $args = array(
        'cat' => $child_cat->term_id,
        'post__not_in' => array( get_the_ID() )
    );
    $related = new WP_Query( $args );
    if( $related->have_posts() ){
		echo '<div class="row">';
        while( $related->have_posts() ){
            $related->the_post();
                get_template_part( 'templates/partials/post-listing/posts/listing-posts' );
        }
        wp_reset_postdata();
		echo '</div>';
    }
} ?>
</article><!-- #post-<?php the_ID(); ?> -->
</section>
