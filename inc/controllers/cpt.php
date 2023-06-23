<?php
class New_Post_Types {

    public function __construct() {
        add_action( 'init', array( $this, 'all_post_types' ) );
    }

    public function all_post_types() {
        $post_types = [
            [
                'post_type' => 'event',
                'label'     => 'Events',
                'singular'  => 'Event',
                'slug'      => 'event',
                'menu_icon' => 'dashicons-calendar',
                'public'    => true, 
                
            ],
             [
                'post_type' => 'publication',
                'label'     => 'Publications',
                'singular'  => 'Publication',
                'menu_icon' => 'dashicons-book',
                'public'    => false, 
                
            ],
             [
                 'post_type' => 'people',
                 'label'     => 'People',
                 'singular'  => 'Person',
                 'slug'      => 'person',
                 'menu_icon' => 'dashicons-businessman',
                 'orderby'   => 'meta_value',
	             'order'     => 'ASC',
	             'meta_key'  => 'name',
                'public'    => true, 
             ],
             [
                'post_type' => 'advert',
                'label'     => 'Advertisement',
                'singular'  => 'Advert',
                'menu_icon' => 'dashicons-images-alt2',
                'public'    => false, 
            ],
             [
                'post_type' => 'banner',
                'label'     => 'Promos',
                'singular'  => 'Banner',
                'menu_icon' => 'dashicons-images-alt',
                'public'    => false, 
            ],
               [
                'post_type' => 'partner',
                'label'     => 'Partnerships',
                'singular'  => 'Partner',
                'slug'      => 'partnership',
                'menu_icon' => 'dashicons-groups',
                'public'    => false,                           
                
            ],
                [
                'post_type' => 'podcast',
                'label'     => 'Podcast',
                'singular'  => 'Episode',
                'slug'      => 'episode',
                'menu_icon' => 'dashicons-format-audio',
                'public'    => false,
            ],


        ];

        foreach ($post_types as $key => $post_type) {
            $this -> register_post_type( $post_type );
        }
    }

    private function register_post_type( $data ) {

        $singular  = $data['singular'];
        $label   = $data['label'];
        $post_type = $data['post_type'];
        $slug      = $data['slug'];
        $dashicon  = $data['menu_icon'];
        $trueorfalse  = $data['public'];

        $labels = array(
            'name'               => _x( $label, 'post type general name', 'sandbox-theme' ),
            'singular_name'      => _x( $singular, 'post type singular name', 'sandbox-theme' ),
            'menu_name'          => _x( $label, 'admin menu', 'sandbox-theme' ),
            'name_admin_bar'     => _x( $singular, 'add new on admin bar', 'sandbox-theme' ),
            'add_new'            => _x( 'Add New', $singular, 'sandbox-theme' ),
            'add_new_item'       => __( 'Add New ' . $singular, 'sandbox-theme' ),
            'new_item'           => __( 'New ' . $singular, 'sandbox-theme' ),
            'edit_item'          => __( 'Edit ' . $singular, 'sandbox-theme' ),
            'view_item'          => __( 'View ' . $singular, 'sandbox-theme' ),
            'all_items'          => __( 'All ' . $plural, 'sandbox-theme' ),
            'search_items'       => __( 'Search ' . $plural, 'sandbox-theme' ),
            'parent_item_colon'  => __( 'Parent ' . $plural . ':', 'sandbox-theme' ),
            'not_found'          => __( 'No ' . $plural . ' found.', 'sandbox-theme' ),
            'not_found_in_trash' => __( 'No ' . $plural . ' found in Trash.', 'sandbox-theme' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( $singular .'.', 'sandbox-theme' ),
            'public'             => $trueorfalse,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'rewrite'            => array( 'slug' => $slug ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'thumbnail'),
            'menu_icon'          => $dashicon,
        );

    register_post_type( $post_type, $args );

            // Register the columns.
    add_filter( "manage_{$post_type}_posts_columns", function ( $defaults ) {
    unset($defaults['date']);
	unset($defaults['author']);
	unset($defaults['comments']);

	return $defaults;
} );
    }

} // End class

new New_Post_Types;

function be_register_taxonomies() {

	$taxonomies = array(
		array(
			'slug'         => 'sector',
			'single_name'  => 'sector',
			'plural_name'  => 'Sector',
			'post_type'    => 'people',
		),
        	array(
			'slug'         => 'type',
			'single_name'  => 'Type',
			'plural_name'  => 'Type',
			'post_type'    => 'advert',
		),
          	array(
			'slug'         => 'podcaster',
			'single_name'  => 'Podcaster',
			'plural_name'  => 'Podcaster',
			'post_type'    => 'podcast',
		),
	);

	foreach( $taxonomies as $taxonomy ) {
		$labels = array(
			'name' => $taxonomy['plural_name'],
			'singular_name' => $taxonomy['single_name'],
			'search_items' =>  'Search ' . $taxonomy['plural_name'],
			'all_items' => 'All ' . $taxonomy['plural_name'],
			'parent_item' => 'Parent ' . $taxonomy['single_name'],
			'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
			'edit_item' => 'Edit ' . $taxonomy['single_name'],
			'update_item' => 'Update ' . $taxonomy['single_name'],
			'add_new_item' => 'Add New ' . $taxonomy['single_name'],
			'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
			'menu_name' => $taxonomy['plural_name']
		);
		
		$rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
		$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;
	
		register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
			'hierarchical' => $hierarchical,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => $rewrite,
            'show_admin_column' => true,
		));
	}
	
}
add_action( 'init', 'be_register_taxonomies' );


function ig_sort_people_name( $query ){
    global $pagenow;
    
    if( is_admin() && 'edit.php' == $pagenow && !isset( $_GET['orderby'] ) ):
        if( $_GET['post_type'] == 'people' && !isset( $_GET['post_status'] ) ):

            $query->set( 'meta_key', 'name' );
            $query->set( 'orderby', 'meta_value' );
            $query->set( 'order', 'ASC' );
        endif;
            
    endif;
}
add_action( 'pre_get_posts', 'ig_sort_people_name' );

add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

function misha_filter_function(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	);
 
	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);
 
	$query = new WP_Query( $args );
	
	if( $query->have_posts() ) :
         echo '<div class="row">';
		while( $query->have_posts() ): $query->the_post();
			echo get_template_part( 'templates/partials/post-listing/listing-posts' );
		endwhile;
        echo '</div>';
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
	
	die();
}

add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

function filter_ajax() {


$category = $_POST['category'];

$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1
		);

if(isset($category)) {
	$args['category__in'] = array($category);
}

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
			wp_reset_postdata(); 


	die();
}
