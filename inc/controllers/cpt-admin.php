<?php
$post_type = 'people';

// Register the columns.
add_filter( "manage_{$post_type}_posts_columns", function ( $defaults ) {
	
	$defaults['job-title'] = 'Job Title';
	$defaults['company'] = 'Company';
	$defaults['profile-image'] = 'Profile Image';
    unset($defaults['date']);
	unset($defaults['comments']);

	return $defaults;
} );

// Handle the value for each of the new columns.
add_action( "manage_{$post_type}_posts_custom_column", function ( $column_name, $post_id ) {
	if ( $column_name == 'job-title' ) {
		echo get_field( 'job_title', $post_id );
	}
	
	if ( $column_name == 'company' ) {
		echo get_field( 'company', $post_id );
	}

	if ( $column_name == 'profile-image' ) {
		echo get_the_post_thumbnail ($post_id , 'thumbnail' );
	}
	
}, 10, 2 );

$post_type = 'event';

// Register the columns.
add_filter( "manage_{$post_type}_posts_columns", function ( $defaults ) {
	
	$defaults['event-date'] = 'Date';
	$defaults['venue'] = 'Venue';

	return $defaults;
} );

// Handle the value for each of the new columns.
add_action( "manage_{$post_type}_posts_custom_column", function ( $column_name, $post_id ) {
	
	if ( $column_name == 'event-date' ) {
		   $date = DateTime::createFromFormat('F j, Y', get_field('event_date'));
	   if( empty( $date ) ) :
	     echo 'TBC';
	   else:
	     echo $date->format('F j, Y');
	   endif;
	}
	
	if ( $column_name == 'venue' ) {
		echo get_field( 'venue', $post_id );
	}
	
}, 10, 2 );

$post_type = 'podcast';

// Register the columns.
add_filter( "manage_{$post_type}_posts_columns", function ( $defaults ) {
	
	$defaults['runtime'] = 'Runtime';

	return $defaults;
} );

$taxonomy = 'podcaster';

// Handle the value for each of the new columns.
add_action( "manage_{$post_type}_posts_custom_column", function ( $column_name, $post_id ) {
	
	if ( $column_name == 'runtime' ) {
		echo get_field( 'runtime', $post_id );
	}
	
}, 10, 2 );


function add_thumbnail_columns($columns) {
	unset($columns['description']);
	unset($columns['slug']);
    $columns['podcaster_thumbnail'] = __('Thumbnail');
    return $columns;

    $new = array();
    foreach($columns as $key => $value) {
        if ($key=='name') 
            $new['podcaster_thumbnail'] = 'Thumbnail';
        $new[$key] = $value;
    }
    return $new;
}
add_filter('manage_edit-podcaster_columns', 'add_thumbnail_columns');


function thumbnail_columns_content($content, $column_name, $term_id) {
    if ('podcaster_thumbnail' == $column_name) {
        $term = get_term($term_id);
        $podcaster_thumbnail_var = get_field('cat_thumb', $term);
        $content = '<img src="'.$podcaster_thumbnail_var['url'].'" width="200" />';
        }
    return $content;
}
add_filter('manage_podcaster_custom_column' , 'thumbnail_columns_content' , 10 , 3);