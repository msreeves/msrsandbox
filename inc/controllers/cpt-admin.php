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

// Handle the value for each of the new columns.
add_action( "manage_{$post_type}_posts_custom_column", function ( $column_name, $post_id ) {
	
	if ( $column_name == 'runtime' ) {
		echo get_field( 'runtime', $post_id );
	}
	
}, 10, 2 );