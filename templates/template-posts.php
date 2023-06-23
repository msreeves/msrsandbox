<?php
/**
 * Template Name: Posts Template
 *
 * @package WordPress
 * @subpackage msrsandbox
 * @since msrsandbox 1.0
 */
get_header();
?>

<section class="posts-tabs">
	<div class="categories">
	<ul class="nav nav-tabs">
<?php 

$categories = get_categories($cat_args);

foreach($categories as $cat) : ?>
	<li class="js-filter-item"><a data-category="<?= $cat->term_id; ?>" href="<?= get_category_link($cat->term_id); ?>"><button><?= $cat->name; ?></button></a></li>
<?php endforeach; ?>
</ul>
</div>
<div class="js-filter">
	<?php
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1
		);

		$query = new WP_Query($args);

		if($query->have_posts()) :
			echo '<div class="container">';
			echo '<div class="row">';
			while($query->have_posts()) : $query->the_post();
				get_template_part( 'templates/partials/post-listing/listing-posts' );
			endwhile;
			echo '</div>';
			echo '</div>';
			endif;
			wp_reset_postdata(); ?>
</div>

</section>

<?php
get_footer();