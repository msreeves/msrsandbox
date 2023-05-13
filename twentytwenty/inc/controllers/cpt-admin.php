<?php
add_filter( 'manage_edit-post_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
add_filter( 'manage_edit-people_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
add_filter( 'manage_edit-event_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
add_filter( 'manage_edit-advert_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
add_filter( 'manage_edit-partner_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
add_filter( 'manage_edit-podcast_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
add_filter( 'manage_edit-publication_columns', 'yoast_seo_admin_remove_columns', 10, 1 );
add_filter( 'manage_edit-page_columns', 'yoast_seo_admin_remove_columns', 10, 1 );

function yoast_seo_admin_remove_columns( $columns ) {
  unset($columns['wpseo-score']);
  unset($columns['wpseo-score-readability']);
  unset($columns['wpseo-title']);
  unset($columns['wpseo-metadesc']);
  unset($columns['wpseo-focuskw']);
  unset($columns['wpseo-links']);
  unset($columns['wpseo-linked']);
  return $columns;
}

$post_type = 'people';

// Register the columns.
add_filter( "manage_{$post_type}_posts_columns", function ( $defaults ) {
	
	$defaults['job-title'] = 'Job Title';
	$defaults['company'] = 'Company';
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
		// Display an ACF field
		echo get_field( 'company', $post_id );
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
		echo get_field( 'event_date', $post_id );
	}
	
	if ( $column_name == 'venue' ) {
		// Display an ACF field
		echo get_field( 'venue', $post_id );
	}
	
}, 10, 2 );
