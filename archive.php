<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package msrsandbox
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<section>
				<div class="container">
						<div class="panel">
					<h1><?php single_cat_title(); ?></h1>
					<h3><?php the_archive_description(); ?></h3>
					 <?php get_template_part( 'inc/controllers/searchbar' ); ?>
				</div>
					<div class="row">
			<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			 		<div class="col-md-4">
			<div class="post panel">  
        <div class="listing-image">
            	<?php the_post_thumbnail(); ?>
            </div>
            <div class="listing-text">
              <p>   <?php
        $terms = get_the_terms( get_the_ID(), 'category' );

if( $terms && ! is_wp_error( $terms ) ){
    foreach( $terms as $term ) {
        if( get_queried_object_id() == $term->parent ){
            echo '<span>' . $term->name . '</span>';
        }
    }
} ?>

                 </p>  
            <h3><?php the_title() ?></h3>                  
                     <p><?php echo wpse_custom_excerpts(30); ?></p>
                      <a href="<?php echo the_permalink(); ?>"><button>Read more</button></a>
                    </div>
                </div>
                    </div>
			<?php endwhile; ?>
			</div>
			<?php echo '<section>';
			the_posts_pagination( array(
'mid_size' => 2,
'prev_text' => __( 'Previous', 'textdomain' ),
'next_text' => __( 'Next', 'textdomain' ),
) );
			echo '</section>';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</div>
	</main><!-- #main -->

<?php
get_footer();
