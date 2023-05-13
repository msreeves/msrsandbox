<?php
class DM_Project_Post_Types {

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
                
            ],
             [
                'post_type' => 'publication',
                'label'     => 'Publications',
                'singular'  => 'Publication',
                'slug'      => 'publication',
                'menu_icon' => 'dashicons-book',
                
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
                
             ],
             [
                'post_type' => 'advert',
                'label'     => 'Advertisment',
                'singular'  => 'Advert',
                'slug'      => 'advertisement',
                'menu_icon' => 'dashicons-images-alt2',
                
            ],
               [
                'post_type' => 'partner',
                'label'     => 'Partnerships',
                'singular'  => 'Partner',
                'slug'      => 'partnership',
                'menu_icon' => 'dashicons-groups',
                
            ],
                [
                'post_type' => 'podcast',
                'label'     => 'Podcast',
                'singular'  => 'Episode',
                'slug'      => 'episode',
                'menu_icon' => 'dashicons-format-audio',
                
            ],


        ];

        foreach ($post_types as $key => $post_type) {
            $this -> dm_register_post_type( $post_type );
        }
    }

    private function dm_register_post_type( $data ) {

        $singular  = $data['singular'];
        $label   = $data['label'];
        $post_type = $data['post_type'];
        $slug      = $data['slug'];
        $dashicon  = $data['menu_icon'];

        $labels = array(
            'name'               => _x( $label, 'post type general name', 'dm-artillerie-theme' ),
            'singular_name'      => _x( $singular, 'post type singular name', 'dm-artillerie-theme' ),
            'menu_name'          => _x( $label, 'admin menu', 'dm-artillerie-theme' ),
            'name_admin_bar'     => _x( $singular, 'add new on admin bar', 'dm-artillerie-theme' ),
            'add_new'            => _x( 'Add New', $singular, 'dm-artillerie-theme' ),
            'add_new_item'       => __( 'Add New ' . $singular, 'dm-artillerie-theme' ),
            'new_item'           => __( 'New ' . $singular, 'dm-artillerie-theme' ),
            'edit_item'          => __( 'Edit ' . $singular, 'dm-artillerie-theme' ),
            'view_item'          => __( 'View ' . $singular, 'dm-artillerie-theme' ),
            'all_items'          => __( 'All ' . $plural, 'dm-artillerie-theme' ),
            'search_items'       => __( 'Search ' . $plural, 'dm-artillerie-theme' ),
            'parent_item_colon'  => __( 'Parent ' . $plural . ':', 'dm-artillerie-theme' ),
            'not_found'          => __( 'No ' . $plural . ' found.', 'dm-artillerie-theme' ),
            'not_found_in_trash' => __( 'No ' . $plural . ' found in Trash.', 'dm-artillerie-theme' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( $singular .'.', 'dm-artillerie-theme' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $slug ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'author', 'editor', 'thumbnail', 'excerpt', 'comments' ),
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

new DM_Project_Post_Types;

function be_register_taxonomies() {

	$taxonomies = array(
		array(
			'slug'         => 'field',
			'single_name'  => 'field',
			'plural_name'  => 'Fields',
			'post_type'    => 'people',
		),
        	array(
			'slug'         => 'type',
			'single_name'  => 'Type',
			'plural_name'  => 'Types',
			'post_type'    => 'advert',
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



function my_form_shortcode() {
    ob_start();
    get_template_part('my_form_template');
    return ob_get_clean();   
} 
add_shortcode( 'my_form_shortcode', 'my_form_shortcode' );



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
